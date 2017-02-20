<?php
/**
 * Enqueue scripts and styles.
 *
 */
function kp_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'kp-style', get_stylesheet_uri() );

	// Load google fonts
	$query_args = array(
		'family' => 'Roboto:300,400,500,700'
	);
	wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );


	wp_enqueue_script( 'kp-script', get_template_directory_uri() . '/assets/js/src/script.js', array( 'jquery' ), '20150330', true );
	wp_enqueue_script( 'kp-bootstrap', get_template_directory_uri() . '/assets/js/src/bootstrap.min.js', array('jquery'), '3.3.4', true );
}
add_action( 'wp_enqueue_scripts', 'kp_scripts' );


add_action( 'init', 'codex_offer_init' );
/**
 * Register a offer post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_offer_init() {
	$labels = array(
		'name'               => _x( 'Offers', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Offer', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Offers', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Offer', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Offer', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Offer', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Offer', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Offer', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Offers', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Offers', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Offers:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No offer found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No offers found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'pasiulymas' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type( 'offer', $args ); 
}


add_action( 'init', 'codex_branch_init' );
/**
 * Register a branch post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_branch_init() {
	$labels = array(
		'name'               => _x( 'Branches', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Branch', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Branches', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Branch', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Branch', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Branch', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Branch', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Branch', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Branch', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Branches', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Branches', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Branches:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No branch found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No branches found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'filialas' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type( 'branch', $args ); 
}

add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyAjPWSM0OMLF1b_LeztaVJmqxoqqmBZ4_8';
});