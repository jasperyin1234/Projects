@extends('layouts.auth')
@section('content')
<html>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-weight:bold; font-size:20px; text-align:center;">Add New Product</div>
                    <div class="card-body">
                        <a href="admin" style="display: inline-block; margin-bottom: 10px; padding: 5px 15px; background-color: red; color: white; text-decoration: none; border: none; border-radius: 5px; font-size: 15px; float: left;">Back</a><br><br><br>
                        <form action='addProduct' method="POST" enctype="multipart/form-data">
                            @csrf
                            <p style="font-weight: bold;">Product Type:</p>
                            <label style="font-weight: bold;">
                            <input type="radio" name="product_type" value="Women">
                                Women
                            </label>
                            <label style="font-weight: bold;">
                            <input type="radio" name="product_type" value="Men">
                                Men
                            </label><br><br>
                            <p style="font-weight: bold;">Product Category:</p>
                            <label style="font-weight: bold;">
                            <input type="radio" name="product_category" value="Clothes">
                                Clothes
                            </label>
                            <label style="font-weight: bold;">
                            <input type="radio" name="product_category" value="Footwear">
                                Footwear
                            </label><br><br>
                            <input type = "text" name="product_description" placeholder="Enter Product Description" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;"> <br><br>
                            <input type = "text" name="product_name" placeholder="Enter Product Name" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;"> <br><br>
                            <input type = "text" name="product_price" placeholder="Enter Product Price" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;"> <br><br>
                            <input type="file" name="image" placeholder="Enter Product Image Url" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; width: 100%;"> <br><br>
                            <button type ="submit" style="background-color: #4CAF50; color: white; border-radius: 5px; padding: 10px 20px; font-size: 16px; border: none;"> Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body> 
</html>
@endsection