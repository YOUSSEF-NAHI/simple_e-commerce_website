<?php

namespace App\Models;

use App\Models\Command;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the command that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function command(): BelongsTo
    {
        return $this->belongsTo(Command::class, 'id', 'product_id');
    }
}
