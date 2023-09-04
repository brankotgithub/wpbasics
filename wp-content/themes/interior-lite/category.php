<?php
/**
 * The template for displaying all category pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Interior Lite
 */

get_header(); ?>

<div class="container">
     <div class="page_content">
        <section class="site-main">
            <header class="page-header">
				<h1 class="entry-title"><?php the_archive_title(); ?></h1>
            </header><!-- .page-header -->
			<?php if ( have_posts() ) : ?>
                <div class="blog-post">
                    <?php /* Start the Loop */ while ( have_posts() ) : the_post();  
						get_template_part( 'content', get_post_format() ); 
						endwhile; ?>
                </div>
                <?php 
				// Previous/next post navigation.
				the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => __( 'Back', 'interior-lite' ),
				'next_text' => __( 'Next', 'interior-lite' ),
				) );
				else : get_template_part( 'no-results', 'archive' ); 
				endif; ?>
       </section>
       <?php get_sidebar(); ?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->
<?php get_footer(); ?>