<?php
/* joints Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/

function custom_post_types() {

	register_post_type( 'slider',  
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Sliders', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Slider', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Sliders', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Slider', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Slider', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Slider', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Slider', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Sliders', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'A listing of all Sliders', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-format-gallery', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'slider', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'slider', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title')
	 	) /* end of options */
	); /* end of register post type */
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_types');
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */