<?php
/**
 * The sidebar containing the main widget area
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'conference-event-planner' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>