@extends('layouts.auth')
@section('content')
<html>
<head>
<style>
    .w-5{
        display: none
    }
    td{
        border: 2px solid;
        text-align: center;
    }
    a{
        margin: 5px;
    }
</style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header" style="font-weight:bold; font-size:20px; text-align:center;">Product List</div>
                    <div class="card-body">
                    <a href="addProduct" style="display: inline-block; margin: 10px; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border: none; border-radius: 5px; font-size: 16px; float: right;">Add New Product</a>
                        <table style="border:2px solid; border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; font-size: 14px;">
                            <tr style="font-size: 16px; font-weight: bold; border:2px solid; border-collapse: collapse; padding: 10px; background-color: #eee; text-align: left; line-height:5s0px;">
                                <td>Product ID</td>
                                <td>Type</td>
                                <td>Category</td>
                                <td>Description</td>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Operation</td>
                                <td>Operation</td>
                            </tr>
                            @foreach ($products as $product)
                            <tr style=" font-weight: bold; padding: 20px; border: 2px solid; line-height:40px;">
                                <td>{{$product['product_id']}}</td>
                                <td>{{$product['product_type']}}</td>
                                <td>{{$product['product_category']}}</td>
                                <td>{{$product['product_description']}}</td>
                                <td>{{$product['product_name']}}</td>
                                <td>{{$product['product_price']}}</td>
                                <td><a href={{"deleteProduct/".$product['product_id']}} style="display: inline-block; padding: 1px 10px; background-color: red; color: white; text-decoration: none; border: none; border-radius: 5px; font-size: 16px;">Delete</a></td>
                                <td><a href={{"updateProduct/".$product['product_id']}} style="display: inline-block; padding: 1px 10px; background-color: blue; color: white; text-decoration: none; border: none; border-radius: 5px; font-size: 16px;">Update</a></td>
                            </tr>
                            @endforeach
                        </table>
                        <div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<html>
@endsection
