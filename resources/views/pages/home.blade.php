@extends('layout')

@section('title')
    <title>{{ $_meta_title ?? '' }}</title>

    <meta name="description" content="{{ $_meta_description ?? '' }}" />
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

        <div class="serviceCate">

            @foreach ($posts as $key => $row)
                <div id="cate_id_{{ $key }}" class="item">

                    <div class="container">

                        <div class="content wow">

                            <h1 style="text-align: center;">{{ $row->name }}</h1>

                            <div style="text-align: justify;">{{ $row->description }}</div>

                            <div class="readmore desktop-992">

                                <a href="{{ $row->slug . '+' . $row->id . '.html' }}">

                                    <p>Xem chi tiết <i><img src="lib/assets/images/arr1.png" alt="" /></i></p>

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
                                <img src="{{ $row->img_path }}" alt="{{ $row->slug }}" title="{{ $row->name }}">
                            @endif

                            <div class="readmore ipadmo-992">
                                <a href="{{ $row->slug . '+' . $row->id . '.html' }}">
                                    <p>Xem chi tiết <i><img src="lib/assets/images/arr1.png" /></i></p>
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
