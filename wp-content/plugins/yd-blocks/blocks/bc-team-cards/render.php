<?php
global $post;
$args = array(
    'post_type'      => 'bc_team', // Custom post type
    'post_status'    => 'publish', // Only get published posts
    'orderby'        => 'menu_order', // Order by menu order
    'order'          => 'ASC', // Ascending order
    'posts_per_page' => -1 // Get all posts
);

$team_query = new WP_Query($args);

if ($team_query->have_posts()) : 
    echo '<div class="wp-block-group alignwide small-screen-padding is-layout-flow wp-block-group-is-layout-flow">';
    echo '<div class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">';
    echo '<div class="wp-block-columns team is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">';
    while ($team_query->have_posts()) : $team_query->the_post(); 
        $acf_title = get_field('field_team_member_title',$post->ID);
        $imageURL = get_the_post_thumbnail_url($post->ID, 'card');
        $imageId = get_post_thumbnail_id( $post->ID );
        $imageAlt = get_post_meta($imageId, '_wp_attachment_image_alt', true);

        echo '<div class="team-card wp-block-column is-layout-flow wp-block-column-is-layout-flow">';
        echo '<div class="team-card-image">';
        echo '<img src="' . $imageURL . '" alt="' . $imageAlt . '" />';
        echo '</div>';
        echo '<div class="team-card-text">';
        echo '<h3>' . get_the_title() . '</h3>';
        echo '<div class="team-title">' . $acf_title . '</div>';
        echo '</div>';
        echo '</div>';
    endwhile;
    echo '</div>';
    echo '</div>';
    echo '</div>';
endif;
?>
