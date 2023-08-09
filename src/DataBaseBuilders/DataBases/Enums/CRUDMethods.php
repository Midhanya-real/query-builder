<?php

namespace App\DataBaseBuilders\DataBases\Enums;

enum CRUDMethods
{
    case SELECT;
    case INSERT;
    case UPDATE;
    case DELETE;
}
