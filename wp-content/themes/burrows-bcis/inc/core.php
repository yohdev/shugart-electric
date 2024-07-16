<?php
/**
 * Allow svg file upload
 */
function add_svg_to_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');

function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg');

/**
 * Register Menus
 */
function register_my_menus() {
	register_nav_menus(
	  array(
		'header-menu' => __( 'Header Menu' ),
		'footer-menu' => __( 'Footer Menu' )
	  )
	);
  }
  add_action( 'init', 'register_my_menus' );

  /**
   * Register Image Sizes
   */
function bc_custom_image_sizes() {
    add_image_size( 'card', 200, 400, true ); // True indicates cropping enabled
    add_image_size( 'card-large', 400, 600, true ); // True indicates cropping enabled
}
add_action( 'after_setup_theme', 'bc_custom_image_sizes' );

  