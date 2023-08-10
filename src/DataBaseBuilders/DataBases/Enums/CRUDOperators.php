<?php

namespace App\DataBaseBuilders\DataBases\Enums;

enum CRUDOperators
{
    case SELECT;
    case INSERT;
    case UPDATE;
    case DELETE;
}
