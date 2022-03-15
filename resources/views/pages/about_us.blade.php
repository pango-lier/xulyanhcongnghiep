@extends('layout')

@section('title')

<title>{{$_about_us??''}}</title>

	<meta name="description" content="{{$_about_us_title??''}}" />

@endsection

@section('content')

						<div id="MainContent_aboutDetail">

							<div class="container mgb-40" style="margin-top: 40px">

								<h1 class="titleCenter text-uppercase"><b>{{$_about_us??''}}</b></h1>

								<div class="desc text-center">

									<p>{{$_about_us_title??''}}</p>

								</div>

							</div>

							<div class="wrap1000 wrapAboutUS">

								<strong><span style="color: #ff0000;">{{$_about_us_who??''}}</span></strong><br /><br />

								<p style="text-align: justify;">{{$_about_us_who_description??''}}</p>

								<br /><strong><span style="color: #ff0000;">{{$_about_us_vision??''}}</span></strong><br />

								<p style="text-align: justify;">{{$_about_us_vision_description??''}}</p>

								<br /><strong><span style="color: #ff0000;">{{$_about_us_core??''}}</span></strong><br />

								<p style="text-align: justify;">{{$_about_us_core_description??''}}</p>

							</div>

						</div>





@include('inc.contact')

@include('inc.intercooperation')

@endsection
