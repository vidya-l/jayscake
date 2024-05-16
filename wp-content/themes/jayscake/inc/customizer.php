<?php
/**
 * Animal Pet Store: Customizer
 *
 * @package Animal Pet Store
 * @subpackage jays_cake
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jays_cake_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Animal_Pet_Store_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Animal_Pet_Store_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'jays_cake_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'jays-cake' ),
	    'description' => __( 'Description of what this panel does.', 'jays-cake' ),
	) );

	//TP Genral Option
	$wp_customize->add_section('jays_cake_tp_general_settings',array(
        'title' => __('TP General Option', 'jays-cake'),
        'priority' => 1,
        'panel' => 'jays_cake_panel_id'
    ) );
 	$wp_customize->add_setting('jays_cake_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
 	$wp_customize->add_control('jays_cake_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'jays-cake'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'jays-cake'),
		'section' => 'jays_cake_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','jays-cake'),
		'Container' => __('Container','jays-cake'),
		'Container Fluid' => __('Container Fluid','jays-cake')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('jays_cake_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
	$wp_customize->add_control('jays_cake_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'jays-cake'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'jays-cake'),
     'section' => 'jays_cake_tp_general_settings',
     'choices' => array(
         'full' => __('Full','jays-cake'),
         'left' => __('Left','jays-cake'),
         'right' => __('Right','jays-cake'),
         'three-column' => __('Three Columns','jays-cake'),
         'four-column' => __('Four Columns','jays-cake'),
         'grid' => __('Grid Layout','jays-cake')
     ),
	) );

	// Add Settings and Controls for single post sidebar Layout
	$wp_customize->add_setting('jays_cake_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
	$wp_customize->add_control('jays_cake_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'jays-cake'),
        'description'   => __('This option work for single blog page', 'jays-cake'),
        'section' => 'jays_cake_tp_general_settings',
        'choices' => array(
            'full' => __('Full','jays-cake'),
            'left' => __('Left','jays-cake'),
            'right' => __('Right','jays-cake'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('jays_cake_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
	$wp_customize->add_control('jays_cake_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'jays-cake'),
     'description'   => __('This option work for pages.', 'jays-cake'),
     'section' => 'jays_cake_tp_general_settings',
     'choices' => array(
         'full' => __('Full','jays-cake'),
         'left' => __('Left','jays-cake'),
         'right' => __('Right','jays-cake')
     ),
	) );
    $wp_customize->add_setting( 'jays_cake_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'jays-cake' ),
		'section'     => 'jays_cake_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_sticky',
	) ) );

	//tp typography option
	$jays_cake_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('jays_cake_typography_option',array(
		'title'         => __('TP Typography Option', 'jays-cake'),
		'priority' => 1,
		'panel' => 'jays_cake_panel_id'
   	));

   	$wp_customize->add_setting('jays_cake_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'jays_cake_sanitize_choices',
	));
	$wp_customize->add_control(	'jays_cake_heading_font_family', array(
		'section' => 'jays_cake_typography_option',
		'label'   => __('heading Fonts', 'jays-cake'),
		'type'    => 'select',
		'choices' => $jays_cake_font_array,
	));

	$wp_customize->add_setting('jays_cake_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'jays_cake_sanitize_choices',
	));
	$wp_customize->add_control(	'jays_cake_body_font_family', array(
		'section' => 'jays_cake_typography_option',
		'label'   => __('Body Fonts', 'jays-cake'),
		'type'    => 'select',
		'choices' => $jays_cake_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('jays_cake_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'jays-cake'),
		'priority' => 1,
		'panel' => 'jays_cake_panel_id'
	) );
	$wp_customize->add_setting( 'jays_cake_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'jays-cake' ),
		'section'     => 'jays_cake_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'jays_cake_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jays_cake_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'jays-cake'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'jays-cake'),
	    'section' => 'jays_cake_prelaoder_option',
	    'settings' => 'jays_cake_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'jays_cake_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jays_cake_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'jays-cake'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'jays-cake'),
	    'section' => 'jays_cake_prelaoder_option',
	    'settings' => 'jays_cake_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'jays_cake_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jays_cake_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'jays-cake'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'jays-cake'),
	    'section' => 'jays_cake_prelaoder_option',
	    'settings' => 'jays_cake_tp_preloader_bg_color_option',
  	)));

  	//TP Color Option
	$wp_customize->add_section('jays_cake_color_option',array(
     'title'         => __('TP Color Option', 'jays-cake'),
     'panel' => 'jays_cake_panel_id',
     'priority' => 1,
    ) );
	$wp_customize->add_setting( 'jays_cake_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jays_cake_tp_color_option', array(
			'label'     => __('Themem first Color', 'jays-cake'),
	    'description' => __('It will change the complete theme color in one click.', 'jays-cake'),
	    'section' => 'jays_cake_color_option',
	    'settings' => 'jays_cake_tp_color_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('jays_cake_blog_option',array(
		'title' => __('TP Blog Option', 'jays-cake'),
		'priority' => 1,
		'panel' => 'jays_cake_panel_id'
	) );
	$wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'jays_cake_sanitize_sortable',
    ));
    $wp_customize->add_control(new Animal_Pet_Store_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'jays-cake'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'jays-cake') ,
        'section' => 'jays_cake_blog_option',
        'choices' => array(
            'date' => __('date', 'jays-cake') ,
            'author' => __('author', 'jays-cake') ,
            'comment' => __('comment', 'jays-cake') ,
            'category' => __('category', 'jays-cake') ,
        ) ,
    )));
    $wp_customize->add_setting( 'jays_cake_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'jays_cake_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'jays_cake_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','jays-cake' ),
		'section'     => 'jays_cake_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('jays_cake_read_more_text',array(
		'default'=> __('Read More','jays-cake'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jays_cake_read_more_text',array(
		'label'	=> __('Edit Button Text','jays-cake'),
		'section'=> 'jays_cake_blog_option',
		'type'=> 'text'
	));
	$wp_customize->add_setting( 'jays_cake_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'jays-cake' ),
		'section'     => 'jays_cake_blog_option',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'jays_cake_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'jays_cake_customize_partial_jays_cake_remove_read_button',
	 ));

	 $wp_customize->add_setting( 'jays_cake_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'jays-cake' ),
		'section'     => 'jays_cake_blog_option',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'jays_cake_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'jays_cake_customize_partial_jays_cake_remove_tags',
	));
	$wp_customize->add_setting( 'jays_cake_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'jays-cake' ),
		'section'     => 'jays_cake_blog_option',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'jays_cake_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'jays_cake_customize_partial_jays_cake_remove_category',
	));
	$wp_customize->add_setting( 'jays_cake_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'jays_cake_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'jays-cake' ),
	 'section'     => 'jays_cake_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'jays_cake_remove_comment',
	) ) );

	$wp_customize->add_setting( 'jays_cake_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'jays_cake_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'jays-cake' ),
	 'section'     => 'jays_cake_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'jays_cake_remove_related_post',
	) ) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'jays-cake' ),
	 'section'     => 'jays_cake_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'jays_cake_remove_related_post',
	) ) );
	$wp_customize->add_setting('jays_cake_related_post_heading',array(
		'default'=> __('Related Posts','jays-cake'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jays_cake_related_post_heading',array(
		'label'	=> __('Edit Section Title','jays-cake'),
		'section'=> 'jays_cake_blog_option',
		'type'=> 'text'
	));
	$wp_customize->add_setting( 'jays_cake_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'jays_cake_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'jays_cake_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','jays-cake' ),
		'section'     => 'jays_cake_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );
	$wp_customize->add_setting( 'jays_cake_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'jays_cake_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'jays_cake_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','jays-cake' ),
		'section'     => 'jays_cake_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );
	$wp_customize->add_setting('jays_cake_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
	$wp_customize->add_control('jays_cake_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'jays-cake'),
        'section' => 'jays_cake_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','jays-cake'),
            'content-image' => __('Content-Media','jays-cake'),
        ),
	) );

 	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'jays_cake_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'jays-cake' ),
    	'priority' => 2,
		'panel' => 'jays_cake_panel_id'
	) );

	$wp_customize->add_setting('jays_cake_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'jays_cake_sanitize_choices',
	));
	$wp_customize->add_control(	'jays_cake_menu_font_family', array(
		'section' => 'jays_cake_menu_typography',
		'label'   => __('Menu Fonts', 'jays-cake'),
		'type'    => 'select',
		'choices' => $jays_cake_font_array,
	));

	$wp_customize->add_setting('jays_cake_menu_font_weight',array(
        'default' => '400',
        'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
	$wp_customize->add_control('jays_cake_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'jays-cake'),
     'section' => 'jays_cake_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','jays-cake'),
         '200' => __('200','jays-cake'),
         '300' => __('300','jays-cake'),
         '400' => __('400','jays-cake'),
         '500' => __('500','jays-cake'),
         '600' => __('600','jays-cake'),
         '700' => __('700','jays-cake'),
         '800' => __('800','jays-cake'),
         '900' => __('900','jays-cake')
     ),
	) );

	$wp_customize->add_setting('jays_cake_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'jays_cake_sanitize_choices'
 	));
 	$wp_customize->add_control('jays_cake_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','jays-cake'),
		'section' => 'jays_cake_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','jays-cake'),
		   'Lowercase' => __('Lowercase','jays-cake'),
		   'Capitalize' => __('Capitalize','jays-cake'),
		),
	) );
	$wp_customize->add_setting('jays_cake_menu_font_size', array(
	  'default' => 14,
      'sanitize_callback' => 'jays_cake_sanitize_number_range',
	));
	$wp_customize->add_control(new Animal_Pet_Store_Range_Slider($wp_customize, 'jays_cake_menu_font_size', array(
       'section' => 'jays_cake_menu_typography',
      'label' => esc_html__('Font Size', 'jays-cake'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	// Top Bar
	$wp_customize->add_section( 'jays_cake_topbar', array(
    	'title'      => __( 'Header Details', 'jays-cake' ),
    	'priority' => 2,
    	'description' => __( 'Add your contact details', 'jays-cake' ),
		'panel' => 'jays_cake_panel_id'
	) );
	$wp_customize->add_setting('jays_cake_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jays_cake_topbar_text',array(
		'label'	=> __('Topbar Text','jays-cake'),
		'section'=> 'jays_cake_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'jays_cake_search_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Search Option', 'jays-cake' ),
		'section'     => 'jays_cake_topbar',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_search_icon',
	) ) );
	$wp_customize->add_setting( '`', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_user_icon', array(
		'label'       => esc_html__( 'Show / Hide User Option', 'jays-cake' ),
		'section'     => 'jays_cake_topbar',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_user_icon',
	) ) );

	$wp_customize->add_setting( 'jays_cake_cart_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_cart_icon', array(
		'label'       => esc_html__( 'Show / Hide Cart Option', 'jays-cake' ),
		'section'     => 'jays_cake_topbar',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_cart_icon',
	) ) );

	$wp_customize->add_setting( 'jays_cake_currency_switcher', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_currency_switcher', array(
		'label'       => esc_html__( 'Show / Hide Currency Switcher', 'jays-cake' ),
		'section'     => 'jays_cake_topbar',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_currency_switcher',
	) ) );

	$wp_customize->add_setting( 'jays_cake_cart_language_translator', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_cart_language_translator', array(
		'label'       => esc_html__( 'Show / Hide Language Translator Option', 'jays-cake' ),
		'section'     => 'jays_cake_topbar',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_cart_language_translator',
	) ) );

	$wp_customize->add_setting('jays_cake_category_text',array(
		'default' => 'Select Category',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'jays_cake_category_text', array(
	   'settings' => 'jays_cake_category_text',
	   'section'   => 'jays_cake_topbar',
	   'label' => __('Add Category Text', 'jays-cake'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('jays_cake_product_category_number',array(
		'default' => '',
		'sanitize_callback' => 'jays_cake_sanitize_number_absint',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'jays_cake_product_category_number', array(
	   'settings' => 'jays_cake_product_category_number',
	   'section'   => 'jays_cake_topbar',
	   'label' => __('Add Category Limit', 'jays-cake'),
	   'type'      => 'number'
	));

	//home page slider
	$wp_customize->add_section( 'jays_cake_slider_section' , array(
    	'title'      => __( 'Slider Section', 'jays-cake' ),
    	'priority' => 5,
		'panel' => 'jays_cake_panel_id'
	) );

	$wp_customize->add_setting( 'jays_cake_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'jays-cake' ),
		'section'     => 'jays_cake_slider_section',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_slider_arrows',
	) ) );

	$wp_customize->add_setting('jays_cake_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jays_cake_slider_short_heading',array(
		'label'	=> __('Add short Heading','jays-cake'),
		'section'=> 'jays_cake_slider_section',
		'type'=> 'text'
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'jays_cake_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'jays_cake_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'jays_cake_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'jays-cake' ),
			'description' => __('Image Size ( 1835 x 700 ) px','jays-cake'),
			'section'  => 'jays_cake_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}
	$wp_customize->add_setting( 'jays_cake_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'jays-cake' ),
		'section'     => 'jays_cake_slider_section',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_slider_button',
	) ) );

	$jays_cake_args = array('numberposts' => -1);
	$post_list = get_posts($jays_cake_args);
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('jays_cake_slider_content_layout',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
	$wp_customize->add_control('jays_cake_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'jays-cake'),
        'section' => 'jays_cake_slider_section',
        'choices' => array(
        	'LEFT-ALIGN' => __('LEFT-ALIGN','jays-cake'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','jays-cake'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','jays-cake'),
        ),
	) );

	// Product Section
	$wp_customize->add_section( 'jays_cake_product_section' , array(
    	'title'      => __( 'Product Section', 'jays-cake' ),
    	'priority' => 6,
		'panel' => 'jays_cake_panel_id'
	) );
	$wp_customize->add_setting( 'jays_cake_show_hide_product_section', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_show_hide_product_section', array(
		'label'       => esc_html__( 'Show / Hide Product Section', 'jays-cake' ),
		'section'     => 'jays_cake_product_section',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_show_hide_product_section',
	) ) );

	$wp_customize->add_setting('jays_cake_product_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jays_cake_product_short_heading',array(
		'label'	=> __('Add short Heading','jays-cake'),
		'section'=> 'jays_cake_product_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('jays_cake_product_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jays_cake_product_heading',array(
		'label'	=> __('Add Heading','jays-cake'),
		'section'=> 'jays_cake_product_section',
		'type'=> 'text'
	));

	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_show_hide_about_section', array(
		'label'       => esc_html__( 'Show / Hide Product Section', 'jays-cake' ),
		'section'     => 'jays_cake_product_section',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_show_hide_about_section',
	) ) );
	$wp_customize->add_setting( 'jays_cake_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'jays_cake_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'jays_cake_about_page', array(
		'label'    => __( 'Select Product Page', 'jays-cake' ),
		'section'  => 'jays_cake_product_section',
		'type'     => 'dropdown-pages'
	) );

	$jays_cake_args = array(
	 'type'                     => 'product',
	 'child_of'                 => 0,
	 'parent'                   => '',
	 'orderby'                  => 'term_group',
	 'order'                    => 'ASC',
	 'hide_empty'               => false,
	 'hierarchical'             => 1,
	 'number'                   => '',
	 'taxonomy'                 => 'product_cat',
	 'pad_counts'               => false
	);
	$categories = get_categories( $jays_cake_args );
	$jays_cake_cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
				$default = $category->slug;
				$i++;
		}
		$jays_cake_cats[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('jays_cake_recent_product_category',array(
		'sanitize_callback' => 'jays_cake_sanitize_select',
	));
	$wp_customize->add_control('jays_cake_recent_product_category',array(
		'type'    => 'select',
		'choices' => $jays_cake_cats,
		'label' => __('Select Product Category','jays-cake'),
		'section' => 'jays_cake_product_section',
	));

	//footer
	$wp_customize->add_section('jays_cake_footer_section',array(
		'title'	=> __('Footer Text','jays-cake'),
		'description'	=> __('Add copyright text.','jays-cake'),
		'panel' => 'jays_cake_panel_id',
		'priority' => 7,
	));
	$wp_customize->add_setting('jays_cake_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jays_cake_footer_text',array(
		'label'	=> __('Copyright Text','jays-cake'),
		'section'	=> 'jays_cake_footer_section',
		'type'		=> 'text'
	));
	// footer columns
	$wp_customize->add_setting('jays_cake_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'jays_cake_sanitize_number_absint'
	));
	$wp_customize->add_control('jays_cake_footer_columns',array(
		'label'	=> __('Footer Widget Columns','jays-cake'),
		'section'	=> 'jays_cake_footer_section',
		'setting'	=> 'jays_cake_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'jays_cake_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jays_cake_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'jays-cake'),
			'description' => __('It will change the complete footer widget backgorund color.', 'jays-cake'),
			'section' => 'jays_cake_footer_section',
			'settings' => 'jays_cake_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('jays_cake_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'jays_cake_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','jays-cake'),
         'section' => 'jays_cake_footer_section'
	)));
	$wp_customize->add_setting( 'jays_cake_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'jays-cake' ),
		'section'     => 'jays_cake_footer_section',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_return_to_header',
	) ) );
    $wp_customize->add_setting('jays_cake_scroll_top_icon',array(
	  'default'	=> 'fas fa-arrow-up',
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Animal_Pet_Store_Icon_Changer(
	        $wp_customize,'jays_cake_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','jays-cake'),
		'transport' => 'refresh',
		'section'	=> 'jays_cake_footer_section',
			'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('jays_cake_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
	$wp_customize->add_control('jays_cake_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'jays-cake'),
        'description'   => __('This option work for scroll to top', 'jays-cake'),
       'section' => 'jays_cake_footer_section',
       'choices' => array(
            'Right' => __('Right','jays-cake'),
            'Left' => __('Left','jays-cake'),
            'Center' => __('Center','jays-cake')
     ),
	) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'jays_cake_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'jays_cake_customize_partial_blogdescription',
	) );

	//Mobile Respnsive
	$wp_customize->add_section('jays_cake_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'jays-cake'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'jays-cake'),
		'priority' => 8,
		'panel' => 'jays_cake_panel_id'
	) );
	$wp_customize->add_setting( 'jays_cake_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'jays-cake' ),
		'section'     => 'jays_cake_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'jays_cake_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'jays-cake' ),
		'section'     => 'jays_cake_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_slider_buttom_mob',
	) ) );
	$wp_customize->add_setting( 'jays_cake_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'jays-cake' ),
		'section'     => 'jays_cake_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_related_post_mob',
	) ) );

	//Site Identity
	$wp_customize->add_setting( 'jays_cake_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'jays-cake' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_site_title',
	) ) );
	$wp_customize->add_setting('jays_cake_site_title_font_size',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'jays_cake_sanitize_number_absint'
	));
	$wp_customize->add_control('jays_cake_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','jays-cake'),
		'section'	=> 'title_tagline',
		'setting'	=> 'jays_cake_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 80,
		),
	));
	$wp_customize->add_setting( 'jays_cake_site_tagline', array(
	    'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'jays-cake' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('jays_cake_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'jays_cake_sanitize_number_absint'
	));
	$wp_customize->add_control('jays_cake_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','jays-cake'),
		'section'	=> 'title_tagline',
	    'setting'	=> 'jays_cake_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));
    $wp_customize->add_setting('jays_cake_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'jays_cake_sanitize_number_absint'
	));
	$wp_customize->add_control('jays_cake_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','jays-cake'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('jays_cake_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
    $wp_customize->add_control('jays_cake_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'jays-cake'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'jays-cake'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','jays-cake'),
            'Same Line' => __('Same Line','jays-cake')
        ),
	) );

	//Woo Coomerce
	$wp_customize->add_setting('jays_cake_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'jays_cake_sanitize_number_absint'
	));
	$wp_customize->add_control('jays_cake_per_columns',array(
		'label'	=> __('Product Per Row','jays-cake'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('jays_cake_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'jays_cake_sanitize_number_absint'
	));
	$wp_customize->add_control('jays_cake_product_per_page',array(
		'label'	=> __('Product Per Page','jays-cake'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
   	$wp_customize->add_setting( 'jays_cake_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'jays-cake' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_product_sidebar',
	) ) );

	$wp_customize->add_setting('jays_cake_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'jays_cake_sanitize_choices'
	));
	$wp_customize->add_control('jays_cake_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'jays-cake'),
        'description'   => __('This option work for Archieve Products', 'jays-cake'),
        'section' => 'woocommerce_product_catalog',
        'choices' => array(
            'left' => __('Left','jays-cake'),
            'right' => __('Right','jays-cake'),
        ),
	) );
	
	$wp_customize->add_setting( 'jays_cake_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'jays-cake' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'jays_cake_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'jays_cake_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Animal_Pet_Store_Toggle_Control( $wp_customize, 'jays_cake_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'jays-cake' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'jays_cake_related_product',
	) ) );
	// 404 PAGE
	$wp_customize->add_section('jays_cake_404_page_section',array(
		'title'         => __('404 Page', 'jays-cake'),
		'description'   => 'Here you can customize 404 Page content.',
	) );
	$wp_customize->add_setting('jays_cake_not_found_title',array(
		'default'=> __('Oops! That page cant be found.','jays-cake'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('jays_cake_not_found_title',array(
		'label'	=> __('Edit Title','jays-cake'),
		'section'=> 'jays_cake_404_page_section',
		'type'=> 'text',
	));
	$wp_customize->add_setting('jays_cake_not_found_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','jays-cake'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jays_cake_not_found_text',array(
		'label'	=> __('Edit Text','jays-cake'),
		'section'=> 'jays_cake_404_page_section',
		'type'=> 'text'
	));
}
add_action( 'customize_register', 'jays_cake_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Animal Pet Store 1.0
 * @see jays_cake_customize_register()
 *
 * @return void
 */
function jays_cake_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Animal Pet Store 1.0
 * @see jays_cake_customize_register()
 *
 * @return void
 */
function jays_cake_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'ANIMAL_PET_STORE_PRO_THEME_NAME' ) ) {
	define( 'ANIMAL_PET_STORE_PRO_THEME_NAME', esc_html__( 'Animal Pet Store Pro', 'jays-cake' ));
}
if ( ! defined( 'ANIMAL_PET_STORE_PRO_THEME_URL' ) ) {
	define( 'ANIMAL_PET_STORE_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/pet-care-wordpress-theme/'));
}
if ( ! defined( 'ANIMAL_PET_STORE_DOCS_URL' ) ) {
	define( 'ANIMAL_PET_STORE_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/jays-cake/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Animal_Pet_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Animal_Pet_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Animal_Pet_Store_Customize_Section_Pro(
				$manager,
				'jays_cake_section_pro',
				array(
					'priority'   => 9,
					'title'    => ANIMAL_PET_STORE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'jays-cake' ),
					'pro_url'  => esc_url( ANIMAL_PET_STORE_PRO_THEME_URL, 'jays-cake' ),
				)
			)
		);
		    // Register sections.
		$manager->add_section(
			new Animal_Pet_Store_Customize_Section_Pro(
				$manager,
				'jays_cake_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'jays-cake' ),
					'pro_text' => esc_html__( 'Click Here', 'jays-cake' ),
					'pro_url'  => esc_url( ANIMAL_PET_STORE_DOCS_URL, 'jays-cake'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'jays-cake-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'jays-cake-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Animal_Pet_Store_Customize::get_instance();
