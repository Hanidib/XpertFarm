<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_date',
        'stock_id',
        'supplier_id',
        'quantity_ordered',
        'total_cost',
    ];
    public function stocks()
    {
        return $this->belongsTo(Stock::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
