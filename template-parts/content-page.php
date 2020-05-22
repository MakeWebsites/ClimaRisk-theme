<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ClimaRisk
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
			<!-- Intro -->
			<?php if(!is_front_page()) { ?>
				<!-- Breadcrumbs -->
				<div class="row">
						<ol class="breadcrumb cr-fondo mr-3 ml-3">
							<li class="breadcrumb-item">
								<a class="white-text" href="<?php echo get_home_url(); ?>">Inicio</a>
								<?php
								//global $post;
								//$args = array('child_of' => $post->post_parent, 'exclude'=> $post->ID);
								//if ($post->post_parent) $pages = get_pages($args);
								$parents = get_post_ancestors( $post->ID );							
								if ($parents) {
									foreach ($parents as $parent): ?>
									<li class="breadcrumb-item">
								<a class="white-text" href="<?php echo get_page_link($parent) ?>"><?php echo get_the_title($parent) ?></a>
									</li>
								<?php
								endforeach;
								}
							?>
							</li>
							<li class="breadcrumb-item active cyan-text"><?php the_title() ?></li>
						</ol>
					</div>
					<!-- Breadcrumbs -->
				<?php } ?>
			
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
    <!-- Intro -->
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php climarisk_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'climarisk' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'climarisk' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
