<?php get_header();?>  
<div class="large-12 columns breads">
  <div class="row">
      <?php if (function_exists('kholis_breadcrumbs')) kholis_breadcrumbs(); ?>
  </div>
</div><!--end breads-->
<div class="large-12 columns page">
<div class="row page">
<div class="large-9 columns pages">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
  <p class="desc"><?php the_content();?></p> 
    
     <?php endwhile; else: ?>
      <div class="search">
        <h2 class="center">Not Found</h2>
        <p class="center">Sorry, but you are looking for something that isn't here.</p>
      </div>
      <?php endif; ?> 
</div>
<?php get_sidebar();?>
</div>
</div><!--end large 12 main-product-->
<?php get_footer();?>