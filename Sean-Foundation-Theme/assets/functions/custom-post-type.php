<?php
/* joints Featured Post Type Example
This page walks you through creating 
a Featured Post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/
/*
function custom_post_types() {

	register_post_type( 'slider',  
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Sliders', 'jointstheme'), 
			'singular_name' => __('Slider', 'jointstheme'), 
			'all_items' => __('All Sliders', 'jointstheme'), 
			'add_new' => __('Add New', 'jointstheme'), 
			'add_new_item' => __('Add New Slider', 'jointstheme'), 
			'edit' => __( 'Edit', 'jointstheme' ), 
			'edit_item' => __('Edit Slider', 'jointstheme'), 
			'new_item' => __('New Slider', 'jointstheme'), 
			'view_item' => __('View Slider', 'jointstheme'), 
			'search_items' => __('Search Sliders', 'jointstheme'), 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), 
			'parent_item_colon' => ''
			), 
			'description' => __( 'A listing of all Sliders', 'jointstheme' ), 
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, 
			'menu_icon' => 'dashicons-format-gallery', 
			'rewrite'	=> array( 'slug' => 'slider', 'with_front' => false ), 
			'has_archive' => 'slider', 
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title')
	 	) 
	); 
} 
	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_types');
    */
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */

// let's create the function for the custom type
function featured_post() { 
	// creating (registering) the custom type 
	register_post_type( 'featured_post', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Featured Posts', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Featured Post', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Featured Posts', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Custom Type', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Post Type', 'jointswp'), /* New Display Title */
			'view_item' => __('View Post Type', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Post Type', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'These are featured posts displayed in a carousel at the top of the page', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-pressthis', /* the icon for the Featured Post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'featured_post', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'featured_post', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'sticky','excerpt')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your Featured Post type */
	register_taxonomy_for_object_type('category', 'featured_post');
	/* this adds your post tags to your Featured Post type */
	//register_taxonomy_for_object_type('post_tag', 'featured_post');
	
} 

// adding the function to the Wordpress init
add_action( 'init', 'featured_post');