<div class="serviceCate">

    @foreach ($posts as $key => $row)
        <div id="cate_id_{{ $key }}" class="item">

            <div class="container">

                <div class="content row">

                    <h1 style="text-align: center;">{{ $row->name }}</h1>

                    <div style="text-align: justify; font-size:18px;">{{ $row->description }}</div>

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
