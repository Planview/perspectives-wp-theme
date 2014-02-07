<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Portfolio Perspectives
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
        <div class="site-header-inner">
            <div class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>

            <nav id="site-navigation" class="main-navigation" role="navigation">
                <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'portfolio-perspectives' ); ?></a>

                <?php wp_nav_menu( array(
                    'container_class' => 'menu-container',
                    'depth' => 2,
                    'theme_location' => 'primary',
                    'walker' => new Portfolio_Perspectives_Nav_Menu()
                ) ); ?>
                <div id="header-search">
                    <?php get_search_form(); ?>
                </div>
            </nav><!-- #site-navigation -->
        </div>
	</header><!-- #masthead -->

    <div class="site-content-wrapper">
	<div id="content" class="site-content">
