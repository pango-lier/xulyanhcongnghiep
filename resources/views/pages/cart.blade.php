@extends('layout')
@section('title')
<title> Xử lý ảnh Labview - Camera cho xử lý ảnh</title>
    <meta name="description" content=" cách xử lý ảnh Labview - ứng dụng sử lý ảnh trong công nghiệp" />
@endsection
@section('css')
<style type="text/css">
</style>
    @endsection
@section('content') 
    <div class="breadcrumbs container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shoppisng Cart</li>
            </ul>
        </div>      
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu" style="text-align: center;">
                        <td class="image">Item</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if(count($cart))
                    @foreach($cart as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $item->name }}</a></h4>
                            <p>Web ID: {{ $item->id }}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($item->price)}} VNĐ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form method="POST" action="{{url("cart?product_id=$item->id&increment=1")}}">
                                     <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="cart_quantity_up">
                                         +
                                    </button>
                                </form>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="{{url("cart?product_id=$item->id&decrease=1")}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ number_format($item->subtotal)}} VNĐ</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="cart/remove/{{$item->id}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                <p>You have no items in the shopping cart</p>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

@endsection