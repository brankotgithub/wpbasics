<?php
/**
 * The template for displaying all pages
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

get_header(); ?>

<div class="container">
	<main id="tp_content" role="main">
		<div id="primary" class="content-area">
			<?php $conference_event_planner_sidebar_layout = get_theme_mod( 'conference_event_planner_sidebar_page_layout','right');
		    if($conference_event_planner_sidebar_layout == 'left'){ ?>
		        <div class="row">
		          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
		          	<div class="col-md-8 col-sm-8">
		           		<?php while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/page/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							endwhile; // End of the loop.
						?>
		          	</div>
		        </div>
		        <div class="clearfix"></div>
		    <?php }else if($conference_event_planner_sidebar_layout == 'right'){ ?>
		        <div class="row">
		          	<div class="col-md-8 col-sm-8">
			            <?php while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/page/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							endwhile; // End of the loop.
						?>
		          	</div>
		          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
		        </div>
		    <?php }else if($conference_event_planner_sidebar_layout == 'full'){ ?>
		        <div class="full">
		            <?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						endwhile; // End of the loop.
					?>
		      	</div>
			<?php }?>
		</div>
	</main>
</div>

<?php get_footer();