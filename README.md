<p>
The construction of a query begins with the creation of an object:

$builder = new \App\QueryBuilder();
</p>

<p>
The request formation begins with calling the "createBuilder()" method:

$query = $builder->createBuilder()->...
</p>

<p>
To get the result, you need to call the "fetch" method, with which you can call one of the following three methods:
</p>
<ul>
<li>
$builder->fetch($query)->all(); - all results
</li>

<li>
$builder->fetch($query)->first(); - the first result
</li>

<li>
$builder->fetch($query)->save(); - save to the database
</li>
</ul>

<ul>
SELECT 
<li>
->select('persons', [
        'p.name',
    ]
)
</li>
<li>
->select(['persons' => 'p'], [
        'p.name',
    ]
)
</li>
<li>
->select(['persons' => 'p'], [
        'p.name' => 'name',
    ]
)
</li>
</ul>

<ul>
INSERT
<li>
->insert('addresses', [
        'street' => 'uebanskay',
        'house' => 2,
        'apartment' => 13,
        'user_id' => 3]
)
</li>
</ul>

<ul>
UPDATE

<li>
->update('persons', [
        'name' => 'Antony',
        'birthday' => '2005-01-08'
    ])
</li>
</ul>

<ul>
DELETE

<li>
->delete('persons')
</li>
</ul>

<ul>
WHERE (andWhere/orWhere)
<li>
->andWhere(['id' => 2])
</li>
<li>
->andWhere(['id' => ['>', 2])
</li>
<li>
->andWhere('id', 'name')
</li>
</ul>

<ul>
JOIN (join/outJoin)

<li>
->join('addresses', ['p.id' => 'addresses.user_id'])
</li>
<li>
->join(['addresses' => 'a'], ['p.id' => 'a.user_id'])
</li>
</ul>

<ul>
LIMIT (limit/offset)
<li>
->limit(1)
</li>
</ul>

<ul>
LIKE

<li>
->like('%aw%')
</li>
</ul>

<ul>
ORDER BY

<li>
->orderBy(['birthday' => 'ASC'])
</li>
</ul>

<ul>
GROUP BY

<li>
->groupBy(['p.name', 'a.street'])
</li>
</ul>

<ul>
HAVING

<li>
->having(['SUM' => '*'], '>', 28)
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
