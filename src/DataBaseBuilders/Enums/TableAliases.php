<?php

namespace App\DataBaseBuilders\Enums;

enum TableAliases: string
{
    case FROM = 'FROM';
    case INTO = 'INTO';
    case VALUES = 'VALUES';
    case SET = 'SET';
    case ON = 'ON';
    case AS = 'AS';
    case ALL = '*';
}
