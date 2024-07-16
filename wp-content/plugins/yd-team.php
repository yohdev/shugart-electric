<?php

/*
	Plugin Name: YD Burrows Capital Team Post Type
	Description: The Custom Post Type for Burrows Capital Team
	Version: 1.0
	Author: YohDev
 */

function yd_bc_team_cpt() {

	/**
	 * Post Type: Team.
	 */
	$labels = [
		"name"						 => esc_html__( "Team", "burrows-capital" ),
		"singular_name"				 => esc_html__( "Team Member", "burrows-capital" ),
		"menu_name"					 => esc_html__( "Team", "burrows-capital" ),
		"all_items"					 => esc_html__( "All Team", "burrows-capital" ),
		"add_new"					 => esc_html__( "Add new", "burrows-capital" ),
		"add_new_item"				 => esc_html__( "Add new Team Member", "burrows-capital" ),
		"edit_item"					 => esc_html__( "Edit Team Member", "burrows-capital" ),
		"new_item"					 => esc_html__( "New Team Member", "burrows-capital" ),
		"view_item"					 => esc_html__( "View Team Member", "burrows-capital" ),
		"view_items"				 => esc_html__( "View Team", "burrows-capital" ),
		"search_items"				 => esc_html__( "Search Team", "burrows-capital" ),
		"not_found"					 => esc_html__( "No Team found", "burrows-capital" ),
		"not_found_in_trash"		 => esc_html__( "No Team found in trash", "burrows-capital" ),
		"parent"					 => esc_html__( "Parent Team Member:", "burrows-capital" ),
		"featured_image"			 => esc_html__( "Featured image for this Team Member", "burrows-capital" ),
		"set_featured_image"		 => esc_html__( "Set featured image for this Team Member", "burrows-capital" ),
		"remove_featured_image"		 => esc_html__( "Remove featured image for this Team Member", "burrows-capital" ),
		"use_featured_image"		 => esc_html__( "Use as featured image for this Team Member", "burrows-capital" ),
		"archives"					 => esc_html__( "Team Member archives", "burrows-capital" ),
		"insert_into_item"			 => esc_html__( "Insert into Team Member", "burrows-capital" ),
		"uploaded_to_this_item"		 => esc_html__( "Upload to this Team Member", "burrows-capital" ),
		"filter_items_list"			 => esc_html__( "Filter Team list", "burrows-capital" ),
		"items_list_navigation"		 => esc_html__( "Team list navigation", "burrows-capital" ),
		"items_list"				 => esc_html__( "Team list", "burrows-capital" ),
		"attributes"				 => esc_html__( "Team attributes", "burrows-capital" ),
		"name_admin_bar"			 => esc_html__( "Team Member", "burrows-capital" ),
		"item_published"			 => esc_html__( "Team Member published", "burrows-capital" ),
		"item_published_privately"	 => esc_html__( "Team Member published privately.", "burrows-capital" ),
		"item_reverted_to_draft"	 => esc_html__( "Team Member reverted to draft.", "burrows-capital" ),
		"item_trashed"				 => esc_html__( "Team Member trashed.", "burrows-capital" ),
		"item_scheduled"			 => esc_html__( "Team Member scheduled", "burrows-capital" ),
		"item_updated"				 => esc_html__( "Team Member updated.", "burrows-capital" ),
		"parent_item_colon"			 => esc_html__( "Parent Team Member:", "burrows-capital" ),
	];

	$args = [
		"label"					 => esc_html__( "Team", "burrows-capital" ),
		"labels"				 => $labels,
		"description"			 => "",
		"public"				 => true,
		"publicly_queryable"	 => true,
		"show_ui"				 => true,
		"show_in_rest"			 => true,
		"rest_base"				 => "team",
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
		"rewrite"				 => [ "slug" => "team", "with_front" => true ],
		"query_var"				 => true,
		"menu_icon"				 => "dashicons-groups",
		"supports"				 => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"taxonomies"			 => [ "category", "post_tag" ],
		"show_in_graphql"		 => false,
	];

	register_post_type( "bc_team", $args );

    /**
     * ADD ACF fields for team
     */
    acf_add_local_field_group(array(
        'key' => 'group_team_member_details',
        'title' => 'Team Member Details',
        'fields' => array(
            array(
                'key' => 'field_team_member_title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'instructions' => 'Enter the title of the team member.',
                'required' => 1,
            ),
            array(
                'key' => 'field_team_member_email',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'instructions' => 'Enter the email address of the team member.',
                'required' => 0,
            ),
            array(
                'key' => 'field_team_member_phone',
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'type' => 'text',
                'instructions' => 'Enter the phone number of the team member.',
                'required' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'bc_team',
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

add_action( 'init', 'yd_bc_team_cpt' );
