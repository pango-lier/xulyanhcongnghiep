<footer id="footer">
    <div class="top-footer container">
        <div class="second-portion">
            <div class="row">
                <!-- Boxes de Acoes -->
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div class="image" style="background-color:rgb(146, 13, 13) !important"><i
                                    class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title" style="color:rgb(0, 0, 0)"> Mail & Website</h3>
                                <p style="color:rgb(0, 0, 0)">
                                    <i style=" color: red;margin-right:5px" class="fa fa-envelope" aria-hidden="true"></i>
                                    {{ $_footer_email ?? '' }}
                                    <br>
                                    <br>
                                    <a href="{{ $_footer_youtube_link ?? '' }}" target="_blank"> <i
                                            style=" color: red;margin-right:5px" class="fa fa-youtube-square" aria-hidden="true">
                                            Youtube</i></a> - <a href="{{ $_footer_facebook_link ?? '' }}"
                                        target="_blank"> <i style=" color: blue;margin-right:5px" class="fa fa-facebook-square"
                                            aria-hidden="true">
                                            Facebook</i></a>
                                </p>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div class="image" style="background-color:rgb(53, 161, 3) !important"><i
                                    class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title" style="color:rgb(0, 0, 0)">Điện thoại liên hệ</h3>
                                <p style="color:rgb(0, 0, 0)">
                                    <i style="color: green;margin-right:5px" class="fa fa-phone-square" aria-hidden="true">
                                    </i>{{ $_footer_phone_1 ?? '' }}
                                    <br>
                                    <br>
                                    <i style="color: green;margin-right:5px" class="fa fa-phone-square" aria-hidden="true">
                                    </i>{{ $_footer_phone_2 ?? '' }}
                                </p>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">

                            <div class="image" style="background-color:rgb(6, 71, 158) !important"><i
                                    class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title" style="color:rgb(0, 0, 0)">Địa chỉ</h3>
                                <p style="color:rgb(0, 0, 0)">
                                    <i style="color: red;margin-right:5px" class="fa fa-map-marker mr-1" aria-hidden="true">
                                    </i>{{ $_footer_address_content }}
                                </p>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>
                <!-- /Boxes de Acoes -->
            </div>
        </div>
    </div>
    <div class="copyRight gradient-red" style="color:white;font-weight:bold">
        <p>{{ $_footer_copy_right ?? '' }}</p>
    </div>
</footer>
