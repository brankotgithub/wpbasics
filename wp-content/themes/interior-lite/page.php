<?php
/**
 * The template for displaying all pages.
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
            		<?php if( have_posts() ) :
							while( have_posts() ) : the_post(); 
								get_template_part( 'content', 'page' ); 								
                            //If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                            endwhile; endif; ?>                    
            </section><!-- section-->   
     <?php get_sidebar();?>      
    <div class="clear"></div>
    </div><!-- .page_content --> 
 </div><!-- .container --> 
<?php get_footer(); ?>