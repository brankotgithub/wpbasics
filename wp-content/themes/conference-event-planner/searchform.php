<?php
/**
 * Template for displaying search forms in Conference Event Planner
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

?>

<?php $conference_event_planner_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr( $conference_event_planner_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'conference-event-planner' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'conference-event-planner' ); ?></button>
</form>