<?php

namespace App\Enums;

enum TableStatus: string
{
    case Pending = 'pending';
    case Avalible = 'avalible';
    case Unavalible = 'unavalible';
}