@extends('layouts.app')
@section('content')
    <html>

    <head>
        <link rel='stylesheet' href="{{ url('css/home.css') }}">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </head>


    <body>
        @if (session()->has('status'))
            <h3 style="background-color:rgba(221,255,221,1.00); text-align:center;"> {{ session('status') }} </h3>
        @endif
        <h1 class='home-title'>
            WELCOME TO ABIBAS, THE HOUSE OF CLASSICS.
        </h1>

        <div class='carousel-wrapper'>
            <div class='carousel-container'>
                <div class='carousel' id='carousel'></div>
                <div class='carousel-header'>
                    <p>Unlock your<br>true potential.<br>
                        <a href="#shop-now">Shop Now.</a>
                    </p>
                </div>
            </div>
        </div>

        <div class='trending-wrapper'>
            <div class="trending">
                <h1 class='trending-title' id='shop-now'>TRENDING PRODUCTS</h1>
                <div class="product">
                    @foreach ($products as $product)
                        <div class="card" data-name="{{ $product->product_name }}">
                            <div class="img"><img src="{{ $product->image }}"></div>
                            <div class="title"> {{ $product->product_name }} </div>
                            <div class="desc">{{ $product->product_description }}</div>
                            <div class="box">
                                <div class="price">RM {{ $product->product_price }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="products-preview">
                    @foreach ($products as $product)
                        <div class="preview" data-target="{{ $product->product_name }}">
                            <img src="{{ $product->image }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        @if ($product->product_category == 'Clothes')
                                        <th colspan="4">Size Selection</th>
                                        @elseif($product->product_category == 'Footwear')
                                        <th colspan="5">Size Selection</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <form method="POST" action="{{ route('addItem', $product->product_id) }}">
                                            @csrf
                                            @if ($product->product_category == 'Clothes')
                                                <td><input type="radio" name="size" value="S" required>S</td>
                                                <td><input type="radio" name="size" value="M" required>M</td>
                                                <td><input type="radio" name="size" value="L" required>L</td>
                                                <td><input type="radio" name="size" value="XL" required>XL</td>
                                            @elseif($product->product_category == 'Footwear')
                                                <td><input type="radio" name="size" value="US8" required>US 8</td>
                                                <td><input type="radio" name="size" value="US9" required>US 9</td>
                                                <td><input type="radio" name="size" value="US10" required>US 10</td>
                                                <td><input type="radio" name="size" value="US11" required>US 11</td>
                                                <td><input type="radio" name="size" value="US12" required>US 12</td>
                                            @endif
                                    </tr>
                                </tbody>
                            </table>
                            <div class="buttons">
                                <div class="btn1">
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
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
                        close.querySelector('.c').onclick = (event) => {
                            event.preventDefault();
                            event.stopPropagation();
                            close.classList.remove('active');
                            previewContainer.style.display = 'none';
                        };
                    });
                </script>

            </div>

            <div class='company-background-wrapper'>
                <h2 class='company-background-title'>STORIES, SPORTSWEAR AND STYLES<br>AT ABIBAS, SINCE 2023</h2>
                <div class='company-background-text'>The one and only shop for premium,
                    stylish sportswear for athletes and fitness enthusiasts alike. Fulfill your fitness goals with our
                    products,
                    from athletic bodywear and
                    footwear, to accessories designed for high performance using the latest technologies and eco-friendly
                    materials. We prioritize sustainability and ethical production practices by sourcing materials from
                    socially
                    responsible suppliers and working with factories that provide fair wages and safe working conditions.
                    Join
                    us on our journey to provide the best sportswear possible for athletes and fitness enthusiasts
                    worldwide.
                </div>
            </div>

            <div class='foot'>
                <div id='footer'></div>
            </div>

    </body>

    </html>
@endsection


<script src="/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" defer></script>



{{-- have to install react, reactstrap and react-slick --}}
