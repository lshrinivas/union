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
                    <div class="home_logo-container">
                        <img src="<?php echo $feat_image; ?>" class="logo-image" alt="TEAM Logo">
                    </div>
                    <div class="divider"></div>
                </div>
                <div class="row">
                    <div id="carousel" class="carousel slide" data-ride="carousel" data-interval=16000>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                                $activeClass = "active";
                                $i = 0;
                                foreach($carousel_image as $img) {
                                    $img_url = wp_get_attachment_url($img->ID);
                                    $attr = array('src' => $img_url,
                                                  'autoplay' => 'on');
                            ?>
                                    <div class="item <?php echo $activeClass; ?>">
                                        <video autoplay loop>
                                            <source src="<?php echo $img_url ?>">
                                        </video>
                                        <div class="video_message">
                                            <?php echo $quotes[$i]; ?>
                                        </div>
                                        <div class="carousel-bar">
                                            <h4><?php echo $videos[$i]; ?></h4>
                                        </div>
                                    </div>
                            <?php
                                    $i++;
                                    $activeClass = "";
                                }
                            ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
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
                            list($title, $subtitle, $url) = explode('|', $motto);
                         ?>
                            <div class="col-xs-12 col-sm-4 call_to_action" style="background-image: url(<?php echo $url; ?>);">
                                <div class="call_to_action-overlay"></div>
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
//get_sidebar();
get_footer();
