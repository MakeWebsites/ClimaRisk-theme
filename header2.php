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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'climarisk' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
	    <nav class="navbar fixed-top navbar-dark navbar-expand-lg navbar-dark blue-gradient pt-5">
	    	<div class="container">
			   <div class="navbar-brand">
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
				}
				/*$climarisk_description = get_bloginfo( 'description', 'display' );
				if ( $climarisk_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $climarisk_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif;*/ ?>
			  <!-- <a href="http://localhost/cr-es/"><img src="https://climarisk.com/wp-content/uploads/2020/02/climarisk-logo-texto3.png" alt="ClimaRisk"></a></div>
			   <!--<a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a>-->
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
		   		<div class="collapse navbar-collapse" id="navbarNav">
	            <?php
	            $args = array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
	            'depth'      => 2,
	            'container'  => false,
	            'menu_class'     => 'navbar-nav',
	            'walker'     => new Bootstrap_Walker_Nav_Menu()
	              );
	            if (has_nav_menu('primary-menu')) {
	              wp_nav_menu($args);
	            }
	            ?>
			  </div>

	        </div>
		</nav>
	</header><!-- #masthead -->

			
	<div id="content" class="site-content container">
	<div class="row">
