<?php  
/**
 * SKT Interior Lite functions and definitions
 *
 * @package SKT Interior Lite
 */
 
 global $content_width;
 if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */ 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'interior_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function interior_lite_setup() {
	load_theme_textdomain( 'interior-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 62,
		'width'       => 290,
		'flex-height' => true,
	) );	
	add_theme_support( 'custom-header', array( 'header-text' => false ) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'interior-lite' ),
		'footer' => __( 'Footer Menu', 'interior-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
		'default-image' => get_template_directory_uri().'/images/body-bg.jpg',
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // interior_lite_setup
add_action( 'after_setup_theme', 'interior_lite_setup' );


function interior_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'interior-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'interior-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
}
add_action( 'widgets_init', 'interior_lite_widgets_init' );


function interior_lite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto_condensed = _x('on','roboto_condensed:on or off','interior-lite');	
		
		/* Translators: If there are any character that are not
		* supported by Oswald, trsnalate this to off, do not
		* translate into your own language.
		*/
		$oswald = _x('on','oswald:on or off','interior-lite');		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','interior-lite');	
		
		if('off' !== $roboto_condensed || 'off' !== $oswald ){
			$font_family = array();
			
			if('off' !== $roboto_condensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			
			if('off' !== $oswald){
				$font_family[] = 'Oswald:300,400,700';
			}
					
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}

function interior_lite_scripts() {
	wp_enqueue_style('interior-lite-font', interior_lite_font_url(), array());
	wp_enqueue_style( 'interior-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'interior-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'interior-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'interior-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'interior-lite-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'interior_lite_scripts' );

define('SKT_URL','https://www.sktthemes.org');
define('SKT_THEME_URL','https://www.sktthemes.org/themes');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/interior-documentation/');
define('SKT_PRO_THEME_URL','https://www.sktthemes.org/shop/furnish-interior-design-wordpress-theme/');
define('SKT_LIVE_DEMO','http://sktthemesdemo.net/interior/');
define('SKT_FREE_THEME_URL','https://www.sktthemes.org/shop/free-interior-wordpress-theme/');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


// Add a Custom CSS file to WP Admin Area
function interior_lite_customizer_styles() {
    wp_enqueue_style( 'interior-lite-customizer', trailingslashit( get_template_directory_uri() ).'css/customizer.css', null );
}
add_action( 'customize_controls_print_styles', 'interior_lite_customizer_styles', 99 );

require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

// get slug by id
function interior_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

if ( ! function_exists( 'interior_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function interior_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

add_filter( 'body_class','interior_lite_body_class' );
function interior_lite_body_class( $classes ) {
 	$hideslide = get_theme_mod('hide_slides', 1);
	if (!is_home() && is_front_page()) {
		if( $hideslide == '') {
			$classes[] = 'enableslide';
		}
	}
    return $classes;
}

// WordPress wp_body_open backward compatibility
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Include the Plugin_Activation class.
 */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'interior_lite_register_required_plugins' );
 
function interior_lite_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'SKT Templates',
			'slug'      => 'skt-templates',
			'required'  => false,
		) 				
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'skt-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}