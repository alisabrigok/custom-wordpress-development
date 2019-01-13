<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charSet="utf-8" />
    <meta
      name="description"
      content="<?php echo get_bloginfo( 'description' );?>"
    />
    <meta
      name="keywords"
      content="STC Pay, Digital Payments, Digital Wallet, about STC Pay"
    />
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link
      rel="icon"
      type="image/x-icon"
      sizes="16x16 32x32"
      href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon.ico"
    />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsoAUjJEkd17dakXlU69BIYwUtEH0jRfg"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/gmaps.js"></script>
    <?php wp_head();?>
  </head>
  </body>
    <div id="content-container">
      <div class="stc-gradient"></div>
      <div class="language">
        <div class="language__container" id="language-container">
          <img
            src="<?php echo get_bloginfo('template_directory'); ?>/images/lang-icon.png"
            alt="language icon"
            class="language__icon"
          />
          <div class="language__text">العربية</div>
        </div>
      </div>
      <header class="header">
        <nav class="header__menu">
          <!-- <a class="menu-item"> -->
            <?php wp_nav_menu( array( 
              'sort_column' => 'menu_order',
              'theme_location' => 'header-menu',
              'menu_class' => 'menu-item'
            ) ); ?>
          <!-- </a> -->
        </nav>
        <img class="header__logo" src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.png" />
      </header>
