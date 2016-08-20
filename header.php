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
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php wp_head(); ?>
</head>

<?php require_once('inc/wp_bootstrap_navwalker.php'); ?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'union' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <?php if ( !is_front_page() && get_header_image() ) : ?>
            <div class="container">
                <div class="media">
                <div class="logo_container media-left">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" class="logo-image" alt="TEAM Logo">
                    </a>
                </div>
                <div class="nav-container media-body">
                    <div class="row nav-right">
                        <div class="social_media">
                            <?php echo DISPLAY_ULTIMATE_PLUS(); ?>
                        </div>
                        <div>
                            <a href="#">
                                <button class="btn btn-success donate_button">
                                    Donate
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row btn-success">
                        <nav id="site-navigation" class="navbar navbar-default navbar-internal" role="navigation">
                            <div class="navbar-header navbar-left">
                                <button type="button" class="navbar-toggle pull-left collapsed" data-toggle="collapse" data-target="#main_nav" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="main_nav">
                                <?php wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_id' => 'primary-menu',
                                    'menu_class' => 'nav navbar-nav',
                                     'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                     'walker' => new wp_bootstrap_navwalker()
                                 ) ); ?>
                            </div>
                        </nav><!-- #site-navigation -->
                    </div>
                </div>

                </div>

    		</div><!-- .container -->
        <?php else : ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-5 col-sm-7">
                        <nav id="site-navigation" class="navbar navbar-default" role="navigation">
                            <div class="navbar-header navbar-left">
                                <button type="button" class="navbar-toggle pull-left collapsed" data-toggle="collapse" data-target="#main_nav" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="main_nav">
                                <?php wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_id' => 'primary-menu',
                                    'menu_class' => 'nav navbar-nav',
                                     'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                     'walker' => new wp_bootstrap_navwalker()
                                 ) ); ?>
                            </div>
                        </nav><!-- #site-navigation -->
                    </div>
                    <div class="col-xs-7 col-sm-5 nav-right">
                        <div class="social_media">
                            <?php echo DISPLAY_ULTIMATE_PLUS(); ?>
                        </div>
                        <div>
                            <a href="#">
                                <button class="btn btn-success donate_button">
                                    Donate
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; /*End front page check.*/ ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
