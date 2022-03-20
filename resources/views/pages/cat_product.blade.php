@extends('layout')

@section('title')

<title>{{$cat->name}}</title>
	<meta name="description" content="{{$cat->description}}" />
    <title>{{ $cat->meta_title }}</title>
    <meta name="description" content="{{ $cat->description }}" />
    <meta property=”og:image” content="{{ asset($posts[0]->img_path) ?? ($_meta_image ?? '') }}" />
    <meta itemprop=”image” content="{{ asset($posts[0]->img_path) }}">
    <meta property="fb:admins" content="{{ $_meta_facebook_admin_id ?? '' }}" />
    <meta property="fb:app_id" content="{{ $_meta_facebook_app_id ?? '' }}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="vi_VN" />
    <meta property=”og:title” content="{{ $cat->meta_title ?? ($_meta_title ?? '') }}" />
    <meta property=”og:description” content="{{ $cat->description ?? ($_meta_description ?? '') }}" />
    <meta property="og:url" content="{{ asset($cat->slug . '+' . $cat->id . '/cats.html') ?? ($_meta_url ?? '') }}" />
    <meta property="article:section" content="{{ $_meta_article_section ?? '' }}" />
    <meta property="article:tag" content="{{ $posts[0]->tag ?? ($_meta_article_tag ?? '') }}" />
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
