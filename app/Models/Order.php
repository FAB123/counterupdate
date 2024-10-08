<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'order_id';

    public function ordered_items(): HasMany
    {
        return $this->hasMany(OrderedItem::class, 'order_id', 'order_id');
    }

    public function getTransactionTimeAttribute()
    {
        return $this->created_at->format('d-m-Y h:i:A');
    }

    protected $appends = ['transaction_time'];
}
