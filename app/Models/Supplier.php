<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'address',
        'payment_terms',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
