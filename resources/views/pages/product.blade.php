@extends('layout')
@section('title')
	<title>{{$product->name}} ứng dụng xử lý ảnh</title>
	<meta name="description" content="{{$product->name}}" />
@endsection
@section('css')
<style type="text/css">
img {
    max-width: 100%;
    height: auto !important;
}
					  .youtube {
					 position:relative;
					 padding-bottom:56.25%;
					 padding-top:20px;
					 height:0;
					 overflow:hidden;
					  max-width: 900px;
					  max-height: 700px;
					   width:100%;
					 }
					.youtube iframe, .youtube object, .youtube embed {
					 position:absolute;
					 top:0;
					 left:0;

					 width:99%;
					 height:99%;
					 }
					 .h1_name{
					 	color: blue !important;
					 	font-size: 28px !important;
					 }
					 .content{
					 	margin-top: 15px;
					 }

.view-product {
  position: relative;
}

.view-product img {
  border: 1px solid #F2F2F2;
  height: 380px;
  width: 100%;
  padding: 10px;
}

.product-information {
  border: 1px solid #F7F7F0;
  overflow: hidden;
  position: relative;
}

.newarrival{
	position:absolute;
	top:0;
	left:0
}
.product-header {
  background-color: #F3F3F9;
}
}
.product-information h2 {
  color: #363432;
  font-size: 20px;
  margin-top: 0;
}

.product-information p {
  color: #696763;
  margin-bottom: 5px;
}

.product-information span {
  display: inline-block;
  margin-bottom: 8px;
  margin-top: 18px;
}

.product-information span span {
  color: #FE980F;
  float: left;
  font-size: 30px;
  font-weight: 700;
  margin-right: 20px;
  margin-top: 0px;
}
.product-information span input {
  border: 1px solid #DEDEDC;
  color: #696763;
  font-size: 20px;
  font-weight: 700;
  height: 33px;
  outline: medium none;
  text-align: center;
  width: 100px;
}

.product-information span label {
  color: #696763;
  font-weight: 700;
  margin-right: 5px;
}
.product-information button{
 margin-top: 5px;
 padding: 5px 15px;
 background-color: #337ab7;
 color: white;
 border-color: #337ab7;
}
.product-information button:hover{
 background-color: #33Aab7;
 color: white;
}
.header-rb{
					 	font-weight: bold;
					 	color: black;
					 	font-size: 22px;
					 	margin-bottom: 20px;
					 }
					 .right-bar {
					 	background-color: #F2F2F2;
					 	padding: 4px 12px;
					 }
					 .right-bar img{
					 	width: 95%;
					 	height: 0px auto;
					 }
					 .right-bar h2{
					 	font-weight: bold;
					 	
					 	font-size: 14px;
					 	text-align: justify;
					 	
					 	margin-top: 12px;
					 	line-height: 20px;
					 }
					 .right-bar h2:hover{
					 	color:blue;
					 }
					 .btn-buynow{
					 	padding: 10px 20px;
					 	margin-top: 10px;
					 	color: white;
					 	font-weight: bold;
					 	background-color: blue;
					 }
					 .btn-buynow:hover{
					     color:red;
					 }
					</style>
@endsection
@section('content')	
					<div class="breadcrumbs container">
				            <ul class="breadcrumb">
				                <li><a href="/">Home</a></li>
				                <li class="active">{{$product->category->name}}</li>
				            </ul>
				        </div>	
					<div class="container">
						<div class="row">
						<div class="wrapTypicalSuccess  mgt-40 col-md-10">
					<div class="product-header"><!--product-details-->
						<div class="col-sm-6">
							<div class="view-product">
								<img alt="{{$product->slug}}"  title="{{$product->name}}"  src="{{$product->img_path}}" alt="{{$product->name}}" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="product-information">
								<h1 class="h1_name">{{$product->name}}</h1>
								<p>Mã hàng: 1089772</p>
								<p>Đơn giá  :   <b style="font-size: 18px;"> <?php if($product->price==0) echo "Liên hệ" ; else echo $product->price." $" ; ?></b></p>
								<form action="cart/buynow" method="post">
								@csrf
								<input type="hidden" value="{{$product->id}}" name="id">	
								<span>
									<label>Số lượng:</label>
									<input name="quantity" type="number" value="1" />
								</span>
								<p><b>Tình trạng:</b> Còn hàng</p>
								<input type="submit" name="add"  class="btn btn-buynow" value="Mua ngay">
								@if($product->file_path!='')
								<a class="btn btn-buynow" href="{{$product->file_path}}" download="catalog">Tải catalog</a>
								@endif
								</form>
							</div><!--/product-information-->
						</div>
						<div class="clr"></div>
					</div><!--/product-details-->
					<div class="share"></div>
							<div class="content">{!!$product->content!!}</div>
						</div>
						<div class="col-md-2">
							<h4 class="header-rb">{{$product->category->name}}</h4>
							<div>
								@foreach($productOthers as $row)
								<div class="img right-bar">	
								<a href="{{$row->slug.'+'.$row->id.'/product.html'}}"><h2 >{{$row->name}}</h2>
								<img alt="{{$row->slug}}"  title="{{$row->name}}" class="dp-none right-bar-img" src="{{$row->img_path}}">
								</a>
								</div>
								@endforeach
							</div>
						</div>
						</div>
					</div>
@endsection