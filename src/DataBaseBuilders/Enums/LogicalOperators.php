<?php

namespace App\DataBaseBuilders\Enums;

enum LogicalOperators: string
{
    case AND = 'AND';
    case OR = 'OR';
    case NOT = 'NOT';
}
