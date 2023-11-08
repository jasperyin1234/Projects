@extends('layouts.auth')
@section('content')
<html>

<head>
    <link rel="stylesheet" href="{{url('css/shoppingCart.css')}}" />
</head>

<body>
    @if(session()->has('status'))
    <h3 style="background-color:rgba(221,255,221,1.00); text-align:center;"> {{ session('status') }} </h3>
    @endif
    <section class="section2">
        <div class="product">
            @foreach ($products as $product)
            <div class="card" data-name="{{$product->product_name}}">
                <div class="img"><img src="{{ $product->image }}"></div>
                <div class="title"> {{$product->product_name}} </div>
                <div class="desc">{{$product->product_description}}</div>
                <div class="box">
                    <div class="price">RM {{$product->product_price}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </section>


    <div class="products-preview">
        @foreach ($products as $product)
        <div class="preview" data-target="{{$product->product_name}}">
            <img src="{{ $product->image }}">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="5">Size Selection</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form method="POST" action="{{ route('addItem', $product->product_id) }}">
                            @csrf
                            <td><input type="radio" name="size" value="US8" required>US 8</td>
                            <td><input type="radio" name="size" value="US9" required>US 9</td>
                            <td><input type="radio" name="size" value="US10" required>US 10</td>
                            <td><input type="radio" name="size" value="US11" required>US 11</td>
                            <td><input type="radio" name="size" value="US12" required>US 12</td>
                    </tr>
                </tbody>
            </table>
            <div class="buttons">
                <div class="btn1">
                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                    <button type="submit">Add To Cart</button>
                    </form>
                </div>
                <div class="btn2">
                    <a href="#" class="c">Cancel</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        let previewContainer = document.querySelector('.products-preview');
        let previewBox = previewContainer.querySelectorAll('.preview');

        //active action added when the card is being clicked
        document.querySelectorAll('.product .card').forEach(product => {
            product.onclick = () => {
                previewContainer.style.display = 'flex';
                let name = product.getAttribute('data-name');
                previewBox.forEach(preview => {
                    let target = preview.getAttribute('data-target');
                    if (name == target) {
                        preview.classList.add('active');
                    }
                });
            };
        });

        //if onclick cancel btn, active action removed
        //display become none
        previewBox.forEach(close => {
            close.querySelector('.c').onclick = () => {
                close.classList.remove('active');
                previewContainer.style.display = 'none';
            };
        });
    </script>
</body>

</html>
@endsection