<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ClimaRisk
 */

get_header();
?>

	<main id="primary" class="site-main col-md-8">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<button type="button" class="btn cr-fondo"><span class="nav-subtitle">' . esc_html__( 'Previous:', 'climarisk' ) . 
					'</span> <span class="nav-title">%title</span></button>',
					'next_text' => '<button type="button" class="btn cr-fondo"><span class="nav-subtitle">' . esc_html__( 'Next:', 'climarisk' ) . 
					'</span> <span class="nav-title">%title</span></button>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
<div class="col-md-4">
<?php get_sidebar(); ?>
</div>
<?php

get_footer();
