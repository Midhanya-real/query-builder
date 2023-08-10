<?php

namespace App\DataBaseBuilders\DataBases\Enums;

enum TableAliases: string
{
    case FROM = 'FROM';
    case INTO = 'INTO';
    case VALUES = 'VALUES';
    case SET = 'SET';
    case JOIN = 'JOIN';
    case FULL_OUTER_JOIN = 'FULL OUTER JOIN';
    case ON = 'ON';
}
