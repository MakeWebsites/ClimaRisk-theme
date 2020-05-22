<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ClimaRisk
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="card card-intro mb-1 cr-fondo mt-0">

			<div class="card-body white-text text-center">

			<!--Grid row-->
			<div class="row d-flex justify-content-center">

				<!--Grid column-->
				<div class="col-md-11">

					<h1 class="h1-responsive"><?php the_title() ?></h1>

				</div>
				<!--Grid column-->

			</div>
			<!--Grid row-->

		</div>

		</div>
		<?php //the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			climarisk_posted_on();
			climarisk_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php climarisk_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php climarisk_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<div class="divider"></div>
</article><!-- #post-<?php the_ID(); ?> -->
