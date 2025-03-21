<?php

namespace App\Models;

use App\Observers\OrderEventObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


#[ObservedBy([OrderEventObserver::class])]
class OrderEvent extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'status', 'payload'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
