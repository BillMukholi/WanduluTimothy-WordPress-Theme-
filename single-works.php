<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wandulu
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="post-header-cont">
			<div class="post-header">
				<div class="post-header-fg">
					<div class="post-header-fg-left">
						<div class="post-header-info-cont" style="width:100% !important"></div>
					</div>
					<div class="post-header-fg-mid">
						<div class="post-header-info-cont">
							<div class="post-header-info">
								<div class="post-header-info-top">
									<p class="post-header-info-post-name textColor">Long Post Name Here</p>
								</div>
								<div class="post-header-info-bottom">
									<div class="post-header-info-bottom-left textColor"><p class="post-header-info-bottom-left-text">Location Here</p></div>
									<div class="post-header-info-bottom-right textColor"><p class="post-header-info-bottom-right-text">2000</p></div>
								</div>
							</div>
						</div>
					</div>
					<div class="post-header-fg-right"></div>
				</div>
				<div class="post-header-bg">
					<img  class="post-header-bg-img" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>">
				</div>
			</div>
		</div>
		<div class="post-body-cont">
			<div class="post-body">
				<?php
					the_content();
				?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
