<?php
/** Template Name: Liên hệ */
get_header();
?>

<section class="sp-hero pad">
  <div class="wrap">
    <nav class="sp-crumbs rv"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Liên hệ</b></nav>
    <div class="shead rv" style="text-align:left;max-width:none">
      <span class="kick">Liên hệ với chúng tôi</span>
      <h1>Sẵn sàng tư vấn 24/7</h1>
      <p>Để lại thông tin hoặc liên hệ trực tiếp — đội ngũ VUA Bao Bì sẽ phản hồi trong vòng 30 phút (giờ hành chính).</p>
    </div>
  </div>
</section>

<section class="pad" style="padding-top:0">
  <div class="wrap">
    <div class="checkout-grid">
      <form class="checkout-form" id="leadForm">
        <h3>Gửi yêu cầu báo giá</h3>
        <div class="fg"><label>Họ và tên <i>*</i></label><input id="name" type="text" required></div>
        <div class="fg"><label>Số điện thoại <i>*</i></label><input id="phone" type="tel" required placeholder="0xxx xxx xxx"></div>
        <div class="fg"><label>Email</label><input id="email" type="email" placeholder="optional@example.com"></div>
        <div class="fg"><label>Nhu cầu / Sản phẩm quan tâm <i>*</i></label><select id="prod" required>
          <option value="">— Chọn loại sản phẩm —</option>
          <option>Túi nilon / Túi shopping</option>
          <option>Túi vải không dệt</option>
          <option>Túi zipper / Túi hút chân không</option>
          <option>Túi nhôm / Túi giấy kraft</option>
          <option>Xốp bọc hàng / Màng PE</option>
          <option>Dây rút – thít nhựa</option>
          <option>Hộp PVC / Bao bì cao cấp</option>
          <option>Khác — tư vấn riêng</option>
        </select></div>
        <button type="submit" class="btn btn-gold checkout-submit">Gửi yêu cầu</button>
        <p class="checkout-note">Chúng tôi cam kết bảo mật thông tin và phản hồi trong vòng 30 phút.</p>
      </form>
      <div class="qok" id="qok" style="display:none;background:#fff;padding:30px;border-radius:18px;box-shadow:0 8px 26px -18px rgba(13,37,92,.3);text-align:center">
        <svg viewBox="0 0 24 24" fill="none" stroke="#06A77D" stroke-width="2" style="width:64px;height:64px;margin:0 auto 16px"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
        <h3 style="color:var(--navy-deep);font-size:1.4rem;text-transform:uppercase;margin-bottom:8px">Đã gửi thành công!</h3>
        <p style="color:var(--muted)">Cảm ơn quý khách, chúng tôi sẽ gọi lại trong giây lát.</p>
      </div>

      <aside class="checkout-summary">
        <h3>Thông tin liên hệ</h3>
        <ul class="contact-info">
          <li>
            <span class="ci-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg></span>
            <div><b>Địa chỉ</b><span><?php echo esc_html(vua_opt('address')); ?></span></div>
          </li>
          <li>
            <span class="ci-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg></span>
            <div><b>Hotline</b><a href="tel:<?php echo esc_attr(vua_tel()); ?>"><?php echo esc_html(vua_opt('phone')); ?></a></div>
          </li>
          <li>
            <span class="ci-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg></span>
            <div><b>Email</b><a href="mailto:<?php echo esc_attr(vua_opt('email')); ?>"><?php echo esc_html(vua_opt('email')); ?></a></div>
          </li>
          <li>
            <span class="ci-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
            <div><b>Giờ làm việc</b><span>T2-T7: 8:00 - 17:30<br>Chủ nhật: nghỉ</span></div>
          </li>
        </ul>
      </aside>
    </div>
  </div>
</section>

<?php get_footer(); ?>
