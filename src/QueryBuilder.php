<?php

namespace App;

use App\DataBases\DataBase;

class QueryBuilder
{
    public function getDataBase(): DataBase
    {
        return new DataBase();
    }
}