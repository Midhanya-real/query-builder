<?php

namespace App\DataBaseBuilders\DataBases\Enums;

enum LogicalOperators: string
{
    case AND = 'AND';
    case OR = 'OR';
    case NOT = 'NOT';
}
