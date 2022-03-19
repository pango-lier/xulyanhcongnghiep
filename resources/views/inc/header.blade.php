<div id="header">
    <div class="top-head container">
        <div class="pull-left logo" style="margin-top:10px">
            <a href="/">
                <p>{{ $_header_logo_title ?? '' }}</p>
                <img style="width:80px;" src="/favicon.ico" alt="{{ $_header_logo_title ?? '' }}" />

            </a>

        </div>

        <div class="pull-right">

            <div class="lang"><a id="btnVi" href="vi.html"><img src="/lib/assets/images/vi.png" alt="" /></a><a
                    id="btnEn" href="en.html"><img src="/lib/assets/images/en.png" alt="" /></a></div>

            <div class="hotline">Hotline: <span id="lbHotLine"> {{ $_footer_phone_1 ?? '' }}</span></div>

            <div class="clr"></div>
            <div class="search" style="color:rgb(96, 252, 6);font-size:14px;font-weight:bold;margin-left:80px">Nhận Thi Công Nhôm Kính ở Đà Lạt</div>
            {{-- <div class="search"><input name="ctl00$txtSearchText" type="text" id="txtSearchText"
                    placeholder="Tìm&#32;ki&#7871;m..." /><input type="submit" name="ctl00$btnSearch" value=""
                    id="btnSearch" /></div> --}}
        </div>
    </div>
    <div class="bot-head">
        <style>
            #menu .nav-item .dropdown-menu {
                display: none;
                background-color: rgb(46, 46, 197);
            }

            #menu .nav-item:hover .nav-link {
                display: block;
            }

            .#menu .nav-item:hover .dropdown-menu {
                display: block;
            }

            #menu .nav-item .dropdown-menu {
                margin-top: 0;
            }

            .dropdown-menu {
                background-color: rgb(13, 13, 31) !important;
            }

            .dropdown-item {
                margin-top: 10px !important;
            }

            .dropdown-item:hover {
                background-color: rgb(13, 13, 31) !important;
                color: red !important;
            }

        </style>
        <div class="container">
            <ul id="menu" class="desktop-992">
                <li><a href="/">Trang chủ</a></li>
                @foreach ($cats as $row)
                    <li class="nav-item dropdown" id="dropdownMenuLink{{ $row->id }}"><a
                            href="{{ $row->slug . '+' . $row->id . '/cats.html' }}" class=" nav-link  dropdown-toggle"
                            aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown" ">{{ $row->name }}</a>
                        <?php if(!empty($row->child)){ ?>
                        <ul class="    dropdown-menu" aria-labelledby="dropdownMenuLink{{ $row->id }}">
                            @foreach ($row->child as $child)
                    <li><a class="dropdown-item" href="{{ $child->slug . '+' . $child->id . '/cats.html' }}">{{ $child->name }}</a>
                    </li>
                 @endforeach
                    </ul>
                    <?php }?>
                </li>
                @endforeach

                <li><a href="about_us">Về chúng tôi</a></li>

            </ul>

            <div class="menuRight">

                {{-- <a href="checkout"><i class="fa fa-shopping-cart"></i> Giỏ hàng<span id="cart-count"
                        style="vertical-align: center; font-size: 20px;padding: 5px;text-decoration: underline; color: red;font-weight: bold">{{ session('cart-count') }}</span>

                </a> --}}

                <img class="btnMenu" src="/lib/assets/images/stick.png" alt="" />

                <div class="menuHidden">

                    <ul class="menutop">

                        <li><a href="/">Trang chủ</a></li>

                        @foreach ($cats as $row)
                            <li><a href="{{ $row->slug . '+' . $row->id . '/cats.html' }}">{{ $row->name }}</a>
                            </li>
                            @foreach ($row->child as $child)
                    <li style="line-height:9px;font-size:10px"><a href="{{ $child->slug . '+' . $child->id . '/cats.html' }}">{{' - '}}{{ $child->name }}</a>
                    </li>
                 @endforeach
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
