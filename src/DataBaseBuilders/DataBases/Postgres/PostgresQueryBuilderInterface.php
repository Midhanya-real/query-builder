<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\QueryPartsInterfaces\CRUDMethodsInterface;
use App\DataBaseBuilders\DataBases\QueryPartsInterfaces\LinksMethodsInterface;
use App\DataBaseBuilders\DataBases\QueryPartsInterfaces\SortMethodsInterface;

interface PostgresQueryBuilderInterface extends CRUDMethodsInterface, SortMethodsInterface, LinksMethodsInterface
{

}