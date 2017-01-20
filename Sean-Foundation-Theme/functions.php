<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php'); 

// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/assets/functions/disable-emoji.php'); 

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php'); 

// Use this as a template for custom post types
 //require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php'); 

//add crop sizes
add_image_size( 'carousel', 1920, 775, true ); //(cropped)
add_image_size( 'sub-carousel', 1920, 675, true ); //(cropped)
add_image_size( 'frontpage-group', 500, 375, true );
add_image_size( 'program-intro', 673, 378, true );
add_image_size( 'article', 684, 385, true );
add_image_size( 'team', 300, 400, true );



/* ENQUEUE SCRIPTS = */
add_action( 'wp_enqueue_scripts', 'cyh_load_scripts_and_styles' );
function cyh_load_scripts_and_styles(){
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'lightslider-js', get_template_directory_uri() . '/assets/js/lightslider.js');
    wp_enqueue_script( 'main_scripts-js', get_template_directory_uri() . '/assets/js/main_scripts.js');
    wp_enqueue_style( 'ligtslider-css', get_template_directory_uri() . '/assets/css/lightslider.min.css');
}

//Fonts
function load_fonts() {
        wp_register_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=Playfair+Display');
        wp_enqueue_style( 'et-googleFonts');
    }
add_action('wp_print_styles', 'load_fonts');

/*
//hide admin panels
function cmd_remove_admin_menu_items() {
    remove_menu_page('upload.php');              // Media
    remove_menu_page('link-manager.php');        // Links
    remove_menu_page('edit-comments.php');       // Comments
    //remove_menu_page('plugins.php');             // Plugins
    remove_menu_page('themes.php');              // Appearance
    remove_menu_page('tools.php');               // Tools
    remove_menu_page('options-general.php');     // Settings
    remove_menu_page( 'edit.php' );                   //Posts
}
add_action( 'admin_menu', 'cmd_remove_admin_menu_items' );
	
	
//hide dashboard widgets
function cmd_remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action( 'wp_dashboard_setup', 'cmd_remove_dashboard_widgets' );
*/