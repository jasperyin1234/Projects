@extends('layouts.app')
@section('content')

<div class="container my-5">
    <div class="card shadow">
        @if(session()->has('status'))
            <h3 style="background-color:rgba(221,255,221,1.00); text-align:center;"> {{ session('status') }} </h3>
        @endif
        <div class="card-body" style="display:grid">
            <table>
                <th>
                    <h3 style="text-decoration:underline">Shopping Cart</h3>
                </th>
                <tr>
                    <td colspan="2">
                        <div class="col-md-5">
                            <h3> </h3>
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <h3>Product Name</h3>
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <h3>Product Price</h3>
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <h3>Product Size</h3>
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <h3>Quantity</h3>
                        </div>
                    </td>
                </tr>
                @if($carts != null)
                @foreach($carts as $product)
                <tr>
                    <td colspan="2">
                        <div class="col-md-5">
                            <img src="{{$product['image']}}" alt="image" style="width: 200px; height: 200px">
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <div>{{$product['product_name']}}</div>
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <div>RM {{$product['product_price']}}</div>
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <div>{{$product['size']}}</div>
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <div>{{$product['quantity']}}</div>
                        </div>
                    </td>
                    <td colspan="2">
                        <div class="col-md-10">
                            <form method="POST" action="{{ route('removeItem', [$product['product_id'], $product['size']]) }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product['product_id']}}">
                                <input type="hidden" name="size" value="{{$product['size']}}">
                                <button type ="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    </td>
                </tr>   
                @endforeach
                @else
                <tr></tr>
                <tr>
                    <td colspan="12">
                        <div class="col-md-12">
                            <div style="text-align:center; font-size:18px; margin:70px;padding-left:40px;"> No Item Added in Cart </div>
                        </div>
                    </td>
                </tr>
                @endif
                </table>
                <div class="bottom-right justify-content-end pr-3 pb-3">
                    <form method="POST" action="{{ route('purchase') }}">
                        @csrf
                        <button type ="submit" class="btn btn-success">Purchase</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection