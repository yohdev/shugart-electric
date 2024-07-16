<?php

/*
	Plugin Name: YD Blocks
	Description: Custom Gutenberg blocks using ACF.
	Version: 1.0
	Author: YohDev
 */
function yd_blocks_register_blocks() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		// Register the Footer Menu block
		acf_register_block_type(
			array(
				'name'            => 'bc-menu',
				'title'           => __( 'Footer Menu' ),
				'description'     => __( 'A custom block for displaying the footer menu.' ),
                'render_callback'   => 'render_acf_menu_block',
				'category'        => 'core',
				'icon'            => 'menu',
				'keywords'        => array( 'yohdev', 'menu', 'footer', 'burrows' ),
			)
		);
		//Register the footer subscribe block
		acf_register_block_type(
			array(
				'name'            => 'bc-subscribe',
				'title'           => __( 'Subscribe' ),
				'description'     => __( 'A custom block for displaying the subscribe form.' ),
                'render_callback'   => 'render_acf_subscribe_block',
				'category'        => 'core',
				'icon'            => 'menu',
				'keywords'        => array( 'yohdev', 'subscribe', 'burrows' ),
			)
		);
		//Register the footer subscribe block
		acf_register_block_type(
			array(
				'name'            => 'bc-bcis-weekly',
				'title'           => __( 'BCIS Weekly' ),
				'description'     => __( 'A custom block for displaying BCIS Weekly subscribe form.' ),
                'render_template'   => plugin_dir_path( __FILE__ ) . 'blocks/bc-bcis-weekly/render.php',
				'category'        => 'core',
				'icon'            => 'menu',
				'keywords'        => array( 'yohdev', 'bcis weekly', 'subscribe', 'burrows' ),
			)
		);
		//Register the team cards
		acf_register_block_type(
			array(
				'name'            => 'bc-team-cards',
				'title'           => __( 'Team Cards' ),
				'description'     => __( 'A custom block for displaying team member cards.' ),
                'render_template' => plugin_dir_path( __FILE__ ) . 'blocks/bc-team-cards/render.php',
				'category'        => 'core',
				'icon'            => 'menu',
				'keywords'        => array( 'yohdev', 'team', 'cards', 'burrows' ),
			)
		);
        //Hero Block
        acf_register_block_type(
            array(
            'name'              => 'bc-hero',
            'title'             => __('Hero Block'),
            'description'       => __('A custom block for displaying a hero image and text.'),
            'render_template'   => plugin_dir_path( __FILE__ ) . 'blocks/bc-hero/render.php',
            'category'          => 'core',
            'icon'              => 'format-image',
            'keywords'          => array('yohdev', 'hero', 'burrows'),
            'supports'          => array(
                'align' => false,
                'mode' => false,
                'jsx' => true,
                'innerBlocks' => true,  
            ),
        ));
        acf_register_block_type(array(
            'name'              => 'bc-insight-cards',
            'title'             => __('Insight Cards'),
            'description'       => __('A custom block for displaying insight cards.'),
            'render_template'   => plugin_dir_path( __FILE__ ) . 'blocks/bc-insight-cards/render.php',
            'category'          => 'formatting',
            'icon'              => 'admin-post',
            'keywords'          => array( 'yohdev', 'insights', 'burrows' ),
        ));              
        acf_register_block_type(array(
            'name'              => 'bc-carousel',
            'title'             => __('Landing Carousel'),
            'description'       => __('A custom block for displaying the landing page on the carousel.'),
            'render_template'   => plugin_dir_path( __FILE__ ) . 'blocks/bc-carousel/render.php',
            'category'          => 'formatting',
            'icon'              => 'admin-post',
            'keywords'          => array( 'yohdev', 'carousel', 'burrows' ),
        ));              
        
        
/**
 * Custom fields for blocks
 */
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_image_text_overlay',
        'title' => 'Image with Text Overlay',
        'fields' => array(
            array(
                'key' => 'hero_image',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'hero_background_color',
                'label' => 'Background Color',
                'name' => 'background_color',
                'type' => 'color_picker',
                'default_value' => '#ffffff',
            ),   
            array(
                'key' => 'hero_max_height',
                'label' => 'Max Height',
                'name' => 'max_height',
                'type' => 'number',
                'instructions' => 'Enter the maximum height in pixels.',
                'default_value' => '500',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'px',
                'min' => 0,
            ),
            array(
                'key' => 'hero_height',
                'label' => 'Height',
                'name' => 'height',
                'type' => 'number',
                'instructions' => 'Enter the height in % window height.',
                'default_value' => '60',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'vh',
                'min' => 0,
            ), 
            array(
                'key' => 'show_screen',
                'label' => 'Show Screen',
                'name' => 'show_screen',
                'type' => 'checkbox',
                'instructions' => 'Check to display a screen over image.',
                'choices' => array(
                    'yes' => 'Yes'
                ),
                'default_value' => array(),
                'layout' => 'vertical',
                'toggle' => false,
                'return_format' => 'value',
            )                                 
        ),      
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/bc-hero',
                ),
            ),
        ),
    ));

    acf_add_local_field_group(array(
        'key' => 'bc_insights_fields',
        'title' => 'Insights',
        'fields' => array(
            array(
                'key' => 'records',
                'label' => 'Records',
                'name' => 'records',
                'type' => 'number',
                'instructions' => 'Number of records to show',
                'default_value' => '0',
                'placeholder' => '',
                'prepend' => '',
            ), 
            array(
                'key' => 'tags',
                'label' => 'Tags (comma seperated list)',
                'name' => 'tags',
                'type' => 'text',
                'instructions' => 'Show posts with these tags',
                'default_value' => '',
                'placeholder' => 'tags',
                'prepend' => '',
            ), 
        ),      
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/bc-insight-cards',
                ),
            ),
        ),
    ));
    endif;
}
}
add_action( 'acf/init', 'yd_blocks_register_blocks' );


/**
 * Print a menu
 */
function render_acf_menu_block($block) {
    // Get ACF fields for this block (if any)
	$menu_name = get_field('menu_name', $block['id']) ?: 'footer-menu';
    // Check if the menu exists
    if ( has_nav_menu( $menu_name ) ) {
        wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'menu_class'     => 'footer-menu',
            'container'      => 'nav',
            'container_class'=> 'footer-menu-container',
        ));
    } else {
        echo 'Menu not found.';
    }
}


/**
 * Print subscribe form
 */
function render_acf_subscribe_block($blocks) {
	?>
	<form id="subscribe">
	<input type="email" id="bc-email" name="email" placeholder="Email" required />
	<input type="submit" id="bc-submit" value="Send" />
	</form>
	<?php
}

function yd_enqueue_editor_assets() {
    // Enqueue block editor styles for bc-menu
    wp_enqueue_style(
        'editor-custom-block-menu',
        plugin_dir_url(__FILE__) . '/blocks/bc-menu/editor-style.css',
        array(),
        '1.0.0'
    );
    // Enqueue block editor styles for bc-subscribe
    wp_enqueue_style(
        'editor-custom-block-subscribe',
        plugin_dir_url(__FILE__) . '/blocks/bc-subscribe/editor-style.css',
        array(),
        '1.0.0'
    );
    // Enqueue block editor styles for bc-insight-cards
    wp_enqueue_style(
        'editor-custom-block-insight',
        plugin_dir_url(__FILE__) . '/blocks/bc-insight-cards/editor-style.css',
        array(),
        '1.0.0'
    );
}
add_action('enqueue_block_editor_assets', 'yd_enqueue_editor_assets');

function yd_enqueue_block_assets() {
    global $post;
    // Enqueue block editor styles for bc-menu
    wp_enqueue_style(
        'custom-block-header-menu',
        plugin_dir_url(__FILE__) . '/blocks/bc-header-menu/style.css',
        array(),
        '1.0.0'
    );
    // Enqueue block editor styles for bc-menu
    wp_enqueue_style(
        'custom-block-menu',
        plugin_dir_url(__FILE__) . '/blocks/bc-menu/style.css',
        array(),
        '1.0.0'
    );
    // Enqueue block editor styles for bc-menu
	wp_enqueue_style(
		'custom-block-subscribe',
		plugin_dir_url(__FILE__) . '/blocks/bc-subscribe/style.css',
		array(),
		'1.0.0'
	);
    if (has_block('acf/bc-team-cards', get_the_ID())) { //fix me add to above
        wp_enqueue_style(
            'custom-block-team-cards',
            plugin_dir_url(__FILE__) . '/blocks/bc-team-cards/style.css',
            array(),
            '1.0.0'
        );
    }
    if (has_block('acf/bc-insight-cards', get_the_ID())) { //fix me add to above
        wp_enqueue_style(
            'custom-block-insight-cards',
            plugin_dir_url(__FILE__) . '/blocks/bc-insight-cards/style.css',
            array(),
            '1.0.0'
        );
    }
    wp_enqueue_style(
        'custom-block-bcis-weekly',
        plugin_dir_url(__FILE__) . '/blocks/bc-bcis-weekly/style.css',
        array(),
        '1.0.0'
    );
    if (has_block('acf/bc-hero', get_the_ID())) { //fix me add to above
        wp_enqueue_style(
            'custom-block-hero',
            plugin_dir_url(__FILE__) . '/blocks/bc-hero/style.css',
            array(),
            '1.0.0'
        );
    };

    // CAROUSEL
	wp_enqueue_style(
		'custom-block-carousel',
		plugin_dir_url(__FILE__) . '/blocks/bc-carousel/style.css',
		array(),
		'1.0.0'
	);
	wp_enqueue_script(
		'custom-block-carousel',
		plugin_dir_url(__FILE__) . '/blocks/bc-carousel/carousel.js',
		array(),
		'1.0.0'
	);

}
add_action('enqueue_block_assets', 'yd_enqueue_block_assets');

/**
 * BC Header Nav WAlker
 */
  class BC_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : ' dropdown-content';
        $output .= "\n$indent<ul class=\"$submenu depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';
		$arrow = '';
		if ($depth) { $arrow = '<i class="arrow right"></i>'; }

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'sub-menu-item';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= $arrow;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

