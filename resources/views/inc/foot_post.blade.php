<div id=foot-post class="alert alert-success" role="alert">
    <h4 style="color:crimson;font-weight:bold" class="alert-heading">Tại sao bạn nên chọn chúng tôi thi công cho ngôi
        nhà của bạn ở {{$_address_area}} ?</h4>
    <p>{{ $_slide_title }} Hotline: <span class="alert-danger"> {{ $_footer_phone_1 ?? '' }}</span></p>
    <ul style="color:rgb(27, 47, 221);font-weight:bold">
        <li>Luôn uy tín, đảm bảo chất lượng, tính thẩm mỹ và nhiệt tình trong công việc.</li>
        <li>Có hơn 15 năm trong nghề , kinh nghiệm thi công hàng trăm biệt thự, nhà phố cao cấp ở {{$_address_area}}.</li>
        <li>Giá cả đảm bảo ở mức giá tốt và cạnh tranh.</li>
        <li>Tư vấn hỗ trợ kỹ thuật, sữa chữa miễn phí nhiệt tình chu đáo.</li>
    </ul>
    Hãy liên hệ qua Zalo, Messager hoặc gọi trực tiếp nếu bạn có nhu cầu nhé, cám ơn.
    <hr>
    <div class="mb-0">
        Hotline: <span class="alert-danger"> {{ $_footer_phone_1 ?? '' }}</span>
        {{$_address ?? ''}}
        <a class="ml-3" href="{{ $_footer_facebook_link ?? '' }}" target="_blank"> <i
                style="margin-left:20px; color: blue;" class="fa fa-facebook-square" aria-hidden="true"> Facebook</i></a>
    </div>
</div>
<style>
    The CSS Lists and Counters Module Level 3 introduces the ::marker pseudo-element. From what I've understood it would allow such a thing. Unfortunately, no browser seems to support it.


    What you can do is add some padding to the parent ul and pull the icon into that padding: ul {
        list-style: none;
        padding: 0;
    }

    li {
        padding-left: 1.3em;
    }

    li:before {
        content: "\f00c";
        /* FontAwesome Unicode */
        font-family: FontAwesome;
        display: inline-block;
        margin-left: -1.3em;
        /* same as padding-left set on li */
        width: 1.3em;
        /* same as padding-left set on li */
    }

</style>
