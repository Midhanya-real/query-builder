<?php

namespace App\DataBaseBuilders\Enums;

enum SortOperators: string
{
    case WHERE = 'WHERE';
    case ORDER_BY = 'ORDER BY';
    case GROUP_BY = 'GROUP BY';
    case LIMIT = 'LIMIT';
    case OFFSET = 'OFFSET';
    case HAVING = 'HAVING';
}
