<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'prod_id',
        'qty',
        'price',                
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
