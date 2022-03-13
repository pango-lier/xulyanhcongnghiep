@extends('layout')

@section('title')
    <title>{{ $post->name }}</title>

    <meta name="description" content="{{ $post->name }}" />
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

            <li><a href="/">Home</a></li>

            <li class="active">{{ $post->category->name }}</li>

        </ul>

    </div>

    <div class="container">

        <div class="row mgb-40">
            <div class="col-md-2">
            </div>
            <div class="wrapTypicalSuccess mgt-40 col-md-8 col-sm-12">

                <h1 class="h1_name">{{ $post->name }}</h1>

                <div class="share" style="line-height: 10px">
                    <span><a href="https://www.youtube.com/channel/UCezizb5kh-rcla61D6TJ6GQ" target="_blank"> <i
                                style=" color: red;" class="fa fa-youtube" aria-hidden="true">Youtube</i></a> <a
                            href="https://www.facebook.com/xulyanhcongnghiep" target="_blank"> <i style=" color: blue;"
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
            </div>

            <div class="col-md-2">
            </div>
        </div>
        @include('inc.service_cate')
    </div>
@endsection
