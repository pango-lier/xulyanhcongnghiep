<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = array(
            array('id' => '1', 'config_key' => '_footer_email', 'config_value' => 'kinhdoanh11.bt@gmail.com', 'created_at' => '2022-02-23 21:19:06', 'updated_at' => '2022-02-23 22:06:11'),
            array('id' => '2', 'config_key' => '_footer_phone_1', 'config_value' => '0988447419', 'created_at' => '2022-02-23 21:20:02', 'updated_at' => '2022-03-01 21:10:07'),
            array('id' => '3', 'config_key' => '_footer_address_content', 'config_value' => 'Địa chỉ VPĐD: Nguyên Tử Lực, thành phố Đà Lạt, Việt Nam', 'created_at' => '2022-02-23 21:21:01', 'updated_at' => '2022-03-12 15:16:04'),
            array('id' => '4', 'config_key' => '_footer_copy_right', 'config_value' => 'COPYRIGHT © 2022 KÍNH ĐÀ LẠT', 'created_at' => '2022-02-23 21:21:53', 'updated_at' => '2022-02-27 15:11:33'),
            array('id' => '5', 'config_key' => '_about_us_title', 'config_value' => 'Chúng tôi là cơ sở nhận thi công Nhôm Kính Cường lực tại Đà Lạt hơn 15 năm kinh nghiệm trong nghề .Các sản phẩm chúng tôi nhânj thi công gồm : Vách Kính Cường Lực, các loại Cửa Nhôm, Cửa Nhựa, các loại Tủ Bếp, Kính Ốp Bếp, Tủ Kính, hoặc các loại Cầu Thang Kính Cường Lực, Lan Can Kính Cường Lực .', 'created_at' => '2022-02-23 21:26:45', 'updated_at' => '2022-03-21 21:00:32'),
            array('id' => '6', 'config_key' => '_about_us_who', 'config_value' => 'Tâm Nhôm Kính - Chúng tôi là ai ?', 'created_at' => '2022-02-23 21:29:38', 'updated_at' => '2022-03-21 20:55:59'),
            array('id' => '7', 'config_key' => '_about_us_who_description', 'config_value' => 'Chúng tôi là ai ? Chúng tôi là cơ sở thi công nội thất Nhôm Kính ở Đà Lạt .Có đội ngũ trẻ dày dặn kinh nghiệm, có hơn 15 năm trong nghề. Chúng tôi đã thi công và đem về sự hài lòng trên hàng chục Biệt Thự, Nhà Hàng, Khách Sạn  và hàng ngàn ngôi nhà trên địa bàn thành phố Đà Lạt .', 'created_at' => '2022-02-23 21:30:09', 'updated_at' => '2022-03-21 20:55:43'),
            array('id' => '8', 'config_key' => '_about_us_vision', 'config_value' => 'Tầm nhìn & Sứ mệnh', 'created_at' => '2022-02-23 21:31:00', 'updated_at' => '2022-02-23 22:24:19'),
            array('id' => '9', 'config_key' => '_about_us_vision_description', 'config_value' => 'Trở thành nhà thi công hàng đầu về Nội Thất nhôm kính tại Đà Lạt .', 'created_at' => '2022-02-23 21:31:42', 'updated_at' => '2022-03-12 15:15:23'),
            array('id' => '10', 'config_key' => '_about_us_core', 'config_value' => 'Giá trị cốt lõi nhomkinhdalat.com', 'created_at' => '2022-02-23 21:32:24', 'updated_at' => '2022-03-21 20:54:18'),
            array('id' => '11', 'config_key' => '_contact', 'config_value' => 'Liên hệ', 'created_at' => '2022-02-23 21:32:58', 'updated_at' => '2022-02-23 22:04:36'),
            array('id' => '12', 'config_key' => '_contact_description', 'config_value' => 'SĐT: 0988447419 (Tâm).
                Địa chỉ:  Nguyên Tử Lực, thành phố Đà Lạt.', 'created_at' => '2022-02-23 21:33:13', 'updated_at' => '2022-03-12 15:14:31'),
            array('id' => '13', 'config_key' => '_partner', 'config_value' => 'Đối tác và khách hàng', 'created_at' => '2022-02-23 21:34:01', 'updated_at' => '2022-02-23 22:04:06'),
            array('id' => '14', 'config_key' => '_partner_title', 'config_value' => 'Đồng hành với chúng tôi là những đối tác, nhà cung cấp uy tín nhất thị trường kính cường lực hiện nay.', 'created_at' => '2022-02-23 21:34:22', 'updated_at' => '2022-03-01 21:50:38'),
            array('id' => '15', 'config_key' => '_footer_phone_2', 'config_value' => '+84988447419', 'created_at' => '2022-02-23 22:11:22', 'updated_at' => '2022-03-21 20:53:31'),
            array('id' => '16', 'config_key' => '_about_us_core_description', 'config_value' => 'Chất lượng là ưu tiên hàng đầu cho định hướng phát triển sản phẩm của công ty. Tận tâm hết mình vì khách hàng, vì nhà đầu tư, vì đồng đội. Kịp thời và ưu tiên giải quyết và đáp ứng nhanh các nhu cầu của khách hàng. Liêm chính ngay thẳng & trong sạch. Học hỏi & Sáng tạo không ngừng học hỏi & thử thách bản thân. Đội nhóm luôn hướng đến thành công chung, không lé tránh trách nhiệm.', 'created_at' => '2022-02-23 22:25:34', 'updated_at' => '2022-02-23 22:25:34'),
            array('id' => '17', 'config_key' => '_about_us', 'config_value' => 'Về Chúng Tôi', 'created_at' => '2022-02-23 22:26:41', 'updated_at' => '2022-03-21 20:52:14'),
            array('id' => '18', 'config_key' => '_contact_google_link', 'config_value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.147103129021!2d108.45131390039106!3d11.964315397002657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317112e9f8459ee1%3A0x31eeda7ed9ce623a!2zxJDGsOG7nW5nIE5ndXnDqm4gVOG7rSBM4buxYywgUGjGsOG7nW5nIDgsIFRwLiDEkMOgIEzhuqF0LCBMw6JtIMSQ4buTbmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1647073088220!5m2!1svi!2s', 'created_at' => '2022-02-23 23:19:08', 'updated_at' => '2022-03-12 15:19:05'),
            array('id' => '19', 'config_key' => '_footer_youtube_link', 'config_value' => 'https://www.facebook.com/T%C3%A2m-Nh%C3%B4m-K%C3%ADnh-%C4%90%C3%A0-L%E1%BA%A1t-108625631775421', 'created_at' => '2022-02-23 23:21:24', 'updated_at' => '2022-03-21 20:50:11'),
            array('id' => '20', 'config_key' => '_footer_facebook_link', 'config_value' => 'https://www.facebook.com/T%C3%A2m-Nh%C3%B4m-K%C3%ADnh-%C4%90%C3%A0-L%E1%BA%A1t-108625631775421', 'created_at' => '2022-02-23 23:22:57', 'updated_at' => '2022-03-12 15:12:15'),
            array('id' => '21', 'config_key' => '_header_logo_title', 'config_value' => 'Nhôm Kính Đà Lạt', 'created_at' => '2022-02-23 23:25:09', 'updated_at' => '2022-02-23 23:25:09'),
            array('id' => '22', 'config_key' => '_meta_title', 'config_value' => 'Thi công Nhôm Kính Cường Lực ở Thành Phố Đà Lạt | Tâm Nhôm Kính Đà Lạt', 'created_at' => '2022-02-25 22:15:38', 'updated_at' => '2022-03-21 22:12:48'),
            array('id' => '23', 'config_key' => '_meta_description', 'config_value' => 'Chúng tôi nhomkinhdalat.com nhận thi công các công trình lớn nhỏ về Kính Cường Lực, Cầu Thang Kính, Cửa Kính, Cửa Nhựa, Cửa Nhôm, Kính Ốp Bếp, Vách Kính Cường Lực, Phòng Tắm Kính, Lan Can, Ban Công Kính Cường Lực uy tín tại Đà Lạt .', 'created_at' => '2022-02-25 22:19:58', 'updated_at' => '2022-03-21 20:37:47'),
            array('id' => '24', 'config_key' => '_meta_keywords', 'config_value' => 'Nhôm Kính Đà Lạt, Kính Cường Lực, Cửa Nhựa, Cửa Nhôm, Cầu Thang, Kính Phòng Tắm, Kính Ốp Bếp, Ở Đà Lạt', 'created_at' => '2022-02-25 22:31:13', 'updated_at' => '2022-03-21 22:05:35'),
            array('id' => '25', 'config_key' => '_product', 'config_value' => 'Sản phẩm', 'created_at' => '2022-02-25 22:36:51', 'updated_at' => '2022-02-25 22:36:51'),
            array('id' => '26', 'config_key' => '_slide_title', 'config_value' => 'Nhận thi công nội thất nhôm kính: Cầu Thang, Lan Can, Vách Ngăn, Tủ Bếp, Tủ Kính, Mặt Bàn, Kính Ốp Bếp, Cửa Nhựa, Cửa Nhôm, Cửa gỗ, Cửa Kính, Kính Cường Lực ở Đà Lạt .Hotline: 0988447419 (Tâm).', 'created_at' => '2022-02-27 15:33:28', 'updated_at' => '2022-03-21 20:30:59'),
            array('id' => '27', 'config_key' => '_meta_facebook_app_id', 'config_value' => '694384198370360', 'created_at' => '2022-03-21 21:52:43', 'updated_at' => '2022-03-21 21:52:43'),
            array('id' => '28', 'config_key' => '_meta_image', 'config_value' => 'https://nhomkinhdalat.com/storage/post/t164654070912.jpg', 'created_at' => '2022-03-21 22:11:47', 'updated_at' => '2022-03-21 22:11:47'),
            array('id' => '29', 'config_key' => '_meta_tag', 'config_value' => 'kinh cuong luc, nhom kinh da lat, cau thang, lan can kinh, ban cong kinh, kinh op bep, cua kinh cuong luc, thi cong noi that nhom kinh', 'created_at' => '2022-03-22 20:25:53', 'updated_at' => '2022-03-22 20:25:53')
        );
        DB::table('settings')->insert($settings);
    }
}
