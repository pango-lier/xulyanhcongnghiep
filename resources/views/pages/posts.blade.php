@extends('layout')
@section('title')
	<title>{{'Xử lý ảnh '.$post->name}}</title>
	<meta name="description" content="{{$post->name}}" />
@endsection
@section('css')
<style type="text/css">
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
					 .header-rb{
					 	font-weight: bold;
					 	color: black;
					 	font-size: 22px;
					 	margin-bottom: 20px;
					 }
					 .right-bar{
					 	font-weight: bold;
					 	color: blue;
					 	background-color: #F2F2F2;
					 	font-size: 14px;
					 	text-align: justify;
					 	padding: 12px 12px;
					 	margin-top: 12px;
					 	line-height: 20px;
					 }
					 .right-bar:hover{
					 	color:red;

					 }
					 @media screen and (max-width:767px) {
					 	.dp-none{
					 	display: none;
					 }
					 }

					</style>
@endsection
@section('content')	
			<div class="breadcrumbs container">
				            <ul class="breadcrumb">
				                <li><a href="/">Home</a></li>
				                <li class="active">{{$post->category->name}}</li>
				            </ul>
				        </div>		
					<div class="container">
						<div class="row">
						<div class="wrapTypicalSuccess mgt-40 col-md-9 col-sm-8">
							<h1 class="h1_name">{{$post->name}}</h1>
							<div class="share">
								<div class="left"><span>Ngày {{date('d/m/yy',strtotime($post->created_at))}} || Lược xem {{$post->count_views}} <i class="fa fa-eye" aria-hidden="true"></i> || <a href="https://www.youtube.com/channel/UCezizb5kh-rcla61D6TJ6GQ" target="_blank"> <i style=" color: red;" class="fa fa-youtube" aria-hidden="true">Youtube</i></a> || <a href="https://www.facebook.com/xulyanhcongnghiep" target="_blank"> <i style=" color: blue;" class="fa fa-facebook-square" aria-hidden="true"> Facebook</i></a></span></div>
							</div>
							@if($post->video_link!='')
							<div class="youtube">
		                        <iframe width="560" height="315" src="{{$post->video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		                    </div>
		                    @endif
							<div class="content">{!!$post->content!!}</div>
							@include('inc.comment',['id'=>$post->id]) 
							
						</div>
						<div class="col-md-3 col-sm-4">
							<h4 class="header-rb">Bài viết khác</h4>
							<div >
								@foreach($postOthers as $row)
								<div class="img item">	
								<a href="{{$row->slug.'+'.$row->id.'.html'}}"><h2 class="right-bar"><i style=" color: red;" class="fa fa-youtube" aria-hidden="true"> </i> {{$row->name}}</h2></a>
								
								</div>
								@endforeach
							</div>
						</div>

						</div>
					</div>
					
@endsection