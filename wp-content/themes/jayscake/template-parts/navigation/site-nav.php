<?php
/*
* Display Theme menus
 */
?>

<?php
$jays_cake_sticky = get_theme_mod('jays_cake_sticky');
    $jays_cake_data_sticky = "false";
    if ($jays_cake_sticky) {
    $jays_cake_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="innermenuboxupper <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($jays_cake_data_sticky); ?>">
	<div class="container">
		<div class="innermenubox">
			<div class="row">
				<div class="col-lg-3 col-md-5 col-sm-4  align-self-center px-0">
					 <?php if(class_exists('woocommerce')){ ?>
			          <button class="category-btn"><i class="fa fa-bars" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('jays_cake_category_text','Select Category','jays-cake')); ?><i class="fas fa-chevron-down"></i></button>
			          <div class="category-dropdown">
			            <?php
			              $args = array(
			                'number'     => get_theme_mod('jays_cake_product_category_number'),
			                'orderby'    => 'title',
			                'order'      => 'ASC',
			                'hide_empty' => 0,
			                'parent'  => 0
			              );
			              $product_categories = get_terms( 'product_cat', $args );
			              $count = count($product_categories);
			              if ( $count > 0 ){
			                foreach ( $product_categories as $product_category ) {
			                  $jays_cake_cat_id   = $product_category->term_id;
			                  $cat_link = get_category_link( $jays_cake_cat_id );
			                  if ($product_category->category_parent == 0) { ?>
			                <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
			                <?php
			              	}
			                echo esc_html( $product_category->name ); ?></a></li>
			                <?php
			                }
			              }
            			?>
          			</div>
        			<?php }?>
				</div>
				<div class="col-lg-6 col-md-2 col-sm-4 col-4 align-self-center">
					<div class="toggle-nav mobile-menu">
						<button onclick="jays_cake_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','jays-cake'); ?></span></button>
					</div>
					<div id="mySidenav" class="nav sidenav">
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'jays-cake' ); ?>">
					      	<?php 
				          	wp_nav_menu( array(
				                'theme_location' => 'primary-menu',
				                'container_class' => 'main-menu clearfix' ,
				                'menu_class' => 'clearfix',
				                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                'fallback_cb' => 'wp_page_menu',
					          	) );
					      	?>
							<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="jays_cake_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','jays-cake'); ?></span></a>
						</nav>
					</div>
				</div>
				<div class="product-search col-lg-3 col-md-5 col-sm-4 col-8 align-self-center">
					<?php if(get_theme_mod('jays_cake_search_icon',true) != ''){ ?>
			          <div class="search_inner my-3 my-md-0">
			            <?php if(class_exists('woocommerce')){ ?>
			              <?php get_product_search_form(); ?>
			            <?php }?>
			          </div>
			        <?php }?>
				</div>
    		</div>
		</div>
	</div>
</div>
