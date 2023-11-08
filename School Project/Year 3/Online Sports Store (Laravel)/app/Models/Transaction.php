<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id';
    
    use HasFactory;

    // User one-to-many relationship with Transaction
    public function User() {
        return $this->belongsTo(User::class);
    }

    // Transaction many-to-many relationship with Product
    public function Products() {
        return $this->belongsToMany(Product::class,  'product_transaction', 'transaction_id', 'product_id')->withPivot('transaction_quantity'); 
    }
}
