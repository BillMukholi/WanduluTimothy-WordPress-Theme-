<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wandulu
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-cont bodyColor">
			<div class="footer container">
				<div class="footer-left">
					<p class="textColor">
						<?php
							$year = date('Y');
							$footerSiteTitle = get_bloginfo('name');
							echo $year." - ".$footerSiteTitle;
						?>
					</p>
				</div>
				<div class="footer-center"></div> 
				<div class="footer-right">
					<div class="footer-social-media"> 
						<?php
							// Facebook
							$facbeookURL = get_theme_mod('facebook');
							if($facbeookURL!="" && strlen($facbeookURL) > 1){
								echo '<a href='.$facbeookURL.'><img class="iconColor" src='.get_template_directory_uri().'/assets/icon/facebook.svg'.'></a>';
							}
							// Instagram
							$instagramURL = get_theme_mod('instagram');
							if($instagramURL!="" && strlen($instagramURL) > 1){
								echo '<a href='.$instagramURL.'><img class="iconColor" src='.get_template_directory_uri().'/assets/icon/instagram.svg'.'></a>';
							}
							// Threads
							$threadsURL = get_theme_mod('threads');
							if($threadsURL!="" && strlen($threadsURL) > 1){
								echo '<a href='.$threadsURL.'><img class="iconColor" src='.get_template_directory_uri().'/assets/icon/threads.svg'.'></a>';
							}
							// X (Twitter)
							$xURL = get_theme_mod('x_(Twitter)');
							if($xURL!="" && strlen($xURL) > 1){
								echo '<a href='.$xURL.'><img class="iconColor" src='.get_template_directory_uri().'/assets/icon/twitter.svg'.'></a>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
