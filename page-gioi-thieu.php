<?php
/** Template Name: Giới thiệu */
get_header();
$u = get_template_directory_uri();
?>

<section class="sp-hero pad">
  <div class="wrap">
    <nav class="sp-crumbs rv"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Giới thiệu</b></nav>
    <div class="shead rv" style="text-align:left;max-width:none">
      <span class="kick">Về chúng tôi</span>
      <h1>Công ty Cổ phần VUA Đóng Gói Việt Nam</h1>
      <p>Hơn 25 năm kinh nghiệm sản xuất bao bì công nghiệp — đồng hành cùng hàng nghìn doanh nghiệp Việt Nam.</p>
    </div>
  </div>
</section>

<section class="pad" style="padding-top:0">
  <div class="wrap">
    <div class="sp-content rv">
      <h2>Giới thiệu chung</h2>
      <p>VUA Bao Bì (Công ty Cổ phần VUA Đóng Gói Việt Nam) là đơn vị tiên phong trong lĩnh vực sản xuất và in ấn bao bì công nghiệp tại Việt Nam. Chúng tôi sở hữu nhà máy hiện đại tại TP.HCM với đầy đủ dây chuyền in ống đồng, in offset, in flexo, đáp ứng đa dạng nhu cầu đóng gói từ thực phẩm, mỹ phẩm đến công nghiệp nặng.</p>

      <h3>Tầm nhìn</h3>
      <p>Trở thành nhà cung cấp giải pháp bao bì toàn diện hàng đầu Đông Nam Á, mang đến giá trị bền vững cho khách hàng và đối tác.</p>

      <h3>Sứ mệnh</h3>
      <ul>
        <li>Cung cấp sản phẩm bao bì chất lượng cao với giá thành cạnh tranh</li>
        <li>Đồng hành cùng doanh nghiệp Việt Nam trong hành trình xây dựng thương hiệu</li>
        <li>Đầu tư công nghệ hiện đại, hướng tới sản xuất xanh, thân thiện môi trường</li>
        <li>Đào tạo đội ngũ chuyên gia bao bì giàu kinh nghiệm</li>
      </ul>

      <h3>Giá trị cốt lõi</h3>
      <ul>
        <li><strong>Chất lượng</strong> — Mỗi sản phẩm đều phải đạt tiêu chuẩn kiểm phẩm nghiêm ngặt trước khi giao</li>
        <li><strong>Uy tín</strong> — Giao hàng đúng hẹn, đúng quy cách, đúng cam kết</li>
        <li><strong>Sáng tạo</strong> — Liên tục cải tiến công nghệ và mẫu mã</li>
        <li><strong>Đồng hành</strong> — Xem khách hàng là đối tác lâu dài</li>
      </ul>
    </div>
  </div>
</section>

<section class="stats">
  <div class="wrap">
    <div class="stat rv"><b data-c="25" data-s="+">0</b><span>Năm kinh nghiệm</span></div>
    <div class="stat rv"><b data-c="500" data-s="+">0</b><span>Khách hàng hài lòng</span></div>
    <div class="stat rv"><b data-c="10" data-s="+">0</b><span>Quốc gia xuất khẩu</span></div>
    <div class="stat rv"><b data-c="100" data-s="%">0</b><span>Cam kết đúng tiến độ</span></div>
  </div>
</section>

<section class="pad">
  <div class="wrap" style="text-align:center">
    <h2 style="font-size:1.8rem;text-transform:uppercase;color:var(--navy-deep);margin-bottom:14px">Sẵn sàng hợp tác với VUA?</h2>
    <p style="color:var(--muted);margin-bottom:24px">Nhận tư vấn miễn phí và báo giá nhanh trong 24h.</p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
      <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Liên hệ ngay</a>
      <a href="<?php echo esc_url(home_url('/san-pham/')); ?>" class="btn btn-call">Xem sản phẩm</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
