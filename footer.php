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

        <div style="font-size: 16px;">
            If you or someone you know needs immediate help, please call the
            Crisis Hotline: 800.273.8255 (TALK) or visit
            <a href="aaspe.net" target="_blank">Asian Lifenet Helpline</a>.
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-xs-12 col-md-3 col-md-offset-3">
                 <?php echo DISPLAY_ULTIMATE_PLUS(); ?>
            </div>
            <div class="col-xs-12 col-md-6 footer-search">
                <a href="contact-us">Contact Us</a> | <a href="privacy-policy">Privacy Policy</a> | <a href="http://www.teamasianminds.org/wp-content/uploads/2016/08/Media-Kit.pdf" target="_blank">Media Kit</a> | <a href="http://www.teamasianminds.org/draft/news/press/">Press</a>
            </div>
        </div>
        <br>
        <div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
