<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\QueryPartsInterfaces\CRUDMethodsInterface;
use App\DataBaseBuilders\QueryPartsInterfaces\LinksMethodsInterface;
use App\DataBaseBuilders\QueryPartsInterfaces\SortMethodsInterface;

interface PostgresQueryBuilderInterface extends CRUDMethodsInterface, SortMethodsInterface, LinksMethodsInterface
{

}