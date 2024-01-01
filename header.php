<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wandulu
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bodyColor'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wandulu' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-cont bgColor">
			<div class="header container">
				<div class="header-section-cont">
					<a href="#" class="header-section-site-title">
						<?php
							//Get site title and store it in an array!
							$_siteTitle = get_bloginfo('name');
							$siteTitle = explode(" ", $_siteTitle);
						?>
						<p class="header-section-site-title-text textColor">
							<?php
							//Get the first element in the site title array
							echo $siteTitle[0]."&nbsp;"; 
							?>
						</p>
						<p class="header-section-site-title-text textColor"><?php 
							//Loop Though the all the remaining items within the site title array excluding the first item
							for ($siteTitleWordIndex = 0; $siteTitleWordIndex < count($siteTitle); $siteTitleWordIndex++){
								if ($siteTitleWordIndex > 0){
									if ($siteTitleWordIndex != count($siteTitle)){
										echo $siteTitle[$siteTitleWordIndex]." ";
									}
									else{
										echo $siteTitle[$siteTitleWordIndex];
									}
								}
							}
						?></p>
					</a>
				</div>
				<div class="header-section-cont"></div>
				<div class="header-section-cont">
					<div class="header-section-navigation">
						<nav class="header-navigation">
							<ul>
							<?php
								wp_nav_menu(array(
									'menu' => 'primary',
									'container' => false,
									'items_wrap' => '%3$s',
								)); 

							?>
							</ul>
						</nav>
					</div>
					<div class="header-social-media"> 
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
							// $threadsURL = get_theme_mod('threads');
							// if($threadsURL!="" && strlen($threadsURL) > 1){
							// 	echo '<a href='.$threadsURL.'><img class="iconColor" src='.get_template_directory_uri().'/assets/icon/threads.svg'.'></a>';
							// }
							// X (Twitter)
							// $xURL = get_theme_mod('x_(Twitter)');
							// if($xURL!="" && strlen($xURL) > 1){
							// 	echo '<a href='.$xURL.'><img class="iconColor" src='.get_template_directory_uri().'/assets/icon/twitter.svg'.'></a>';
							// }
						?>
					</div>
				</div>
				<div class="header-section-cont">
					<div class="hamburger-menu-cont">
						<div class="hamburger-menu">
							<div class="hamburger-menu-line fgColor"></div>
							<div class="hamburger-menu-line fgColor"></div>
							<div class="hamburger-menu-line fgColor"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="mobile-navigation-cont">
		<div class="mobile-navigation">
			<ul class="mobile-navigation-list">
				<?php
					wp_nav_menu(array(
						'menu' => 'primary',
						'container' => false,
						'items_wrap' => '%3$s',
					)); 

				?>
							<div class="mobile-social-media">
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
			</ul>

		</div>
	</div>
	
	<!-- #masthead -->
