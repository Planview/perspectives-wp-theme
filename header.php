<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Portfolio Perspectives
 */
?><!DOCTYPE html>
<!--[if lt IE 9]> <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gte IE 9]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a>
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
