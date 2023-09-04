<?php
/**
 * The front page template file
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'conference_event_planner_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'conference_event_planner_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/feature' ); ?>
	<?php do_action( 'conference_event_planner_after_feature' ); ?>

	<?php get_template_part( 'template-parts/home/services' ); ?>
	<?php do_action( 'conference_event_planner_after_services' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'conference_event_planner_after_home_content' ); ?>
</main>

<?php get_footer();