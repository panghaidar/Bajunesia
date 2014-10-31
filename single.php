<?php get_header();?>  
<div class="large-12 columns breads">
  <div class="row">
      <?php if (function_exists('kholis_breadcrumbs')) kholis_breadcrumbs(); ?>
  </div>
</div>
<div class="large-12 columns main-product">
  <div class="row product-single">
    <div class="large-9 columns content-product">
   
      <div class="row">
       <?php if (have_posts()) : while (have_posts()) : the_post(); ?>      
        <div class="large-7 columns product-display">
         <?php   
                  if ( has_post_thumbnail() ) {  
                    the_post_thumbnail();  
                    } 
                    else {
  echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumb.gif" alt="<?php the_title(); ?>"  />';
            }
                ?>
        </div>
        <div class="large-5 columns description">
          <dl class="tabs" data-tab>
            <dd class="active"><a href="#panel2-1">Deskripsi</a></dd>
            <dd><a href="#panel2-2">Review</a></dd>
          </dl>
          <div class="tabs-content">
            <div class="content active" id="panel2-1">
              <a href="<?php the_permalink();?>"><h2 class="title"><?php the_title();?></h2></a>
                  <p class="avaib">Availability: <span class="stock"><?php echo get_post_meta($post->ID, 'availability', true) ?></span></p>

                  <p class="desc"><?php the_content();?></p>
                  <ul class="button-group" style="width:100%;">
                    <li class="small button alert"><strike><?php echo get_post_meta($post->ID, 'harga', true) ?></strike></li>
                    <li class="small button success"><?php echo get_post_meta($post->ID, 'harga-diskon', true) ?></li>
                  </ul>
                  <a href="http://bajunesia.com/order-form/"style="color:#fff;"><button class="small  button ">PESAN!</button></a>
                  
            </div>
            <div class="content" id="panel2-2">
             <?php comments_template(); ?> 
            </div>
          </div>
</div><!--end 6 description-->
 <?php endwhile; else: ?>
      <div class="search">
        <h2 class="center">Not Found</h2>
        <p class="center">Sorry, but you are looking for something that isn't here.</p>
      </div>
      <?php endif; ?> 
      </div>
    </div><!--end 9 content product-->
<?php get_sidebar();?>
  </div><!--end row product simple-->
</div><!--end large 12 main-product-->
<?php get_footer();?>