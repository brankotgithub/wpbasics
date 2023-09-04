<?php
/**
 * Conference Event Planner: Customizer
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function conference_event_planner_customize_register( $wp_customize ) {

	// Register the custom control type.
		$wp_customize->register_control_type( 'Conference_Event_Planner_Toggle_Control' );

	//add home page setting pannel
	$wp_customize->add_panel( 'conference_event_planner_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home page Settings', 'conference-event-planner' ),
	    'description' => __( 'Description of what this panel does.', 'conference-event-planner' ),
	) );

  	//TP Preloader Option
	$wp_customize->add_section('conference_event_planner_prealoader_option',array(
		'title' => __('TP Preloader Option', 'conference-event-planner'),
		'panel' => 'conference_event_planner_panel_id',
		'priority' => 10,
 	) );

	$wp_customize->add_setting( 'conference_event_planner_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'conference-event-planner' ),
		'section'     => 'conference_event_planner_prealoader_option',
		'type'        => 'toggle',
		'settings'    => 'conference_event_planner_preloader_show_hide',
	) ) );

	//TP General Option
	$wp_customize->add_section('conference_event_planner_tp_general_settings',array(
        'title' => __('TP General Option', 'conference-event-planner'),
        'panel' => 'conference_event_planner_panel_id',
        'priority' => 10,
    ) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('conference_event_planner_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'conference_event_planner_sanitize_choices'
	));
	$wp_customize->add_control('conference_event_planner_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'conference-event-planner'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'conference-event-planner'),
        'section' => 'conference_event_planner_tp_general_settings',
        'choices' => array(
            'full' => __('Full','conference-event-planner'),
            'left' => __('Left','conference-event-planner'),
            'right' => __('Right','conference-event-planner'),
            'three-column' => __('Three Columns','conference-event-planner'),
            'four-column' => __('Four Columns','conference-event-planner'),
            'grid' => __('Grid Layout','conference-event-planner')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('conference_event_planner_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'conference_event_planner_sanitize_choices'
	));
	$wp_customize->add_control('conference_event_planner_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'conference-event-planner'),
        'description'   => __('This option work for pages.', 'conference-event-planner'),
        'section' => 'conference_event_planner_tp_general_settings',
        'choices' => array(
            'full' => __('Full','conference-event-planner'),
            'left' => __('Left','conference-event-planner'),
            'right' => __('Right','conference-event-planner')
        ),
	) );

	$wp_customize->add_setting( 'conference_event_planner_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'conference-event-planner' ),
		'section'     => 'conference_event_planner_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'conference_event_planner_preloader_show_hide',
	) ) );

	//TP Blog Option
	$wp_customize->add_section('conference_event_planner_blog_option',array(
        'title' => __('TP Blog Option', 'conference-event-planner'),
        'panel' => 'conference_event_planner_panel_id',
        'priority' => 10,
    ) );

		$wp_customize->add_setting( 'conference_event_planner_remove_date', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_remove_date', array(
			'label'       => esc_html__( 'Show / Hide Date Option', 'conference-event-planner' ),
			'section'     => 'conference_event_planner_blog_option',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_remove_date',
			) ) );
    $wp_customize->selective_refresh->add_partial( 'conference_event_planner_remove_date', array(
		'selector' => '.entry-date',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_remove_date',
		) );

		$wp_customize->add_setting( 'conference_event_planner_remove_author', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_remove_author', array(
			'label'       => esc_html__( 'Show / Hide Author Option', 'conference-event-planner' ),
			'section'     => 'conference_event_planner_blog_option',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_remove_author',
			) ) );
    $wp_customize->selective_refresh->add_partial( 'conference_event_planner_remove_author', array(
		'selector' => '.entry-author',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_remove_author',
		) );

		$wp_customize->add_setting( 'conference_event_planner_remove_comments', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_remove_comments', array(
			'label'       => esc_html__( 'Show / Hide Comment Option', 'conference-event-planner' ),
			'section'     => 'conference_event_planner_blog_option',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_remove_comments',
			) ) );
    $wp_customize->selective_refresh->add_partial( 'conference_event_planner_remove_comments', array(
		'selector' => '.entry-comments',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_remove_comments',
	) );

		$wp_customize->add_setting( 'conference_event_planner_remove_tags', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_remove_tags', array(
			'label'       => esc_html__( 'Show / Hide Tags Option', 'conference-event-planner' ),
			'section'     => 'conference_event_planner_blog_option',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_remove_tags',
			) ) );
    $wp_customize->selective_refresh->add_partial( 'conference_event_planner_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_remove_tags',
	 ));

	 $wp_customize->add_setting( 'conference_event_planner_remove_read_button', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_remove_read_button', array(
		 'label'       => esc_html__( 'Show / Hide Read More Button', 'conference-event-planner' ),
		 'section'     => 'conference_event_planner_blog_option',
		 'type'        => 'toggle',
		 'settings'    => 'conference_event_planner_remove_read_button',
		 ) ) );
    $wp_customize->selective_refresh->add_partial( 'conference_event_planner_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_remove_read_button',
	 ));

    $wp_customize->add_setting('conference_event_planner_read_more_text',array(
		'default'=> __('Read More','conference-event-planner'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('conference_event_planner_read_more_text',array(
		'label'	=> __('Edit Button Text','conference-event-planner'),
		'section'=> 'conference_event_planner_blog_option',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'conference_event_planner_read_more_text', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_read_more_text',
	) );

	$wp_customize->add_setting( 'conference_event_planner_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'conference_event_planner_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'conference_event_planner_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','conference-event-planner' ),
		'section'     => 'conference_event_planner_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top bar Section
	$wp_customize->add_section( 'conference_event_planner_topbar', array(
    	'title'      => __( 'Contact Details', 'conference-event-planner' ),
    	'description' => __( 'Add your contact details', 'conference-event-planner' ),
		'panel' => 'conference_event_planner_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting( 'conference_event_planner_search_icon', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Search Option', 'conference-event-planner' ),
		'section'     => 'conference_event_planner_topbar',
		'type'        => 'toggle',
		'settings'    => 'conference_event_planner_search_icon',
	) ) );

	$wp_customize->selective_refresh->add_partial( 'conference_event_planner_search_icon', array(
		'selector' => '.search_btn i',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_search_icon',
	) );


	$wp_customize->add_setting('conference_event_planner_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'conference_event_planner_sanitize_phone_number'
	));
	$wp_customize->add_control('conference_event_planner_call',array(
		'label'	=> __('Add Phone Number','conference-event-planner'),
		'section'=> 'conference_event_planner_topbar',
		'type'=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'conference_event_planner_call_text', array(
		'selector' => '.call',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_call_text',
	) );

	$wp_customize->add_setting('conference_event_planner_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('conference_event_planner_mail',array(
		'label'	=> __('Add Mail Address','conference-event-planner'),
		'section'=> 'conference_event_planner_topbar',
		'type'=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'conference_event_planner_mail_text', array(
		'selector' => '.email',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_mail_text',
	) );

	$wp_customize->add_setting('conference_event_planner_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('conference_event_planner_location',array(
		'label'	=> __('Add Location','conference-event-planner'),
		'section'=> 'conference_event_planner_topbar',
		'type'=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'conference_event_planner_location', array(
		'selector' => '.timebox i',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_location',
	) );

	// Social Link
	$wp_customize->add_section( 'conference_event_planner_social_media', array(
    	'title'      => __( 'Social Media Links', 'conference-event-planner' ),
    	'description' => __( 'Add your Social Links', 'conference-event-planner' ),
		'panel' => 'conference_event_planner_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting('conference_event_planner_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('conference_event_planner_facebook_url',array(
		'label'	=> __('Facebook Link','conference-event-planner'),
		'section'=> 'conference_event_planner_social_media',
		'type'=> 'url'
	));

	$wp_customize->selective_refresh->add_partial( 'conference_event_planner_facebook_url', array(
		'selector' => '.social-media',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_facebook_url',
	) );

	$wp_customize->add_setting('conference_event_planner_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('conference_event_planner_twitter_url',array(
		'label'	=> __('Twitter Link','conference-event-planner'),
		'section'=> 'conference_event_planner_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('conference_event_planner_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('conference_event_planner_instagram_url',array(
		'label'	=> __('Instagram Link','conference-event-planner'),
		'section'=> 'conference_event_planner_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('conference_event_planner_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('conference_event_planner_youtube_url',array(
		'label'	=> __('YouTube Link','conference-event-planner'),
		'section'=> 'conference_event_planner_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('conference_event_planner_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('conference_event_planner_pint_url',array(
		'label'	=> __('Pinterest Link','conference-event-planner'),
		'section'=> 'conference_event_planner_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('conference_event_planner_linkedin_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('conference_event_planner_linkedin_url',array(
		'label'	=> __('Linkedin Link','conference-event-planner'),
		'section'=> 'conference_event_planner_social_media',
		'type'=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'conference_event_planner_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'conference-event-planner' ),
		'panel' => 'conference_event_planner_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting( 'conference_event_planner_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'conference-event-planner' ),
		'section'     => 'conference_event_planner_slider_section',
		'type'        => 'toggle',
		'settings'    => 'conference_event_planner_slider_arrows',
	) ) );

    $wp_customize->selective_refresh->add_partial( 'conference_event_planner_slider_arrows', array(
			'selector' => '#slider .carousel-caption',
			'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_slider_arrows',
		) );

	for ( $conference_event_planner_count = 1; $conference_event_planner_count <= 4; $conference_event_planner_count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'conference_event_planner_slider_page' . $conference_event_planner_count, array(
			'default'           => '',
			'sanitize_callback' => 'conference_event_planner_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'conference_event_planner_slider_page' . $conference_event_planner_count, array(
			'label'    => __( 'Select Slide Image Page', 'conference-event-planner' ),
			'section'  => 'conference_event_planner_slider_section',
			'type'     => 'dropdown-pages'
		) );
		
	}

		$wp_customize->add_setting( 'conference_event_planner_slider_button', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_slider_button', array(
			'label'       => esc_html__( 'Show / Hide Slider Button', 'conference-event-planner' ),
			'section'     => 'conference_event_planner_slider_section',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_slider_button',
		) ) );

		// Features Section
	$wp_customize->add_section( 'conference_event_planner_timing', array(
    	'title'      => __( 'Features Section', 'conference-event-planner' ),
    	'priority' => 11,
		'panel' => 'conference_event_planner_panel_id'
	) );

	for ( $i = 1; $i <= 4; $i++ ) {

		$wp_customize->add_setting('conference_event_planner_feature_icon'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('conference_event_planner_feature_icon'.$i,array(
			'label'	=> __('Add icon ','conference-event-planner').$i,
			'section'=> 'conference_event_planner_timing',
			'type'=> 'text'
		));

		$wp_customize->add_setting('conference_event_planner_feature_title'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('conference_event_planner_feature_title'.$i,array(
			'label'	=> __('Add Title ','conference-event-planner').$i,
			'section'=> 'conference_event_planner_timing',
			'type'=> 'text'
		));

		$wp_customize->add_setting('conference_event_planner_feature_text'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('conference_event_planner_feature_text'.$i,array(
			'label'	=> __('Add Text ','conference-event-planner').$i,
			'section'=> 'conference_event_planner_timing',
			'type'=> 'text'
		));

	}

	//home page service
	$wp_customize->add_section( 'conference_event_planner_services_section' , array(
    	'title'      => __( 'Services Section', 'conference-event-planner' ),
    	'priority' => 12,
		'panel' => 'conference_event_planner_panel_id'
	) );

	$wp_customize->add_setting('conference_event_planner_news_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('conference_event_planner_news_heading',array(
		'label'	=> __('Add Heading','conference-event-planner'),
		'section'=> 'conference_event_planner_services_section',
		'type'=> 'text'
	));

	$conference_event_planner_categories = get_categories();
	$cats = array();
	$i = 0;
	$conference_event_planner_offer_cat[]= 'select';
	foreach($conference_event_planner_categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$conference_event_planner_offer_cat[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('conference_event_planner_services_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'conference_event_planner_sanitize_choices',
	));
	$wp_customize->add_control('conference_event_planner_services_section_category',array(
		'type'    => 'select',
		'choices' => $conference_event_planner_offer_cat,
		'label' => __('Select Category','conference-event-planner'),
		'section' => 'conference_event_planner_services_section',
	));

	//footer
	$wp_customize->add_section('conference_event_planner_footer_section',array(
		'title'	=> __('Footer Text','conference-event-planner'),
		'description'	=> __('Add copyright text.','conference-event-planner'),
		'panel' => 'conference_event_planner_panel_id'
	));

	$wp_customize->add_setting('conference_event_planner_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('conference_event_planner_footer_text',array(
		'label'	=> __('Copyright Text','conference-event-planner'),
		'section'	=> 'conference_event_planner_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'conference_event_planner_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'conference_event_planner_customize_partial_conference_event_planner_footer_text',
	) );

	$wp_customize->add_setting( 'conference_event_planner_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'conference-event-planner' ),
		'section'     => 'conference_event_planner_footer_section',
		'type'        => 'toggle',
		'settings'    => 'conference_event_planner_return_to_header',
	) ) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'conference_event_planner_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'conference_event_planner_customize_partial_blogdescription',
	) );

		$wp_customize->add_setting( 'conference_event_planner_site_title_text', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_site_title_text', array(
			'label'       => esc_html__( 'Show / Hide Site Title', 'conference-event-planner' ),
			'section'     => 'title_tagline',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_site_title_text',
		) ) );

		// logo site title size
		$wp_customize->add_setting('conference_event_planner_site_title_font_size',array(
			'default'	=> 30,
			'sanitize_callback'	=> 'conference_event_planner_sanitize_number_absint'
		));
		$wp_customize->add_control('conference_event_planner_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','conference-event-planner'),
			'section'	=> 'title_tagline',
			'setting'	=> 'conference_event_planner_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 100,
			),
		));

		$wp_customize->add_setting( 'conference_event_planner_site_tagline_text', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_site_tagline_text', array(
			'label'       => esc_html__( 'Show / Hide Site Tagline', 'conference-event-planner' ),
			'section'     => 'title_tagline',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_site_tagline_text',
		) ) );


		// logo site tagline size
	$wp_customize->add_setting('conference_event_planner_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'conference_event_planner_sanitize_number_absint'
	));
	$wp_customize->add_control('conference_event_planner_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','conference-event-planner'),
		'section'	=> 'title_tagline',
		'setting'	=> 'conference_event_planner_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

    $wp_customize->add_setting('conference_event_planner_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'conference_event_planner_sanitize_number_absint'
	));
	 $wp_customize->add_control('conference_event_planner_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','conference-event-planner'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('conference_event_planner_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'conference_event_planner_sanitize_choices'
	));
   $wp_customize->add_control('conference_event_planner_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'conference-event-planner'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'conference-event-planner'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','conference-event-planner'),
            'Same Line' => __('Same Line','conference-event-planner')
        ),
	) );

	$wp_customize->add_setting('conference_event_planner_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'conference_event_planner_sanitize_number_absint'
	));
	$wp_customize->add_control('conference_event_planner_per_columns',array(
		'label'	=> __('Product Per Row','conference-event-planner'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('conference_event_planner_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'conference_event_planner_sanitize_number_absint'
	));
	$wp_customize->add_control('conference_event_planner_product_per_page',array(
		'label'	=> __('Product Per Page','conference-event-planner'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

		$wp_customize->add_setting( 'conference_event_planner_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Shop page sidebar', 'conference-event-planner' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_product_sidebar',
		) ) );


		$wp_customize->add_setting( 'conference_event_planner_single_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'conference_event_planner_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Conference_Event_Planner_Toggle_Control( $wp_customize, 'conference_event_planner_single_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Product page sidebar', 'conference-event-planner' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'conference_event_planner_single_product_sidebar',
		) ) );

}
add_action( 'customize_register', 'conference_event_planner_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Conference Event Planner 1.0
 * @see conference_event_planner_customize_register()
 *
 * @return void
 */
function conference_event_planner_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Conference Event Planner 1.0
 * @see conference_event_planner_customize_register()
 *
 * @return void
 */
function conference_event_planner_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'CONFERENCE_EVENT_PLANNER_PRO_THEME_NAME' ) ) {
	define( 'CONFERENCE_EVENT_PLANNER_PRO_THEME_NAME', esc_html__( 'Event Planner Pro Theme', 'conference-event-planner' ));
}
if ( ! defined( 'CONFERENCE_EVENT_PLANNER_PRO_THEME_URL' ) ) {
	define( 'CONFERENCE_EVENT_PLANNER_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/event-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Conference_Event_Planner_Customize {

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
		$manager->register_section_type( 'Conference_Event_Planner_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Conference_Event_Planner_Customize_Section_Pro(
				$manager,
				'conference_event_planner_section_pro',
				array(
					'priority'   => 9,
					'title'    => CONFERENCE_EVENT_PLANNER_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'conference-event-planner' ),
					'pro_url'  => esc_url( CONFERENCE_EVENT_PLANNER_PRO_THEME_URL, 'conference-event-planner' ),
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

		wp_enqueue_script( 'conference-event-planner-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'conference-event-planner-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Conference_Event_Planner_Customize::get_instance();
