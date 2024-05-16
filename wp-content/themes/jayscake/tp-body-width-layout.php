<?php

	$jays_cake_tp_theme_css = "";

$jays_cake_theme_lay = get_theme_mod( 'jays_cake_tp_body_layout_settings','Full');
if($jays_cake_theme_lay == 'Container'){
$jays_cake_tp_theme_css .='body{';
	$jays_cake_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$jays_cake_tp_theme_css .='}';
$jays_cake_tp_theme_css .='@media screen and (max-width:575px){';
		$jays_cake_tp_theme_css .='body{';
			$jays_cake_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$jays_cake_tp_theme_css .='} }';
$jays_cake_tp_theme_css .='#slider .carousel-control-next{';
	$jays_cake_tp_theme_css .='right: 47%;';
$jays_cake_tp_theme_css .='}';
$jays_cake_tp_theme_css .='.page-template-front-page .menubar{';
	$jays_cake_tp_theme_css .='position: static;';
$jays_cake_tp_theme_css .='}';
$jays_cake_tp_theme_css .='.scrolled{';
	$jays_cake_tp_theme_css .='width: auto; left:0; right:0;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_theme_lay == 'Container Fluid'){
$jays_cake_tp_theme_css .='body{';
	$jays_cake_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$jays_cake_tp_theme_css .='}';
$jays_cake_tp_theme_css .='@media screen and (max-width:575px){';
		$jays_cake_tp_theme_css .='body{';
			$jays_cake_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$jays_cake_tp_theme_css .='} }';
$jays_cake_tp_theme_css .='.page-template-front-page .menubar{';
	$jays_cake_tp_theme_css .='width: 99%';
$jays_cake_tp_theme_css .='}';		
$jays_cake_tp_theme_css .='.scrolled{';
	$jays_cake_tp_theme_css .='width: auto; left:0; right:0;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_theme_lay == 'Full'){
$jays_cake_tp_theme_css .='body{';
	$jays_cake_tp_theme_css .='max-width: 100%;';
$jays_cake_tp_theme_css .='}';
}

$jays_cake_scroll_position = get_theme_mod( 'jays_cake_scroll_top_position','Right');
if($jays_cake_scroll_position == 'Right'){
$jays_cake_tp_theme_css .='#return-to-top{';
    $jays_cake_tp_theme_css .='right: 20px;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_scroll_position == 'Left'){
$jays_cake_tp_theme_css .='#return-to-top{';
    $jays_cake_tp_theme_css .='left: 20px;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_scroll_position == 'Center'){
$jays_cake_tp_theme_css .='#return-to-top{';
    $jays_cake_tp_theme_css .='right: 50%;left: 50%;';
$jays_cake_tp_theme_css .='}';
}

    
//Social icon Font size
$jays_cake_social_icon_fontsize = get_theme_mod('jays_cake_social_icon_fontsize');
	$jays_cake_tp_theme_css .='.media-links a i{';
$jays_cake_tp_theme_css .='font-size: '.esc_attr($jays_cake_social_icon_fontsize).'px;';
$jays_cake_tp_theme_css .='}';

// site title font size option
$jays_cake_site_title_font_size = get_theme_mod('jays_cake_site_title_font_size', 25);{
$jays_cake_tp_theme_css .='.logo h1 , .logo p a{';
	$jays_cake_tp_theme_css .='font-size: '.esc_attr($jays_cake_site_title_font_size).'px;';
$jays_cake_tp_theme_css .='}';
}

//site tagline font size option
$jays_cake_site_tagline_font_size = get_theme_mod('jays_cake_site_tagline_font_size', 15);{
$jays_cake_tp_theme_css .='.logo p{';
	$jays_cake_tp_theme_css .='font-size: '.esc_attr($jays_cake_site_tagline_font_size).'px;';
$jays_cake_tp_theme_css .='}';
}

// related post
$jays_cake_related_post_mob = get_theme_mod('jays_cake_related_post_mob', true);
$jays_cake_related_post = get_theme_mod('jays_cake_remove_related_post', true);
$jays_cake_tp_theme_css .= '.related-post-block {';
if ($jays_cake_related_post == false) {
    $jays_cake_tp_theme_css .= 'display: none;';
}
$jays_cake_tp_theme_css .= '}';
$jays_cake_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($jays_cake_related_post == false || $jays_cake_related_post_mob == false) {
    $jays_cake_tp_theme_css .= '.related-post-block { display: none; }';
}
$jays_cake_tp_theme_css .= '}';

// slider btn
$jays_cake_slider_buttom_mob = get_theme_mod('jays_cake_slider_buttom_mob', true);
$jays_cake_slider_button = get_theme_mod('jays_cake_slider_button', true);
$jays_cake_tp_theme_css .= '#slider .more-btn {';
if ($jays_cake_slider_button == false) {
    $jays_cake_tp_theme_css .= 'display: none;';
}
$jays_cake_tp_theme_css .= '}';
$jays_cake_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($jays_cake_slider_button == false || $jays_cake_slider_buttom_mob == false) {
    $jays_cake_tp_theme_css .= '#slider .more-btn { display: none; }';
}
$jays_cake_tp_theme_css .= '}';

//return to header mobile				
$jays_cake_return_to_header_mob = get_theme_mod('jays_cake_return_to_header_mob', true);
$jays_cake_return_to_header = get_theme_mod('jays_cake_return_to_header', true);
$jays_cake_tp_theme_css .= '.return-to-header{';
if ($jays_cake_return_to_header == false) {
    $jays_cake_tp_theme_css .= 'display: none;';
}
$jays_cake_tp_theme_css .= '}';
$jays_cake_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($jays_cake_return_to_header == false || $jays_cake_return_to_header_mob == false) {
    $jays_cake_tp_theme_css .= '.return-to-header{ display: none; }';
}
$jays_cake_tp_theme_css .= '}';

//footer image
$jays_cake_footer_widget_image = get_theme_mod('jays_cake_footer_widget_image');
if($jays_cake_footer_widget_image != false){
$jays_cake_tp_theme_css .='#footer{';
	$jays_cake_tp_theme_css .='background: url('.esc_attr($jays_cake_footer_widget_image).');';
$jays_cake_tp_theme_css .='}';
}

// related product
$jays_cake_related_product = get_theme_mod('jays_cake_related_product',true);
if($jays_cake_related_product == false){
$jays_cake_tp_theme_css .='.related.products{';
	$jays_cake_tp_theme_css .='display: none;';
$jays_cake_tp_theme_css .='}';
}

//menu font size
$jays_cake_menu_font_size = get_theme_mod('jays_cake_menu_font_size', 14);{
$jays_cake_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$jays_cake_tp_theme_css .='font-size: '.esc_attr($jays_cake_menu_font_size).'px;';
$jays_cake_tp_theme_css .='}';
}

// menu text tranform
$jays_cake_menu_text_tranform = get_theme_mod( 'jays_cake_menu_text_tranform','Capitalize');
if($jays_cake_menu_text_tranform == 'Uppercase'){
$jays_cake_tp_theme_css .='.main-navigation a {';
	$jays_cake_tp_theme_css .='text-transform: uppercase;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_text_tranform == 'Lowercase'){
$jays_cake_tp_theme_css .='.main-navigation a {';
	$jays_cake_tp_theme_css .='text-transform: lowercase;';
$jays_cake_tp_theme_css .='}';
}
else if($jays_cake_menu_text_tranform == 'Capitalize'){
$jays_cake_tp_theme_css .='.main-navigation a {';
	$jays_cake_tp_theme_css .='text-transform: capitalize;';
$jays_cake_tp_theme_css .='}';
}

//======================= slider Content layout ===================== //

$jays_cake_slider_content_layout = get_theme_mod('jays_cake_slider_content_layout', 'LEFT-ALIGN'); 
$jays_cake_tp_theme_css .= '#slider .carousel-caption{';
switch ($jays_cake_slider_content_layout) {
    case 'LEFT-ALIGN':
        $jays_cake_tp_theme_css .= 'text-align:left; right: 55%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $jays_cake_tp_theme_css .= 'text-align:center; left: 30%; right: 30%';
        break;
    case 'RIGHT-ALIGN':
        $jays_cake_tp_theme_css .= 'text-align:right; left: 55%; right: 15%';
        break;
    default:
        $jays_cake_tp_theme_css .= 'text-align:left; right: 55%; left: 15%';
        break;
}
$jays_cake_tp_theme_css .= '}';

//sale position
$jays_cake_scroll_position = get_theme_mod( 'jays_cake_sale_tag_position','right');
if($jays_cake_scroll_position == 'right'){
$jays_cake_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $jays_cake_tp_theme_css .='right: 25px !important;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_scroll_position == 'left'){
$jays_cake_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $jays_cake_tp_theme_css .='left: 25px !important;';
$jays_cake_tp_theme_css .='}';
}

//Font Weight
$jays_cake_menu_font_weight = get_theme_mod( 'jays_cake_menu_font_weight','400');
if($jays_cake_menu_font_weight == '100'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 100;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_font_weight == '200'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 200;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_font_weight == '300'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 300;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_font_weight == '400'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 400;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_font_weight == '500'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 500;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_font_weight == '600'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 600;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_font_weight == '700'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 700;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_font_weight == '800'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 800;';
$jays_cake_tp_theme_css .='}';
}else if($jays_cake_menu_font_weight == '900'){
$jays_cake_tp_theme_css .='.main-navigation a{';
    $jays_cake_tp_theme_css .='font-weight: 900;';
$jays_cake_tp_theme_css .='}';
}