<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    use HasFactory;
    protected $primaryKey = 'product_id';
    
    // Transaction many-to-many relationship with Product
    public function Transactions() {
        return $this->belongsToMany(Transaction::class, 'product_transaction', 'transaction_id', 'product_id')->withPivot('transaction_quantity'); 
    }

    // Product One-To-One relationship with Sizes
    public function ShoeSize() {
        return $this->hasOne(ShoeSize::class);
    }

    public function ClothesSize() {
        return $this->hasOne(ClothesSize::class);
    }
}
