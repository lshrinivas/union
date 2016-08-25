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
        $carousel_image = get_attached_media( 'video' );
        $quotes = get_post_meta($post->ID, 'quote');
        $videos = [
            'Click to see Amy Li\'s "Letter to myself" video',
            'Click to see Phylis Kim Myung\'s "Letter to myself" video',
            'Click to see Pata Suyemoto\'s "Letter to myself" video'
        ];
    ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container home_container">
                <div class="row">
                    <div class="divider"></div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3 home_logo-container">
                        <img src="<?php echo $feat_image; ?>" class="logo-image" alt="TEAM Logo">
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="container">
                <?php
                    if (have_posts()) :
                       while (have_posts()) :
                          the_post();
                            the_content();
                       endwhile;
                    endif;
                ?>
                <div class="row">
                    <?php
                         foreach (get_post_meta($post->ID, 'motto') as $motto) {
                            list($title, $subtitle, $url, $dest_url) = explode('|', $motto);
                         ?>
                            <div class="col-xs-12 col-sm-4 call_to_action" style="background-image: url(<?php echo $url; ?>);">
                                <a href="<?php echo $dest_url; ?>">
                                    <div class="call_to_action-overlay"></div>
                                </a>
                                <div class="call_to_action-title"><?php echo $title; ?></div>
                                <div class="call_to_action-subtitle"><?php echo $subtitle; ?></div>
                            </div>
                    <?php
                         }
                    ?>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
