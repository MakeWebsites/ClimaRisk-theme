<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ClimaRisk
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	

	<header class="entry-header">
		<?php
		if ( is_singular()) { 
			 ?> 
		<div class="row">
				<!-- Breadcrumbs -->
						<ol class="breadcrumb cr-fondo mt-1 mr-3 ml-3">
							<li class="breadcrumb-item">
								<a class="white-text" href="<?php echo get_home_url(); ?>">Inicio</a>
							</li>
						<?php
						$categories = get_the_category();
						$first_category_name = $categories[0]->cat_name;
						$first_category_id = get_cat_ID( $categories[0]->cat_name );
						$first_category_link = get_category_link( $first_category_id);
						?>
							<?php
							if (count($categories)){
							?>
							<li class="breadcrumb-item">
								<a class="white-text" href="<?php echo $first_category_link ?>"><?php echo $first_category_name ?></a>
							</li>
							<?php
							}
							?>
							<li class="breadcrumb-item active cyan-text"><?php the_title() ?></li>
						</ol>
					<!-- Breadcrumbs -->
	</div>
	<?php climarisk_post_thumbnail(); ?>
			<!-- Intro -->
    <div class="card card-intro mb-1 cr-fondo mt-1">

        <div class="card-body white-text text-center">

            <!--Grid row-->
            <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="col-md-11">

                    <h1 class="h1"><?php the_title() ?></h1>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>

    </div>
    <!-- Intro -->
		<?php }
			//the_title( '<h1 class="h1-responsive">', '</h1>' );
		else { ?>
		<div class="row">
			<!--<div class="col-md-3">-->
			<?php climarisk_post_thumbnail(); ?> 
			<!-- </div> -->
			<!-- <div class="col-md-9"> -->
			<?php the_title( '<h2 class="h2 m-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<!-- </div> -->
		</div>
		<?php }

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta"><div class="divider"></div>
				<?php
				climarisk_posted_on();
				climarisk_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if (!is_singular()):
		the_excerpt();
		echo '<a class="btn btn-filled float-right" href="'. get_permalink($post->id).'">'.__('Read More', 'climarisk').'</a>';
		else:
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'climarisk' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
	endif;

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'climarisk' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php climarisk_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<div class="divider"></div>
