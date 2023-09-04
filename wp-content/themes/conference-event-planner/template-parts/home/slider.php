<?php
/**
 * Template part for displaying slider section
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

?>

<?php $static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'conference_event_planner_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $conference_event_planner_slide_pages = array();
      for ( $conference_event_planner_count = 1; $conference_event_planner_count <= 4; $conference_event_planner_count++ ) {
        $conference_event_planner_mod = intval( get_theme_mod( 'conference_event_planner_slider_page' . $conference_event_planner_count ));
        if ( 'page-none-selected' != $conference_event_planner_mod ) {
          $conference_event_planner_slide_pages[] = $conference_event_planner_mod;
        }
      }
      if( !empty($conference_event_planner_slide_pages) ) :
        $conference_event_planner_args = array(
          'post_type' => 'page',
          'post__in' => $conference_event_planner_slide_pages,
          'orderby' => 'post__in'
        );
        $conference_event_planner_query = new WP_Query( $conference_event_planner_args );
        if ( $conference_event_planner_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $conference_event_planner_query->have_posts() ) : $conference_event_planner_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
            <img src="<?php echo the_post_thumbnail_url('full'); ?>"/> <?php 
          }else { ?>
            <img src="<?php echo esc_url($static_image); ?>">
          <?php } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $conference_event_planner_excerpt = get_the_excerpt();echo esc_html( conference_event_planner_string_limit_words( $conference_event_planner_excerpt,15 ) ); ?></p>
              <?php if( get_theme_mod( 'conference_event_planner_slider_button',true) != '') { ?>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Get Started','conference-event-planner'); ?></a>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
