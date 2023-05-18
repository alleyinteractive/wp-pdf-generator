<?php
/**
 * PDF Generator class file
 *
 * @package wp-pdf-generator
 */

namespace Alley\WP\PDF;

/**
 * PDF Generator core class.
 */
class Generator {

	/**
	 * Initialize the PDF Generator hooks.
	 */
	public function __invoke(): void {
		add_action( 'the_content', [$this, 'add_download_button'] );
	}

	public function add_download_button( $content ): string {
		if (
			! get_the_ID() ||
			! (bool) get_post_meta( get_the_ID(), 'wp_pdf_generator_show', true )
		) {
			return $content;
		}

		return $content . '<button>DOWNLOAD PDF</button>';
	}
}
