<?php
/** Template Name: Quy trình */
get_header();
?>

<!-- HERO -->
<section class="lp-hero">
  <div class="lp-hero-bg"></div>
  <div class="wrap">
    <nav class="sp-crumbs rv lp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Quy trình</b></nav>
    <div class="lp-hero-body">
      <span class="kick rv">Quy trình đặt hàng</span>
      <h1 class="rv" data-d="1">Đặt hàng chỉ với<br><span class="gtext">4 bước đơn giản</span></h1>
      <p class="lp-hero-lead rv" data-d="2">Quy trình tinh gọn, minh bạch từ tư vấn đến giao hàng — đảm bảo trải nghiệm tốt nhất cho khách hàng.</p>
    </div>
  </div>
</section>

<!-- INTRO (editable in WP Admin) -->
<?php if ( get_the_content() ) : ?>
<section class="lp-intro pad">
  <div class="wrap">
    <div class="lp-intro-body rv">
      <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- 4 STEPS GRID -->
<section class="pad" style="padding-top:0">
  <div class="wrap">
    <div class="steps">
      <div class="step rv">
        <div class="scircle"><span class="n">1</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
        <h3>Tư vấn</h3>
        <p>Tiếp nhận yêu cầu, tư vấn giải pháp phù hợp.</p>
      </div>
      <div class="step rv" data-d="1">
        <div class="scircle"><span class="n">2</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8"/></svg></div>
        <h3>Báo giá</h3>
        <p>Gửi báo giá chi tiết, cạnh tranh trong 24h.</p>
      </div>
      <div class="step rv" data-d="2">
        <div class="scircle"><span class="n">3</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M3 21h18M3 7l9-4 9 4M5 7v14M19 7v14"/></svg></div>
        <h3>Sản xuất</h3>
        <p>Sản xuất kiểm phẩm chất lượng cao, đúng tiến độ.</p>
      </div>
      <div class="step rv" data-d="3">
        <div class="scircle"><span class="n">4</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
        <h3>Giao hàng</h3>
        <p>Đóng gói cẩn thận, giao toàn quốc đúng hẹn.</p>
      </div>
    </div>
  </div>
</section>

<!-- DETAILED STEPS -->
<section class="pad lp-section-alt">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Chi tiết quy trình</span><h2>4 bước — Minh bạch & nhanh chóng</h2></div>

    <!-- Step 1 -->
    <div class="lp-step-detail rv">
      <div class="lp-step-detail-num"><span>01</span></div>
      <div class="lp-step-detail-body">
        <span class="kick">Bước 1</span>
        <h3>Tư vấn miễn phí</h3>
        <p>Khách hàng liên hệ qua hotline, email, hoặc form trên website. Đội ngũ tư vấn phản hồi trong vòng <b>30 phút</b> (giờ hành chính) để tìm hiểu nhu cầu: loại bao bì, quy cách, số lượng, thời gian cần hàng.</p>
        <ul class="lp-step-check">
          <li>Phản hồi 30 phút trong giờ hành chính</li>
          <li>Tư vấn giải pháp tối ưu chi phí</li>
          <li>Gợi ý vật liệu phù hợp ngành nghề</li>
        </ul>
      </div>
    </div>

    <!-- Step 2 -->
    <div class="lp-step-detail lp-step-detail--reverse rv">
      <div class="lp-step-detail-num"><span>02</span></div>
      <div class="lp-step-detail-body">
        <span class="kick">Bước 2</span>
        <h3>Báo giá chi tiết</h3>
        <p>Trong vòng <b>24h</b>, VUA Bao Bì gửi báo giá đầy đủ bao gồm: đơn giá theo số lượng, chi phí khuôn/trục in (nếu có), thời gian sản xuất, điều kiện thanh toán.</p>
        <ul class="lp-step-check">
          <li>Báo giá minh bạch, không phát sinh chi phí ẩn</li>
          <li>Đơn giá theo bậc số lượng (càng nhiều càng rẻ)</li>
          <li>Cam kết giá tốt nhất thị trường</li>
        </ul>
      </div>
    </div>

    <!-- Step 3 -->
    <div class="lp-step-detail rv">
      <div class="lp-step-detail-num"><span>03</span></div>
      <div class="lp-step-detail-body">
        <span class="kick">Bước 3</span>
        <h3>Sản xuất & Kiểm phẩm</h3>
        <p>Sau khi ký hợp đồng và nhận đặt cọc, đội thiết kế làm <b>bản in mẫu</b> để khách duyệt. Khi mẫu được chốt, nhà máy sản xuất hàng loạt với <b>3 cấp QC</b>: nguyên liệu - sản xuất - thành phẩm.</p>
        <ul class="lp-step-check">
          <li>Duyệt mẫu trước khi sản xuất hàng loạt</li>
          <li>Kiểm phẩm 3 cấp theo chuẩn ISO 9001:2015</li>
          <li>Lập biên bản kiểm phẩm cho từng lô</li>
        </ul>
      </div>
    </div>

    <!-- Step 4 -->
    <div class="lp-step-detail lp-step-detail--reverse rv">
      <div class="lp-step-detail-num"><span>04</span></div>
      <div class="lp-step-detail-body">
        <span class="kick">Bước 4</span>
        <h3>Đóng gói & Giao hàng</h3>
        <p>Thành phẩm được đóng gói cẩn thận theo kiện/pallet tiêu chuẩn vận chuyển. Giao hàng toàn quốc — <b>miễn phí ship</b> cho đơn từ 10 triệu nội thành TP.HCM.</p>
        <ul class="lp-step-check">
          <li>Đóng gói chuẩn vận chuyển</li>
          <li>Giao hàng toàn quốc</li>
          <li>Lưu khuôn in cho đơn hàng tiếp theo</li>
        </ul>
      </div>
    </div>

  </div>
</section>

<!-- CTA -->
<section class="lp-cta-banner">
  <div class="wrap">
    <h2>Bắt đầu đặt hàng ngay</h2>
    <p>Gửi yêu cầu báo giá — nhận phản hồi trong 30 phút (giờ hành chính).</p>
    <div class="lp-cta-row">
      <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Gửi yêu cầu báo giá</a>
      <a href="tel:<?php echo esc_attr(vua_tel()); ?>" class="btn btn-line">Gọi <?php echo esc_html(vua_opt('phone')); ?></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
