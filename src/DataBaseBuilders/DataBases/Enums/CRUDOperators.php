<?php

namespace App\DataBaseBuilders\DataBases\Enums;

enum CRUDOperators: string
{
    case SELECT = 'SELECT';
    case INSERT = 'INSERT';
    case UPDATE = 'UPDATE';
    case DELETE = 'DELETE';
}
