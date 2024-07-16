<?php
/**
 * Preload Google Font(s)
 */
function preload_filter( $html, $handle ){
    if (in_array($handle, ['bc-playfair', 'bc-segoe'])) {
        $html = str_replace("rel='stylesheet'", "rel='preload' as='style' ", $html);
    }
    return $html;
}
add_filter( 'style_loader_tag',  'preload_filter', 10, 2 );

/**
 * Enqueue scripts and styles.
*/
function bc_scripts() {
    // Playfair Font
    wp_enqueue_style('bc-playfair', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
    // Nunito Font
    wp_enqueue_style('bc-nunito', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet');
    // Segoe Font
    wp_enqueue_style('bc-segoe', get_theme_file_uri('/assets/fonts/SegoeUI-VF.ttf'));

    // Main stylesheet
	wp_enqueue_style(
		'bc-global-styles', get_theme_file_uri( '/assets/styles/global.css' ), array(), md5_file( get_template_directory( '/assets/styles/global.css' )));
}
add_action( 'wp_enqueue_scripts', 'bc_scripts' );


function enqueue_custom_block_styles() {
    // Playfair Font
    wp_enqueue_style('bc-playfair', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
    // Nunito Font
    wp_enqueue_style('bc-nunito', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet');

    // Enqueue block editor styles for bc-menu
    wp_enqueue_style(
        'custom-block-styles',
        get_theme_file_uri( '/assets/styles/blocks.css' ),
        array(),
        '1.0.0'
    );
}
add_action('enqueue_block_assets', 'enqueue_custom_block_styles');

