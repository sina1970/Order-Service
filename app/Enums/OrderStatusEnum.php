<?php

namespace App\Enums;

enum OrderStatusEnum:string
{
    case PENDING = 'pending';
    case PROCCESSING = 'processing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cacncelled';
}
