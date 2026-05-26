<?php
if ( ! defined('ABSPATH') ) exit;

/** CPT luu yeu cau bao gia (Lead) */
add_action('init', function () {
    register_post_type('vua_lead', array(
        'labels' => array(
            'name'          => 'Yêu cầu báo giá',
            'singular_name' => 'Yêu cầu báo giá',
            'menu_name'     => 'Báo giá (Leads)',
            'all_items'     => 'Tất cả yêu cầu',
        ),
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-email-alt',
        'menu_position' => 26,
        'supports'      => array('title'),
        'capability_type' => 'post',
    ));
});

add_filter('manage_vua_lead_posts_columns', function ( $cols ) {
    return array(
        'cb'     => isset($cols['cb']) ? $cols['cb'] : '',
        'title'  => 'Tên',
        'vphone' => 'SĐT',
        'vemail' => 'Email',
        'vneed'  => 'Nhu cầu',
        'date'   => 'Ngày gửi',
    );
});
add_action('manage_vua_lead_posts_custom_column', function ( $col, $id ) {
    if ( in_array($col, array('vphone','vemail','vneed'), true) ) {
        echo esc_html( get_post_meta($id, '_' . substr($col, 1), true) );
    }
}, 10, 2);

/** CPT San pham */
add_action('init', function () {
    register_post_type('sanpham', array(
        'labels' => array(
            'name'          => 'Sản phẩm',
            'singular_name' => 'Sản phẩm',
            'menu_name'     => 'Sản phẩm',
            'add_new'       => 'Thêm mới',
            'add_new_item'  => 'Thêm sản phẩm',
            'edit_item'     => 'Sửa sản phẩm',
            'all_items'     => 'Tất cả sản phẩm',
        ),
        'public'        => true,
        'has_archive'   => 'san-pham',
        'rewrite'       => array('slug' => 'san-pham', 'with_front' => false),
        'menu_icon'     => 'dashicons-products',
        'menu_position' => 25,
        'supports'      => array('title','editor','thumbnail','excerpt','revisions'),
        'show_in_rest'  => true,
    ));
});

/** Catalogue 8 san pham — auto seed lan dau */
function vua_products_catalog() {
    return array(
        array(
            'title' => 'In ấn & SX túi nilon',
            'slug'  => 'in-an-tui-nilon',
            'img'   => 'p0.jpg',
            'price' => 0,
            'excerpt' => 'Sản xuất và in túi nilon: túi PE, HD, PP, OPP, CPP, túi shopping nhiều màu theo yêu cầu thương hiệu.',
            'content' => "<h2>Túi nilon in ấn theo yêu cầu</h2>\n<p>VUA Bao Bì là đơn vị sản xuất và in ấn túi nilon trực tiếp tại xưởng, đáp ứng mọi nhu cầu đóng gói cho doanh nghiệp với chất lượng ổn định và giá thành cạnh tranh.</p>\n<h3>Chất liệu cung cấp</h3>\n<ul><li><strong>Túi PE</strong> — dẻo, dai, chống thấm tốt</li><li><strong>Túi HD</strong> (HDPE) — cứng, độ bền cao, chịu tải tốt</li><li><strong>Túi PP</strong> — trong suốt, độ bóng cao</li><li><strong>Túi OPP / CPP</strong> — siêu trong, in ấn sắc nét</li><li><strong>Túi shopping</strong> — quai xách, đáy lập thể, đa dạng kích thước</li></ul>\n<h3>Quy trình sản xuất</h3>\n<ol><li>Tiếp nhận file thiết kế hoặc tư vấn miễn phí</li><li>Báo giá theo số lượng & quy cách</li><li>In bản mẫu duyệt trước khi sản xuất hàng loạt</li><li>Sản xuất — kiểm phẩm — đóng gói — giao hàng toàn quốc</li></ol>\n<p>In ống đồng 1-8 màu, in offset, in flexo — đảm bảo logo & nhận diện thương hiệu sắc nét, bám mực bền màu.</p>",
        ),
        array(
            'title' => 'Túi vải không dệt',
            'slug'  => 'tui-vai-khong-det',
            'img'   => 'p1.jpg',
            'price' => 12000,
            'excerpt' => 'Túi vải canvas, tote bag, không dệt bền chắc, in logo sắc nét, cung cấp số lượng lớn.',
            'content' => "<h2>Túi vải không dệt cao cấp</h2>\n<p>Giải pháp túi vải thân thiện môi trường, dùng nhiều lần, in logo thương hiệu nổi bật — phù hợp shop thời trang, mỹ phẩm, sự kiện, hội thảo.</p>\n<h3>Các loại túi</h3>\n<ul><li><strong>Túi không dệt</strong> (non-woven) — định lượng 50-100gsm, đa màu</li><li><strong>Túi canvas</strong> — vải dày, cứng cáp, sang trọng</li><li><strong>Tote bag</strong> — kiểu dáng thời trang, quai dài</li><li><strong>Túi đáy hộp</strong> — đứng vững, tải trọng tốt</li></ul>\n<h3>Ưu điểm</h3>\n<ul><li>In logo sắc nét bằng công nghệ in lụa / in chuyển nhiệt</li><li>Bền, dùng nhiều lần — giảm chi phí bao bì dài hạn</li><li>Quảng bá thương hiệu mỗi khi khách hàng sử dụng</li><li>Số lượng tối thiểu chỉ từ 500 chiếc</li></ul>",
        ),
        array(
            'title' => 'Xốp bọc hàng',
            'slug'  => 'xop-boc-hang',
            'img'   => 'p2.jpg',
            'price' => 95000,
            'excerpt' => 'Xốp PE foam, bubble wrap, màng PE, màng co, carton đóng gói — bảo vệ hàng hoá tối ưu.',
            'content' => "<h2>Vật liệu bọc lót — bảo vệ hàng hóa</h2>\n<p>Cung cấp đầy đủ các loại xốp, màng bọc dùng trong đóng gói vận chuyển, chống va đập, chống ẩm cho hàng hoá điện tử, gốm sứ, mỹ phẩm.</p>\n<h3>Sản phẩm</h3>\n<ul><li><strong>Xốp PE foam</strong> — cuộn xốp mềm, dày 0.5-10mm</li><li><strong>Bubble wrap</strong> (xốp hơi) — bóng khí to/nhỏ, chống sốc</li><li><strong>Màng PE</strong> — cuộn quấn pallet, định hình kiện hàng</li><li><strong>Màng co</strong> — co nhiệt, đóng gói chai/lốc sản phẩm</li><li><strong>Carton 3/5/7 lớp</strong> — thùng đóng gói tiêu chuẩn xuất khẩu</li></ul>\n<h3>Ứng dụng</h3>\n<p>Đóng gói thiết bị điện tử, đồ thủy tinh, sản phẩm dễ vỡ; chuyển phát nhanh, e-commerce; bao gói pallet xuất khẩu.</p>",
        ),
        array(
            'title' => 'Dây rút – thít nhựa',
            'slug'  => 'day-rut-thit-nhua',
            'img'   => 'p3.jpg',
            'price' => 35000,
            'excerpt' => 'Dây rút nhựa, lạt nhựa, băng keo, màng quấn pallet đa dạng kích thước, sẵn hàng số lượng lớn.',
            'content' => "<h2>Dây rút – thít nhựa các loại</h2>\n<p>Phụ kiện cố định, đóng gói chuyên dụng cho công nghiệp, xây dựng, kho vận. Sẵn hàng số lượng lớn, giao nhanh.</p>\n<h3>Quy cách</h3>\n<ul><li><strong>Dây rút nhựa</strong> (cable tie) — 100mm đến 1000mm, chịu lực 8-100kg</li><li><strong>Lạt nhựa</strong> — đa màu, dùng cho nông nghiệp, đóng gói nhẹ</li><li><strong>Băng keo</strong> — đục, trong, in logo theo yêu cầu</li><li><strong>Màng quấn pallet</strong> — định lượng 17-25 micron, độ căng tốt</li></ul>\n<h3>Cam kết</h3>\n<ul><li>Hàng chính phẩm, không tái chế thứ phẩm</li><li>Có sẵn kho — đặt là giao trong 24h khu vực TP.HCM</li><li>Giá sỉ tốt nhất cho đơn từ 10 thùng</li></ul>",
        ),
        array(
            'title' => 'Túi zipper',
            'slug'  => 'tui-zipper',
            'img'   => 'p4.jpg',
            'price' => 1800,
            'excerpt' => 'Túi zipper bạc, kraft, zipper thực phẩm: chỉ đỏ, 8 cạnh, đứng đáy… đa dạng quy cách.',
            'content' => "<h2>Túi zipper cao cấp</h2>\n<p>Giải pháp đóng gói tiện lợi cho thực phẩm khô, mỹ phẩm, dược phẩm — bảo quản chân không, mở/đóng nhiều lần dễ dàng.</p>\n<h3>Phân loại</h3>\n<ul><li><strong>Zipper bạc</strong> — chống tia UV, giữ hương vị</li><li><strong>Zipper kraft</strong> — giấy thân thiện môi trường, mặt trước có cửa sổ trong suốt</li><li><strong>Zipper trong</strong> — nhìn rõ sản phẩm bên trong</li><li><strong>Zipper 8 cạnh</strong> (8-side seal) — đứng vững, sang trọng</li><li><strong>Zipper đứng đáy</strong> (stand-up pouch) — phổ biến cho hạt, snack</li></ul>\n<h3>Tính năng</h3>\n<ul><li>Chỉ kéo zip đỏ / vàng / bạc theo yêu cầu</li><li>Đục lỗ treo, van xả khí, vòi rót</li><li>In ống đồng full màu, ép kim, dập nổi</li></ul>",
        ),
        array(
            'title' => 'Túi hút chân không',
            'slug'  => 'tui-hut-chan-khong',
            'img'   => 'p5.jpg',
            'price' => 1200,
            'excerpt' => 'Bao hút chân không đựng thực phẩm: 1 mặt nhám, 2 mặt nhám, 2 mặt trơn — giữ tươi lâu.',
            'content' => "<h2>Túi hút chân không thực phẩm</h2>\n<p>Bao chuyên dùng cho máy hút chân không gia đình & công nghiệp — bảo quản thực phẩm tươi sống lâu gấp 3-5 lần, ngăn vi khuẩn, giữ trọn hương vị.</p>\n<h3>Phân loại</h3>\n<ul><li><strong>1 mặt nhám, 1 mặt trơn</strong> — dùng cho máy hút có vòi hút</li><li><strong>2 mặt nhám</strong> — hút chân không sâu, độ kín cao</li><li><strong>2 mặt trơn</strong> — dùng cho máy hút buồng (chamber)</li></ul>\n<h3>Ứng dụng</h3>\n<ul><li>Đóng gói thịt, cá, hải sản tươi sống</li><li>Bảo quản hạt cà phê, các loại đậu, ngũ cốc</li><li>Đóng gói thực phẩm chín, đồ ăn liền</li><li>An toàn thực phẩm — PE/PA nhập khẩu, không độc hại</li></ul>",
        ),
        array(
            'title' => 'Túi nhôm – in không trục',
            'slug'  => 'tui-nhom-in-khong-truc',
            'img'   => 'p6.jpg',
            'price' => 0,
            'excerpt' => 'Hộp giấy kraft, ly giấy, túi giấy cao cấp và các sản phẩm bao bì giấy in ấn tinh tế.',
            'content' => "<h2>Túi nhôm & bao bì giấy in ấn tinh tế</h2>\n<p>Giải pháp bao bì sang trọng cho cà phê, trà, thực phẩm cao cấp — kết hợp công nghệ in không trục hiện đại, tiết kiệm chi phí khi đơn hàng nhỏ.</p>\n<h3>Sản phẩm chính</h3>\n<ul><li><strong>Túi nhôm ghép màng</strong> — chống ẩm, chống tia UV tuyệt đối</li><li><strong>Hộp giấy kraft</strong> — vintage, thân thiện môi trường</li><li><strong>Ly giấy</strong> — cà phê, trà sữa, in logo brand</li><li><strong>Túi giấy quai xoắn / quai dẹt</strong> — shopping, quà tặng</li></ul>\n<h3>Công nghệ in không trục (digital)</h3>\n<ul><li>Không cần làm trục, làm khuôn — giảm chi phí setup</li><li>In số lượng nhỏ từ 100 cái — vẫn rẻ</li><li>Đổi mẫu nhanh — phù hợp test thị trường</li><li>Màu sắc chuẩn CMYK, đạt 95% gamut Pantone</li></ul>",
        ),
        array(
            'title' => 'Túi nhựa PVC',
            'slug'  => 'tui-nhua-pvc',
            'img'   => 'p7.jpg',
            'price' => 18500,
            'excerpt' => 'Hộp nhựa PVC trong suốt, packaging mỹ phẩm, đa dạng kích thước & màu sắc cho nhiều mục đích.',
            'content' => "<h2>Hộp nhựa PVC trong suốt</h2>\n<p>Bao bì cao cấp dạng hộp trong suốt — trưng bày sản phẩm rõ ràng, sang trọng. Lý tưởng cho mỹ phẩm, đồ chơi, quà tặng, bánh kẹo cao cấp.</p>\n<h3>Đặc tính</h3>\n<ul><li><strong>Vật liệu</strong>: PVC / PET / APET — trong suốt như pha lê</li><li><strong>Độ dày</strong>: 0.2 - 0.5mm — cứng cáp, không biến dạng</li><li><strong>Kiểu dáng</strong>: hộp vuông, hộp tròn, hộp lục giác, kim tự tháp</li><li><strong>Hoàn thiện</strong>: in offset, ép kim, dập nổi, dán nhãn</li></ul>\n<h3>Ứng dụng</h3>\n<ul><li>Packaging mỹ phẩm — kem, son, serum</li><li>Hộp quà bánh trung thu, bánh kẹo, chocolate</li><li>Đồ chơi, mô hình trưng bày</li><li>Sản phẩm gift set, quà tặng doanh nghiệp</li></ul>",
        ),
    );
}

/** Migration: xoa 8 san pham goc (gio chuyen thanh danh muc) */
add_action('init', function () {
    if ( get_option('vua_originals_removed_v1') ) return;
    foreach ( vua_products_catalog() as $p ) {
        $post = get_page_by_path($p['slug'], OBJECT, 'sanpham');
        if ( $post ) wp_delete_post($post->ID, true);
    }
    update_option('vua_originals_removed_v1', 1);
    flush_rewrite_rules();
}, 20);

/** Migration: apply demo prices to already-seeded sanpham (run once) */
add_action('init', function () {
    if ( get_option('vua_demo_prices_v1') ) return;
    foreach ( vua_products_catalog() as $p ) {
        $post = get_page_by_path($p['slug'], OBJECT, 'sanpham');
        if ( ! $post ) continue;
        $existing = get_post_meta($post->ID, '_vua_price', true);
        if ( $existing === '' || (float) $existing === 0.0 ) {
            update_post_meta($post->ID, '_vua_price', (float) ($p['price'] ?? 0));
        }
    }
    update_option('vua_demo_prices_v1', 1);
}, 25);

/** Helper: URL san pham theo slug, fallback # neu chua co */
function vua_product_url($slug) {
    $p = get_page_by_path($slug, OBJECT, 'sanpham');
    return $p ? get_permalink($p) : '#';
}

/** Helper: URL danh muc theo slug (taxonomy archive), fallback product URL */
function vua_category_url($slug) {
    $term = get_term_by('slug', $slug, 'sanpham_cat');
    if ( $term && ! is_wp_error($term) ) return get_term_link($term);
    return vua_product_url($slug);
}

/** Helper: anh dai dien danh muc — meta _vua_img > placeholder */
function vua_category_image($term_id) {
    $img = get_term_meta($term_id, '_vua_img', true);
    if ( $img ) return get_template_directory_uri() . '/assets/img/products/' . $img;
    return get_template_directory_uri() . '/assets/img/products/p0.jpg';
}

/** Taxonomy: Danh muc san pham */
add_action('init', function () {
    register_taxonomy('sanpham_cat', 'sanpham', array(
        'labels' => array(
            'name'          => 'Danh mục sản phẩm',
            'singular_name' => 'Danh mục',
            'menu_name'     => 'Danh mục',
            'add_new_item'  => 'Thêm danh mục',
            'edit_item'     => 'Sửa danh mục',
            'all_items'     => 'Tất cả danh mục',
        ),
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'danh-muc', 'with_front' => false),
    ));
});

/** Catalogue 24 san pham con — 3/danh-muc */
function vua_child_products_catalog() {
    return array(
        'in-an-tui-nilon' => array(
            array('title' => 'Túi PE 1kg trắng',          'price' => 35000,  'excerpt' => 'Túi PE trong suốt sức chứa 1kg — dùng cho thực phẩm, hàng hoá nhẹ. Bịch 100 cái.'),
            array('title' => 'Túi HD 2kg trong',          'price' => 48000,  'excerpt' => 'Túi HDPE cứng cáp, chịu tải 2kg — đa năng cho siêu thị, cửa hàng. Bịch 100 cái.'),
            array('title' => 'Túi shopping in logo',      'price' => 850,    'excerpt' => 'Túi shopping in logo theo yêu cầu thương hiệu, MOQ 500 cái.'),
        ),
        'tui-vai-khong-det' => array(
            array('title' => 'Túi không dệt 100gsm',      'price' => 9500,   'excerpt' => 'Túi không dệt định lượng 100gsm, có quai, đa màu, kích thước phổ thông.'),
            array('title' => 'Túi canvas tote bag',       'price' => 28000,  'excerpt' => 'Túi canvas dày, in logo sắc nét — dùng cho shop thời trang, sự kiện.'),
            array('title' => 'Túi đáy hộp 30×40',         'price' => 14500,  'excerpt' => 'Túi không dệt đáy hộp đứng vững, kích thước 30×40cm, tải trọng tốt.'),
        ),
        'xop-boc-hang' => array(
            array('title' => 'Bubble wrap 50m',           'price' => 120000, 'excerpt' => 'Cuộn xốp hơi 50m, bóng khí nhỏ, chống va đập tối ưu.'),
            array('title' => 'Xốp PE foam cuộn 1mm',      'price' => 85000,  'excerpt' => 'Cuộn xốp PE foam dày 1mm — đệm lót đồ điện tử, gốm sứ.'),
            array('title' => 'Màng PE quấn pallet 17μ',   'price' => 165000, 'excerpt' => 'Cuộn màng PE 17 micron, độ căng tốt — định hình kiện hàng.'),
        ),
        'day-rut-thit-nhua' => array(
            array('title' => 'Dây rút 100mm trắng',       'price' => 18000,  'excerpt' => 'Bịch 100 dây rút nhựa 100mm, chịu lực 8kg.'),
            array('title' => 'Lạt nhựa đa màu',           'price' => 22000,  'excerpt' => 'Bịch lạt nhựa đa màu cho nông nghiệp, đóng gói nhẹ.'),
            array('title' => 'Băng keo trong 4.8cm',      'price' => 12500,  'excerpt' => 'Cuộn băng keo trong 4.8cm × 100m, độ dính cao.'),
        ),
        'tui-zipper' => array(
            array('title' => 'Túi zipper bạc 100g',       'price' => 1500,   'excerpt' => 'Túi zipper bạc đứng, đựng 100g, dùng cho thực phẩm khô.'),
            array('title' => 'Zipper kraft cửa sổ',       'price' => 2200,   'excerpt' => 'Túi zipper kraft mặt trước có cửa sổ trong nhìn rõ sản phẩm.'),
            array('title' => 'Zipper đứng đáy 250g',      'price' => 2800,   'excerpt' => 'Stand-up pouch đáy phẳng, đứng vững, đựng 250g.'),
        ),
        'tui-hut-chan-khong' => array(
            array('title' => 'Túi hút chân không 20×30',  'price' => 950,    'excerpt' => 'Túi nhám 1 mặt, kích thước 20×30cm — đa năng cho gia đình.'),
            array('title' => 'Túi 2 mặt nhám 25×35',      'price' => 1450,   'excerpt' => 'Túi 2 mặt nhám, 25×35cm — hút chân không sâu, độ kín cao.'),
            array('title' => 'Túi chân không 30×40',      'price' => 1800,   'excerpt' => 'Túi 30×40cm cho thịt, cá tươi sống — đóng gói lớn.'),
        ),
        'tui-nhom-in-khong-truc' => array(
            array('title' => 'Hộp giấy kraft size M',     'price' => 4500,   'excerpt' => 'Hộp giấy kraft 15×10×5cm, gấp gọn — giao hàng e-commerce.'),
            array('title' => 'Ly giấy 250ml',             'price' => 580,    'excerpt' => 'Ly giấy 250ml đựng cà phê, trà sữa — in logo brand.'),
            array('title' => 'Túi giấy quai xoắn',        'price' => 3800,   'excerpt' => 'Túi giấy kraft quai xoắn — shopping, quà tặng cao cấp.'),
        ),
        'tui-nhua-pvc' => array(
            array('title' => 'Hộp PVC trong 8×8×10',      'price' => 12500,  'excerpt' => 'Hộp PVC trong suốt 8×8×10cm — gift packaging, mỹ phẩm.'),
            array('title' => 'Hộp PVC lục giác',          'price' => 15800,  'excerpt' => 'Hộp PVC dạng lục giác sang trọng — packaging cosmetic.'),
            array('title' => 'Hộp PVC quà tặng',          'price' => 22000,  'excerpt' => 'Hộp PVC nắp ép kim — quà tặng doanh nghiệp cao cấp.'),
        ),
    );
}

/** Seed danh muc lan dau — su dung lai data tu vua_products_catalog */
add_action('init', function () {
    if ( get_option('vua_cats_seeded') ) return;
    foreach ( vua_products_catalog() as $p ) {
        if ( term_exists($p['slug'], 'sanpham_cat') ) continue;
        $term = wp_insert_term($p['title'], 'sanpham_cat', array(
            'slug'        => $p['slug'],
            'description' => $p['content'],
        ));
        if ( ! is_wp_error($term) ) {
            update_term_meta($term['term_id'], '_vua_img', $p['img']);
        }
    }
    update_option('vua_cats_seeded', 1);
    flush_rewrite_rules();
}, 22);

/** Seed + assign — idempotent, re-runs voi version moi */
add_action('init', function () {
    if ( get_option('vua_products_assigned_v3') ) return;

    // 1. Assign 8 originals to their matching category
    foreach ( vua_products_catalog() as $p ) {
        $post = get_page_by_path($p['slug'], OBJECT, 'sanpham');
        $term = get_term_by('slug', $p['slug'], 'sanpham_cat');
        if ( $post && $term && ! is_wp_error($term) ) {
            wp_set_object_terms($post->ID, $term->term_id, 'sanpham_cat');
        }
    }

    // 2. Seed/sync 24 child products
    foreach ( vua_child_products_catalog() as $cat_slug => $products ) {
        $term = get_term_by('slug', $cat_slug, 'sanpham_cat');
        if ( ! $term || is_wp_error($term) ) continue;
        foreach ( $products as $i => $p ) {
            $slug = sanitize_title($p['title']);
            $existing = get_page_by_path($slug, OBJECT, 'sanpham');
            if ( $existing ) {
                // Already there — just re-assign + ensure meta
                $pid = $existing->ID;
                wp_set_object_terms($pid, $term->term_id, 'sanpham_cat');
                if ( ! get_post_meta($pid, '_vua_price', true) ) {
                    update_post_meta($pid, '_vua_price', (float) $p['price']);
                }
                continue;
            }
            $pid = wp_insert_post(array(
                'post_type'    => 'sanpham',
                'post_status'  => 'publish',
                'post_title'   => $p['title'],
                'post_name'    => $slug,
                'post_excerpt' => $p['excerpt'],
                'post_content' => '<p>' . esc_html($p['excerpt']) . '</p><p>Liên hệ tư vấn cho đơn hàng số lượng lớn để có giá tốt nhất.</p>',
                'menu_order'   => $i,
            ));
            if ( $pid && ! is_wp_error($pid) ) {
                update_post_meta($pid, '_vua_price', (float) $p['price']);
                wp_set_object_terms($pid, $term->term_id, 'sanpham_cat');
                $img = get_term_meta($term->term_id, '_vua_img', true);
                if ( $img ) update_post_meta($pid, '_vua_img', $img);
            }
        }
    }

    update_option('vua_products_assigned_v3', 1);
}, 28);

/** Sanpham: meta box gia */
add_action('add_meta_boxes', function () {
    add_meta_box('vua_price_box', 'Giá bán', 'vua_render_price_box', 'sanpham', 'side', 'high');
});
function vua_render_price_box($post) {
    $price = (float) get_post_meta($post->ID, '_vua_price', true);
    wp_nonce_field('vua_price_save', 'vua_price_nonce');
    echo '<p><label for="vua_price"><b>Giá (VND)</b></label><br>';
    echo '<input type="number" min="0" step="1000" name="vua_price" id="vua_price" value="' . esc_attr($price) . '" style="width:100%" placeholder="vd: 25000"></p>';
    echo '<p style="color:#666;font-size:.85em">Để trống / 0 = hiển thị "Liên hệ".</p>';
}
add_action('save_post_sanpham', function ($pid) {
    if ( ! isset($_POST['vua_price_nonce']) || ! wp_verify_nonce($_POST['vua_price_nonce'], 'vua_price_save') ) return;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( ! current_user_can('edit_post', $pid) ) return;
    $price = isset($_POST['vua_price']) ? (float) $_POST['vua_price'] : 0;
    update_post_meta($pid, '_vua_price', $price);
});

/** CPT Don hang */
add_action('init', function () {
    register_post_type('vua_order', array(
        'labels' => array(
            'name'          => 'Đơn hàng',
            'singular_name' => 'Đơn hàng',
            'menu_name'     => 'Đơn hàng',
            'all_items'     => 'Tất cả đơn hàng',
            'edit_item'     => 'Chi tiết đơn hàng',
        ),
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-cart',
        'menu_position' => 24,
        'supports'      => array('title','editor'),
        'capability_type' => 'post',
    ));
});

/** Columns cho danh sach don hang */
add_filter('manage_vua_order_posts_columns', function ( $cols ) {
    return array(
        'cb'      => isset($cols['cb']) ? $cols['cb'] : '',
        'title'   => 'Đơn',
        'oname'   => 'Khách',
        'ophone'  => 'SĐT',
        'ototal'  => 'Tổng tiền',
        'ostatus' => 'Trạng thái',
        'date'    => 'Ngày',
    );
});
add_action('manage_vua_order_posts_custom_column', function ( $col, $id ) {
    switch ( $col ) {
        case 'oname':  echo esc_html( get_post_meta($id, '_vua_customer_name', true) ); break;
        case 'ophone': echo esc_html( get_post_meta($id, '_vua_customer_phone', true) ); break;
        case 'ototal': echo esc_html( vua_format_price( get_post_meta($id, '_vua_total', true) ) ); break;
        case 'ostatus':
            $s = get_post_meta($id, '_vua_status', true) ?: 'pending';
            $labels = array(
                'pending' => array('Chờ xử lý', '#b8860b'),
                'processing' => array('Đang xử lý', '#1A3C86'),
                'completed' => array('Hoàn thành', '#06A77D'),
                'cancelled' => array('Đã hủy', '#999'),
            );
            $l = isset($labels[$s]) ? $labels[$s] : array($s, '#666');
            printf('<span style="display:inline-block;padding:2px 8px;border-radius:10px;background:%s;color:#fff;font-size:.85em">%s</span>', esc_attr($l[1]), esc_html($l[0]));
            break;
    }
}, 10, 2);

/** Meta box: chi tiet don hang */
add_action('add_meta_boxes', function () {
    add_meta_box('vua_order_detail', 'Chi tiết đơn hàng', 'vua_render_order_detail', 'vua_order', 'normal', 'high');
    add_meta_box('vua_order_status', 'Trạng thái', 'vua_render_order_status', 'vua_order', 'side', 'high');
});
function vua_render_order_detail($post) {
    $name    = get_post_meta($post->ID, '_vua_customer_name', true);
    $phone   = get_post_meta($post->ID, '_vua_customer_phone', true);
    $email   = get_post_meta($post->ID, '_vua_customer_email', true);
    $address = get_post_meta($post->ID, '_vua_customer_address', true);
    $items   = get_post_meta($post->ID, '_vua_items', true);
    $total   = get_post_meta($post->ID, '_vua_total', true);
    ?>
    <table class="form-table">
      <tr><th>Họ tên</th><td><?php echo esc_html($name); ?></td></tr>
      <tr><th>SĐT</th><td><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></td></tr>
      <tr><th>Email</th><td><?php echo esc_html($email); ?></td></tr>
      <tr><th>Địa chỉ</th><td><?php echo esc_html($address); ?></td></tr>
    </table>
    <h3>Sản phẩm</h3>
    <table class="widefat striped">
      <thead><tr><th>Sản phẩm</th><th>SL</th><th>Đơn giá</th><th>Thành tiền</th></tr></thead>
      <tbody>
        <?php if ( is_array($items) ) foreach ( $items as $it ) : ?>
        <tr>
          <td><?php echo esc_html($it['title']); ?></td>
          <td><?php echo intval($it['qty']); ?></td>
          <td><?php echo esc_html( vua_format_price($it['price']) ); ?></td>
          <td><?php echo esc_html( vua_format_price($it['price'] * $it['qty']) ); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr><th colspan="3" style="text-align:right">Tổng cộng:</th><th><?php echo esc_html( vua_format_price($total) ); ?></th></tr>
      </tbody>
    </table>
    <?php
}
function vua_render_order_status($post) {
    $s = get_post_meta($post->ID, '_vua_status', true) ?: 'pending';
    wp_nonce_field('vua_order_status_save', 'vua_order_status_nonce');
    $opts = array(
        'pending'    => 'Chờ xử lý',
        'processing' => 'Đang xử lý',
        'completed'  => 'Hoàn thành',
        'cancelled'  => 'Đã hủy',
    );
    echo '<select name="vua_order_status" style="width:100%">';
    foreach ( $opts as $v => $l ) {
        printf('<option value="%s"%s>%s</option>', esc_attr($v), selected($s, $v, false), esc_html($l));
    }
    echo '</select>';
}
add_action('save_post_vua_order', function ($pid) {
    if ( ! isset($_POST['vua_order_status_nonce']) || ! wp_verify_nonce($_POST['vua_order_status_nonce'], 'vua_order_status_save') ) return;
    if ( ! current_user_can('edit_post', $pid) ) return;
    $s = isset($_POST['vua_order_status']) ? sanitize_text_field($_POST['vua_order_status']) : 'pending';
    update_post_meta($pid, '_vua_status', $s);
});

/** Helper: anh dai dien san pham — featured image > meta _vua_img > placeholder */
function vua_product_image($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    if ( has_post_thumbnail($post_id) ) {
        return get_the_post_thumbnail_url($post_id, 'large');
    }
    $img = get_post_meta($post_id, '_vua_img', true);
    if ( $img ) {
        return get_template_directory_uri() . '/assets/img/products/' . $img;
    }
    return get_template_directory_uri() . '/assets/img/products/p0.jpg';
}
