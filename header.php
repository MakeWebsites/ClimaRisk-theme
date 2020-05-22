<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ClimaRisk
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'climarisk' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
	    <nav class="navbar fixed-top navbar-dark navbar-expand-lg navbar-dark cr-fondo">
				<div class="pt-2"><a href="<?php echo home_url() ?>"
				<?php
				if ( has_custom_logo() ) {
				the_custom_logo(); }
				else { 
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
				}?></a>
				</div><!-- Logo -->
			   <!--<a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a>-->
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
		   		<div class="collapse navbar-collapse pt-2 pr-2" id="navbarNav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1', // Defined when registering the menu
				'menu_id'        => 'primary-menu',
				'container'      => false,
				'depth'          => 1,
				'menu_class'     => 'navbar-nav ml-auto',
				'walker'         => new wp_bootstrap_navwalker(), // This controls the display of the Bootstrap Navbar
				'fallback_cb'    => 'wp_bootstrap_navwalker::fallback', // For menu fallback
			) );
			?> 
			<a href="#" class="pl-1 white-text" title="ClimaRisk - English site"><i class="fas fa-globe"></i> English</a></div>
		</nav>
		
</header><!-- #masthead -->

			
	<div id="content" class="site-content container">
	<div class="row">
