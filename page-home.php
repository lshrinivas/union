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
        $carousel_image = get_attached_media( 'image' );
    ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container-fluid home_container">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                            $activeClass = "active";
                            foreach($carousel_image as $img) {
                        ?>
                                <div class="item <?php echo $activeClass; ?>">
                                    <img src="<?php echo wp_get_attachment_image_src( $img->ID, 'full' )[0]; ?>" alt="Carousel image">
                                    <div class="carousel-caption">
                                        <h4>This is a quote which is meant to be very inspiring</h4>
                                    </div>
                                </div>
                        <?php
                                $activeClass = "";
                            }
                        ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="home_logo-container">
                    <img src="<?php echo $feat_image; ?>" class="logo-image" alt="TEAM Logo">
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 call_to_action-container">
                        <?php
                             foreach (get_post_meta($post->ID, 'motto') as $motto)
                                echo "<div class=\"call_to_action\">$motto</div>";
                        ?>
                    </div>
                </div>
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
