<?php
if ( ! defined('ABSPATH') ) exit;
define('VUA_VER', '1.0.0');

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/ajax.php';

function vua_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form','gallery','caption','style','script'));
    add_theme_support('custom-logo', array('height'=>96,'width'=>96,'flex-height'=>true,'flex-width'=>true));
    register_nav_menus(array('primary' => 'Menu chính (Header)'));
}
add_action('after_setup_theme', 'vua_setup');

function vua_assets() {
    $css_path = get_template_directory() . '/style.css';
    $js_path  = get_template_directory() . '/assets/js/main.js';
    $css_ver  = file_exists($css_path) ? filemtime($css_path) : VUA_VER;
    $js_ver   = file_exists($js_path) ? filemtime($js_path) : VUA_VER;

    wp_enqueue_style('vua-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('vua-style', get_stylesheet_uri(), array('vua-fonts'), $css_ver);

    $logo = get_template_directory_uri() . '/assets/img/logo.png';
    if ( has_custom_logo() ) {
        $cid = get_theme_mod('custom_logo');
        $src = $cid ? wp_get_attachment_image_url($cid, 'full') : '';
        if ( $src ) $logo = $src;
    }
    $logo_footer = 'https://baobidep.webngon.net/wp-content/uploads/2026/05/logo-footer.png';
    wp_add_inline_style('vua-style', ':root{--logo:url("' . esc_url($logo) . '");--logo-footer:url("' . esc_url($logo_footer) . '")}');

    wp_enqueue_script('vua-main', get_template_directory_uri() . '/assets/js/main.js', array(), $js_ver, true);
    wp_localize_script('vua-main', 'vuaAjax', array(
        'url'       => admin_url('admin-ajax.php'),
        'nonce'     => wp_create_nonce('vua_lead'),
        'cartNonce' => wp_create_nonce('vua_cart'),
        'cartUrl'   => vua_cart_url(),
    ));
}
add_action('wp_enqueue_scripts', 'vua_assets');

/** Lay tuy chon (Customizer) kem gia tri mac dinh */
function vua_opt($key) {
    $d = array(
        'phone'   => '0377 662 830',
        'email'   => 'vua.baobi@gmail.com',
        'address' => '45/12 Lê Văn Lương, P. Tân Phong, Quận 7, TP.HCM',
        'hero_t1' => 'Vua của ngành',
        'hero_t2' => 'bao bì đóng gói',
    );
    return get_theme_mod('vua_' . $key, isset($d[$key]) ? $d[$key] : '');
}
function vua_tel() { return preg_replace('/[^0-9+]/', '', vua_opt('phone')); }

/** Custom commerce — cart su dung cookie JSON */
require get_template_directory() . '/inc/cart.php';

/** URL cua 3 trang commerce */
function vua_cart_url() { return home_url('/cart/'); }
function vua_checkout_url() { return home_url('/checkout/'); }
function vua_thanks_url($order_id = 0) {
    $url = home_url('/cam-on/');
    return $order_id ? add_query_arg('order', $order_id, $url) : $url;
}

/** Cart count tu cart custom */
function vua_cart_count() {
    return Vua_Cart::count();
}

/** Format gia VND: 25000 -> 25.000 ₫ */
function vua_format_price($n) {
    return number_format((float) $n, 0, ',', '.') . ' ₫';
}

/** Auto tao 3 trang commerce neu chua co */
add_action('init', function () {
    if ( get_option('vua_pages_seeded') ) return;
    $pages = array(
        'cart'   => array('Giỏ hàng', 'page-cart.php'),
        'checkout' => array('Thanh toán', 'page-checkout.php'),
        'cam-on' => array('Cảm ơn', 'page-thanks.php'),
    );
    foreach ( $pages as $slug => $info ) {
        if ( get_page_by_path($slug) ) continue;
        $pid = wp_insert_post(array(
            'post_type'   => 'page',
            'post_status' => 'publish',
            'post_title'  => $info[0],
            'post_name'   => $slug,
            'post_content' => '',
        ));
        if ( $pid && ! is_wp_error($pid) ) {
            update_post_meta($pid, '_wp_page_template', $info[1]);
        }
    }
    update_option('vua_pages_seeded', 1);
}, 30);

/** Catalog noi dung chinh sach */
function vua_policy_catalog() {
    return array(
        'chinh-sach-doi-tra' => array(
            'title' => 'Chính sách đổi trả',
            'lead'  => 'Quyền lợi đổi trả minh bạch — bảo vệ tối đa quyền lợi khách hàng khi giao dịch tại VUA Bao Bì.',
            'content' => '
<h2>Điều kiện đổi trả</h2>
<p>VUA Bao Bì cam kết đổi trả sản phẩm trong các trường hợp sau, tính từ ngày khách hàng nhận hàng:</p>
<ul>
<li>Sản phẩm bị lỗi do nhà sản xuất (rách, thủng, in lệch màu, sai kích thước so với đơn đặt hàng)</li>
<li>Sản phẩm giao không đúng quy cách đã thỏa thuận trong hợp đồng</li>
<li>Sản phẩm bị hư hỏng trong quá trình vận chuyển (có biên bản với đơn vị giao hàng)</li>
<li>Khách hàng nhận thiếu số lượng so với phiếu xuất kho</li>
</ul>

<h2>Thời gian áp dụng</h2>
<ul>
<li><strong>Trong 24 giờ</strong> kể từ khi nhận hàng — khách hàng cần thông báo ngay nếu phát hiện lỗi</li>
<li><strong>Trong 7 ngày</strong> — đối với lỗi phát sinh khi sử dụng (lỗi vật liệu, lỗi kết cấu không thể phát hiện khi mở hộp)</li>
<li>Quá thời hạn trên, VUA Bao Bì không nhận đổi trả</li>
</ul>

<h2>Quy trình đổi trả</h2>
<ol>
<li>Khách hàng liên hệ hotline hoặc email, mô tả lỗi và gửi hình ảnh sản phẩm lỗi</li>
<li>VUA Bao Bì xác nhận lỗi trong vòng 24h làm việc</li>
<li>Sản phẩm lỗi được thu hồi miễn phí (đối với nội thành TP.HCM)</li>
<li>Sản xuất bù hoặc hoàn tiền theo thỏa thuận — thời gian xử lý 7-15 ngày</li>
</ol>

<h2>Trường hợp KHÔNG áp dụng đổi trả</h2>
<ul>
<li>Sản phẩm in theo thiết kế riêng của khách (in logo, brand) đã được khách duyệt mẫu</li>
<li>Sản phẩm đã qua sử dụng, không còn nguyên trạng</li>
<li>Lỗi do khách hàng bảo quản sai cách (ẩm mốc, va đập, biến dạng do nhiệt)</li>
<li>Đơn hàng đã thanh toán đủ và quá thời hạn báo lỗi</li>
</ul>',
        ),
        'chinh-sach-bao-mat' => array(
            'title' => 'Chính sách bảo mật',
            'lead'  => 'Cam kết bảo vệ thông tin cá nhân và dữ liệu kinh doanh của khách hàng theo tiêu chuẩn quốc tế.',
            'content' => '
<h2>Thông tin chúng tôi thu thập</h2>
<p>VUA Bao Bì thu thập các thông tin sau khi khách hàng tương tác với website hoặc đặt hàng:</p>
<ul>
<li>Họ tên, số điện thoại, email, địa chỉ — phục vụ giao dịch và liên hệ</li>
<li>Thông tin doanh nghiệp (tên công ty, mã số thuế) — phục vụ xuất hóa đơn</li>
<li>Lịch sử đặt hàng, nội dung tư vấn — phục vụ chăm sóc khách hàng</li>
<li>Cookie, IP, loại trình duyệt — phục vụ phân tích, cải thiện trải nghiệm</li>
</ul>

<h2>Mục đích sử dụng thông tin</h2>
<ul>
<li>Xử lý đơn hàng, giao hàng, xuất hóa đơn</li>
<li>Liên hệ tư vấn, hỗ trợ kỹ thuật, giải quyết khiếu nại</li>
<li>Gửi thông báo về sản phẩm mới, ưu đãi (chỉ khi khách đồng ý nhận)</li>
<li>Phân tích hành vi để cải thiện sản phẩm và dịch vụ</li>
</ul>

<h2>Bảo vệ thông tin</h2>
<ul>
<li><strong>Mã hóa SSL</strong> — toàn bộ giao dịch trên website đều được mã hóa</li>
<li><strong>Phân quyền truy cập</strong> — chỉ nhân sự có trách nhiệm mới được tiếp cận dữ liệu khách</li>
<li><strong>Sao lưu định kỳ</strong> — dữ liệu được sao lưu hàng ngày, lưu trữ tại 2 server khác nhau</li>
<li><strong>Không chia sẻ bên thứ 3</strong> — trừ khi có yêu cầu pháp lý hoặc khách hàng đồng ý</li>
</ul>

<h2>Quyền của khách hàng</h2>
<ul>
<li>Yêu cầu xem, chỉnh sửa, xóa thông tin cá nhân</li>
<li>Từ chối nhận email marketing bất cứ lúc nào</li>
<li>Khiếu nại nếu phát hiện vi phạm quyền riêng tư</li>
</ul>

<h2>Liên hệ về quyền riêng tư</h2>
<p>Mọi yêu cầu liên quan đến dữ liệu cá nhân vui lòng gửi đến email của VUA Bao Bì. Chúng tôi sẽ phản hồi trong vòng 7 ngày làm việc.</p>',
        ),
        'chinh-sach-thanh-toan' => array(
            'title' => 'Chính sách thanh toán',
            'lead'  => 'Đa dạng phương thức thanh toán — minh bạch, an toàn và phù hợp với mọi loại hình doanh nghiệp.',
            'content' => '
<h2>Phương thức thanh toán</h2>
<p>VUA Bao Bì chấp nhận các hình thức thanh toán sau cho đơn hàng B2B:</p>
<ul>
<li><strong>Chuyển khoản ngân hàng (ưu tiên)</strong> — Vietcombank, ACB, Techcombank</li>
<li><strong>Tiền mặt</strong> — thanh toán tại văn phòng hoặc khi nhận hàng (COD)</li>
<li><strong>Công nợ</strong> — áp dụng cho khách hàng thân thiết, hợp đồng dài hạn</li>
<li><strong>Hóa đơn VAT</strong> — xuất ngay sau khi hoàn tất thanh toán</li>
</ul>

<h2>Quy định đặt cọc</h2>
<ul>
<li>Đơn hàng dưới 10 triệu: thanh toán 100% trước khi giao hàng</li>
<li>Đơn hàng 10-50 triệu: đặt cọc 50%, thanh toán phần còn lại khi nhận hàng</li>
<li>Đơn hàng trên 50 triệu: đặt cọc 30%, thanh toán 70% trước khi giao</li>
<li>Khách hàng VIP / có hợp đồng năm: thanh toán theo điều khoản hợp đồng riêng</li>
</ul>

<h2>Thời hạn thanh toán</h2>
<ul>
<li>Thanh toán đặt cọc: trong vòng 3 ngày làm việc sau khi ký hợp đồng</li>
<li>Thanh toán phần còn lại: trong vòng 7 ngày sau khi nhận hàng</li>
<li>Quá hạn thanh toán: tính lãi 1.5%/tháng (nếu có thỏa thuận)</li>
</ul>

<h2>Thông tin chuyển khoản</h2>
<p>Vui lòng liên hệ hotline để nhận thông tin tài khoản ngân hàng chính xác. Nội dung chuyển khoản theo cú pháp: <strong>[MÃ ĐƠN HÀNG] - [TÊN CÔNG TY]</strong></p>

<h2>Xuất hóa đơn</h2>
<ul>
<li>VUA Bao Bì xuất hóa đơn VAT 10% cho mọi đơn hàng</li>
<li>Hóa đơn điện tử gửi qua email trong vòng 24h sau khi nhận đủ tiền</li>
<li>Cần hóa đơn giấy: liên hệ trước khi đặt hàng để chuẩn bị</li>
</ul>',
        ),
        'chinh-sach-khuyen-mai' => array(
            'title' => 'Chính sách khuyến mãi',
            'lead'  => 'Nhiều ưu đãi hấp dẫn cho khách hàng doanh nghiệp, đối tác lâu năm và đơn hàng số lượng lớn.',
            'content' => '
<h2>Chiết khấu theo số lượng</h2>
<p>Đơn hàng càng nhiều, giá càng tốt. Mức chiết khấu áp dụng tự động:</p>
<ul>
<li><strong>Đơn 1.000 - 5.000 sản phẩm</strong>: giảm 3% trên báo giá</li>
<li><strong>Đơn 5.000 - 10.000 sản phẩm</strong>: giảm 5% trên báo giá</li>
<li><strong>Đơn 10.000 - 50.000 sản phẩm</strong>: giảm 7% trên báo giá</li>
<li><strong>Đơn trên 50.000 sản phẩm</strong>: thỏa thuận giá riêng — ưu đãi tốt nhất thị trường</li>
</ul>

<h2>Ưu đãi khách hàng thân thiết</h2>
<ul>
<li><strong>Khách hàng VIP</strong> (đơn hàng tích lũy ≥ 500 triệu/năm): chiết khấu thêm 3-5%, ưu tiên sản xuất</li>
<li><strong>Đối tác lâu năm</strong> (hợp tác ≥ 2 năm): miễn phí thiết kế, lưu khuôn in vĩnh viễn</li>
<li><strong>Đại lý phân phối</strong>: chính sách giá đại lý riêng, hỗ trợ marketing</li>
</ul>

<h2>Chương trình ưu đãi định kỳ</h2>
<ul>
<li><strong>Tết Nguyên Đán</strong> (Tháng 12-1): giảm 5-10% cho đơn đặt sớm</li>
<li><strong>Sinh nhật công ty</strong> (Tháng 5): combo ưu đãi đặc biệt</li>
<li><strong>Black Friday B2B</strong> (Tháng 11): flash sale các sản phẩm sẵn kho</li>
<li><strong>Khuyến mãi end-of-year</strong>: tặng quà cho đơn hàng cuối năm</li>
</ul>

<h2>Quà tặng & dịch vụ kèm theo</h2>
<ul>
<li>Miễn phí thiết kế khuôn mẫu cho đơn hàng đầu tiên ≥ 20 triệu</li>
<li>In thử mẫu MIỄN PHÍ trước khi sản xuất hàng loạt</li>
<li>Miễn phí giao hàng nội thành TP.HCM cho đơn ≥ 10 triệu</li>
<li>Tặng catalogue mẫu khi tham quan nhà máy</li>
</ul>

<h2>Lưu ý quan trọng</h2>
<ul>
<li>Các chương trình khuyến mãi không cộng dồn (chỉ áp dụng 1 mức tốt nhất)</li>
<li>Ưu đãi không áp dụng cho đơn hàng đã ký hợp đồng đặc biệt</li>
<li>VUA Bao Bì có quyền điều chỉnh chính sách theo từng giai đoạn — thông báo trước 30 ngày</li>
</ul>',
        ),
        'chinh-sach-van-chuyen' => array(
            'title' => 'Chính sách vận chuyển',
            'lead'  => 'Giao hàng toàn quốc — đúng hẹn, đóng gói cẩn thận, hỗ trợ pallet xuất khẩu.',
            'content' => '
<h2>Khu vực giao hàng</h2>
<ul>
<li><strong>Nội thành TP.HCM</strong>: giao trong 24-48h sau khi sản xuất xong</li>
<li><strong>Các tỉnh phía Nam</strong>: giao trong 2-3 ngày (xe tải nhà máy)</li>
<li><strong>Các tỉnh phía Bắc & miền Trung</strong>: giao trong 3-5 ngày (qua đối tác vận chuyển)</li>
<li><strong>Xuất khẩu quốc tế</strong>: hỗ trợ đóng pallet, làm thủ tục hải quan — liên hệ trực tiếp</li>
</ul>

<h2>Phí vận chuyển</h2>
<ul>
<li><strong>Miễn phí ship nội thành TP.HCM</strong> cho đơn hàng từ 10 triệu đồng</li>
<li>Đơn dưới 10 triệu nội thành: phí 50.000 - 200.000 đồng tùy khối lượng</li>
<li>Các tỉnh khác: tính theo bảng giá vận chuyển của đơn vị thứ 3 (báo giá rõ ràng trong hợp đồng)</li>
<li>Giao hàng gấp / ngoài giờ: phụ phí 50% so với phí thường</li>
</ul>

<h2>Đóng gói vận chuyển</h2>
<ul>
<li><strong>Đơn nhỏ</strong>: thùng carton 5 lớp, có ghi rõ thông tin sản phẩm</li>
<li><strong>Đơn vừa</strong>: kiện pallet bọc màng PE, dán nhãn hướng dẫn xếp dỡ</li>
<li><strong>Đơn lớn</strong>: container 20ft/40ft, đóng pallet tiêu chuẩn xuất khẩu</li>
<li><strong>Hàng dễ vỡ</strong>: xốp bọc, nhãn "FRAGILE" — đảm bảo an toàn 100%</li>
</ul>

<h2>Quy trình giao nhận</h2>
<ol>
<li>VUA Bao Bì thông báo lịch giao hàng dự kiến qua điện thoại/email</li>
<li>Tài xế / shipper liên hệ trước 30-60 phút khi đến địa điểm giao</li>
<li>Khách hàng kiểm tra số lượng, chất lượng ngoài bao bì trước khi ký nhận</li>
<li>Ký biên bản giao nhận — gửi 1 bản về văn phòng VUA Bao Bì</li>
</ol>

<h2>Trường hợp giao chậm</h2>
<p>VUA Bao Bì cam kết giao đúng hẹn. Nếu chậm trễ do lỗi của chúng tôi:</p>
<ul>
<li>Chậm 1-3 ngày: miễn phí ship cho đơn tiếp theo</li>
<li>Chậm 4-7 ngày: giảm 5% giá trị đơn hàng</li>
<li>Chậm trên 7 ngày: khách hàng có quyền hủy đơn, hoàn cọc 100%</li>
</ul>

<h2>Bảo hiểm vận chuyển</h2>
<ul>
<li>Đơn hàng nội thành: VUA Bao Bì bảo hành 100% giá trị nếu mất / hư hỏng trong vận chuyển</li>
<li>Đơn xuất khẩu: khuyến nghị mua bảo hiểm hàng hóa qua đối tác (chi phí 0.3-0.5% giá trị)</li>
</ul>',
        ),
    );
}

/** Auto tao 5 page chinh sach */
add_action('init', function () {
    if ( get_option('vua_policy_pages_seeded_v1') ) return;
    foreach ( vua_policy_catalog() as $slug => $p ) {
        if ( get_page_by_path($slug) ) continue;
        $pid = wp_insert_post(array(
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_title'   => $p['title'],
            'post_name'    => $slug,
            'post_content' => $p['content'],
            'post_excerpt' => $p['lead'],
        ));
        if ( $pid && ! is_wp_error($pid) ) {
            update_post_meta($pid, '_wp_page_template', 'page-chinh-sach.php');
        }
    }
    update_option('vua_policy_pages_seeded_v1', 1);
}, 33);

/** Auto tao cac page tuong ung menu */
add_action('init', function () {
    if ( get_option('vua_menu_pages_seeded_v1') ) return;
    $pages = array(
        'gioi-thieu' => array('Giới thiệu', 'page-gioi-thieu.php'),
        'san-xuat'   => array('Sản xuất', 'page-san-xuat.php'),
        'quy-trinh'  => array('Quy trình', 'page-quy-trinh.php'),
        'tin-tuc'    => array('Tin tức', 'page-tin-tuc.php'),
        'lien-he'    => array('Liên hệ', 'page-lien-he.php'),
    );
    foreach ( $pages as $slug => $info ) {
        if ( get_page_by_path($slug) ) continue;
        $pid = wp_insert_post(array(
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_title'   => $info[0],
            'post_name'    => $slug,
            'post_content' => '',
        ));
        if ( $pid && ! is_wp_error($pid) ) {
            update_post_meta($pid, '_wp_page_template', $info[1]);
        }
    }
    update_option('vua_menu_pages_seeded_v1', 1);
}, 32);

/** Backfill noi dung admin co the edit cho 5 menu page */
function vua_menu_pages_content() {
    return array(
        'gioi-thieu' => "<p>VUA Bao Bì là đơn vị tiên phong trong lĩnh vực sản xuất và in ấn bao bì công nghiệp tại Việt Nam. Chúng tôi sở hữu nhà máy hiện đại tại TP.HCM với đầy đủ dây chuyền in ống đồng, in offset, in flexo, đáp ứng đa dạng nhu cầu đóng gói.</p>\n<p>Từ thực phẩm, mỹ phẩm đến công nghiệp nặng — mỗi sản phẩm của VUA đều mang theo cam kết về chất lượng và uy tín đã được khẳng định qua <strong>25 năm phát triển</strong>.</p>\n\n<h2>Tầm nhìn</h2>\n<p>Trở thành nhà cung cấp giải pháp bao bì toàn diện hàng đầu Đông Nam Á, mang đến giá trị bền vững cho khách hàng và đối tác. Chúng tôi không chỉ bán sản phẩm — chúng tôi đồng hành cùng doanh nghiệp xây dựng thương hiệu.</p>\n\n<h2>Sứ mệnh</h2>\n<p>Đồng hành cùng doanh nghiệp Việt Nam, cung cấp bao bì chất lượng cao với giá thành cạnh tranh, hướng tới sản xuất xanh, thân thiện môi trường. Đào tạo đội ngũ chuyên gia bao bì giàu kinh nghiệm — sẵn sàng tư vấn giải pháp tối ưu cho từng ngành nghề.</p>\n\n<h2>Giá trị cốt lõi</h2>\n<ul>\n<li><strong>Chất lượng</strong> — Mỗi sản phẩm đều phải đạt tiêu chuẩn kiểm phẩm nghiêm ngặt trước khi giao đến khách hàng.</li>\n<li><strong>Uy tín</strong> — Giao hàng đúng hẹn, đúng quy cách, đúng cam kết. Không lý do, không trì hoãn.</li>\n<li><strong>Sáng tạo</strong> — Liên tục cải tiến công nghệ, mẫu mã, vật liệu mới để đáp ứng xu hướng đóng gói toàn cầu.</li>\n<li><strong>Đồng hành</strong> — Xem khách hàng là đối tác lâu dài, hỗ trợ trọn vòng đời sản phẩm từ thiết kế đến giao hàng.</li>\n</ul>\n\n<h2>Vì sao chọn VUA Bao Bì?</h2>\n<ul>\n<li><strong>Chất lượng đạt chuẩn quốc tế</strong> — Chứng nhận ISO 9001:2015, hệ thống kiểm phẩm 3 cấp nghiêm ngặt.</li>\n<li><strong>Giao hàng toàn quốc</strong> — Đúng hẹn 100%, miễn phí ship cho đơn từ 10 triệu nội thành TP.HCM.</li>\n<li><strong>Sản xuất tận xưởng</strong> — Nhà máy 5.000m² tại TP.HCM, không qua trung gian — giá tốt nhất thị trường.</li>\n<li><strong>Phản hồi trong 30 phút</strong> — Đội tư vấn trực 24/7, báo giá chi tiết trong 24h.</li>\n<li><strong>MOQ thấp, linh hoạt</strong> — Nhận đơn từ 500 cái, công nghệ in không trục cho đơn nhỏ giá rẻ.</li>\n<li><strong>Hỗ trợ sau bán hàng</strong> — Lưu khuôn in, đặt lại nhanh, ưu đãi đặc biệt cho đối tác lâu năm.</li>\n</ul>",

        'san-xuat' => "<p>VUA Bao Bì sở hữu nhà máy diện tích hơn <strong>5.000m²</strong> tại TP.HCM, bao gồm các khu vực chuyên biệt: xưởng in ống đồng, xưởng in offset, xưởng dệt PP, xưởng cán màng, xưởng kiểm phẩm.</p>\n<p>Quy trình khép kín từ nguyên liệu đầu vào đến thành phẩm — kiểm soát chất lượng tuyệt đối, giảm chi phí trung gian, giao hàng đúng hẹn.</p>\n\n<h2>Công nghệ in ấn</h2>\n<p>VUA Bao Bì đầu tư đầy đủ 4 công nghệ in ấn tiên tiến, đáp ứng mọi yêu cầu — từ đơn hàng số lượng lớn đến đơn nhỏ đổi mẫu nhanh.</p>\n<ul>\n<li><strong>In ống đồng</strong> 1-8 màu — phù hợp đơn hàng số lượng lớn từ 10.000 sản phẩm, độ sắc nét cao, bám mực bền màu.</li>\n<li><strong>In offset</strong> — chất lượng hình ảnh tinh tế, hiển thị màu Pantone chuẩn xác. Lý tưởng cho bao bì cao cấp, hộp giấy thương hiệu.</li>\n<li><strong>In flexo</strong> — tốc độ cao, chi phí setup thấp. Tối ưu cho túi nilon, băng keo, bao bì màng mỏng.</li>\n<li><strong>In không trục (kỹ thuật số)</strong> — không cần khuôn/trục in. Phù hợp đơn nhỏ từ 100 cái, đổi mẫu nhanh, in thử mẫu.</li>\n</ul>\n\n<h2>Máy móc thiết bị</h2>\n<p>Đầu tư máy móc nhập khẩu chính hãng từ Hàn Quốc, Đài Loan, Nhật Bản — vận hành tự động hóa cao, đảm bảo chất lượng đồng đều và sản lượng ổn định.</p>\n<ul>\n<li><strong>Dây chuyền dệt PP</strong> nhập khẩu Đài Loan — công suất 50 tấn/tháng, sản xuất bao PP dệt 50-100kg đạt tiêu chuẩn xuất khẩu.</li>\n<li><strong>Máy thổi PE/HDPE</strong> nhập khẩu Hàn Quốc — đa dạng độ dày 0.01-0.5mm, sản lượng 100.000 sản phẩm/ngày.</li>\n<li><strong>Máy cán màng phức hợp</strong> 5 lớp — ghép màng nhôm/PET/PE chống thấm, chống tia UV, giữ hương vị thực phẩm.</li>\n<li><strong>Hệ thống cắt - dập - may</strong> tự động hóa cao — cắt chính xác, may đường chỉ đều, sản lượng 100.000 cái/ngày.</li>\n</ul>\n\n<h2>Kiểm soát chất lượng — 3 cấp QC</h2>\n<p>Mỗi sản phẩm đều phải vượt qua hệ thống kiểm phẩm <strong>3 lớp</strong> trước khi giao đến khách hàng:</p>\n<ol>\n<li><strong>QC Nguyên liệu</strong> — Test độ dày, độ dai, độ bền kéo của hạt nhựa nhập khẩu. Loại bỏ ngay nguyên liệu không đạt chuẩn.</li>\n<li><strong>QC Sản xuất</strong> — Lấy mẫu mỗi lô sản xuất, kiểm tra màu sắc Pantone, độ bám mực, kích thước, độ chính xác.</li>\n<li><strong>QC Thành phẩm</strong> — Kiểm 100% sản phẩm trước khi đóng gói. Lập biên bản kiểm phẩm chi tiết cho từng đơn hàng.</li>\n</ol>\n<p>Chứng nhận <strong>ISO 9001:2015</strong> — hệ thống quản lý chất lượng theo tiêu chuẩn quốc tế.</p>\n\n<h2>Năng lực sản xuất</h2>\n<p>Với tổng công suất hơn <strong>500 tấn sản phẩm/tháng</strong>, VUA Bao Bì đáp ứng đơn hàng từ vài trăm đến hàng triệu sản phẩm. Thời gian giao hàng tiêu chuẩn <strong>7-15 ngày</strong> tùy quy cách và công nghệ in ấn.</p>",

        'quy-trinh' => "<p>Tại VUA Bao Bì, chúng tôi tin rằng một quy trình tốt là nền tảng của dịch vụ tốt. Từ tư vấn ban đầu đến giao hàng cuối cùng, mỗi bước đều được thiết kế <strong>tinh gọn — minh bạch — nhanh chóng</strong>.</p>\n<p>Hơn 25 năm kinh nghiệm đã giúp chúng tôi tối ưu quy trình thành 4 bước đơn giản — đảm bảo bạn luôn biết đơn hàng đang ở đâu, và khi nào nhận được hàng.</p>\n\n<h2>Bước 1 — Tư vấn miễn phí</h2>\n<p>Khách hàng liên hệ qua hotline, email, hoặc form trên website. Đội ngũ tư vấn phản hồi trong vòng <strong>30 phút</strong> (giờ hành chính) để tìm hiểu nhu cầu: loại bao bì, quy cách, số lượng, thời gian cần hàng. Chúng tôi gợi ý giải pháp phù hợp nhất với ngân sách của khách.</p>\n<ul>\n<li>Phản hồi 30 phút trong giờ hành chính</li>\n<li>Tư vấn giải pháp tối ưu chi phí</li>\n<li>Gợi ý vật liệu phù hợp ngành nghề</li>\n</ul>\n\n<h2>Bước 2 — Báo giá chi tiết</h2>\n<p>Trong vòng <strong>24h</strong>, VUA Bao Bì gửi báo giá đầy đủ bao gồm: đơn giá theo số lượng, chi phí khuôn/trục in (nếu có), thời gian sản xuất, điều kiện thanh toán. Báo giá minh bạch, không phát sinh chi phí ẩn.</p>\n<ul>\n<li>Báo giá minh bạch, không phát sinh chi phí ẩn</li>\n<li>Đơn giá theo bậc số lượng (càng nhiều càng rẻ)</li>\n<li>Cam kết giá tốt nhất thị trường</li>\n</ul>\n\n<h2>Bước 3 — Sản xuất & Kiểm phẩm</h2>\n<p>Sau khi ký hợp đồng và nhận đặt cọc, đội thiết kế làm <strong>bản in mẫu</strong> để khách duyệt. Khi mẫu được chốt, nhà máy sản xuất hàng loạt với <strong>3 cấp QC</strong>: nguyên liệu - sản xuất - thành phẩm.</p>\n<ul>\n<li>Duyệt mẫu trước khi sản xuất hàng loạt</li>\n<li>Kiểm phẩm 3 cấp theo chuẩn ISO 9001:2015</li>\n<li>Lập biên bản kiểm phẩm cho từng lô</li>\n</ul>\n\n<h2>Bước 4 — Đóng gói & Giao hàng</h2>\n<p>Thành phẩm được đóng gói cẩn thận theo kiện/pallet tiêu chuẩn vận chuyển. Giao hàng toàn quốc — <strong>miễn phí ship</strong> cho đơn từ 10 triệu nội thành TP.HCM. Sau giao hàng, VUA Bao Bì luôn sẵn sàng hỗ trợ và lưu trữ khuôn in cho đơn hàng tiếp theo.</p>\n<ul>\n<li>Đóng gói chuẩn vận chuyển</li>\n<li>Giao hàng toàn quốc đúng hẹn</li>\n<li>Lưu khuôn in cho đơn hàng tiếp theo</li>\n</ul>",

        'tin-tuc' => "<p>Cập nhật những tin tức mới nhất, kiến thức về vật liệu bao bì, xu hướng đóng gói toàn cầu và mẹo chọn bao bì phù hợp cho từng loại sản phẩm.</p>\n<p>Bài viết được biên tập bởi đội ngũ chuyên gia VUA Bao Bì với hơn <strong>25 năm kinh nghiệm</strong> trong ngành — chia sẻ những hiểu biết thực tế giúp doanh nghiệp tối ưu chi phí đóng gói.</p>",

        'lien-he' => "<p>VUA Bao Bì luôn sẵn sàng tư vấn và đồng hành cùng doanh nghiệp của bạn.</p>\n<p>Để lại thông tin qua form bên dưới hoặc liên hệ trực tiếp qua hotline — chúng tôi cam kết phản hồi trong vòng <strong>30 phút</strong> (giờ hành chính) và gửi báo giá chi tiết trong vòng <strong>24 giờ</strong>.</p>",
    );
}

/**
 * Backfill content into the menu pages.
 * Only overwrites if the current post_content is short — i.e. still
 * looks like an earlier auto-seeded default rather than admin edits.
 */
add_action('init', function () {
    if ( get_option('vua_menu_pages_content_v3') ) return;
    foreach ( vua_menu_pages_content() as $slug => $content ) {
        $page = get_page_by_path($slug);
        if ( ! $page ) continue;
        $existing_len = mb_strlen( trim( wp_strip_all_tags($page->post_content) ) );
        if ( $existing_len > 500 ) continue; // admin has substantial edits
        wp_update_post(array('ID' => $page->ID, 'post_content' => $content));
    }
    update_option('vua_menu_pages_content_v3', 1);
}, 34);

/** Menu mac dinh khi chua tao menu trong wp-admin */
function vua_menu_fallback() {
    $items = array(
        home_url('/')             => 'Trang chủ',
        home_url('/gioi-thieu/')  => 'Giới thiệu',
        home_url('/san-pham/')    => 'Sản phẩm',
        home_url('/san-xuat/')    => 'Sản xuất',
        home_url('/quy-trinh/')   => 'Quy trình',
        home_url('/tin-tuc/')     => 'Tin tức',
        home_url('/lien-he/')     => 'Liên hệ',
    );
    $current = trim( $_SERVER['REQUEST_URI'] ?? '', '/' );
    if ( $current === '' ) $current = home_url('/');
    echo '<ul id="menu" class="menu">';
    foreach ( $items as $href => $label ) {
        $href_path = trim( wp_parse_url($href, PHP_URL_PATH) ?: '', '/' );
        $is_active = false;
        if ( $href === home_url('/') ) {
            $is_active = is_front_page();
        } elseif ( $href_path !== '' ) {
            $is_active = strpos($current, $href_path) === 0;
        }
        printf('<li><a href="%s"%s>%s</a></li>', esc_url($href), $is_active ? ' class="active"' : '', esc_html($label));
    }
    echo '</ul>';
}
