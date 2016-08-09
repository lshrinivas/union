<?php
/**
 * The template for displaying the home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Union
 */

get_header(); ?>

    <?php
        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container-fluid home_container" style="background-image:url(<?php echo $feat_image; ?>)">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-8 call_to_action-container">
                        <?php
                            if (have_posts()) :
                               while (have_posts()) :
                                  the_post();
                                     foreach (get_post_meta(get_the_ID(), 'motto') as $motto)
                                        echo "<div class=\"call_to_action\">$motto</div>";
                               endwhile;
                            endif;
                        ?>
                    </div>
                </div>
            </div>
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
//get_sidebar();
get_footer();
