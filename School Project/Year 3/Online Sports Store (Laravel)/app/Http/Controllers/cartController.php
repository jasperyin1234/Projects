<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ClothesSize;
use App\Models\ShoeSize;
use Illuminate\Support\Facades\Session;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\User;

class cartController extends Controller
{
    // All data
    public function index()
    {
        $cart = session()->get('cart');
        return view('/cart', ['carts' => $cart]);
    }

    // Add item to cart
    public function addItem(Request $request)
    {
        $product_id = $request->input('product_id');
        $size = $request->input('size'); // S M L XL
        $productKey = $product_id . $size;
        $product = Product::find($product_id);

        if ($product->product_category == "Clothes")
            $stock = ClothesSize::where('product_id', $product_id)->value($size);
        else
            $stock = ShoeSize::where('product_id', $product_id)->value($size);

        $cart = session()->get('cart');

        // FIRST CONDITION -> Cart session not set
        if (!$cart) {
            if ($stock <= 0) {
                return redirect()->back()->with('status', "{$product->product_name} - {$size} is out of stock!");
            }

            $cart = [
                $productKey => [
                    "product_id" => $product->product_id,
                    "product_name" => $product->product_name,
                    "product_category" => $product->product_category,
                    "quantity" => 1,
                    "product_price" => $product->product_price,
                    "size" => $size,
                    "image" => $product->image,
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('status', "{$product->product_name} - {$size} added to cart successfully!");
        }

        // SECOND CONDITION -> Cart & Product alrdy added 
        if (isset($cart[$productKey])) {

            $cart[$productKey]['quantity']++;

            if ($stock < $cart[$productKey]['quantity']) {
                return redirect()->back()->with('status', "{$product->product_name} - {$size} is out of stock!");
            }
            session()->put('cart', $cart);

            return redirect()->back()->with('status', "{$product->product_name} - {$size} added to cart successfully!");
        }

        // THIRD CONDITION -> Cart existed but Product not added yet
            if ($stock <= 0) {
                return redirect()->back()->with('status', "{$product->product_name} - {$size} is out of stock!");
            }

            $cart[$productKey] = [
                "product_id" => $product->product_id,
                "product_name" => $product->product_name,
                "product_category" => $product->product_category,
                "quantity" => 1,
                "product_price" => $product->product_price,
                "size" => $size,
                "image" => $product->image,
            ];

        session()->put('cart', $cart);
        return redirect()->back()->with('status', "{$product->product_name} - {$size} added to cart successfully!");
    }

    // Remove item from cart
    public function removeItem(Request $request)
    {
        $product_id = $request->input('product_id');
        $size = $request->input('size'); // S M L XL
        $productKey = $product_id . $size;
        $product = Product::find($product_id);
        
        $cart = session()->get('cart');

        if (isset($cart[$productKey])) {
            unset($cart[$productKey]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('status', "{$product->product_name} - {$size} removed from cart successfully!");
    }   

    // Purchase function
    public function purchase(Request $request) {

        // Retrieve session data 
        $cart = session()->get('cart'); 

        // From $cart retrieve all the products + quantity
        $products = [];
        $totalPrice = 0;

        if ($cart == null)
            return redirect()->back()->with('status', 'Cart is Empty!');

        foreach ($cart as $value) {
                $product = [
                'product_id' => $value['product_id'],
                'product_name' => $value['product_name'],
                'quantity' => $value['quantity'],
                'product_price' => $value['product_price'],
                'size' => $value['size'],
            ];
            array_push($products, $product);
            
            // Calculate the total price
            $totalPrice += $value['product_price'] * $value['quantity'];
            
            // Update the product stock
            $product_id = $value['product_id'];
            $size = $value['size'];
            if ($value['product_category'] == "Clothes") {
                $clothesSize = ClothesSize::where('product_id', $product_id)->first();
                $clothesSize->$size -= $value['quantity'];
                $clothesSize->save();
            } else {
                $shoeSize = ShoeSize::where('product_id', $product_id)->first();
                $shoeSize->$size -= $value['quantity'];
                $shoeSize->save();
            }
        }

        $user = User::find($request->user()->id);

        // Create a new transaction and save it to the database
        $transaction = new Transaction;
        $transaction->user_id = $user->id;
        $transaction->transaction_date = Carbon::now()->toDate();
        $transaction->delivery_address = $user->address;
        $transaction->total_amount = $totalPrice;
        $transaction->save();

        // Attach the products to the transaction
        foreach ($products as $product) {
        $transaction->Products()->attach($product['product_id'], ['transaction_quantity' => $product['quantity']]);
    }
        // Clear the cart data from the session 
        session()->forget('cart');
                
        // Redirect to the order details
        return redirect()->route('orderdetails', ['userid' => $user->id]);
    }
    
}
