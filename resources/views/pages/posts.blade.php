@extends('layout')

@section('title')
    <title>{{ $post->name }}</title>
    <meta name="description" content="{{ $post->description }}" />
    <meta property="og:image" content="{{ asset($post->img_path) ?? ($_meta_image ?? '') }}" />
    <meta itemprop="image" content=" {{ asset($post->img_path) }}" />
    <meta property=" fb:admins" content="{{ $_meta_facebook_admin_id ?? '' }}" />
    <meta property="fb:app_id" content="{{ $_meta_facebook_app_id ?? '' }}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="{{ $post->title ?? ($_meta_title ?? '') }}" />
    <meta property="og:description" content="{{ $post->description ?? ($_meta_description ?? '') }}" />
    <meta property="og:url" content="{{ asset($post->slug . '+' . $post->id . '.html') ?? ($_meta_url ?? '') }}" />
    <meta property="article:section" content="{{ $_meta_article_section ?? '' }}" />
    <meta property="article:tag" content="{{ $post->tag ?? ($_meta_article_tag ?? '') }}" />
@endsection

@section('css')
    <style type="text/css">
        .youtube {

            position: relative;

            padding-bottom: 56.25%;

            padding-top: 20px;

            height: 0;

            overflow: hidden;

            max-width: 900px;

            max-height: 700px;

            width: 100%;

        }

        .youtube iframe,
        .youtube object,
        .youtube embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 99%;
            height: 99%;
        }

        .h1_name {
            color: #0d6efd !important;
            font-size: 22px !important;
        }

        .content {
            margin-top: 15px;
            font-size: 18px;
        }

        .header-rb {

            font-weight: bold;

            color: black;

            font-size: 22px;

            margin-bottom: 20px;

        }

        .right-bar {

            font-weight: bold;

            color: blue;

            background-color: #F2F2F2;

            font-size: 14px;

            text-align: justify;

            padding: 12px 12px;

            margin-top: 12px;

            line-height: 20px;

        }

        .right-bar:hover {
            color: red;
        }

        @media screen and (max-width:767px) {

            .dp-none {

                display: none;

            }

        }

    </style>
@endsection

@section('content')
    <div class="breadcrumbs container">

        <ul class="breadcrumb">

            <li><a href="/">Trang chủ</a></li>

            <li class="active">{{ $post->category->name }}</li>

        </ul>

    </div>

    <div class="container">

        <div class="row mgb-40">
            <div class="col-md-1">
            </div>
            <div class="wrapTypicalSuccess mgt-40 col-md-8 col-sm-12">

                <h1 class="h1_name">{{ $post->name }}</h1>

                <div class="share" style="line-height: 10px">
                    <span><a href="{{ $_footer_youtube_link ?? '' }}" target="_blank"> <i style=" color: red;"
                                class="fa fa-youtube" aria-hidden="true">Youtube</i></a> <a
                            href="{{ $_footer_facebook_link ?? '' }}" target="_blank"> <i style=" color: blue;"
                                class="fa fa-facebook-square" aria-hidden="true"> Facebook</i></a></span>

                </div>

                @if ($post->video_link != '')
                    <div class="youtube">

                        <iframe width="560" height="315" src="{{ $post->video_link }}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>

                    </div>
                @endif

                <div class="content">{!! $post->content !!}</div>
                @include('inc.foot_post')
            </div>
            <div class="col-md-3">
            </div>
        </div>
        @include('inc.service_cate')
    </div>
@endsection
