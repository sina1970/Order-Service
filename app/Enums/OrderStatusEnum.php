<?php

namespace App;

enum OrderStatusEnum:string
{
    case PENDING = 'pending';
    case PROCCESSING = 'proccessing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cacncelled';
}
