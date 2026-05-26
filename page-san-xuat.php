<?php
/** Template Name: Sản xuất */
get_header();
$u = get_template_directory_uri();
?>

<!-- HERO -->
<section class="lp-hero">
  <div class="lp-hero-bg"></div>
  <div class="wrap">
    <nav class="sp-crumbs rv lp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Sản xuất</b></nav>
    <div class="lp-hero-body">
      <span class="kick rv">Năng lực sản xuất</span>
      <h1 class="rv" data-d="1">Nhà máy sản xuất<br><span class="gtext">bao bì VUA</span></h1>
      <p class="lp-hero-lead rv" data-d="2">Hệ thống nhà xưởng hiện đại, dây chuyền tự động hóa cao — đảm bảo chất lượng và sản lượng cho mọi đơn hàng lớn nhỏ.</p>
    </div>
  </div>
</section>

<!-- FACTORY OVERVIEW -->
<section class="pad">
  <div class="wrap">
    <div class="lp-split">
      <div class="lp-split-text rv">
        <span class="kick">Hệ thống nhà xưởng</span>
        <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
      </div>
      <div class="lp-split-visual rv" data-d="1">
        <div class="lp-stat-card lp-stat-card--gold">
          <div class="lp-stat-num"><b>5.000<small>m²</small></b></div>
          <div class="lp-stat-label">Diện tích nhà máy</div>
        </div>
        <div class="lp-stat-card">
          <div class="lp-stat-num"><b data-c="500" data-s="">0</b></div>
          <div class="lp-stat-label">Tấn sản phẩm/tháng</div>
        </div>
        <div class="lp-stat-card">
          <div class="lp-stat-num"><b data-c="100" data-s="%">0</b></div>
          <div class="lp-stat-label">Kiểm phẩm thành phẩm</div>
        </div>
        <div class="lp-stat-card lp-stat-card--gold">
          <div class="lp-stat-num"><b>ISO</b></div>
          <div class="lp-stat-label">9001:2015 Certified</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PRINTING TECH -->
<section class="pad lp-section-alt">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Công nghệ in ấn</span><h2>4 công nghệ in tiên tiến</h2><p>Đáp ứng mọi yêu cầu in ấn — từ đơn hàng số lượng lớn đến đơn nhỏ đổi mẫu nhanh.</p></div>
    <div class="lp-feature-grid lp-feature-grid--4">
      <article class="lp-feature rv">
        <div class="lp-feature-num">01</div>
        <h3>In ống đồng</h3>
        <p>1-8 màu, độ sắc nét cao, bám mực bền màu. Phù hợp đơn hàng số lượng lớn từ 10.000 sản phẩm trở lên.</p>
      </article>
      <article class="lp-feature rv" data-d="1">
        <div class="lp-feature-num">02</div>
        <h3>In offset</h3>
        <p>Chất lượng hình ảnh tinh tế, hiển thị màu Pantone chuẩn xác. Lý tưởng cho bao bì cao cấp, hộp giấy thương hiệu.</p>
      </article>
      <article class="lp-feature rv" data-d="2">
        <div class="lp-feature-num">03</div>
        <h3>In flexo</h3>
        <p>Tốc độ in cao, chi phí setup thấp. Tối ưu cho túi nilon, băng keo, bao bì màng mỏng.</p>
      </article>
      <article class="lp-feature rv" data-d="3">
        <div class="lp-feature-num">04</div>
        <h3>In không trục</h3>
        <p>Công nghệ kỹ thuật số — không cần làm khuôn/trục in. Phù hợp đơn nhỏ từ 100 cái, đổi mẫu nhanh, in thử mẫu.</p>
      </article>
    </div>
  </div>
</section>

<!-- EQUIPMENT -->
<section class="pad">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Máy móc thiết bị</span><h2>Dây chuyền sản xuất hiện đại</h2><p>Đầu tư máy móc nhập khẩu chính hãng từ Hàn Quốc, Đài Loan, Nhật Bản.</p></div>
    <div class="lp-eq-list">
      <div class="lp-eq rv">
        <div class="lp-eq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
        <div class="lp-eq-text"><h4>Dây chuyền dệt PP</h4><p>Nhập khẩu Đài Loan, công suất 50 tấn/tháng — bao PP dệt 50-100kg đạt tiêu chuẩn xuất khẩu.</p></div>
      </div>
      <div class="lp-eq rv" data-d="1">
        <div class="lp-eq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg></div>
        <div class="lp-eq-text"><h4>Máy thổi PE/HDPE</h4><p>Nhập khẩu Hàn Quốc — đa dạng độ dày 0.01-0.5mm, sản lượng 100.000 sản phẩm/ngày.</p></div>
      </div>
      <div class="lp-eq rv" data-d="2">
        <div class="lp-eq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 8v8a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V8a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3z"/><path d="M3 12h18"/></svg></div>
        <div class="lp-eq-text"><h4>Máy cán màng phức hợp</h4><p>5 lớp ghép — ghép màng nhôm/PET/PE chống thấm, chống tia UV, giữ hương vị thực phẩm.</p></div>
      </div>
      <div class="lp-eq rv" data-d="3">
        <div class="lp-eq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg></div>
        <div class="lp-eq-text"><h4>Hệ thống cắt - dập - may</h4><p>Tự động hóa cao — sản lượng 100.000 cái/ngày, cắt chính xác, may đường chỉ đều và bền.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- QC PROCESS -->
<section class="pad lp-section-alt">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Kiểm soát chất lượng</span><h2>3 cấp QC nghiêm ngặt</h2><p>Mỗi sản phẩm đều phải vượt qua hệ thống kiểm phẩm 3 lớp trước khi giao đến khách hàng.</p></div>
    <div class="lp-qc-grid">
      <div class="lp-qc rv">
        <div class="lp-qc-num">1</div>
        <h3>QC Nguyên liệu</h3>
        <p>Test độ dày, độ dai, độ bền kéo của hạt nhựa nhập khẩu. Loại bỏ ngay nguyên liệu không đạt chuẩn.</p>
      </div>
      <div class="lp-qc rv" data-d="1">
        <div class="lp-qc-num">2</div>
        <h3>QC Sản xuất</h3>
        <p>Lấy mẫu mỗi lô sản xuất, kiểm tra màu sắc Pantone, độ bám mực, kích thước, độ chính xác.</p>
      </div>
      <div class="lp-qc rv" data-d="2">
        <div class="lp-qc-num">3</div>
        <h3>QC Thành phẩm</h3>
        <p>Kiểm 100% sản phẩm trước khi đóng gói. Lập biên bản kiểm phẩm chi tiết cho từng đơn hàng.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="lp-cta-banner">
  <div class="wrap">
    <h2>Tham quan nhà máy của chúng tôi</h2>
    <p>Liên hệ đặt lịch tham quan để chứng kiến quy trình sản xuất chuyên nghiệp.</p>
    <div class="lp-cta-row">
      <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Đặt lịch tham quan</a>
      <a href="<?php echo esc_url(home_url('/quy-trinh/')); ?>" class="btn btn-line">Xem quy trình đặt hàng</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
