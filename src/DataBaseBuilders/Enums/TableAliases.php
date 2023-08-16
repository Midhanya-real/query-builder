<?php

namespace App\DataBaseBuilders\Enums;

enum TableAliases: string
{
    case FROM = 'FROM';
    case INTO = 'INTO';
    case VALUES = 'VALUES';
    case SET = 'SET';
    case JOIN = 'JOIN';
    case FULL_OUTER_JOIN = 'FULL OUTER JOIN';
    case WITH = 'WITH';
    case ON = 'ON';
    case AS = 'AS';
    case ALL = '*';
}
