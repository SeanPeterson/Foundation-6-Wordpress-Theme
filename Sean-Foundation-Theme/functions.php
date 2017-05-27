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
require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php'); 

// Customized categories widget for offcanvas menu
 require_once(get_template_directory().'/assets/functions/class-wp-widget-categories-offcanvas.php'); 

//add crop sizes
add_image_size( 'carousel', 1920, 775, true ); //(cropped)
add_image_size( 'sub-carousel', 1920, 675, true ); //(cropped)
add_image_size( 'frontpage-group', 500, 375, true );
add_image_size( 'program-intro', 673, 378, true );
add_image_size( 'article', 684, 385, true );
add_image_size( 'team', 300, 400, true );

// enable async enqueueing of scripts. add #asyncload to end of url
//https://ikreativ.com/async-with-wordpress-enqueue/
function ikreativ_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
    return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );


/* ENQUEUE SCRIPTS = */
add_action( 'wp_enqueue_scripts', 'cyh_load_scripts_and_styles' );
function cyh_load_scripts_and_styles(){
    wp_enqueue_script( 'jquery' );
    //wp_enqueue_script( 'lightslider-js', get_template_directory_uri() . '/assets/js/lightslider.js');

    $APIKey = "AIzaSyBeprTX5VRVwwyMlrPIHdXmp0yjJvMk7a0";
    $youtubeAPIURL = 'https://www.googleapis.com/youtube/v3?key=' . $APIKey;
    wp_enqueue_script( 'youtube', 'https://apis.google.com/js/client.js?onload=onClientLoad#asyncload');

    wp_register_script('main_scripts-js',get_stylesheet_directory_uri() . '/assets/js/main_scripts.js#asyncload', 'youtube' ,false, '3');
    wp_enqueue_script('main_scripts-js');

    //wp_register_script('modernizr',get_stylesheet_directory_uri() . '/assets/js/modernizr-custom.js' ,false, '1');
    //wp_enqueue_script('modernizr');

        //<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
    wp_register_script('instagram_js','//platform.instagram.com/en_US/embeds.js#asyncload', 'main_scripts-js' ,false, '3');
    wp_enqueue_script('instagram_js');

    //wp_enqueue_style( 'ligtslider-css', get_template_directory_uri() . '/assets/css/lightslider.min.css');

    //pass string ('postinfinite.ajax_url') to the script (can pass as many strings as you want).
    
    wp_localize_script( 'main_scripts-js', 'postArray', array( 
        'ajax_url' => admin_url( 'admin-ajax.php' ), //postinfinite.ajax_url will output the url of the admin-ajax.php file
        'YOUTUBE_API_KEY' => YOUTUBE_API_KEY,
        'INSTAGRAM_CLIENT_ID' => INSTAGRAM_CLIENT_ID,
        'INSTAGRAM_ACCESS_TOKEN' => INSTAGRAM_ACCESS_TOKEN
        //'postID' => $post->ID //pass post id
    ));
    
    
}

//Fonts
/*
function load_fonts() {
        wp_register_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=Playfair+Display');
        wp_enqueue_style( 'et-googleFonts');
    }
add_action('wp_print_styles', 'load_fonts');
*/
//hide admin panels

function cmd_remove_admin_menu_items() {

    // provide a list of usernames who can edit custom field definitions here
    $admins = array( 
        'sports',
        'Sean'
    );

    // get the current user
    $current_user = wp_get_current_user();
    // match and remove if needed
    if( !in_array( $current_user->user_login, $admins ) )
        {
        //remove_menu_page('upload.php');              // Media
        //remove_menu_page('link-manager.php');        // Links
        //remove_menu_page('edit-comments.php');       // Comments
        remove_menu_page('plugins.php');             // Plugins
        remove_menu_page('themes.php');              // Appearance
        remove_menu_page('tools.php');               // Tools
        remove_menu_page('options-general.php');     // Settings
        //remove_menu_page( 'edit.php' );            //posts
        remove_menu_page('wpfront-plugins'); //clients
        remove_menu_page('sb-instagram-feed'); //clients
    }                  
}
add_action( 'admin_menu', 'cmd_remove_admin_menu_items' );
    
    
//hide dashboard widgets

function cmd_remove_dashboard_widgets() {

    // provide a list of usernames who can edit custom field definitions here
    $admins = array( 
        'LookAgency'
    );

    // get the current user
    $current_user = wp_get_current_user();
    // match and remove if needed
    if( !in_array( $current_user->user_login, $admins ) )
    {
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    }
}
add_action( 'wp_dashboard_setup', 'cmd_remove_dashboard_widgets' );

//custom excerpt
add_action('init', 'custom_excerpt');
function custom_excerpt(){
    global $post;

    if ( ! empty($post) && is_a($post, 'WP_Post') ) :

        $content = $post->post_content;
        //clean content (was causing bugs before)
        $content = strip_tags($content);
        $pieces = explode(" ", $content);
        $excerpt = implode(" ", array_splice($pieces, 0, 35)); //Get first N words
        $excerpt .= " ...";

        //$excerpt .= '<br> <a class="read-more-link" href="' . get_permalink($post)  . '">Read More</a>';

        return $excerpt;

    endif;
}


//****INFINITE SCROLLING*******
function mytheme_infinite_scroll_init() {
    add_theme_support( 'infinite-scroll', array(
        'container' => 'main',
        'render' => 'mytheme_infinite_scroll_render',
        'footer' => true,
        'wrapper' => false,
        'posts_per_page' => '14'
    ) );
}
add_action( 'init', 'mytheme_infinite_scroll_init' );

//The render parameter specifies a function, in this case, mytheme_infinite_scroll_init
//that function uses the WordPress loop to load additional posts to be shown for infinite scrolling
add_action( 'init', 'mytheme_infinite_scroll_render' );
function mytheme_infinite_scroll_render() { 
    
    get_template_part( 'parts/loop', 'archive-infinite' );

}

/**
* Replace footer credits for JetPack Inifite Scroll
**/
function my_infinite_scroll_credit(){
    $content = '<a href="http://seanpetersonwebdesign.com/">Website Designed and Developed by Sean Peterson</a>';
    return $content;
}
add_filter('infinite_scroll_credit','my_infinite_scroll_credit');


//handle ajax requests to instagram account
/*
add_action( 'wp_ajax_nopriv_getInstagramLinks', 'getInstagramLinks' );
add_action( 'wp_ajax_post_getInstagramLinks', 'getInstagramLinks' );
function getInstagramLinks(){
    $return = 0;
    $result = fetchData("https://api.instagram.com/v1/users/5404787729/media/recent/?access_token=5404787729.3a81a9f.7fead8f859234fcfb972322f368a2912");
    $result = json_decode($result);
    foreach ($result->data as $post) {
    $return += 1;

    }

    echo $return;

    die();
}

function fetchData($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
*/

//Customize Categories the_title
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

//add shortcode for wordpress search bar
function wpbsearchform( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search For Articles:') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input class="button" type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';

    return $form;
}

add_shortcode('wpbsearch', 'wpbsearchform');

//add related posts support for custom post type "featured posts"
function allow_my_post_types($allowed_post_types) {
    $allowed_post_types[] = 'featured_post';
    return $allowed_post_types;
}
add_filter( 'rest_api_allowed_post_types', 'allow_my_post_types' );

//add fallback image to related posts 
function jeherve_custom_image( $media, $post_id, $args ) {
    if ( $media ) {
        return $media;
    } else {
        $permalink = get_permalink( $post_id );
        $url = apply_filters( 'jetpack_photon_url', get_template_directory_uri() . '/assets/images/post-fallback.png' );
     
        return array( array(
            'type'  => 'image',
            'from'  => 'custom_fallback',
            'src'   => esc_url( $url ),
            'href'  => $permalink,
        ) );
    }
}
add_filter( 'jetpack_images_get_images', 'jeherve_custom_image', 10, 3 );