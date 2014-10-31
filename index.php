<?php get_header();?>
<div class="large-12 columns main-product">
  <div class="row product">
   
    <div class="large-9 columns content-product">
       <div class="row slid">
      <aside class="sidebar-widgetx">
        <?php dynamic_sidebar("Slider"); ?>
      </aside>
  </div><!--end row slid-->
      <div class="row produx">
        <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-3">
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <li class="product">

     
          <a href="<?php the_permalink();?>">
            <?php   
                  if ( has_post_thumbnail() ) {  
                    the_post_thumbnail();  
                    } 
                    else {
  echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumb.gif" alt="<?php the_title(); ?>"  />';
            }
                ?>
          </a>
          <a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
          <ul class="button-group" style="width:100%;">
            <li><a href="<?php the_permalink();?>" class="small button tiny alert"><strike><?php echo get_post_meta($post->ID, 'harga', true) ?></strike></a></li>
            <li><a href="<?php the_permalink();?>" class="small button tiny "><?php echo get_post_meta($post->ID, 'harga-diskon', true) ?></a></li>
          </ul>
       

          </li>
          <?php endwhile; else: ?>
        </ul>
     
      <div class="search">
        <h2 class="center">Not Found</h2>
        <p class="center">Sorry, but you are looking for something that isn't here.</p>
      </div>
      <?php endif; ?>   

      </div>
      
  <?php
      include('wp-pagenavi.php');
      if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
    ?>
 
    </div><!--end 9 content product-->
<?php get_sidebar();?>
  </div>
</div><!--end large 12 main-product-->
<div class="large-12 columns product-pilihan">
  <div class="row">
    <div class="large-6 columns popular">
    </div>
    <div class="large-6 columns lain">
    </div>
  </div>
</div><!--end 12 column product pilihan-->
<?php get_footer();?>