<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\QueryPartsInterfaces\CRUDMethodsInterface;
use App\DataBaseBuilders\QueryPartsInterfaces\LinkMethodsInterface;
use App\DataBaseBuilders\QueryPartsInterfaces\SortMethodsInterface;

interface PostgresQueryBuilderInterface extends CRUDMethodsInterface, SortMethodsInterface, LinkMethodsInterface
{

}