@extends('layout')
@section('title')
<title>{{$cat->name}} camera xử lý ảnh công ngiệp</title>
	<meta name="description" content="{{$cat->description}}" />
@endsection
@section('content')	
<div class="container">
								<div class="mgb-40" style="margin-top: 40px">
									<h1 class="titleCenter "><b>{{$cat->name}}</b></h1>
									<div class="desc text-center textSer">
										<p>{{$cat->description}}</p>
									</div>
									</div>
								<div class="clr" ></div>
@include('inc.product')		
</div>		
@include('inc.intercooperation')
@endsection	