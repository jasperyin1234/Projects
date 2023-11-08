@extends('layouts.auth')
@section('content')
    <html>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="font-weight:bold; font-size:20px; text-align:center;">Update Product
                            Details</div>
                        <div class="card-body">
                            <a href="/admin"
                                style="display: inline-block; margin-bottom: 10px; padding: 5px 15px; background-color: red; color: white; text-decoration: none; border: none; border-radius: 5px; font-size: 15px; float: left;">Back</a>
                            <form action='updateProduct' method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $products['product_id'] }}"> <br><br>
                                <label style="font-weight: bold;">Product Type:</label><input type="text"
                                    name="product_type" value="{{ $products['product_type'] }}"
                                    style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;">
                                <br><br>
                                <label style="font-weight: bold;">Product Category:</label><input type="text"
                                    name="product_category" value="{{ $products['product_category'] }}"
                                    style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;">
                                <br><br>
                                <label style="font-weight: bold;">Product Description:</label><input type="text"
                                    name="product_description" value="{{ $products['product_description'] }}"
                                    style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;">
                                <br><br>
                                <label style="font-weight: bold;">Product Name:</label><input type="text"
                                    name="product_name" value="{{ $products['product_name'] }}"
                                    style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;">
                                <br><br>
                                <label style="font-weight: bold;">Product Price:</label><input type="text"
                                    name="product_price" value="{{ $products['product_price'] }}"
                                    style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;">
                                <br><br>
                                <label style="font-weight: bold;">Product Image Url:</label><input type="file" 
                                    name="image" value="{{ $products['product_image'] }}"
                                    style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;">
                                <br><br>
                                <button type="submit"
                                    style="background-color: #4CAF50; color: white; border-radius: 5px; padding: 10px 20px; font-size: 16px; border: none;">
                                    Update Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
