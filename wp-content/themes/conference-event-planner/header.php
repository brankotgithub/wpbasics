<?php
/**
 * The header for our theme
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'conference-event-planner' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<?php if(get_theme_mod('conference_event_planner_preloader_show_hide') != ''){ ?>
<div class="loader">
	<div class="center center1">
    <div class="ring"></div>
	</div>
	<div class="center center2">
    <div class="ring"></div>
	</div>
</div>
<?php }?>
<div class="outside-area">
    <div class="roll-box">
    	
<header role="banner">
	<a class="screen-reader-text skip-link" href="#tp_content"><?php esc_html_e( 'Skip to content', 'conference-event-planner' ); ?></a>
	<?php
		get_template_part( 'template-parts/header/top', 'bar' );
		get_template_part( 'template-parts/header/site', 'branding' );
	?>
</header>
