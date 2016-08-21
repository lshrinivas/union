<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Union
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="container site-footer" role="contentinfo">
        <div class="divider"></div>

        <?php
            $page = get_page_by_title( 'FooterContent' );
            $content = $page->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            echo $content;
        ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
