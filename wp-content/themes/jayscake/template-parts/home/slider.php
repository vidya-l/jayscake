<?php
/**
 * Template part for displaying slider section
 *
 * @package Animal Pet Store
 * @subpackage jays_cake
 */

?>
<?php $jays_cake_static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'jays_cake_slider_arrows') != '') { ?>
  <section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $jays_cake_slide_pages = array();
      for ( $count = 1; $count <= 4; $count++ ) {
        $mod = intval( get_theme_mod( 'jays_cake_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $jays_cake_slide_pages[] = $mod;
        }
      }
      if( !empty($jays_cake_slide_pages) ) :
        $jays_cake_args = array(
          'post_type' => 'page',
          'post__in' => $jays_cake_slide_pages,
          'orderby' => 'post__in'
        );
        $jays_cake_query = new WP_Query( $jays_cake_args );
        if ( $jays_cake_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $jays_cake_query->have_posts() ) : $jays_cake_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
               <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'.$jays_cake_static_image.'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <?php if( get_theme_mod( 'jays_cake_slider_short_heading' ) != '' ) { ?>
                <h6><?php echo esc_html( get_theme_mod( 'jays_cake_slider_short_heading','' ) ); ?></h6>
              <?php } ?>
              <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
              <p><?php echo esc_html( wp_trim_words( get_the_content(), 20 ) );?></p>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Shop Now','jays-cake'); ?>  <i class="fas fa-shopping-basket"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Previous','jays-cake'); ?></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Next','jays-cake'); ?></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
