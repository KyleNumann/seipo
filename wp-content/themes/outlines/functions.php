<?php
/**
 * outlines functions and definitions
 *
 * @package outlines
 * @since outlines 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since outlines 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'outlines_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since outlines 1.0
 */
function outlines_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on outlines, use a find and replace
	 * to change 'outlines' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'outlines', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'outlines' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // outlines_setup
add_action( 'after_setup_theme', 'outlines_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since outlines 1.0
 */
function outlines_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'outlines' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'outlines_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function outlines_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'outlines_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

/* Hide wp-types meta box as per http://imdev.in/how-to-remove-wp-types-annoying-how-to-display-custom-content-meta-box/ */
//Remove Annoying WP-Types Meta Box "How-to Display..."
if(is_admin()) :
    function remove_annoying_meta_boxes(){

        // Get post_type
        global $post;

        $post_type = get_post_type( $post->ID );

        remove_meta_box('wpcf-marketing', $post_type, 'side');

    }

add_action('add_meta_boxes', 'remove_annoying_meta_boxes');

endif;

/* custom taxonomy dropdowns as per http://frankiejarrett.com/2011/09/create-a-dropdown-of-custom-taxonomies-in-wordpress-the-easy-way/ */

function outlines_custom_taxonomy_dropdown( $taxonomy ) {
	$terms = get_terms( $taxonomy, 'hide_empty=0' );
	if ( $terms ) {
		printf( '<select name="%s" class="postform" id="%s">', $taxonomy, $taxonomy );
		echo '<option value="">-select-</option>';
		foreach ( $terms as $term ) {
			printf( '<option value="%s">%s</option>', $term->slug, $term->name );
		}
		print( '</select>' );
	}
}
/* register member nav menu */
register_nav_menu( 'members-only', 'Members Only Menu' );

/* customize admin area as per http://sixrevisions.com/wordpress/how-to-customize-the-wordpress-admin-area/ */
function remove_menu_items() {
  global $menu;
  $restricted = array(__('Links'), __('Comments'), __('Posts'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
      unset($menu[key($menu)]);}
    }
  }

add_action('admin_menu', 'remove_menu_items');

/* hide admin tool bar */
if (!current_user_can('manage_options') ) { show_admin_bar(false); }

/* change listings title text */
function frl_enter_title_here_filter($label, $post){
 
    if($post->post_type == 'listings')
        $label = __('Enter listing\'s address here', 'frl');
 
    return $label;
}
add_filter('enter_title_here', 'frl_enter_title_here_filter', 2, 2);


/* remove private from titles of private pages as per http://wordpress.org/support/topic/how-to-remove-private-from-private-pages */

function the_title_trim($title) {
	// Might aswell make use of this function to escape attributes
	$title = attribute_escape($title);
	// What to find in the title
	$findthese = array(
		'#Protected:#', // # is just the delimeter
		'#Private:#'
	);
	// What to replace it with
	$replacewith = array(
		'', // What to replace protected with
		'' // What to replace private with
	);
	// Items replace by array key
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');

/* redirect users after login as per http://www.joshstauffer.com/wordpress-redirect-users-after-log-in/ */
// Redirect admins to the dashboard and other users elsewhere
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
function my_login_redirect( $redirect_to, $request, $user ) {
    // Is there a user?
    if ( is_array( $user->roles ) ) {
        // Is it an administrator?
        if ( in_array( 'administrator', $user->roles ) )
            return home_url( '/wp-admin/' );
        else
            return home_url();
            // return get_permalink( 83 );
    }
}
// CUSTOM ADMIN LOGIN HEADER LOGO
 
function my_custom_login_logo()
{
    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/images/login_logo.png)  !important; } </style>';
}
add_action('login_head',  'my_custom_login_logo');