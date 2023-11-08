<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\DB; // import database
use App\Models\Transaction; // import transaction 
use App\Models\Product; // import model 

class transactionController extends Controller
{
    public function getOrderDetails($id)
    {
        $transactions = Transaction::where('user_id', $id)->orderBy('created_at','desc')->get();
        $orders = collect();
        $products = collect();

        foreach ($transactions as $transaction) {
            $orders->push($transaction);
            $product_transaction = $transaction->Products;
            foreach ($product_transaction as $product) {
                $product->transaction_id = $transaction->id;
                $products->push($product);
            }
        }
        return view('orderDetails', [
            'orders' => $orders,
            'products' => $products,
        ]);
    }
}
