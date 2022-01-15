<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cart;
use App\Models\Product;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'totalPrice',
        'user_id',
        'product_id',
    ];


    /* Get the cart that owns the Command
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    /**
     * Get the product associated with the Command
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
