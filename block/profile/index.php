<?php
/**
 * BLOCK: Profile
 *
 * Gutenberg Custom Profile Block assets.
 *
 * @since   1.0.0
 * @package OPB
 */

// Exit if accessed directly.
// if ( ! defined( 'ABSPATH' ) ) {
// 	exit;
// }

/**
 * Enqueue the block's assets for the editor.
 *
 * `wp-blocks`: Includes block type registration and related functions.
 * `wp-element`: Includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function organic_profile_block() {

	// Scripts.
	wp_register_script(
		'organic-profile-block-script', // Handle.
		plugins_url( 'block.js', __FILE__ ), // Block.js: We register the block here.
		array( 'wp-blocks', 'wp-element' ) // Dependencies, defined above.
		//filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
	);

	// Styles.
	wp_register_style(
		'organic-profile-block-editor-style', // Handle.
		plugins_url( 'editor.css', __FILE__ ), // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
	);
	wp_register_style(
		'organic-profile-block-frontend-style', // Handle.
		plugins_url( 'style.css', __FILE__ ), // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
	);
	wp_enqueue_style(
		'organic-profile-block-fontawesome', // Handle.
		plugins_url( 'font-awesome.css', __FILE__ ) // Font Awesome for social media icons.
	);

	// Here we actually register the block with WP, again using our namespacing
  // We also specify the editor script to be used in the Gutenberg interface
	register_block_type( 'profile/block', array(
		'editor_script' => 'organic-profile-block-script',
		'editor_style' => 'organic-profile-block-editor-style',
		'style' => 'organic-profile-block-frontend-style',
	) );

} // End function organic_profile_block_editor_assets().

// Hook: Editor assets.
add_action( 'init', 'organic_profile_block' );

/**
 * Enqueue the block's assets for the frontend.
 *
 * @since 1.0.0
 */
// function organic_profile_block_block_assets() {
// 	// Styles.
// 	wp_enqueue_style(
// 		'organic-profile-block-frontend', // Handle.
// 		plugins_url( 'style.css', __FILE__ ), // Block frontend CSS.
// 		array( 'wp-blocks' ), // Dependency to include the CSS after it.
// 		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' ) // filemtime — Gets file modification time.
// 	);
// 	wp_enqueue_style(
// 		'organic-profile-block-fontawesome', // Handle.
// 		plugins_url( 'font-awesome.css', __FILE__ ) // Font Awesome for social media icons.
// 	);
// } // End function organic_profile_block_block_assets().

// Hook: Frontend assets.
// add_action( 'init', 'organic_profile_block_block_assets' );
