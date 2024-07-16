<?php
    // Get ACF fields


    $image = get_field('image') ?: '';
    $text = get_field('text') ?: 'Add Heading';
    $screen = get_field('show_screen') ? ' has-overlay': '';
    $heroHeight = ((get_field('height')) && (get_field('height')!==0)) ? get_field('height'): 'auto';
    $heroMaxHeight = ((get_field('max_height')) && (get_field('height')!==0)) ? get_field('max_height') : 'none';
    $backgoundColor = get_field('background_color') ?: 'var(--wp--preset--color--white)';


    if ($heroHeight != 'auto') {
        $heroHeight = (string)$heroHeight . 'vh';
    }
    if ($heroMaxHeight != 'none') {
        $heroMaxHeight = (string)$heroMaxHeight . 'px';
    }

    // Create class attribute allowing for custom "align" values.
    $className = 'image-text-overlay';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
    
    // Block content
    echo '<div class="' . esc_attr($className) . ' wp-block-group block-hero-container is-layout-flow wp-block-group-is-layout-flow" style="background-color:' . $backgoundColor . '; height:' . $heroHeight . '; max-height: ' . $heroMaxHeight . '">';
    if (trim($image) != '') {
        echo '<figure class="hero-img-container' . $screen . '">';
        echo '<img src="' . esc_url($image) . '" style="width: 100%; height: auto;">';
        echo '</figure>';
    }
    echo '<div class="overlay-text"><!-- Inner block container, allows users to add new blocks --><InnerBlocks /></div>';
    echo '</div>';
