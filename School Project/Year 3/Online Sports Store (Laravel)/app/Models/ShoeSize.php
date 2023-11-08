<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoeSize extends Model
{
    protected $table = 'shoesizes';
    
    use HasFactory;

    // Product one-to-one relationship with Size
    public function Product() {
        return $this->belongsTo(Product::class);
    }
}
