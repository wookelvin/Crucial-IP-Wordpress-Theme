<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crucialip
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="contact-us">
      <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact Us' ) ) ); ?>">Contact Us</a>
      <span class="mobiledisappear">Today to arrange for a demonstration</span>
    </div>
		<div class="footer-bar">
			<div class="logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/logo4_lt.png"></a>
        &copy; Copyright 2010-2016, Crucial IP INC. 
      </div>
			<div class="footernav1">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lvl1" >HOME</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'News & Events' ) ) ); ?>" class="lvl1" >NEWS &amp; EVENTS</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact Us' ) ) ); ?>" class="lvl1" >CONTACT US</a>
      </div>
      <div class="footernav2">
        <a href="#" class="lvl1 empty" >ABOUT US</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'About Crucial IP' ) ) ); ?>" class="lvl2" >ABOUT CRUCIAL IP</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'The Crucial Advantage' ) ) ); ?>" class="lvl2" >THE CRUCIAL ADVANTAGE</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'The Team' ) ) ); ?>" class="lvl2" >THE TEAM</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Partners' ) ) ); ?>" class="lvl2" >PARTNERS</a>
      </div>
      <div class="footernav3">
        <a href="#" class="lvl1 empty" >PRODUCTS &amp; SERVICES</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Silicon IP Cores' ) ) ); ?>" class="lvl2" >SILICON IP CORES</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Customization Services' ) ) ); ?>" class="lvl2" >CUSTOMIZATION SERVICES</a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Design Services' ) ) ); ?>" class="lvl2" >DESIGN SERVICES</a>
      </div>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
