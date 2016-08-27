<?php
/**
 * The template for displaying all pages.
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

	<div id="primary" class="content-area">
		<main id="main" class="container" role="main">
			<div style="background-image: url(http://www.teamasianminds.org/wp-content/uploads/2016/08/join-us.jpg); background-position=center center;" class="tinted_image">
				<div class="tinted_image-tint" style="background-color: rgba(255,255,255,0.8)"></div>
				<div class="tinted_image-content">
                    <div class = "container">
                        <div class = "row">
                            <div class="col-sm-8 col-sm-offset-2"  >
                                <?php
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', 'page' );


                                endwhile; // End of the loop.
                                ?>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

