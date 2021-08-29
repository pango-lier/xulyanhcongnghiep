@extends('layout')
@section('css')
<style type="text/css">
    .form-one input{
        width: 100%;
        padding: 5px 10px;
        margin:6px 0px;
    }
    .form-two textarea{
        width: 100%;
        padding: 15px;
    }
    .bill-to p{
     font-weight: bold;
     font-size: 16px;
     color: blue;
    }
</style>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <form action="checkout" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-12 clearfix">
                    <div class="container">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Shopping Cart</li>
                            </ol>
                        </div>
                        <div class="row bill-to">
                            <p>Thông tin khách hàng</p>
                               <div class="form-one col-md-6">
                                    <div>
                                    <input type="text" name="fullName" value="{{ old('fullName') }}" placeholder="Họ và Tên *"><br>
                                    @error('fullName')<div class=" text-danger">{{ $message }}</div>@enderror
                                    </div>
                                    <div>
                                    <input  type="text" name="email" value="{{ old('email') }}" placeholder="Email *"><br>
                                    @error('email')<div class=" text-danger">{{ $message }}</div>@enderror
                                     </div>
                                    <input  type="text" name="address" value="{{ old('address') }}" placeholder="Địa Chỉ *"><br>
                                    @error('address')<div class=" text-danger">{{ $message }}</div>@enderror
                                     <div>
                                    <input  type="text" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại *"></br>
                                    @error('phone')<div class=" text-danger">{{ $message }}</div>@enderror
                                    </div>
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div>
                                <div class="form-two  col-md-6">
                                    <textarea name="note" value="{{ old('message') }}"  placeholder="Hãy mô tả dự án thực hiện để chúng tôi tư vấn cho bạn ." rows="8"></textarea>
                                </div>
                                <div class="clr"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <section id="cart_items">
                        <div class="container">
                            <div class="table-responsive cart_info">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Ảnh minh họa</td>
                                        <td class="description">Tên sản phẩm</td>
                                        <td class="price">Giá</td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="total">Tổng</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(session('cart-count'))
                                        @foreach($cart as $item)
                                            <tr >
                                                <td class="cart_product" style="margin: 0px">
                                                    @if($item->options->image_path)
                                                        <img width="100px" height="100px" src="{{$item->options->image_path}}" alt="" />
                                                    @else
                                                        <img width="100px" height="100px" src="{{$item->options->image_path}}" alt="" />
                                                    @endif
                                                    
                                                </td>
                                                <td class="cart_description">
                                                    <h4><a href="">{{ $item->name }}</a></h4>

                                                    <p>Web ID: {{ $item->id }}</p>
                                                </td>
                                                <td >
                                                    <span class="cart_price">{{ number_format($item->price)}}</span>$
                                                </td>
                                                <td ><input min="0" class="cart_quantity" onchange="changPrice()" style="text-align: center;"  type="number" name="cart_quantity[{{$item->rowId}}]" value="{{ $item->qty }}">
                                                    
                                                </td>
                                                <td >
                                                    <span class="cart_total">{{ number_format($item->subtotal)}}
                                                        </span>$
                                                </td>
                                                <td class="cart_delete">
                                                    <a onclick="ajaxRemove('cart/remove','remove=1&id={{$item->id }}',this)" class="cart_quantity_delete" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    @else
                                        <tr>
                                            <td>Chưa có sản phẩm nào trong giỏ hàng .</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;
                                                <a class="btn btn-default update" href="/#products">Mua hàng</a>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>              
                            </div>
                            @if(session('cart-count'))
                        <div class="btn-cart">
                            <div class="col-sm-4">   
                                 <span>
                            <button class="btn btn-default update" href="/"><i class="fa fa-undo"></i> Quay về</button>
                            </span>
                            </div>
                            <div class="col-sm-8" style="text-align: right;">
                             <p>Tổng :
                             <span id="buy-total">{{number_format($total) }} </span>$</p>
                             <button type="submit" class="btn check_out"
                                               ><i class="fa fa-paper-plane"></i> Gửi đơn hàng</button>
                             </div> 
                         </div>
                         @endif                  
                        </div>
                    </section>
                    <!--/#cart_items-->
                </div>
                </form>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function changPrice(){
           var price=document.getElementsByClassName("cart_price");
           var quantity=document.getElementsByClassName("cart_quantity");
           var price_toltal=document.getElementsByClassName("cart_total");
           var total=0;
                for (var i = 0; i < price_toltal.length; i++) {
                price_toltal[i].innerHTML=Number(price[i].innerHTML)*quantity[i].value;
                total+=Number(price_toltal[i].innerHTML);
            };
            document.getElementById('buy-total').innerHTML=total;
        }
                                function ajaxRemove(href,data,this_node) {
                                  data=data+'&_token='+"{{ csrf_token() }}" ;
                                  var xhttp;
                                  xhttp = new XMLHttpRequest();
                                  xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                       //console.log(this.responseText); 
                                       var data=JSON.parse(this.responseText);
                                        //console.log(data.total); 
                                      this_node.parentNode.parentNode.remove();
                                      document.getElementById('buy-total').innerHTML=data.total;
                                      document.getElementById('cart-count').innerHTML=data.count;
                                    }
                                  };
                                  xhttp.open("POST",href, true);
                                  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                  xhttp.send(data); 
                                }

                            </script>
@endsection