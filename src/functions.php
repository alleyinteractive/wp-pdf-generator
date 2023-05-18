<?php
/**
 * Helper functions
 *
 * @package wp-pdf-generator
 */

namespace Alley\WP\PDF;

/**
 * A function to add the Download link directly to template files.
 *
 * Example:
 * ```
 * if ( function_exists( '\Alley\WP\PDF\the_download_link' ) ) {
 *     \Alley\WP\PDF\the_download_link( 'Download PDF Version of this post' );
 * }
 * ```
 *
 * @param string   $name The link text.
 * @param int|null $post_id The post ID to generate the download link for. Defaults to current post.
 * @return void
 */
function the_download_link( string $name = 'DOWNLOAD PDF', ?int $post_id = null ): void {
	$permalink = get_the_download_link( $post_id );

	if ( empty( $permalink ) ) {
		return;
	}

	printf(
		'<a href="%s" download>%s</a>',
		esc_url( $permalink ),
		esc_html( $name ),
	);
}

/**
 * A function to add the Download link directly to template files.
 *
 * Example:
 * ```
 * if ( function_exists( '\Alley\WP\PDF\get_the_download_link' ) ) {
 *     $pdf_download_link = \Alley\WP\PDF\get_the_download_link();
 *     // ... do something with the link ...
 * }
 * ```
 *
 * @param int|null $post_id The post ID to generate the download link for. Defaults to current post.
 * @return null|string
 */
function get_the_download_link( ?int $post_id = null ): ?string {
	if ( empty( $post_id ) ) {
		$post_id = get_the_ID();
	}

	if (
		! $post_id ||
		! (bool) get_post_meta( $post_id, 'wp_pdf_generator_show', true ) ||
		isset( $_GET['download_pdf'] ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	) {
		return null;
	}

	$permalink = get_permalink( $post_id );

	return add_query_arg( 'download_pdf', true, $permalink );
}
