@extends('layout')

@section('title')
    <title>{{ $_meta_title ?? '' }}</title>
    <meta name="description" content="{{ $_meta_description ?? '' }}" />
    <meta property=”og:image” content="{{ $_meta_image ?? '' }}" />
    <meta itemprop=”image” content=" {{ $_meta_image ?? '' }}">
    <meta property="fb:admins" content="${{ $_meta_facebook_admin_id ?? '' }}" />
    <meta property="fb:app_id" content="{{ $_meta_facebook_app_id ?? '' }}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="vi_VN" />
    <meta property=”og:title” content="{{ $_meta_title ?? '' }}" />
    <meta property=”og:description” content="{{ $_meta_description ?? '' }}" />
    <meta property="og:url" content="{{ $_meta_url ?? '' }}" />
    <meta property="article:section" content="{{ $_meta_article_section ?? '' }}" />
    <meta property="article:tag" content="{{ $_meta_article_tag??'' }}" />
@endsection

@section('content')
    @include('inc.slide')

    <div class="serviceOf container">

        <div class="serviceOf-cate">

            <?php $leng=count($cats);if($leng>3)$leng=3; for( $key=0;$key<$leng;$key++) { $row=$cats[$key];?>

                <div class="item wow slideInDown">

                    <div class="content">

                        <div class="wrap-item">

                            <img src="/lib/assets/images/@if($key==0)gpcn.png @elseif($key==1)dichvu.png @elseif($key==2)tuvan.png @elseif($key==3)gpn.png @endif" alt="{{$row->slug}}"  title="{{$row->name}}" />

                            <h1><b>{{$row->name}}</b></h1>

                            <div class="description">{{$row->description}}</div>

                            <div class="readmore"><a href="{{$row->slug.'+'.$row->id.'/cats.html'}}" target="_blank">Xem chi tiết</a></div>

                        </div>

                    </div>

                </div>

<?php } ?>


            <div class="item wow slideInDown">

                <div class="content">

                    <div class="wrap-item">

                        <img src="/lib/assets/images/gpn.png" alt="" />

                        <h1><b>{{ $_contact ?? '' }}</b></h1>

                        <div class="description">{{ $_contact_description ?? '' }}</div>

                        <div class="readmore"><a href="about_us#contact_us">Xem chi tiết</a></div>

                    </div>

                </div>

            </div>

        </div>

        @include('inc.service_cate')
    </div>
    {{-- <div class="container">
        <div class="mgb-40" style="margin-top: 40px">
            <h1 class="titleCenter "><b>{{ $_product ?? '' }}</b></h1>
            <div class="desc text-center textSer">
                <p>{{ $_product_description ?? '' }}</p>
            </div>
        </div>
        <div class="clr"></div>
        @include('inc.product')
    </div> --}}

    @include('inc.intercooperation')

    @include('inc.contact')
@endsection
