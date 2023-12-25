<?php
/**
 * The global helper functions to use
 *
 * @since 1.0
 * @package JanchiShow
 */

/**
 * Callback function to format Podcast Tags into HTML strings
 *
 * @param WP_Term $podcast_tag the assigned podcast tags
 */
function tjs_podcast_tag_cb( WP_Term $podcast_tag ): string {
	return "<a href='/tag/{$podcast_tag->slug}'>{$podcast_tag->name}</a>";
}

/** Returns an array of tags or null if an error
 *
 * @param int $post_id the id of the post to get tags of
 */
function tjs_get_the_podcast_tags( int $post_id ): ?array {
	$podcast_tags = wp_get_post_terms( $post_id, 'post_tag' );
	return is_wp_error( $podcast_tags ) ? null : $podcast_tags;
}

/** Returns the Podcast Type or null if an error
 *
 * @param int $post_id the id of the post to get the term of
 */
function tjs_get_the_podcast_type( int $post_id ): ?WP_Term {
	$podcast_type = wp_get_post_terms( $post_id, 'podcast-type' );
	return is_wp_error( $podcast_type ) ? null : $podcast_type[0];
}

function bootscore_pagination( $pages = '', $range = 2 ) {
	$showitems = ( $range * 2 ) + 1;
	global $paged;
	// default page to one if not provided
	if ( empty( $paged ) ) {
		$paged = 1; // phpcs:ignore
	}
	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo '<nav aria-label="Page navigation">';
		echo '<span class="visually-hidden">' . esc_html__( 'Page navigation', 'bootscore' ) . '</span>';
		echo '<ul class="pagination justify-content-center mb-4">';

		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( 1 ) . '" aria-label="' . esc_html__( 'First Page', 'bootscore' ) . '">&laquo;</a></li>';
		}

		if ( $paged > 1 && $showitems < $pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged - 1 ) . '" aria-label="' . esc_html__( 'Previous Page', 'bootscore' ) . '">&lsaquo;</a></li>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? '<li class="page-item active"><span class="page-link"><span class="visually-hidden">' . __( 'Current Page', 'bootscore' ) . ' </span>' . $i . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $i ) . '"><span class="visually-hidden">' . __( 'Page', 'bootscore' ) . ' </span>' . $i . '</a></li>';
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( ( $paged === 0 ? 1 : $paged ) + 1 ) . '" aria-label="' . esc_html__( 'Next Page', 'bootscore' ) . '">&rsaquo;</a></li>';
		}

		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $pages ) . '" aria-label="' . esc_html__( 'Last Page', 'bootscore' ) . '">&raquo;</a></li>';
		}

		echo '</ul>';
		echo '</nav>';
	}
}
