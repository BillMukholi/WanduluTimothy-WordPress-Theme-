<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wandulu
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="archive-cont">
            <div class="archive container">
            <?php
                    $args = array(
                        'post_type' => 'works',
                        'posts_per_page' => 6, // Number of posts to display per page
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Current page number
                    );

                    $works_query = new WP_Query($args);

                    if ($works_query->have_posts()) :
                        echo "<div class='archive-grid archive-works'>";

                        while ($works_query->have_posts()) : $works_query->the_post();
                            // Display the post content or any other desired information
                            echo "
                            <div class='archive-grid-item-cont'>
                                <a href='".get_the_permalink()."' class='archive-grid-item'>
                                    <div class='archive-grid-item-header'>
                                        <img class='archive-grid-item-header-img' src='".get_the_post_thumbnail_url()."'>
                                    </div>
                                    <div class='archive-grid-item-body'>
                                        <div class='archive-grid-left'>
                                            <p class='archive-grid-item-title textColor'>".get_the_title()."</p>
                                            <p class='archive-grid-item-location textColor'>".get_post_meta($post->ID, 'Location', true)."</p>
                                            <p class='archive-grid-item-date textColor'>".get_post_meta($post->ID, 'Year', true)."</p>
                                        </div>
                                        <div class='archive-grid-right'>
                                            <p class='archive-grid-item-icon textColor'>></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                                  
                            ";

                            //the_title('<h2>', '</h2>');
                            //the_content();
                        endwhile;

                        echo "</div>";

                        // Display pagination
                        $total_pages = $works_query->max_num_pages;
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var('paged'));
                            echo '<div class="pagination">';
                            echo paginate_links(array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => '/page/%#%', // URL format for pagination pages
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text' => '',
                                'next_text' => '',
                            ));
                            echo '</div>';
                        }
                    
                        // Reset the query
                        wp_reset_postdata();
                    else:
                        echo 'No works found.';
                    endif;
                ?>
            </div>
        </div>
	</main><!-- #main -->

<?php
get_footer();
