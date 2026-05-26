<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<linearGradient id="gld" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#FFE08A"/><stop offset=".5" stop-color="#FFD24D"/><stop offset="1" stop-color="#F5B30B"/></linearGradient>
<linearGradient id="gldb" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#FFD24D"/><stop offset="1" stop-color="#F5B30B"/></linearGradient>
</defs></svg>
<header id="header"><div class="wrap"><nav class="nav">
  <a href="<?php echo esc_url( home_url('/') ); ?>" class="logo"><span class="brandmark"></span><b>VUA<small>BAO BÌ CÔNG NGHIỆP</small></b></a>
  <?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'menu_class'=>'menu','items_wrap'=>'<ul id="menu" class="menu">%3$s</ul>','fallback_cb'=>'vua_menu_fallback','depth'=>1)); ?>
  <div class="nav-r">
    <a href="tel:<?php echo esc_attr( vua_tel() ); ?>" class="hphone"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg></span><b><?php echo esc_html( vua_opt('phone') ); ?></b></a>
    <a href="#quote" class="btn btn-gold">Báo giá ngay</a>
    <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
  </div>
</nav></div></header>
