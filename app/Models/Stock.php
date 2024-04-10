<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'item_name',
        'quantity',
        'price',
        'date_added',
        'sold_quantity',
        'expiration_date',
        'notes',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function purchaseOrder()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
