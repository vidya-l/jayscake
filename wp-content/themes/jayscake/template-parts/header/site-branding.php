<?php
/*
* Display Logo and nav
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="rtl-cl col-lg-4 col-md-4 align-self-center px-md-0">
        <span class="currency">
          <?php if(class_exists('WOOCS')){ ?>
            <?php if(get_theme_mod('jays_cake_currency_switcher',false) != ''){ ?>
              <?php echo do_shortcode('[woocs]');?>
            <?php }?>
          <?php }?>
        </span>
        <span class="translate-btn">
           <?php if(get_theme_mod('jays_cake_cart_language_translator',false) != ''){ ?>
            <?php echo do_shortcode('[google-translator]'); ?>
          <?php }?>
        </span>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center">
        <?php $jays_cake_logo_settings = get_theme_mod( 'jays_cake_logo_settings','Different Line');
          if($jays_cake_logo_settings == 'Different Line'){ ?>
            <div class="logo mb-md-0 text-center">
              <?php if( has_custom_logo() ) jays_cake_the_custom_logo(); ?>
              <?php if(get_theme_mod('jays_cake_site_title',true) == 1){ ?>
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php }?>
              <?php $jays_cake_description = get_bloginfo( 'description', 'display' );
              if ( $jays_cake_description || is_customize_preview() ) : ?>
                <?php if(get_theme_mod('jays_cake_site_tagline',false)){ ?>
                  <p class="site-description mb-0"><?php echo esc_html($jays_cake_description); ?></p>
                <?php }?>
              <?php endif; ?>
            </div>
          <?php }else if($jays_cake_logo_settings == 'Same Line'){ ?>
            <div class="logo logo-same-line mb-md-0 text-center text-lg-left">
              <div class="row">
                <div class="col-lg-5 col-md-5 align-self-md-center">
                  <?php if( has_custom_logo() ) jays_cake_the_custom_logo(); ?>
                </div>
                <div class="col-lg-7 col-md-7 align-self-md-center">
                  <?php if(get_theme_mod('jays_cake_site_title',true) == 1){ ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php }?>
                    <?php $jays_cake_description = get_bloginfo( 'description', 'display' );
                    if ( $jays_cake_description || is_customize_preview() ) : ?>
                    <?php if(get_theme_mod('jays_cake_site_tagline',false)){ ?>
                      <p class="site-description mb-0"><?php echo esc_html($jays_cake_description); ?></p>
                    <?php }?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php }?>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center px-0">
        <div class="header-details">
          <?php if(get_theme_mod('jays_cake_user_icon',true) != ''){ ?>
            <p class="mb-0">
              <?php if(class_exists('woocommerce')){ ?>
                <?php if (is_user_logged_in()) : ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-out-alt px-lg-2"></i><?php esc_html_e( 'Logout', 'jays-cake' ); ?></a>
                <?php else : ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="far fa-user px-lg-2"></i><?php esc_html_e( 'Login', 'jays-cake' ); ?></a>
                <?php endif;?>
              <?php } ?>
            </p>
          <?php }?>
           <?php if(get_theme_mod('jays_cake_cart_icon',true) != ''){ ?>
            <p class="mb-0">
              <?php if(class_exists('woocommerce')){ ?>
              <span class="cartbox"><a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-basket px-lg-2"></i><span class="cart-value simplep"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></span><?php esc_html_e( 'Shopping Cart', 'jays-cake' ); ?></a>   
              </span>
              <?php } ?>
            </p>
          <?php } ?>
          <?php if(class_exists('YITH_WCWL')){ ?>
            <p class="mb-0"><i class="far fa-heart px-lg-2"></i><a href="<?php echo esc_url(home_url('/index.php/wishlist')); ?>"><?php esc_html_e( 'Wishlist', 'jays-cake' ); ?></a></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>