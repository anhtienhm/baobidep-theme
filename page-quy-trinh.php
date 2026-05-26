<?php
/** Template Name: Quy trình */
get_header();
?>

<section class="sp-hero pad">
  <div class="wrap">
    <nav class="sp-crumbs rv"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Quy trình</b></nav>
    <div class="shead rv" style="text-align:left;max-width:none">
      <span class="kick">Quy trình đặt hàng</span>
      <h1>Đặt hàng chỉ với 4 bước đơn giản</h1>
      <p>Từ tư vấn đến giao hàng — quy trình tinh gọn, minh bạch, đảm bảo trải nghiệm tốt nhất cho khách hàng.</p>
    </div>
  </div>
</section>

<section class="pad" style="padding-top:0">
  <div class="wrap">
    <div class="steps">
      <div class="step rv">
        <div class="scircle"><span class="n">1</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
        <h3>Tư vấn</h3>
        <p>Tiếp nhận yêu cầu, tư vấn giải pháp & báo giá chi tiết phù hợp nhu cầu.</p>
      </div>
      <div class="step rv" data-d="1">
        <div class="scircle"><span class="n">2</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg></div>
        <h3>Báo giá</h3>
        <p>Gửi báo giá nhanh chóng, rõ ràng — cạnh tranh để tối ưu chi phí.</p>
      </div>
      <div class="step rv" data-d="2">
        <div class="scircle"><span class="n">3</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M3 21h18M3 7l9-4 9 4M5 7v14M19 7v14M9 11h6M9 15h6"/></svg></div>
        <h3>Sản xuất</h3>
        <p>Sản xuất theo tiêu chuẩn chất lượng cao, kiểm tra QC, đúng tiến độ cam kết.</p>
      </div>
      <div class="step rv" data-d="3">
        <div class="scircle"><span class="n">4</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
        <h3>Giao hàng</h3>
        <p>Đóng gói cẩn thận, giao hàng tận nơi toàn quốc, hỗ trợ sau bán hàng.</p>
      </div>
    </div>

    <div class="sp-content rv" style="margin-top:60px">
      <h2>Chi tiết quy trình</h2>

      <h3>Bước 1: Tư vấn miễn phí</h3>
      <p>Khách hàng liên hệ qua hotline, email, hoặc form trên website. Đội ngũ tư vấn sẽ phản hồi trong vòng 30 phút (giờ hành chính) để tìm hiểu nhu cầu: loại bao bì, quy cách, số lượng, thời gian cần hàng. Chúng tôi gợi ý giải pháp phù hợp nhất với ngân sách của khách.</p>

      <h3>Bước 2: Báo giá chi tiết</h3>
      <p>Trong vòng 24h, VUA Bao Bì gửi báo giá đầy đủ bao gồm: đơn giá theo số lượng, chi phí khuôn/trục in (nếu có), thời gian sản xuất, điều kiện thanh toán. Báo giá minh bạch, không phát sinh chi phí ẩn.</p>

      <h3>Bước 3: Sản xuất & Kiểm phẩm</h3>
      <p>Sau khi ký hợp đồng và nhận đặt cọc, đội thiết kế làm bản in mẫu để khách duyệt. Khi mẫu được chốt, nhà máy sản xuất hàng loạt với 3 cấp QC: nguyên liệu - sản xuất - thành phẩm.</p>

      <h3>Bước 4: Đóng gói & Giao hàng</h3>
      <p>Thành phẩm được đóng gói cẩn thận theo kiện/pallet tiêu chuẩn vận chuyển. Giao hàng toàn quốc — miễn phí ship cho đơn từ 10 triệu nội thành TP.HCM. Sau giao hàng, VUA Bao Bì luôn sẵn sàng hỗ trợ và lưu trữ khuôn in cho đơn hàng tiếp theo.</p>
    </div>
  </div>
</section>

<section class="pad" style="background:#f6f8fc">
  <div class="wrap" style="text-align:center">
    <h2 style="font-size:1.8rem;text-transform:uppercase;color:var(--navy-deep);margin-bottom:14px">Bắt đầu đặt hàng ngay</h2>
    <p style="color:var(--muted);margin-bottom:24px">Gửi yêu cầu báo giá — nhận phản hồi trong 30 phút.</p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
      <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Gửi yêu cầu báo giá</a>
      <a href="tel:<?php echo esc_attr(vua_tel()); ?>" class="btn btn-call">Gọi <?php echo esc_html(vua_opt('phone')); ?></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
