<?php
/**
 * Template part for displaying feature section
 *
 * @package Conference Event Planner
 * @subpackage conference_event_planner
 */

?>

<?php if( get_theme_mod( 'conference_event_planner_feature_icon1' ) != '' || get_theme_mod( 'conference_event_planner_feature_title1' ) != '' || get_theme_mod( 'conference_event_planner_feature_text1' ) != ''|| get_theme_mod( 'color2' ) != '' || get_theme_mod( 'conference_event_planner_feature_icon1' ) != '' || get_theme_mod( 'conference_event_planner_feature_title2' ) != '' || get_theme_mod( 'conference_event_planner_feature_text2' ) != '' || get_theme_mod( 'conference_event_planner_feature_icon3' ) != '' || get_theme_mod( 'conference_event_planner_feature_title3' ) != '' || get_theme_mod( 'conference_event_planner_feature_text3' ) != '' || get_theme_mod( 'conference_event_planner_feature_icon4' ) != '' || get_theme_mod( 'conference_event_planner_feature_title4' ) != '' || get_theme_mod( 'conference_event_planner_feature_text4' ) != '') { ?>

<div id="feature">
  <div class="container-fluid">
     <div class="row feature-box">
        <div class="col-lg-3 col-md-6 col-sm-6 feature-1">
          <div class="color1">
            <?php if( get_theme_mod( 'conference_event_planner_feature_icon1' ) != '' ) { ?>
            <i class="<?php echo esc_attr( get_theme_mod( 'conference_event_planner_feature_icon1','' ) ); ?>"></i>
          <?php } ?>
          <?php if( get_theme_mod( 'conference_event_planner_feature_title1' ) != '' ) { ?>
            <h5 class="mt-2"><?php echo esc_html( get_theme_mod( 'conference_event_planner_feature_title1','' ) ); ?></h5>
          <?php } ?>
          <?php if( get_theme_mod( 'conference_event_planner_feature_text1' ) != '' ) { ?>
            <p class="mb-0"><?php echo esc_html( get_theme_mod( 'conference_event_planner_feature_text1','' ) ); ?></p>
          <?php } ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 feature-2">
          <div class="color2">
            <?php if( get_theme_mod( 'conference_event_planner_feature_icon2' ) != '' ) { ?>
            <i class="<?php echo esc_attr( get_theme_mod( 'conference_event_planner_feature_icon2','' ) ); ?>"></i>
          <?php } ?>
          <?php if( get_theme_mod( 'conference_event_planner_feature_title2' ) != '' ) { ?>
            <h5 class="mt-2"><?php echo esc_html( get_theme_mod( 'conference_event_planner_feature_title2','' ) ); ?></h5>
          <?php } ?>
          <?php if( get_theme_mod( 'conference_event_planner_feature_text2' ) != '' ) { ?>
            <p class="mb-0"><?php echo esc_html( get_theme_mod( 'conference_event_planner_feature_text2','' ) ); ?></p>
          <?php } ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 feature-3">
          <div class="color3">
            <?php if( get_theme_mod( 'conference_event_planner_feature_icon3' ) != '' ) { ?>
            <i class="<?php echo esc_attr( get_theme_mod( 'conference_event_planner_feature_icon3','' ) ); ?>"></i>
          <?php } ?>
          <?php if( get_theme_mod( 'conference_event_planner_feature_title3' ) != '' ) { ?>
            <h5 class="mt-2"><?php echo esc_html( get_theme_mod( 'conference_event_planner_feature_title3','' ) ); ?></h5>
          <?php } ?>
          <?php if( get_theme_mod( 'conference_event_planner_feature_text3' ) != '' ) { ?>
            <p class="mb-0"><?php echo esc_html( get_theme_mod( 'conference_event_planner_feature_text3','' ) ); ?></p>
          <?php } ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 feature-4">
          <div class="color4">
            <?php if( get_theme_mod( 'conference_event_planner_feature_icon4' ) != '' ) { ?>
            <i class="<?php echo esc_attr( get_theme_mod( 'conference_event_planner_feature_icon4','' ) ); ?>"></i>
          <?php } ?>
          <?php if( get_theme_mod( 'conference_event_planner_feature_title4' ) != '' ) { ?>
            <h5 class="mt-2"><?php echo esc_html( get_theme_mod( 'conference_event_planner_feature_title4','' ) ); ?></h5>
          <?php } ?>
          <?php if( get_theme_mod( 'conference_event_planner_feature_text4' ) != '' ) { ?>
            <p class="mb-0"><?php echo esc_html( get_theme_mod( 'conference_event_planner_feature_text4','' ) ); ?></p>
          <?php } ?>
          </div>
        </div>
      </div>
  </div>
</div>

<?php } ?>