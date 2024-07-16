<?php
global $post;

$recs = get_field('records') ?: -1;
$tags = get_field('tags') ?: null;

$args = array(
    'post_type'      => 'bc_insight', 
    'post_status'    => 'publish', 
    'orderby'        => 'date', 
    'order'          => 'ASC', 
    'posts_per_page' => $recs 
);

if (!is_null($tags)) {
    $tags = explode(',', $tags);
    $args['tag_slug__in'] = $tags;
}

$team_query = new WP_Query($args);

if ($team_query->have_posts()) : 
    echo '<div class="wp-block-group alignwide small-screen-padding is-layout-flow wp-block-group-is-layout-flow">';
    echo '<div class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">';
    echo '<div class="wp-block-columns insights is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">';
    while ($team_query->have_posts()) : $team_query->the_post(); 
        $acf_title = get_field('field_insight_title',$post->ID);
        $imageURL = get_the_post_thumbnail_url($post->ID, 'card-large');
        $imageId = get_post_thumbnail_id( $post->ID );
        $imageAlt = get_post_meta($imageId, '_wp_attachment_image_alt', true);

        echo '<div class="insight-card acf-bc-insight-cards wp-block-column is-layout-flow wp-block-column-is-layout-flow">';
        echo '<div class="insight-card-image">';
        echo '<img src="' . $imageURL . '" alt="' . $imageAlt . '" />';
        echo '</div>';
        echo '<div class="insight-card-text">';
        echo '<h4>' . get_the_title() . '</h4>';
        echo '<div class="insight-content">' . get_the_content() . '</div>';
        echo '<a href="" class="btn">Download PDF <i class="download"></i></a>';
        echo '</div>';
        echo '</div>';
    endwhile;
    echo '</div>';
    echo '</div>';
    echo '</div>';
endif;
?>
