<?php

namespace App\DataBaseBuilders\DataBases\Enums;

enum SortOperators: string
{
    case WHERE = 'WHERE';
    case ORDER_BY = 'ORDER BY';
}
