<?php 
/*
* Display Top Bar
*/
?>


  <div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 align-self-center">
        <div class="timebox">
          <?php if( get_theme_mod( 'conference_event_planner_call') != '') { ?>
            <i class="fas fa-phone"></i><span class="phone"><?php echo esc_html( get_theme_mod('conference_event_planner_call','')); ?></span>
          <?php } ?>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 align-self-center">
        <div class="timebox">
          <?php if( get_theme_mod( 'conference_event_planner_mail') != '') { ?>
            <i class="fas fa-envelope-open"></i><span class="phone"><?php echo esc_html( get_theme_mod('conference_event_planner_mail','')); ?></span>
          <?php } ?>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 align-self-center">
        <div class="timebox">
          <?php if( get_theme_mod( 'conference_event_planner_location') != '') { ?>
            <i class="fas fa-map-marker-alt"></i><span class="phone"><?php echo esc_html( get_theme_mod('conference_event_planner_location','')); ?></span>
          <?php } ?>
        </div>
      </div>

      <div class="col-lg-1 col-md-1 col-12 search-box align-self-center px-0">
        <?php if(get_theme_mod('conference_event_planner_search_icon',false) != ''){ ?>
          <button class="search_btn"><i class="fas fa-search"></i></button>
        <?php }?>
      </div>
      <div class="clearfix"></div>
    </div>
      <div class="search_outer">
        <div class="search_inner">
          <?php get_search_form(); ?>
        </div>
      </div>
  </div>
</div>

