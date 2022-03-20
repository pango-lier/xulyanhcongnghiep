@extends('layout')

@section('title')
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
    <div class="serviceOf container">

        <div class="mgb-40" style="margin-top: 40px">

            <h1 class="titleCenter text-uppercase"><b>{{ $cat->name }}</b></h1>

            <div class="desc text-center textSer">

                <p>{{ $cat->description }}</p>

            </div>

        </div>

        <div class="serviceCate">

            @foreach ($posts as $key => $row)
                <div id="cate_id_{{ $key }}" class="item">

                    <div class="container">

                        <div class="content wow">

                            <h1 style="text-align: center;">{{ $row->name }}</h1>

                            <div style="text-align: justify;">{{ $row->description }}</div>

                            <div class="readmore desktop-992">

                                <a href="{{ $row->slug . '+' . $row->id . '.html' }}">

                                    <p>Xem chi tiết <i><img alt="Xử lý ảnh công nghiệp" src="lib/assets/images/arr1.png"
                                                alt="" /></i></p>

                                </a>

                            </div>

                        </div>

                        <div class="img wow">

                            @if ($row->type == 'video')
                                <style type="text/css">
                                    .youtube {

                                        position: relative;

                                        padding-bottom: 56.25%;

                                        padding-top: 20px;

                                        height: 0;

                                        overflow: hidden;

                                        max-width: 800px;

                                        max-height: 600px;

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

                                </style>

                                <div class="youtube mt-4">

                                    <iframe width="560" height="315" src="{{ $row->video_link }}" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>

                                </div>
                            @else
                                <img alt="{{ $row->slug }}" title="{{ $row->name }}" src="{{ $row->img_path }}">
                            @endif

                            <div class="readmore ipadmo-992">

                                <a href="{{ $row->slug . '+' . $row->id . '.html' }}">

                                    <p>Xem chi tiết <i><img src="lib/assets/images/arr1.png" alt="Xu ly anh" /></i></p>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>
            @endforeach

            <div class="clr"></div>

            <div class="text-center" style="margin-top:5px;">{{ $posts->links() }}</div>

        </div>



    </div>
@endsection
