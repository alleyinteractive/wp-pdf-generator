<?php
/**
 * PDF Generator class file
 *
 * @package wp-pdf-generator
 */

namespace Alley\WP\PDF;

use Dompdf\Dompdf;

/**
 * PDF Generator core class.
 */
class Generator {
	/**
	 * Initialize the PDF Generator hooks.
	 */
	public function __invoke(): void {
		add_filter( 'the_content', [ $this, 'add_download_button' ] );
		add_action( 'template_redirect', [ $this, 'generate_pdf' ] );
	}

	/**
	 * Adds a download button to the post content.
	 *
	 * @param string $content The post content.
	 * @return string The filtered post content.
	 */
	public function add_download_button( $content ): string {
		if (
			! get_the_ID() ||
			! (bool) get_post_meta( get_the_ID(), 'wp_pdf_generator_show', true ) ||
			isset( $_GET['download_pdf'] ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		) {
			return $content;
		}

		$permalink = get_permalink( get_the_ID() );

		$permalink = add_query_arg( 'download_pdf', true, $permalink );


		return $content .
			sprintf(
				'<a href="%s" download>DOWNLOAD PDF</a>',
				esc_url( $permalink )
			);
	}

	/**
	 * Generates the PDF file, and forces a download.
	 */
	public function generate_pdf(): void {
		if (
			! is_single() ||
			! isset( $_GET['download_pdf'] ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		) {
			return;
		}

		$post = get_post();

		if ( ! $post instanceof \WP_Post ) {
			return;
		}

		$content = apply_filters( 'the_content', $post->post_content ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound

		$dompdf = new Dompdf();
		$dompdf->loadHtml( $content );
		$dompdf->render();

		$output = $dompdf->output();

		if ( empty( $output ) ) {
			return;
		}

		$filename = sanitize_title( $post->post_title );

		header( 'Content-Type: application/pdf' );
		header( 'Content-Disposition: attachment; filename="' . $filename . '.pdf"' );
		header( 'Content-Length: ' . strlen( $output ) );

		/*
		 * This content is a raw PDF file. We aren't able to escape that.
		 */
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		exit;
	}
}
