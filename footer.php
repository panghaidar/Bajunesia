<div class="large-12 columns footer">
  <div class="row foot">
    <div class="large-9 columns footer">
        <?php if ( function_exists('wp_nav_menu') ) { 
      wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'footer-menu', 'depth' => '4', 'show_home' => 'Home' ) ); }
      else {?>
  <ul>
  <li class="<?php if (is_home()) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo home_url(); ?>" title="Home">Home</a></li>
    <?php wp_list_pages('title_li=&sort_column=menu_order&depth=4');   ?>
  </ul>
    <?php } ?>
    </div>
    <div class="large-3 columns">
      <p class="copyright"><span class="theme"> Theme by </span><a href="http://www.kholis.net/">Kholis.net</a></p>
    </div>
  </div>
</div><!--end 12 footer-->
<!-- close the off-canvas menu -->
  <a class="exit-off-canvas"></a>
  </div><!--inner-wrap header -->
</div><!--end off-canvas-wrap header-->
    <script src="<?php echo get_template_directory_uri();?>/js/vendor/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <?php wp_footer();?>
  </body>
</html>