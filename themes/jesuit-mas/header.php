<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri('/images/favicons/apple-touch-icon.png')?>" sizes="180x180">
    <link rel="icon" href="<?php echo get_theme_file_uri('/images/favicons/favicon-32x32.png')?>" sizes="32x32" type="image/png">
    <link rel="icon" href="<?php echo get_theme_file_uri('/images/favicons/favicon-16x16.png')?>" sizes="16x16" type="image/png">
    <link rel="manifest" href="<?php echo get_theme_file_uri('/images/favicons/manifest.json')?>">
    <link rel="mask-icon" href="<?php echo get_theme_file_uri('/images/favicons/safari-pinned-tab.svg')?>" color="#7952b3">
    <link rel="icon" href="<?php echo get_theme_file_uri('/images/favicons/favicon.ico')?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site-header">
    <nav class="navbar-expand-lg main-navbar shadow-sm" aria-label="Main navigation">
        <div class="container main-navbar-container">
            <a class="navbar-brand me-auto" href="<?php echo site_url();?>">
                <img src="<?php echo get_theme_file_uri('/images/mas-logo.png')?>" class="site-header--mas-logo" alt="Jesuits of Malaysia-Singapore Region">
            </a>
            <button class="navbar-toggler p-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
              <div class="site-header--hamburger">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
              </div>              
            </button>
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav navbar-nav-custom">
                    <li class="nav-item"><a href="<?php echo site_url();?>" <?php if (!is_page()) {echo 'class="nav-link active"'; }else{ echo 'class="nav-link"';}?> >Home</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('/about-us');?>"  <?php if (is_page('about-us')) {echo 'class="nav-link active"'; }else{ echo 'class="nav-link"';}?> >About Us</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('/our-history/foundation');?>" <?php if (is_page('our-history') or wp_get_post_parent_id(0) == 186) {echo 'class="nav-link active"'; }else{ echo 'class="nav-link"';}?>>Our History</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('/mission/spirituality');?>" <?php if (is_page('mission') or wp_get_post_parent_id(0) == 331) {echo 'class="nav-link active"'; }else{ echo 'class="nav-link"';}?>>Mission</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('/vocation');?>" <?php if (is_page('vocation')) {echo 'class="nav-link active"'; }else{ echo 'class="nav-link"';}?>>Vocation</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('/offering');?>" <?php if (is_page('offering')) {echo 'class="nav-link active"'; }else{ echo 'class="nav-link"';}?>>Offering</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('/contact-us');?>" <?php if (is_page('contact-us')) {echo 'class="nav-link active"'; }else{ echo 'class="nav-link"';}?> >Contact Us</a></li>
                </ul>
            </div>
        </div>
      </nav>
</div>