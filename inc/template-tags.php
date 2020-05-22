<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ClimaRisk
 */

if ( ! function_exists( 'climarisk_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function climarisk_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'climarisk' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<i class="fas fa-calendar-alt mr-2"></i><span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'climarisk_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function climarisk_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'climarisk' ),
			'<span class="author vcard">
			<i class="fas fa-user-tie mr-1"></i>
			<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'climarisk_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function climarisk_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'climarisk' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<li class="fas fa-archive mr-1"></li><span class="tags-links">' . esc_html__( 'Tagged %1$s', 'climarisk' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'climarisk' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

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
	}
endif;

if ( ! function_exists( 'climarisk_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function climarisk_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('cr-img-block', array('class' => 'rounded')); ?>
			</div><!--.post-thumbnail -->

		<?php else : ?>

		<div class="container_img_index">

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'cr-img-block',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
							'class' => 'rounded'
						)
					);
				?>
			</a>
			
			<div class="text-block-img pt-2">
				<?php
				/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( esc_html__( ', ', 'climarisk' ) );
					if ( $categories_list ) {
						/* translators: 1: list of categories. */
						printf( '<h6 class="cat-links">' . esc_html__( 'Posted in %1$s', 'climarisk' ) . '</h6>', $categories_list ); 
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}

				?>
				<!--<b>ClimaRisk</b> - Divulgamos la ciencia del Cambio Climático-->
			</div>

		</div> <!-- Fin de container img -->

		

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
