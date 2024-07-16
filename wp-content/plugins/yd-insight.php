<?php

/*
	Plugin Name: YD Burrows Capital Insight Post Type
	Description: The Custom Post Type for Burrows Capital Insights
	Version: 1.0
	Author: YohDev
 */

function yd_bc_insight_cpt() {
	/**
	 * Post Type: Insight.
	 */
	$labels = [
		"name"						 => esc_html__( "Insight", "burrows-capital" ),
		"singular_name"				 => esc_html__( "Insight Member", "burrows-capital" ),
		"menu_name"					 => esc_html__( "Insight", "burrows-capital" ),
		"all_items"					 => esc_html__( "All Insight", "burrows-capital" ),
		"add_new"					 => esc_html__( "Add new", "burrows-capital" ),
		"add_new_item"				 => esc_html__( "Add new Insight Member", "burrows-capital" ),
		"edit_item"					 => esc_html__( "Edit Insight Member", "burrows-capital" ),
		"new_item"					 => esc_html__( "New Insight Member", "burrows-capital" ),
		"view_item"					 => esc_html__( "View Insight Member", "burrows-capital" ),
		"view_items"				 => esc_html__( "View Insight", "burrows-capital" ),
		"search_items"				 => esc_html__( "Search Insight", "burrows-capital" ),
		"not_found"					 => esc_html__( "No Insight found", "burrows-capital" ),
		"not_found_in_trash"		 => esc_html__( "No Insight found in trash", "burrows-capital" ),
		"parent"					 => esc_html__( "Parent Insight Member:", "burrows-capital" ),
		"featured_image"			 => esc_html__( "Featured image for this Insight Member", "burrows-capital" ),
		"set_featured_image"		 => esc_html__( "Set featured image for this Insight Member", "burrows-capital" ),
		"remove_featured_image"		 => esc_html__( "Remove featured image for this Insight Member", "burrows-capital" ),
		"use_featured_image"		 => esc_html__( "Use as featured image for this Insight Member", "burrows-capital" ),
		"archives"					 => esc_html__( "Insight Member archives", "burrows-capital" ),
		"insert_into_item"			 => esc_html__( "Insert into Insight Member", "burrows-capital" ),
		"uploaded_to_this_item"		 => esc_html__( "Upload to this Insight Member", "burrows-capital" ),
		"filter_items_list"			 => esc_html__( "Filter Insights list", "burrows-capital" ),
		"items_list_navigation"		 => esc_html__( "Insights list navigation", "burrows-capital" ),
		"items_list"				 => esc_html__( "Insights list", "burrows-capital" ),
		"attributes"				 => esc_html__( "Insights attributes", "burrows-capital" ),
		"name_admin_bar"			 => esc_html__( "Insight Member", "burrows-capital" ),
		"item_published"			 => esc_html__( "Insight Member published", "burrows-capital" ),
		"item_published_privately"	 => esc_html__( "Insight Member published privately.", "burrows-capital" ),
		"item_reverted_to_draft"	 => esc_html__( "Insight Member reverted to draft.", "burrows-capital" ),
		"item_trashed"				 => esc_html__( "Insight Member trashed.", "burrows-capital" ),
		"item_scheduled"			 => esc_html__( "Insight Member scheduled", "burrows-capital" ),
		"item_updated"				 => esc_html__( "Insight Member updated.", "burrows-capital" ),
		"parent_item_colon"			 => esc_html__( "Parent Insight Member:", "burrows-capital" ),
	];

	$args = [
		"label"					 => esc_html__( "Insight", "burrows-capital" ),
		"labels"				 => $labels,
		"description"			 => "",
		"public"				 => true,
		"publicly_queryable"	 => true,
		"show_ui"				 => true,
		"show_in_rest"			 => true,
		"rest_base"				 => "insight",
		"rest_controller_class"	 => "WP_REST_Posts_Controller",
		"rest_namespace"		 => "wp/v2",
		"has_archive"			 => false,
		"show_in_menu"			 => true,
		"show_in_nav_menus"		 => true,
		"delete_with_user"		 => false,
		"exclude_from_search"	 => false,
		"capability_type"		 => "post",
		"map_meta_cap"			 => true,
		"hierarchical"			 => false,
		"can_export"			 => true,
		"rewrite"				 => [ "slug" => "insight", "with_front" => true ],
		"query_var"				 => true,
		"menu_icon"				 => "dashicons-lightbulb",
		"supports"				 => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"taxonomies"			 => [ "category", "post_tag" ],
		"show_in_graphql"		 => false,
	];

	register_post_type( "bc_insight", $args );

    /**
     * ADD ACF fields for insight
     */
    acf_add_local_field_group(array(
        'key' => 'group_insight_details',
        'title' => 'Insight Details',
        'fields' => array(
			array(
				'key' => 'field_insight_file_upload',
				'label' => 'File Upload',
				'name' => 'file_upload',
				'type' => 'file',
				'instructions' => 'Upload a file for the insight.',
				'required' => 0,
				'return_format' => 'url', // Options: 'array', 'url', 'id'. Use 'array' for detailed information.
				'library' => 'all', // Options: 'all', 'uploadedTo'. 'all' allows access to the entire media library.
				'max_size' => '5000', // Maximum file size in KB
				'mime_types' => 'pdf,doc', // Comma-separated list of allowed file types, e.g., 'jpg,png,pdf,doc'
			),	
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'bc_insight',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));    
}

add_action( 'init', 'yd_bc_insight_cpt' );
