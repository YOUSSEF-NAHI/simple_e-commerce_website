<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Command;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'totalquantity',
        'totalPrice',
        'user_id',
    ];

    public function commands() {

        return $this -> hasMany(Command::class,'cart_id','id');
    }
}
