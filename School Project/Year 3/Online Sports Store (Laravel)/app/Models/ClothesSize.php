<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothesSize extends Model
{
    protected $table = 'clothessizes';

    use HasFactory;

    // Product one-to-one relationship with Size
    public function Product() {
        return $this->belongsTo(Product::class);
    }
}
