<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Interior Lite
 */
?>
<div id="footer-wrapper">
    	<div class="container footwrap">
     <?php 	$social_title = get_theme_mod('social_title');
		 	if( !empty($social_title) ){ ?>
                <h2 class="section_title"><?php echo esc_html($social_title); ?></h2>              
			<?php } ?>
            
             <div class="social-icons">
    		<?php $fb_link = get_theme_mod('fb_link');
		 	if( !empty($fb_link) ){ ?>
            <a title="<?php esc_attr__('facebook', 'interior-lite'); ?>" class="fb" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a>
            <?php } 
			$twitt_link = get_theme_mod('twitt_link');
		 	if( !empty($twitt_link) ){ ?>
            <a title="<?php esc_attr__('twitter', 'interior-lite'); ?>" class="tw" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
            <?php } 
			$insta_link = get_theme_mod('insta_link');
		 	if( !empty($insta_link) ){ ?>
            <a title="<?php esc_attr__('instagram', 'interior-lite');?>" class="gp" target="_blank" href="<?php echo esc_url($insta_link); ?>"></a>
            <?php }
			$linked_link = get_theme_mod('linked_link');
		 	if( !empty($linked_link) ){ ?>
            <a title="<?php esc_attr__('linkedin', 'interior-lite');?>" class="in" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
            <?php } ?>
             </div><!--end .social-icons-->
        </div><!--end .container-->
        <div class="copyright-wrapper">
        	<div class="container">            
                <div class="footermenu">
                  <?php wp_nav_menu(array('theme_location' => 'footer', 'depth' => 1)); ?>
                </div>            	
               <?php echo esc_html('&copy; '.date('Y'));?> <?php bloginfo('name'); ?>. <?php esc_attr_e('All Rights Reserved', 'interior-lite');?><br/>
			   <?php echo esc_html('SKT Interior Lite');?>
            </div>          
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>