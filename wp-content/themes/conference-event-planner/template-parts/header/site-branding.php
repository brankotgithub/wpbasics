<?php
/*
* Display Logo and Menu Social Icons Details
*/
?>

<div class="headerbox">
  <div class="row sidebar-position">
    <div class="col-lg-12 col-md-4 align-self-center logo-hr">
      <?php $conference_event_planner_logo_settings = get_theme_mod( 'conference_event_planner_logo_settings','Different Line');
      if($conference_event_planner_logo_settings == 'Different Line'){ ?>
        <div class="logo">
          <?php if( has_custom_logo() ) conference_event_planner_the_custom_logo(); ?>
          <?php if( get_theme_mod('conference_event_planner_site_title_text',true) == 1){ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php }?>
          <?php $conference_event_planner_description = get_bloginfo( 'description', 'display' );
          if ( $conference_event_planner_description || is_customize_preview() ) : ?>
            <?php if( get_theme_mod('conference_event_planner_site_tagline_text',false)){ ?>
              <p class="site-description"><?php echo esc_html($conference_event_planner_description); ?></p>
            <?php }?>
          <?php endif; ?>
        </div>
      <?php }else if($conference_event_planner_logo_settings == 'Same Line'){ ?>
        <div class="logo logo-same-line">
          <div class="row">
            <div class="col-lg-5 col-md-5 align-self-center">
              <?php if( has_custom_logo() ) conference_event_planner_the_custom_logo(); ?>
            </div>
            <div class="col-lg-7 col-md-7 align-self-center">
              <?php if(get_theme_mod('conference_event_planner_site_title_text',true) != ''){ ?>
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php }?>
              <?php $conference_event_planner_description = get_bloginfo( 'description', 'display' );
              if ( $conference_event_planner_description || is_customize_preview() ) : ?>
                <?php if(get_theme_mod('conference_event_planner_site_tagline_text',false) != ''){ ?>
                  <p class="site-description"><?php echo esc_html($conference_event_planner_description); ?></p>
                <?php }?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php }?>
    </div>
    <div class="col-lg-12 col-md-2 align-self-center">
      <div class="menubar">
          <div class="menubox align-self-center">
              <div class="innermenubox">                  
                <div class="toggle-nav mobile-menu">
                  <button onclick="conference_event_planner_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','conference-event-planner'); ?></span></button>
                </div>
              <div id="mySidenav" class="nav sidenav">
                  <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'conference-event-planner' ); ?>">
                      <?php
                        wp_nav_menu( array(
                          'theme_location' => 'primary-menu',
                          'container_class' => 'main-menu clearfix' ,
                          'menu_class' => 'clearfix',
                          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                          'fallback_cb' => 'wp_page_menu',
                        ) );
                      ?>
                      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="conference_event_planner_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','conference-event-planner'); ?></span></a>
                    </nav>
                  </div>
                <div class="clearfix"></div>
            </div>
          </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-6 align-self-center">
      <div class="social-media">
        <?php if( get_theme_mod( 'conference_event_planner_facebook_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'conference_event_planner_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f mr-2"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'conference_event_planner_twitter_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'conference_event_planner_twitter_url','' ) ); ?>"><i class="fab fa-twitter mr-2"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'conference_event_planner_instagram_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'conference_event_planner_instagram_url','' ) ); ?>"><i class="fab fa-instagram mr-2"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'conference_event_planner_youtube_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'conference_event_planner_youtube_url','' ) ); ?>"><i class="fab fa-youtube mr-2"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'conference_event_planner_pint_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'conference_event_planner_pint_url','' ) ); ?>"><i class="fab fa-pinterest mr-2"></i></a>
        <?php } ?>
        <?php if( get_theme_mod( 'conference_event_planner_linkedin_url' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'conference_event_planner_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin mr-2"></i></a>
        <?php } ?>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>