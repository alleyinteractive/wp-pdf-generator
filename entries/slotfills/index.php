<?php
/**
 * Slotfills script registration and enqueue.
 *
 * This file will be copied to the assets build directory.
 *
 * @package wp-pdf-generator
 */

namespace Alley\WP\PDF;

use function add_action;
use function wp_register_script;
use function wp_set_script_translations;
use function wp_enqueue_script;

add_action(
	'enqueue_block_editor_assets',
	__NAMESPACE__ . '\action_enqueue_slotfills_assets'
);

/**
 * Registers all slotfill assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 */
function register_slotfills_scripts(): void {
	// Automatically load dependencies and version.
	$asset_file = include __DIR__ . '/index.asset.php';

	wp_register_script(
		'wp-pdf-generator-slotfills',
		plugins_url( 'index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
	wp_set_script_translations( 'wp-pdf-generator-slotfills', 'wp-pdf-generator' );

}
add_action( 'init', __NAMESPACE__ . '\register_slotfills_scripts' );

/**
 * Enqueue block editor assets for this slotfill.
 */
function action_enqueue_slotfills_assets(): void {
	wp_enqueue_script( 'wp-pdf-generator-slotfills' );
}
