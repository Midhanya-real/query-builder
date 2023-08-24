<h3>
The construction of a query begins with the creation of an object:
</h3>
<pre>
$builder = new \App\QueryBuilder();
</pre>

<h3>
The request formation begins with calling the "createBuilder()" method:
</h3>

<pre>
$query = $builder->createBuilder()->...->getQuery();
</pre>

<h3>
To get the result, you need to call the "fetch" method, with which you can call one of the following three methods:
</h3>
<ul>
<li>
<pre>$builder->fetch($query)->all(); - all results</pre>
</li>

<li>
<pre>$builder->fetch($query)->first(); - the first result</pre>
</li>

<li>
<pre>$builder->fetch($query)->save(); - save to the database</pre>
</li>
</ul>

<ul>
SELECT 
<li>

<pre>
->select('persons', [
        'p.name',
    ]
)
</pre>
</li>

<li>
<pre>->select(['persons' => 'p'], [
        'p.name',
    ]
)
</pre>
</li>

<li>
<pre>
->select(['persons' => 'p'], [
        'p.name' => 'name',
    ]
)
</pre>
</li>
</ul>

<ul>
INSERT
<li>
<pre>
->insert('addresses', [
        'street' => 'uebanskay',
        'house' => 2,
        'apartment' => 13,
        'user_id' => 3]
)
</pre>
</li>

</ul>

<ul>
UPDATE

<li>
<pre>
->update('persons', [
        'name' => 'Antony',
        'birthday' => '2005-01-08'
    ])
</pre>
</li>

</ul>

<ul>
DELETE

<li>
<pre>
->delete('persons')
</pre>
</li>

</ul>

<ul>
WHERE (andWhere/orWhere)
<li>
<pre>
->andWhere(['id' => 2])
</pre>
</li>

<li>
<pre>
->andWhere(['id' => ['>', 2])
</pre>
</li>

<li>
<pre>
->andWhere('id', 'name')
</pre>
</li>

</ul>

<ul>
JOIN (join/outJoin)

<li>
<pre>
->join('addresses', ['p.id' => 'addresses.user_id'])
</pre>
</li>

<li>
<pre>
->join(['addresses' => 'a'], ['p.id' => 'a.user_id'])
</pre>
</li>

</ul>

<ul>
LIMIT (limit/offset)
<li>
<pre>
->limit(1)
</pre>
</li>

</ul>

<ul>
LIKE

<li>
<pre>
->like('%aw%')
</pre>
</li>

</ul>

<ul>
ORDER BY

<li>
<pre>
->orderBy(['birthday' => 'ASC'])
</pre>
</li>

</ul>

<ul>
GROUP BY

<li>
<pre>
->groupBy(['p.name', 'a.street'])
</pre>
</li>

</ul>

<ul>
HAVING

<li>
<pre>
->having(['SUM' => '*'], '>', 28)
</pre>
</li>

</ul>

<h3>example of using the WITH</h3>
<pre>
$query1 = $query = $builder->createBuilder()
    ->select(['persons' => 'p'], [
        'p.name',
        'p.sec_name',
        'p.birthday',
    ])->getQuery();

$query2 = $builder->createBuilder()
->select(['persons' => 'p'], [
'p.name',
'p.sec_name',
'p.birthday',
'a.street',
])->join(['addresses' => 'a'], ['p.id' => 'a.user_id'])
->getQuery();

$query = $builder->createBuilder()
->with(['alias' => $query1, 'alias2' => $query2])
->select('t', ['some_field', 'some_field_two'])
->getQuery();
</pre>

<h3>example of using the UNION/INTERSECT/EXCEPT</h3>
<pre>
$query1 = $builder->createBuilder()
    ->select('persons', ['name'])
    ->getQuery();

$query2 = $builder->createBuilder()
    ->select('addresses', ['street'])
    ->andWhere(['street' => "uebanskay"])
    ->getQuery();

$unionQuery = $builder->createBuilder()->union([$query1, $query2])->getQuery();
</pre>
