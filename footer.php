<?php $u = get_template_directory_uri(); ?>
<footer>
  <div class="wrap">
    <div class="fgrid">
      <div class="fabout">
        <a href="#" class="logo" aria-label="VUA Bao bì công nghiệp"><span class="brandmark"></span></a>
        <p>Giải pháp bao bì toàn diện – Chất lượng vượt trội. Đồng hành cùng doanh nghiệp phát triển bền vững.</p>
        <div class="fbtns"><a href="#products" class="btn btn-line">Catalogue</a><a href="#quote" class="btn btn-gold">Báo giá</a></div>
      </div>
      <div class="fcol"><h4>Sản phẩm</h4><ul>
        <li><a href="#">Bao bì giấy & thùng carton</a></li><li><a href="#">Bao bì nhựa – màng co</a></li><li><a href="#">Bao bì PP dệt</a></li><li><a href="#">Túi zipper</a></li><li><a href="#">Túi hút chân không</a></li><li><a href="#">Tem nhãn – in ấn tổng hợp</a></li></ul></div>
      <div class="fcol"><h4>Chính sách</h4><ul>
        <li><a href="#">Chính sách đổi trả</a></li><li><a href="#">Chính sách bảo mật</a></li><li><a href="#">Chính sách thanh toán</a></li><li><a href="#">Chính sách khuyến mãi</a></li><li><a href="#">Chính sách vận chuyển</a></li></ul></div>
      <div class="fcol"><h4>Liên hệ</h4>
        <div class="fci"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg><?php echo esc_html( vua_opt('address') ); ?></div>
        <div class="fci"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg><a href="tel:<?php echo esc_attr( vua_tel() ); ?>"><?php echo esc_html( vua_opt('phone') ); ?></a></div>
        <div class="fci"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg><a href="mailto:<?php echo esc_attr( vua_opt('email') ); ?>"><?php echo esc_html( vua_opt('email') ); ?></a></div>
      </div>
    </div>
    <div class="fbottom">
      <span>© 2026 VUA BAO BÌ – All rights reserved.</span>
      <div class="fsoc">
        <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
        <a href="#" aria-label="Zalo"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8z"/></svg></a>
        <a href="#" aria-label="Youtube"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M23 12s0-3.3-.4-4.9a2.5 2.5 0 0 0-1.8-1.8C19.3 5 12 5 12 5s-7.3 0-8.8.4a2.5 2.5 0 0 0-1.8 1.8C1 8.7 1 12 1 12s0 3.3.4 4.9a2.5 2.5 0 0 0 1.8 1.8C4.7 19 12 19 12 19s7.3 0 8.8-.4a2.5 2.5 0 0 0 1.8-1.8C23 15.3 23 12 23 12z"/><path d="M10 15.3 15.5 12 10 8.7z" fill="currentColor"/></svg></a>
      </div>
    </div>
  </div>
</footer>

<div class="fab" id="fab">
  <div class="fab-items">
    <a class="fi tel" href="tel:<?php echo esc_attr( vua_tel() ); ?>" aria-label="Gọi điện"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg></a>
    <a class="fi zl" href="https://zalo.me/<?php echo esc_attr( vua_tel() ); ?>" target="_blank" rel="noopener" aria-label="Zalo">Zalo</a>
    <a class="fi fb" href="#" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="#fff"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z"/></svg></a>
  </div>
  <button class="fab-main" id="fabBtn" type="button" aria-label="Liên hệ" aria-expanded="false">
    <svg class="ic-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8z"/></svg>
    <svg class="ic-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6 6 18M6 6l12 12"/></svg>
  </button>
</div>

<?php wp_footer(); ?>
</body>
</html>
