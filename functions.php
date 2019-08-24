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
	wp_enqueue_script( 'kp-select', get_template_directory_uri() . '/assets/js/src/bootstrap-select.js', array('jquery'), '3.3.4', true );
	wp_enqueue_script( 'kp-carousel', get_template_directory_uri() . '/assets/js/src/slick.min.js', array('jquery'), '3.3.4', true );
	wp_enqueue_script( 'kp-picker', get_template_directory_uri() . '/assets/js/src/picker.js', array('jquery'), '3.3.4', true );
	wp_enqueue_script( 'kp-pickadate', get_template_directory_uri() . '/assets/js/src/picker.date.js', array('jquery'), '3.3.4', true );
} 
add_action( 'wp_enqueue_scripts', 'kp_scripts' );

add_theme_support( 'post-thumbnails' ); 

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
		'menu_name'          => _x( 'Pasiūlymai', 'admin menu', 'your-plugin-textdomain' ),
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
		'menu_name'          => _x( 'Filialai', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Filialai', 'add new on admin bar', 'your-plugin-textdomain' ),
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

add_action( 'init', 'codex_direction_init' );
/**
 * Register a direction post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_direction_init() {
	$labels = array(
		'name'               => _x( 'Directions', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Direction', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Kelionių kryptys', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Direction', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Direction', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Direction', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Direction', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Direction', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Direction', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Directions', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Directions', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Directions:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No direction found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No directions found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'kryptys' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type( 'direction', $args ); 
}

add_action( 'init', 'codex_hotels_init' );


function kelioniupaieska_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'example_section_one',
        array(
            'title' => 'Example Settings',
            'description' => 'This is a settings section.',
            'priority' => 15,
        )
    );
}
add_action( 'customize_register', 'kelioniupaieska_customizer' );


/**
 * Register a direction post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_hotels_init() {
	$labels = array(
		'name'               => _x( 'Hotels', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Hotel', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Viešbučiai', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Hotel', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Hotel', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Hotel', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Hotel', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Hotel', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Hotel', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Hotels', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Hotels', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Hotels:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No hotel found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No hotels found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'viesbutis' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type( 'hotels', $args ); 
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_hotels_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_hotels_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Categories', 'textdomain' ),
		'all_items'         => __( 'All Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Category', 'textdomain' ),
		'update_item'       => __( 'Update Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Category', 'textdomain' ),
		'new_item_name'     => __( 'New Category Name', 'textdomain' ),
		'menu_name'         => __( 'Kategorija', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kategorija' ),
	);

	register_taxonomy( 'kategorija', 'hotels', $args );

}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_month_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_month_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Months', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Month', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Months', 'textdomain' ),
		'all_items'         => __( 'All Months', 'textdomain' ),
		'parent_item'       => __( 'Parent Month', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Month:', 'textdomain' ),
		'edit_item'         => __( 'Edit Month', 'textdomain' ),
		'update_item'       => __( 'Update Month', 'textdomain' ),
		'add_new_item'      => __( 'Add New Month', 'textdomain' ),
		'new_item_name'     => __( 'New Month Name', 'textdomain' ),
		'menu_name'         => __( 'Mėnesiai', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'menesis' ),
	);

	register_taxonomy( 'menesis', 'offer', $args );

}

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyAjPWSM0OMLF1b_LeztaVJmqxoqqmBZ4_8';
});

add_action( 'pre_get_posts', function ( $q ) {

    if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'offers' ) ) {

        $q->set( 'posts_per_page', 2 );

    }

});

function get_excerpt(){ 
$excerpt = get_the_excerpt();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 235);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
return $excerpt;
}

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'pagrindinis' => __( 'Pagrindinis', 'kp' ),
	'virsutinis' => __( 'Virsutinis', 'kp' ),
	'virsutinis_mobilus' => __( 'Virsutinis Mobilus', 'kp' ),
	'keliones'  => __( 'Kelionės', 'kp' ),
	'naudinga'  => __( 'Naudinga informacija', 'kp' ) 
) );



// get the the role object
$role_object = get_role( 'editor' );

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );
if($role_object->name == 'editor'){
	function hide_menu() {

	    remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
	    remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
	}
 
	add_action('admin_head', 'hide_menu');
}

function comment_form_default_fields(){
	$fields =  array(

	  'author' =>
	    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
	    ( $req ? '<span class="required">*</span>' : '' ) .
	    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" size="30"' . $aria_req . ' /></p>',

	  'email' =>
	    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
	    ( $req ? '<span class="required">*</span>' : '' ) .
	    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" size="30"' . $aria_req . ' /></p>',

	  'url' => '',
	);
}

$fields =  array(

  'author' =>
    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'url' => '',
);

$args = array(
  'id_form'           => 'commentform',
  'class_form'      => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit',
  'name_submit'       => 'submit',
  'title_reply'       => __( 'Leave a Reply' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel Reply' ),
  'label_submit'      => 'Išsiųsti',
  'format'            => 'xhtml',

  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
    '</p>',

  'comment_notes_after' => '<p class="form-allowed-tags">' .
    sprintf(
      __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
      ' <code>' . allowed_tags() . '</code>'
    ) . '</p>',

  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);

function mytheme_customize_register( $wp_customize ) {
    //adding section in wordpress customizer   
    $wp_customize->add_section('kp_new_section_name', array(
        'title'      => __( 'Socialiniai tinklai', 'kp' ),
    	'priority'   => 30,
    ));

    //adding setting for copyright text
    $wp_customize->add_setting('social_setting', array(
        'default'   => ''
    ));

    $wp_customize->add_setting('social_setting2', array(
        'default'   => ''
    ));

    $wp_customize->add_setting('social_setting3', array(
        'default'   => ''
    ));

    $wp_customize->add_control('facebook', array(
        'label'      => __( 'Facebook', 'kp' ),
		'section'    => 'kp_new_section_name',
		'settings'   => 'social_setting',
		'type'		 => 'url'
    ));

    $wp_customize->add_control('google', array( 
        'label'      => __( 'Google+', 'kp' ),
		'section'    => 'kp_new_section_name',
		'settings'   => 'social_setting2',
		'type'		 => 'url'
    ));

     $wp_customize->add_control('instagram', array( 
        'label'      => __( 'Instagram', 'kp' ),
		'section'    => 'kp_new_section_name',
		'settings'   => 'social_setting3',
		'type'		 => 'url'
    ));
}
add_action( 'customize_register', 'mytheme_customize_register' );

