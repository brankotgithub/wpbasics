<?php
/**
 * Template part for displaying services section
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

?>

<div id="services" class="mt-5">
  <div class="container">
    <?php if( get_theme_mod( 'conference_event_planner_news_heading' ) != '' ) { ?>
      <h3 class="text-center mb-4"><?php echo esc_html( get_theme_mod( 'conference_event_planner_news_heading','' ) ); ?></h3>
    <?php } ?>
    <div class="row">
      <?php
        $post_category = get_theme_mod('conference_event_planner_services_section_category');
        if($post_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $post_category ,'conference-event-planner')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="custom_block text-center my-3">
                <div class="services-heading">
                  <h5><?php the_title(); ?></h5>
                </div>
                <div class="services-inner">
                  <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                </div>
                <div class="service-body">
                  <div class="services_p">
                    <p class="mb-0"><?php $excerpt = get_the_excerpt(); echo esc_html( conference_event_planner_string_limit_words( $excerpt,15 ) ); ?></p>
                    <div class="demo-box">
                    <div class="box-btn">
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('View More','conference-event-planner'); ?>     <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</div>
