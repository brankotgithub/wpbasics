<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT Interior Lite
 */

get_header(); ?>

<div class="container">
     <div class="page_content">
        <section class="site-main">
			<?php if ( have_posts() ) : ?>
                <header class="page-header">
				<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
                </header><!-- .page-header -->
				<div class="blog-post">
					<?php /* Start the Loop */ 
						while ( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() );
						endwhile; 
					?>
                </div>
                <?php  
				// Previous/next post navigation.
				the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => __( 'Back', 'interior-lite' ),
							'next_text' => __( 'Next', 'interior-lite' ),
							'screen_reader_text' => __( 'Posts navigation', 'interior-lite' )
				) );
			    else : get_template_part( 'no-results', 'archive' ); endif; ?>
        </section>
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->
	
<?php get_footer(); ?>