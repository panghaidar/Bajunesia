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
         <a href="<?php the_permalink();?>"><?php   
                  if ( has_post_thumbnail() ) {  
                    the_post_thumbnail();  
                    } 
                    else {
  echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumb.gif" alt="<?php the_title(); ?>"  />';
            }
                ?></a>
        </div>
        <div class="large-5 columns description">
          <dl class="tabs" data-tab>
            <dd class="active"><a href="#panel2-1">Deskripsi</a></dd>
            <dd><a href="#panel2-2">Review</a></dd>
          </dl>
          <div class="tabs-content">
            <div class="content active" id="panel2-1">
              <a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
                  <p class="avaib">Availability: <span class="stock">In Stock</span></p>
                  <p class="desc"><?php echo get_the_catcharacter_excerpt(); ?>...</p>
                  <button class="small tiny button"> Harga: <?php echo get_post_meta($post->ID, 'harga', true) ?></button>
                  <button class="small tiny button success"> Diskon: <?php echo get_post_meta($post->ID, 'diskon', true) ?></button>
                  <button class="small  button alert"><a href="http://bajunesia.com/order-form/"style="color:#fff;">PESAN!</a></button>
                  <ul class="button-group" style="width:100%;">
                    <li>
                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
   target="_blank" alt="Share on Facebook" class="small button love [secondary alert success]">
   <i class="fi-social-facebook"></i>
                    </a>
                    </li>
                    <li><a href="http://twitter.com/share" rel='nofollow' title='Tweet This!' class="small button [secondary alert success]"><i class="fi-social-twitter"></i></a></li>
                    <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" onclick="javascript:window.open(this.href,   "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;" rel="nofollow" title="Share this on Google+" class="small button [secondary alert success]"><i class="fi-social-google-plus"></i></a></li> 
                   </ul>
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