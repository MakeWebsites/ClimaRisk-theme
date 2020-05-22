<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ClimaRisk
 */

get_header();
?>

	<main id="primary" class="site-main col-md-8">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="card card-intro mb-1 cr-fondo mt-0">
					<div class="card-body white-text text-center">

						<!--Grid row-->
						<div class="row d-flex justify-content-center">

							<!--Grid column-->
							<div class="col-md-11">

								<h1 class="h1-responsive"><?php the_archive_title(); ?></h1>

							</div>
							<!--Grid column-->

						</div>
						<!--Grid row-->

					</div>

					</div>
				<?php
				
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; ?>

			<button type="button" class="btn btn-rounded btn-lg btn-block cr-fondo pb-0 mb-2"><?php the_posts_navigation(); ?></button>

			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
<div class="col-md-4">
<?php get_sidebar(); ?>
</div>

<?php

get_footer();
