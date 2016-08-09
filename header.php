<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Union
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Dosis:700,800' rel='stylesheet' type='text/css'>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'union' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
            <div class="logo_container">
                <?php if ( get_header_image() ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" class="logo-image" alt="TEAM Logo">
                    </a>
                <?php endif; /*End header image check.*/ ?>
            </div>
            <div class="social_media">
                <?php echo DISPLAY_ULTIMATE_PLUS(); ?>
            </div>
		</div><!-- .site-branding -->

        <?php require_once('inc/wp_bootstrap_navwalker.php'); ?>

		<nav id="site-navigation" class="navbar navbar-default" role="navigation">
		    <div class="navbar-header navbar-left">
    			<?php wp_nav_menu( array(
    			    'theme_location' => 'primary',
    			    'menu_id' => 'primary-menu',
    			    'menu_class' => 'nav navbar-nav',
    			     'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                     'walker' => new wp_bootstrap_navwalker()
                 ) ); ?>
		    </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
