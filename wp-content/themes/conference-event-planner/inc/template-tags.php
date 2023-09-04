<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function conference_event_planner_categorized_blog() {
	$conference_event_planner_category_count = get_transient( 'conference_event_planner_categories' );

	if ( false === $conference_event_planner_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$conference_event_planner_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$conference_event_planner_category_count = count( $conference_event_planner_categories );

		set_transient( 'conference_event_planner_categories', $conference_event_planner_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $conference_event_planner_category_count > 1;
}

if ( ! function_exists( 'conference_event_planner_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Conference Event Planner
 */
function conference_event_planner_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in conference_event_planner_categorized_blog.
 */
function conference_event_planner_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'conference_event_planner_categories' );
}
add_action( 'edit_category', 'conference_event_planner_category_transient_flusher' );
add_action( 'save_post',     'conference_event_planner_category_transient_flusher' );
