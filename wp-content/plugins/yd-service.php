<?php

/*
	Plugin Name: YD Burrows Capital Service Post Type
	Description: The Custom Post Type for Burrows Capital Services
	Version: 1.0
	Author: YohDev
 */

function yd_bc_service_cpt() {
	/**
	 * Post Type: Service.
	 */
	$labels = [
		"name"						 => esc_html__( "Service", "burrows-capital" ),
		"singular_name"				 => esc_html__( "Service", "burrows-capital" ),
		"menu_name"					 => esc_html__( "Service", "burrows-capital" ),
		"all_items"					 => esc_html__( "All Services", "burrows-capital" ),
		"add_new"					 => esc_html__( "Add new", "burrows-capital" ),
		"add_new_item"				 => esc_html__( "Add new Service", "burrows-capital" ),
		"edit_item"					 => esc_html__( "Edit Service", "burrows-capital" ),
		"new_item"					 => esc_html__( "New Service", "burrows-capital" ),
		"view_item"					 => esc_html__( "View Services", "burrows-capital" ),
		"view_items"				 => esc_html__( "View Services", "burrows-capital" ),
		"search_items"				 => esc_html__( "Search Services", "burrows-capital" ),
		"not_found"					 => esc_html__( "No Service found", "burrows-capital" ),
		"not_found_in_trash"		 => esc_html__( "No Service found in trash", "burrows-capital" ),
		"parent"					 => esc_html__( "Parent Service:", "burrows-capital" ),
		"featured_image"			 => esc_html__( "Featured image for this Service", "burrows-capital" ),
		"set_featured_image"		 => esc_html__( "Set featured image for this Service", "burrows-capital" ),
		"remove_featured_image"		 => esc_html__( "Remove featured image for this Service", "burrows-capital" ),
		"use_featured_image"		 => esc_html__( "Use as featured image for this Service", "burrows-capital" ),
		"archives"					 => esc_html__( "Service archives", "burrows-capital" ),
		"insert_into_item"			 => esc_html__( "Insert into Service", "burrows-capital" ),
		"uploaded_to_this_item"		 => esc_html__( "Upload to this Service", "burrows-capital" ),
		"filter_items_list"			 => esc_html__( "Filter Sercive list", "burrows-capital" ),
		"items_list_navigation"		 => esc_html__( "Sercive list navigation", "burrows-capital" ),
		"items_list"				 => esc_html__( "Sercive list", "burrows-capital" ),
		"attributes"				 => esc_html__( "Sercive attributes", "burrows-capital" ),
		"name_admin_bar"			 => esc_html__( "Service", "burrows-capital" ),
		"item_published"			 => esc_html__( "Service published", "burrows-capital" ),
		"item_published_privately"	 => esc_html__( "Service published privately.", "burrows-capital" ),
		"item_reverted_to_draft"	 => esc_html__( "Service reverted to draft.", "burrows-capital" ),
		"item_trashed"				 => esc_html__( "Service trashed.", "burrows-capital" ),
		"item_scheduled"			 => esc_html__( "Service scheduled", "burrows-capital" ),
		"item_updated"				 => esc_html__( "Service updated.", "burrows-capital" ),
		"parent_item_colon"			 => esc_html__( "Parent Service:", "burrows-capital" ),
	];

	$args = [
		"label"					 => esc_html__( "Service", "burrows-capital" ),
		"labels"				 => $labels,
		"description"			 => "",
		"public"				 => true,
		"publicly_queryable"	 => true,
		"show_ui"				 => true,
		"show_in_rest"			 => true,
		"rest_base"				 => "service",
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
		"rewrite"				 => [ "slug" => "service", "with_front" => true ],
		"query_var"				 => true,
		"menu_icon"				 => "dashicons-lightbulb",
		"supports"				 => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"taxonomies"			 => [ "category", "post_tag" ],
		"show_in_graphql"		 => false,
	];

	register_post_type( "bc_service", $args );

    /**
     * ADD ACF fields for service
     */
    acf_add_local_field_group(array(
        'key' => 'group_service_details',
        'title' => 'Service Details',
        'fields' => array(
			array(
				'key' => 'field_service_file_upload',
				'label' => 'File Upload',
				'name' => 'file_upload',
				'type' => 'file',
				'instructions' => 'Upload a file for the service.',
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

add_action( 'init', 'yd_bc_service_cpt' );
