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

    <div class="container-fluid custom-background content">
        <?php
            if (have_posts()) :
               while (have_posts()) :
                  the_post();
                    the_content();
               endwhile;
            endif;
        ?>
    </div>

<?php
get_footer();
