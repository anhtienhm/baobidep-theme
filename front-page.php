<?php
/** Front page - VUA landing */
get_header();
$u = get_template_directory_uri();
?>


<!-- ===== HERO ===== -->
<section class="hero">
  <div class="wrap">
    <div class="htext">
      <h1 class="rv" data-d="1"><?php echo esc_html( vua_opt('hero_t1') ); ?><span class="gtext"><?php echo esc_html( vua_opt('hero_t2') ); ?></span></h1>
      <p class="lead rv" data-d="2">Sản xuất & in ấn bao bì công nghiệp chất lượng cao: bao PP dệt, thùng carton, bao bì giấy, bao bì nhựa, màng PE… mang công nghệ hiện đại và giải pháp đóng gói đa dạng, đạt chuẩn quốc tế.</p>
      <div class="hero-cta rv" data-d="3">
        <a href="#quote" class="btn btn-gold"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h6"/></svg>Nhận báo giá</a>
        <a href="#products" class="btn btn-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>Xem catalogue</a>
      </div>
      <div class="hbadges rv" data-d="4">
        <span class="hbadge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>Tư vấn miễn phí</span>
        <span class="hbadge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>Giao hàng toàn quốc</span>
        <span class="hbadge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 20h20M4 20V8l5-3 5 3M14 20V11l5-3v12"/></svg>Sản xuất tận xưởng</span>
      </div>
    </div>
    <div class="hero-visual rv" data-d="2">
      <div class="badge25"><b>25+</b><span>NĂM</span></div>
      <div class="collage">
        <img class="hero-img" src="<?php echo $u; ?>/assets/img/hero.webp" alt="Sản phẩm bao bì VUA" onerror="this.style.display='none'">
        <svg viewBox="0 0 520 470" xmlns="http://www.w3.org/2000/svg">
          <!-- carton boxes back -->
          <g>
            <path d="M40 300 l120 -34 v120 l-120 34 z" fill="#C98A06"/>
            <path d="M40 300 l120 -34 l90 26 l-120 34 z" fill="url(#gld)"/>
            <path d="M160 386 v120 l90 26 V412 z" fill="#A8740A" opacity=".85"/>
            <path d="M160 266 l90 26 v120 l-90 -26 z" fill="#E0A516"/>
            <path d="M95 312 h60 M125 305 v18" stroke="#8a5e08" stroke-width="3" opacity=".5"/>
          </g>
          <!-- PP woven sack -->
          <g>
            <path d="M196 150 q70 -26 140 0 l18 250 q-88 30 -176 0 z" fill="url(#gld)"/>
            <path d="M196 150 q70 -26 140 0 l-6 26 q-64 -22 -128 0 z" fill="#E0A516"/>
            <rect x="214" y="200" width="104" height="120" rx="6" fill="#fff"/>
            <text x="266" y="234" font-family="Oswald,sans-serif" font-weight="700" font-size="30" fill="#1A3C86" text-anchor="middle">VUA</text>
            <text x="266" y="262" font-family="Oswald,sans-serif" font-weight="600" font-size="15" fill="#1A3C86" text-anchor="middle">PP DỆT</text>
            <rect x="234" y="276" width="64" height="26" rx="4" fill="#1A3C86"/>
            <text x="266" y="295" font-family="Oswald,sans-serif" font-weight="700" font-size="17" fill="#FFD24D" text-anchor="middle">50KG</text>
          </g>
          <!-- kraft bag right -->
          <g>
            <path d="M360 250 h96 v150 h-96 z" fill="#E0A516"/>
            <path d="M360 250 h96 l-14 -18 h-68 z" fill="#C98A06"/>
            <path d="M380 232 q26 -30 52 0" fill="none" stroke="#8a5e08" stroke-width="5"/>
            <rect x="384" y="300" width="48" height="40" rx="4" fill="#fff" opacity=".9"/>
            <circle cx="408" cy="320" r="13" fill="none" stroke="#C98A06" stroke-width="3"/>
          </g>
          <!-- film roll bottom-left -->
          <g>
            <ellipse cx="120" cy="430" rx="70" ry="26" fill="#D9E2F7"/>
            <ellipse cx="120" cy="430" rx="70" ry="26" fill="none" stroke="#9fb2e0" stroke-width="2"/>
            <path d="M50 430 v-14 a70 26 0 0 0 140 0 v14" fill="#EAF0FF"/>
            <ellipse cx="120" cy="416" rx="70" ry="26" fill="#F4F7FF"/>
            <ellipse cx="120" cy="416" rx="22" ry="8" fill="#9fb2e0"/>
          </g>
          <!-- label roll bottom-right -->
          <g>
            <ellipse cx="408" cy="430" rx="44" ry="40" fill="#F4F7FF"/>
            <ellipse cx="408" cy="430" rx="44" ry="40" fill="none" stroke="#9fb2e0" stroke-width="2"/>
            <ellipse cx="408" cy="430" rx="14" ry="12" fill="#1A3C86"/>
            <path d="M452 430 q26 6 40 -8 l4 18 q-20 12 -42 6 z" fill="url(#gld)"/>
            <path d="M460 432 h22 M460 440 h16" stroke="#C98A06" stroke-width="2"/>
          </g>
        </svg>
      </div>
    </div>
  </div>
</section>

<!-- ===== STATS ===== -->
<section class="stats">
  <div class="wrap">
    <div class="stat rv"><b data-c="25" data-s="+">0</b><span>Năm kinh nghiệm</span></div>
    <div class="stat rv"><b data-c="500" data-s="+">0</b><span>Khách hàng hài lòng</span></div>
    <div class="stat rv"><b data-c="10" data-s="+">0</b><span>Quốc gia xuất khẩu</span></div>
    <div class="stat rv"><b data-c="25" data-s="+">0</b><span>Chuyên gia bao bì</span></div>
    <div class="stat rv"><b data-c="500" data-s="+">0</b><span>Dự án đã thực hiện</span></div>
    <div class="stat rv"><b data-c="10" data-s="+">0</b><span>Công nghệ hiện đại</span></div>
    <div class="stat rv"><b data-c="100" data-s="%">0</b><span>Cam kết đúng tiến độ</span></div>
  </div>
</section>

<!-- ===== PRODUCTS ===== -->
<section class="products pad" id="products">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Danh mục sản phẩm</span><h2>Sản phẩm chính của chúng tôi</h2><p>VUA Bao Bì cung cấp giải pháp bao bì toàn diện, đáp ứng mọi nhu cầu đóng gói cho doanh nghiệp — tối ưu chi phí, giá cả cạnh tranh, chất lượng vượt trội.</p></div>
    <div class="pgrid">
      <article class="pcard rv"><div class="pb"><img class="pimg" src="<?php echo $u; ?>/assets/img/products/p0.jpg" alt="In ấn & SX túi nilon" onerror="this.style.display='none'"><svg viewBox="0 0 280 150" fill="none"><path d="M64 56h44l7 72H57z" fill="url(#gld)"/><path d="M78 56q8-15 18 0" stroke="#0D255C" stroke-width="3"/><path d="M114 48h52l7 80h-66z" fill="#EAF0FF"/><path d="M130 48q12-17 24 0" stroke="#0D255C" stroke-width="3"/><rect x="130" y="74" width="22" height="16" rx="2" fill="#F5B30B"/><path d="M172 60h40l6 66h-52z" fill="#6E8FD8"/><path d="M186 60q8-13 16 0" stroke="#EAF0FF" stroke-width="3"/></svg></div><div class="pcb"><h3>In ấn & SX túi nilon</h3><p>Sản xuất và in túi nilon: túi PE, HD, PP, OPP, CPP, túi shopping nhiều màu theo yêu cầu thương hiệu.</p><a href="<?php echo esc_url(vua_category_url('in-an-tui-nilon')); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div></article><article class="pcard rv" data-d="1"><div class="pb"><img class="pimg" src="<?php echo $u; ?>/assets/img/products/p1.jpg" alt="Túi vải không dệt" onerror="this.style.display='none'"><svg viewBox="0 0 280 150" fill="none"><rect x="96" y="52" width="92" height="80" rx="4" fill="#EAF0FF"/><path d="M114 52q28-34 56 0" stroke="#0D255C" stroke-width="5" fill="none"/><rect x="120" y="78" width="44" height="28" rx="3" fill="url(#gld)"/><text x="142" y="98" font-family="Oswald" font-size="14" font-weight="700" fill="#0D255C" text-anchor="middle">LOGO</text></svg></div><div class="pcb"><h3>Túi vải không dệt</h3><p>Túi vải canvas, tote bag, không dệt bền chắc, in logo sắc nét, cung cấp số lượng lớn.</p><a href="<?php echo esc_url(vua_category_url('tui-vai-khong-det')); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div></article><article class="pcard rv" data-d="2"><div class="pb"><img class="pimg" src="<?php echo $u; ?>/assets/img/products/p2.jpg" alt="Xốp bọc hàng" onerror="this.style.display='none'"><svg viewBox="0 0 280 150" fill="none"><rect x="120" y="56" width="74" height="66" rx="3" fill="url(#gld)"/><path d="M120 56h74M157 56v66" stroke="#C98A06" stroke-width="2"/><g fill="#EAF0FF"><circle cx="70" cy="60" r="6"/><circle cx="86" cy="60" r="6"/><circle cx="70" cy="76" r="6"/><circle cx="86" cy="76" r="6"/><circle cx="70" cy="92" r="6"/><circle cx="86" cy="92" r="6"/><circle cx="70" cy="108" r="6"/><circle cx="86" cy="108" r="6"/></g></svg></div><div class="pcb"><h3>Xốp bọc hàng</h3><p>Xốp PE foam, bubble wrap, màng PE, màng co, carton đóng gói — bảo vệ hàng hoá tối ưu.</p><a href="<?php echo esc_url(vua_category_url('xop-boc-hang')); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div></article><article class="pcard rv" data-d="3"><div class="pb"><img class="pimg" src="<?php echo $u; ?>/assets/img/products/p3.jpg" alt="Dây rút – thít nhựa" onerror="this.style.display='none'"><svg viewBox="0 0 280 150" fill="none"><ellipse cx="110" cy="92" rx="36" ry="32" fill="#EAF0FF"/><ellipse cx="110" cy="92" rx="13" ry="11" fill="#0D255C"/><ellipse cx="172" cy="80" rx="30" ry="27" fill="url(#gld)"/><ellipse cx="172" cy="80" rx="11" ry="9" fill="#0D255C"/><path d="M62 122q44-22 92 0" stroke="#9fb2e0" stroke-width="4" fill="none"/></svg></div><div class="pcb"><h3>Dây rút – thít nhựa</h3><p>Dây rút nhựa, lạt nhựa, băng keo, màng quấn pallet đa dạng kích thước, sẵn hàng số lượng lớn.</p><a href="<?php echo esc_url(vua_category_url('day-rut-thit-nhua')); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div></article><article class="pcard rv"><div class="pb"><img class="pimg" src="<?php echo $u; ?>/assets/img/products/p4.jpg" alt="Túi zipper" onerror="this.style.display='none'"><svg viewBox="0 0 280 150" fill="none"><path d="M104 48h72v74q-36 12-72 0z" fill="#EAF0FF"/><rect x="104" y="48" width="72" height="11" fill="url(#gld)"/><path d="M108 53h64" stroke="#C98A06" stroke-width="2" stroke-dasharray="3 3"/><rect x="120" y="76" width="40" height="26" rx="3" fill="#F5B30B" opacity=".55"/></svg></div><div class="pcb"><h3>Túi zipper</h3><p>Túi zipper bạc, kraft, zipper thực phẩm: chỉ đỏ, 8 cạnh, đứng đáy… đa dạng quy cách.</p><a href="<?php echo esc_url(vua_category_url('tui-zipper')); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div></article><article class="pcard rv" data-d="1"><div class="pb"><img class="pimg" src="<?php echo $u; ?>/assets/img/products/p5.jpg" alt="Túi hút chân không" onerror="this.style.display='none'"><svg viewBox="0 0 280 150" fill="none"><rect x="98" y="50" width="84" height="74" rx="5" fill="#EAF0FF"/><rect x="98" y="50" width="84" height="11" fill="url(#gld)"/><g fill="#6E8FD8"><circle cx="125" cy="88" r="9"/><circle cx="148" cy="96" r="11"/><circle cx="160" cy="78" r="8"/></g></svg></div><div class="pcb"><h3>Túi hút chân không</h3><p>Bao hút chân không đựng thực phẩm: 1 mặt nhám, 2 mặt nhám, 2 mặt trơn — giữ tươi lâu.</p><a href="<?php echo esc_url(vua_category_url('tui-hut-chan-khong')); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div></article><article class="pcard rv" data-d="2"><div class="pb"><img class="pimg" src="<?php echo $u; ?>/assets/img/products/p6.jpg" alt="Túi nhôm – in không trục" onerror="this.style.display='none'"><svg viewBox="0 0 280 150" fill="none"><path d="M158 56h40v66h-40z" fill="#EAF0FF"/><path d="M158 56h40l-10-14h-20z" fill="#9fb2e0"/><path d="M116 60h40l-5 62h-30z" fill="url(#gld)"/><rect x="112" y="52" width="48" height="9" rx="3" fill="#C98A06"/><rect x="124" y="80" width="24" height="20" rx="2" fill="#fff" opacity=".85"/></svg></div><div class="pcb"><h3>Túi nhôm – in không trục</h3><p>Hộp giấy kraft, ly giấy, túi giấy cao cấp và các sản phẩm bao bì giấy in ấn tinh tế.</p><a href="<?php echo esc_url(vua_category_url('tui-nhom-in-khong-truc')); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div></article><article class="pcard rv" data-d="3"><div class="pb"><img class="pimg" src="<?php echo $u; ?>/assets/img/products/p7.jpg" alt="Túi nhựa PVC" onerror="this.style.display='none'"><svg viewBox="0 0 280 150" fill="none"><path d="M108 60h74v58h-74z" fill="rgba(234,240,255,.16)" stroke="#EAF0FF" stroke-width="2"/><path d="M108 60l16-13h74l-16 13M182 60l16-13v58l-16 13" fill="rgba(234,240,255,.1)" stroke="#EAF0FF" stroke-width="2"/><path d="M108 118l16-13h74M198 105v-45" stroke="#EAF0FF" stroke-width="2" opacity=".5"/></svg></div><div class="pcb"><h3>Túi nhựa PVC</h3><p>Hộp nhựa PVC trong suốt, packaging mỹ phẩm, đa dạng kích thước & màu sắc cho nhiều mục đích.</p><a href="<?php echo esc_url(vua_category_url('tui-nhua-pvc')); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div></article>
    </div>
  </div>
</section>

<!-- ===== WHY ===== -->
<section class="why pad" id="why">
  <div class="wrap">
    <div class="shead rv"><span class="kick" style="color:var(--gold-lt)">Vì sao nên chọn</span><h2>Tại sao nên chọn VUA Bao Bì?</h2></div>
    <div class="wgrid">
      <div class="wcard rv"><div class="wtop"><span class="wnum">01</span><span class="wicon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M12 2a3 3 0 0 0-3 3v1H7a2 2 0 0 0-2 2v3a7 7 0 0 0 14 0V8a2 2 0 0 0-2-2h-2V5a3 3 0 0 0-3-3z"/><path d="M9 18v3h6v-3"/></svg></span></div><h3>Đầu tư công nghệ hiện đại</h3><p>Dây chuyền & máy móc hiện đại, tự động hoá, kiểm soát chất lượng nghiêm ngặt từng công đoạn.</p></div>
      <div class="wcard rv" data-d="1"><div class="wtop"><span class="wnum">02</span><span class="wicon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13A4 4 0 0 1 16 11"/></svg></span></div><h3>Đội ngũ uy tín & tận tâm</h3><p>Kỹ sư & nhân sự giàu kinh nghiệm, hỗ trợ tận tình, đồng hành cùng khách hàng đến cùng.</p></div>
      <div class="wcard rv" data-d="2"><div class="wtop"><span class="wnum">03</span><span class="wicon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span></div><h3>Chất lượng – giá thành tối ưu</h3><p>Sản phẩm đạt chất lượng cao với mức giá cạnh tranh nhất, tối ưu chi phí cho doanh nghiệp.</p></div>
      <div class="wcard rv" data-d="3"><div class="wtop"><span class="wnum">04</span><span class="wicon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M2 20h20M4 20V8l5-3 5 3M14 20V11l5-3v12M8 11h2M8 15h2"/></svg></span></div><h3>Năng lực sản xuất lớn</h3><p>Nhà xưởng 5.000m², công suất lớn, đáp ứng mọi đơn hàng trong và ngoài nước, đúng tiến độ.</p></div>
    </div>
  </div>
</section>

<!-- ===== ABOUT ===== -->
<section class="about pad" id="about">
  <div class="wrap">
    <div class="amedia rv">
      <div class="aframe">
        <img class="aimg" src="<?php echo $u; ?>/assets/img/factory.jpg" alt="Nhà xưởng sản xuất bao bì VUA" onerror="this.style.display='none'">
        <svg viewBox="0 0 560 420" xmlns="http://www.w3.org/2000/svg">
          <rect width="560" height="420" fill="#0D255C"/>
          <g opacity=".9">
            <!-- sawtooth roof -->
            <path d="M40 150 l60 -50 v50 z M120 150 l60 -50 v50 z M200 150 l60 -50 v50 z M280 150 l60 -50 v50 z M360 150 l60 -50 v50 z M440 150 l60 -50 v50 z" fill="#1A3C86"/>
            <rect x="40" y="150" width="480" height="200" fill="#16357C"/>
            <!-- windows -->
            <g fill="#244BA0"><rect x="70" y="180" width="60" height="40"/><rect x="160" y="180" width="60" height="40"/><rect x="250" y="180" width="60" height="40"/><rect x="340" y="180" width="60" height="40"/><rect x="430" y="180" width="60" height="40"/></g>
            <!-- machine / printing press -->
            <rect x="120" y="250" width="150" height="80" rx="6" fill="#244BA0"/>
            <circle cx="150" cy="290" r="18" fill="#0D255C" stroke="#FFD24D" stroke-width="3"/>
            <circle cx="240" cy="290" r="18" fill="#0D255C" stroke="#FFD24D" stroke-width="3"/>
            <rect x="170" y="282" width="50" height="16" fill="#FFD24D"/>
            <!-- conveyor boxes -->
            <rect x="300" y="300" width="180" height="10" fill="#244BA0"/>
            <rect x="320" y="276" width="28" height="24" fill="url(#gld)"/><rect x="370" y="276" width="28" height="24" fill="url(#gld)"/><rect x="420" y="276" width="28" height="24" fill="url(#gld)"/>
            <!-- floor -->
            <rect x="0" y="350" width="560" height="70" fill="#0A1F4E"/>
          </g>
        </svg>
        <a class="play" href="#" aria-label="Xem video"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></a>
      </div>
      <div class="abadge"><b>25+</b><span>Năm kinh nghiệm</span></div>
    </div>
    <div class="atext rv" data-d="1">
      <span class="kick">Về chúng tôi</span>
      <h2>Công ty Cổ phần<br>VUA Đóng Gói Việt Nam</h2>
      <p class="d">Với hơn 25 năm kinh nghiệm trong lĩnh vực sản xuất & in ấn bao bì công nghiệp, VUA Bao Bì không chỉ là nhà cung cấp, mà còn là đối tác tin cậy, đồng hành cùng hàng ngàn doanh nghiệp.</p>
      <p class="d">Chúng tôi sở hữu nhà xưởng hiện đại, đội ngũ chuyên môn cao và quy trình quản lý đạt chuẩn ISO 9001:2015, đảm bảo sản phẩm luôn đạt tiêu chuẩn cao nhất.</p>
      <ul>
        <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Nhà xưởng hiện đại 5.000m², dây chuyền tự động hoá</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Đạt chứng nhận ISO 9001:2015 & RoHS</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Đối tác của hơn 500+ KH trong và ngoài nước</li>
      </ul>
      <a href="#about" class="btn btn-gold">Xem thêm về chúng tôi</a>
    </div>
  </div>
</section>

<!-- ===== PROCESS ===== -->
<section class="process pad" id="process">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Quy trình làm việc</span><h2>Đặt hàng chỉ với 4 bước</h2></div>
    <div class="steps">
      <div class="step rv"><div class="scircle"><span class="n">1</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div><h3>Tư vấn</h3><p>Tiếp nhận yêu cầu, tư vấn giải pháp & báo giá chi tiết phù hợp nhu cầu.</p></div>
      <div class="step rv" data-d="1"><div class="scircle"><span class="n">2</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h4"/></svg></div><h3>Báo giá</h3><p>Gửi báo giá nhanh chóng, rõ ràng — cạnh tranh để tối ưu chi phí.</p></div>
      <div class="step rv" data-d="2"><div class="scircle"><span class="n">3</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M2 20h20M4 20V8l5-3 5 3M14 20V11l5-3v12"/></svg></div><h3>Sản xuất</h3><p>Sản xuất theo tiêu chuẩn chất lượng cao, kiểm tra QC, đúng tiến độ cam kết.</p></div>
      <div class="step rv" data-d="3"><div class="scircle"><span class="n">4</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div><h3>Giao hàng</h3><p>Kiểm tra chất lượng và giao hàng tận nơi trên toàn quốc.</p></div>
    </div>
  </div>
</section>

<!-- ===== QUOTE FORM ===== -->
<section class="quote pad" id="quote">
  <div class="qbg" style="background-image:url('<?php echo $u; ?>/assets/img/quotebg.jpg')"></div>
  <div class="wrap">
    <div class="qleft rv">
      <span class="kick" style="color:var(--gold-lt)">Báo giá nhanh</span>
      <h2 class="gtext">Để lại số điện thoại,<br>chúng tôi gọi lại ngay</h2>
      <ul class="qperks">
        <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Báo giá nhanh chỉ sau 5 phút – Tư vấn giải pháp bao bì tối ưu</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Tư vấn 1:1 bởi đội ngũ chuyên gia bao bì</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Nhận mẫu miễn phí & hỗ trợ khảo sát tận nơi</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Miễn phí vận chuyển cho đơn hàng số lượng lớn</li>
      </ul>
      <div class="qforklift">
        <svg viewBox="0 0 260 170" xmlns="http://www.w3.org/2000/svg">
          <rect x="150" y="40" width="14" height="100" fill="#FFD24D"/>
          <rect x="60" y="70" width="80" height="55" rx="6" fill="#244BA0"/>
          <rect x="74" y="40" width="52" height="36" rx="5" fill="#16357C" stroke="#FFD24D" stroke-width="2"/>
          <path d="M164 130 h60 v10 h-60 z" fill="#FFD24D"/>
          <rect x="180" y="60" width="44" height="34" fill="#E0A516"/>
          <rect x="180" y="96" width="44" height="34" fill="url(#gld)"/>
          <circle cx="90" cy="140" r="20" fill="#0A1F4E" stroke="#FFD24D" stroke-width="4"/>
          <circle cx="140" cy="140" r="20" fill="#0A1F4E" stroke="#FFD24D" stroke-width="4"/>
          <circle cx="90" cy="140" r="6" fill="#FFD24D"/><circle cx="140" cy="140" r="6" fill="#FFD24D"/>
        </svg>
      </div>
    </div>
    <div class="qform rv" data-d="1">
      <form id="leadForm" novalidate>
        <h3>Yêu cầu báo giá</h3>
        <div class="frow">
          <div class="fg"><label>Họ và tên <i>*</i></label><input id="name" placeholder="Nhập họ và tên"><span class="ferr">Vui lòng nhập họ tên.</span></div>
          <div class="fg"><label>Số điện thoại <i>*</i></label><input id="phone" placeholder="<?php echo esc_html( vua_opt('phone') ); ?>"><span class="ferr">SĐT chưa hợp lệ.</span></div>
        </div>
        <div class="fg"><label>Email (nếu có)</label><input id="email" placeholder="name@example.com"></div>
        <div class="fg"><label>Nhu cầu / Loại sản phẩm <i>*</i></label>
          <select id="prod"><option value="">VD: Thùng carton 5 lớp, Túi PP dệt…</option>
            <option>Bao bì PP dệt</option><option>Thùng carton</option><option>Túi nilon / PE</option><option>Túi vải không dệt</option><option>Túi zipper</option><option>Túi hút chân không</option><option>Màng PE / xốp bọc</option><option>Khác</option></select>
          <span class="ferr">Vui lòng chọn nhu cầu.</span></div>
        <button type="submit" class="btn btn-gold"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m22 2-7 20-4-9-9-4z"/><path d="M22 2 11 13"/></svg>Gửi yêu cầu báo giá</button>
      </form>
      <div class="qok" id="qok"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg><h3>Đã gửi thành công!</h3><p>Cảm ơn quý khách, chúng tôi sẽ gọi lại trong giây lát.</p></div>
    </div>
  </div>
</section>

<!-- ===== TESTIMONIALS ===== -->
<section class="pad">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Khách hàng nói về chúng tôi</span><h2>Đối tác của chúng tôi</h2></div>
    <div class="tgrid">
      <div class="tcard rv"><div class="tstars"><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg></div><p>Chất lượng sản phẩm ổn định, in ấn sắc nét, giao hàng đúng hẹn, giá cả tốt. Đối tác tin cậy lâu năm đồng hành cùng chúng tôi.</p><div class="tauthor"><div class="tav">H</div><div><b>Nguyễn Hoàng</b><span>Giám đốc mua hàng – Công ty thực phẩm ABC</span></div></div></div>
      <div class="tcard rv" data-d="1"><div class="tstars"><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg></div><p>Dịch vụ tư vấn rất chuyên nghiệp, mẫu mã đa dạng, giá cả cạnh tranh. Tôi rất hài lòng về hợp tác lâu dài với VUA Bao Bì.</p><div class="tauthor"><div class="tav">O</div><div><b>Nguyễn Thị Oanh</b><span>Trưởng phòng thu mua – Công ty bao bì XYZ</span></div></div></div>
      <div class="tcard rv" data-d="2"><div class="tstars"><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg><svg viewBox="0 0 24 24"><path d="m12 2 3 7h7l-5.5 4 2 7L12 16l-6.5 4 2-7L2 9h7z"/></svg></div><p>Đội ngũ hỗ trợ nhiệt tình, xử lý đơn hàng nhanh chóng. Sản phẩm đạt tiêu chuẩn xuất khẩu, giao hàng toàn quốc rất ổn.</p><div class="tauthor"><div class="tav">V</div><div><b>Nguyễn Vân</b><span>Chủ cửa hàng – Công ty bao bì 123</span></div></div></div>
    </div>
  </div>
</section>

<!-- ===== CLIENTS ===== -->
<section class="clients pad">
  <div class="wrap">
    <div class="shead rv"><h2>Hơn 500 doanh nghiệp đồng hành</h2></div>
    <div class="clogos">
      <div class="clogo rv">Vinamilk</div>
      <div class="clogo rv">TH true MILK</div>
      <div class="clogo rv">Trung Nguyên</div>
      <div class="clogo rv">Acecook</div>
      <div class="clogo rv">Masan</div>
      <div class="clogo rv">Sabeco</div>
      <div class="clogo rv">Vinacafé</div>
      <div class="clogo rv">Kinh Đô</div>
      <div class="clogo rv">Tân Hiệp Phát</div>
      <div class="clogo rv">Habeco</div>
    </div>
  </div>
</section>


<!-- ===== BLOG (WordPress posts) ===== -->
<section class="pad" id="blog" style="background:var(--gray)">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Tin tức</span><h2>Kiến thức ngành bao bì</h2></div>
    <div class="bgrid">
      <?php
      $vua_bq = new WP_Query(array('post_type'=>'post','posts_per_page'=>3,'ignore_sticky_posts'=>1));
      if ( $vua_bq->have_posts() ):
        while ( $vua_bq->have_posts() ): $vua_bq->the_post();
          $vc = get_the_category(); $vcat = $vc ? $vc[0]->name : 'Tin tức';
          $vth = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(),'large') : $u.'/assets/img/products/p6.jpg';
      ?>
      <article class="bcard rv" onclick="location.href='<?php the_permalink(); ?>'">
        <div class="bthumb"><img class="bimg" src="<?php echo esc_url($vth); ?>" alt="<?php the_title_attribute(); ?>"><span class="bcat"><?php echo esc_html($vcat); ?></span></div>
        <div class="bcb"><h3><?php the_title(); ?></h3>
          <div class="bmeta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg><?php echo esc_html( get_the_date('d/m/Y') ); ?></span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>5 phút đọc</span>
          </div>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); else:
        $vdef = array(
          array('Bao bì giấy','Tổng quan về các loại giấy in bao bì phổ biến hiện nay','products/p6.jpg'),
          array('Bao bì nhựa','Túi zipper đựng thực phẩm: giải pháp tiện lợi & an toàn','products/p0.jpg'),
          array('Bao bì PP dệt','Tiêu chuẩn xuất khẩu bao PP dệt cần lưu ý khi sản xuất','products/p3.jpg'),
        );
        foreach($vdef as $vd): ?>
      <article class="bcard rv">
        <div class="bthumb"><img class="bimg" src="<?php echo $u; ?>/assets/img/<?php echo $vd[2]; ?>" alt="<?php echo esc_attr($vd[0]); ?>"><span class="bcat"><?php echo esc_html($vd[0]); ?></span></div>
        <div class="bcb"><h3><?php echo esc_html($vd[1]); ?></h3>
          <div class="bmeta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>17/06/2024</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>5 phút đọc</span>
          </div>
        </div>
      </article>
      <?php endforeach; endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
