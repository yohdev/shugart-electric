<?php
global $post;

$args = array(
    'post_type'      => 'post', 
    'post_status'    => 'publish', 
    'orderby'        => 'date', 
    'order'          => 'ASC', 
    'posts_per_page' => 3 
);

$posts = new WP_Query($args);

if ($posts->have_posts()) : 
    echo '<div class="carousel-container">';
    $i = 1;
    while ($posts->have_posts()) : $posts->the_post(); 
        $imageURL = get_the_post_thumbnail_url($post->ID, 'card-large');
        $imageId = get_post_thumbnail_id( $post->ID );
        $imageAlt = get_post_meta($imageId, '_wp_attachment_image_alt', true);

        echo '<div id="carousel-column-' . $i . '" class="carousel-column';
        if ($i === 2) { echo ' selected '; }
        echo '">'; 
        echo '<div class="carousel-card-image">';
        echo '<img src="' . $imageURL . '" alt="' . $imageAlt . '" />';
        echo '</div>';
        echo '<div class="carousel-card-text">';
        echo '<div class="carousel-card-title">';
        echo '<h5>' . get_the_title() . '</h5>';
        echo '</div>';
        echo '<p class="carousel-card-excerpt">' . get_the_excerpt() . '</p>';
        echo '<div class="carousel-button">';
        echo '<a class="btn" href="' . get_the_permalink() . '">Read More <i class="play-btn"></i></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        $i++;
    endwhile;
    echo '</div>';
else:
    echo 'No Posts...';
endif;

?>