<?php

namespace App\DataBaseBuilders\Enums;

enum CRUDOperators: string
{
    case SELECT = 'SELECT';
    case INSERT = 'INSERT';
    case UPDATE = 'UPDATE';
    case DELETE = 'DELETE';
}
