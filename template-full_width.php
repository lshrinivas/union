<?php
/**
 * Template Name: Full Width Page
 *
 * This is a template for a full width scrolling page, 
 * typically used for the home page
 *
 * @package Union
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container-fluid">
                <?php
                    if (have_posts()) :
                       while (have_posts()) :
                          the_post();
                            the_content();
                       endwhile;
                    endif;
                ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
