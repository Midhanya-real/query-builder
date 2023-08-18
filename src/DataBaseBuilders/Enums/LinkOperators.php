<?php

namespace App\DataBaseBuilders\Enums;

enum  LinkOperators: string
{
    case JOIN = 'JOIN';
    case FULL_OUTER_JOIN = 'FULL OUTER JOIN';
    case WITH = 'WITH';
    case UNION = 'UNION';
    case INTERSECT = 'INTERSECT';
    case EXCEPT = 'EXCEPT';
}