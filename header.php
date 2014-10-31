<!doctype html>
<html class="no-js" lang="en">
   <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      <?php if (function_exists('is_tag') && is_tag()) {
        single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
      } elseif (is_archive()) {
        wp_title(''); echo ' - ';
      } elseif (is_search()) {
        echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
      } elseif (!(is_404()) && (is_single()) || (is_page())) {
        wp_title(''); echo '  ';
      } elseif (is_404()) {
        echo 'Not Found - ';
      }
      if (is_home()) {
        bloginfo('name'); echo ' - '; bloginfo('description');
      } else {
        bloginfo('name');
      }
      if ($paged > 1) {
        echo ' - page '. $paged;
      } ?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri();?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/fonts/foundation-icons/foundation-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/fonts/opensans/stylesheet.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/foundation.css" />
    <script src="<?php echo get_template_directory_uri();?>/js/vendor/modernizr.js"></script>
  <?php wp_head();?>
  </head>
  <body <?php body_class();?>>
  <div class="off-canvas-wrap">
  <div class="inner-wrap">

  <nav class="tab-bar show-for-small-only">
    <section class="left-small">
      <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
    </section>
    <section class="middle tab-bar-section">
      
      <h1 class="title"><?php bloginfo( 'name' ); ?></h1>

    </section>
  </nav>

  <aside class="left-off-canvas-menu">
    <?php foundationPress_mobile_off_canvas(); ?>
  </aside>
  
        <div class="top-bar-container contain-to-grid show-for-medium-up">
            <nav class="top-bar" data-topbar="">
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="<?php echo home_url();?>"><img class="logo" src="<?php echo get_template_directory_uri();?>/images/bajunesia.png"></a></h1>
                    </li>          
                </ul>
                <section class="top-bar-section">
                    <?php foundationPress_top_bar_l(); ?>
                    <?php foundationPress_top_bar_r(); ?>
                </section>
            </nav>
        </div>