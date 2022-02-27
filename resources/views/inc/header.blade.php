<div id="header">
    <div class="top-head container">
        <div class="pull-left logo" style="margin-top:10px">
            <a href="/">
                <img src="/storage/slider/logo.png" alt="{{ $_header_logo_title ?? '' }}" />
                <p>{{ $_header_logo_title ?? '' }}</p>
            </a>

        </div>

        <div class="pull-right">

            <div class="lang"><a id="btnVi" href="vi.html"><img src="/lib/assets/images/vi.png" alt="" /></a><a
                    id="btnEn" href="en.html"><img src="/lib/assets/images/en.png" alt="" /></a></div>

            <div class="hotline">Hotline: <span id="lbHotLine"> {{$_footer_phone_1??''}}</span></div>

            <div class="clr"></div>

            <div class="search"><input name="ctl00$txtSearchText" type="text" id="txtSearchText"
                    placeholder="Tìm&#32;ki&#7871;m..." /><input type="submit" name="ctl00$btnSearch" value=""
                    id="btnSearch" /></div>
        </div>
    </div>
    <div class="bot-head">
        <div class="container">
            <ul id="menu" class="desktop-992">
                <li><a href="/">Trang chủ</a></li>

                @foreach ($cats as $row)
                    <li><a href="{{ $row->slug . '+' . $row->id . '/cats.html' }}">{{ $row->name }}</a></li>
                @endforeach

                <li><a href="about_us">Về chúng tôi</a></li>

            </ul>

            <div class="menuRight">

                <a href="checkout"><i class="fa fa-shopping-cart"></i> Giỏ hàng<span id="cart-count"
                        style="vertical-align: center; font-size: 20px;padding: 5px;text-decoration: underline; color: red;font-weight: bold">{{ session('cart-count') }}</span>

                </a>

                <img class="btnMenu" src="/lib/assets/images/stick.png" alt="" />

                <div class="menuHidden">

                    <ul class="menutop">

                        <li><a href="/">Trang chủ</a></li>

                        @foreach ($cats as $row)
                            <li><a href="{{ $row->slug . '+' . $row->id . '/cats.html' }}">{{ $row->name }}</a>
                            </li>
                        @endforeach

                    </ul>

                    <ul class="menubot">

                        <li><a href="about_us">Về chúng tôi</a></li>

                        <li><a href="about_us#contact_us">Liên hệ</a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>
