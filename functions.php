<?php

// Remove on ProductioN!!!
global $wp_rewrite;
$wp_rewrite->flush_rules();

add_filter('wp_nav_menu_objects', 'func_nav_main_icon', 10, 2);

function func_nav_main_icon( $items, $args ) {

	foreach( $items as &$item ) {
		$icon = get_field('icon', $item);

		if( $icon ) {
			$item->title .= $icon;
		}
	}

	return $items;
}

function register_acf_options_pages() {

    // Check function exists.
    if( !function_exists('acf_add_options_page') )
        return;

    // register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Custom Settings'),
        'menu_title'    => __('Custom Settings'),
        'menu_slug'     => 'theme-custom-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Hook into acf initialization.
add_action('acf/init', 'register_acf_options_pages');


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
		'name'               => _x( 'Recipes', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Recipe', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Recipes', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Recipe', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Recipe', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Recipe', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Recipe', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Recipe', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Recipes', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Recipes', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Recipes:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No recipe found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No recipes found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'keto-recipe' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type( 'recipe', $args );
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
add_action( 'init', 'create_ingredient_taxonomies', 0 );
add_action( 'init', 'create_recipe_category_taxonomy', 0 );
add_action( 'init', 'create_units_taxonomy', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_ingredient_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Ingredients', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Ingredient', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Ingredients', 'textdomain' ),
		'all_items'         => __( 'All Ingredients', 'textdomain' ),
		'parent_item'       => __( 'Parent Ingredient', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Ingredient:', 'textdomain' ),
		'edit_item'         => __( 'Edit Ingredient', 'textdomain' ),
		'update_item'       => __( 'Update Ingredient', 'textdomain' ),
		'add_new_item'      => __( 'Add New Ingredient', 'textdomain' ),
		'new_item_name'     => __( 'New Ingredient Name', 'textdomain' ),
		'menu_name'         => __( 'Ingredients', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'keto-product' ),
	);

	register_taxonomy( 'ingredient', 'recipe', $args );

}

function create_recipe_category_taxonomy() {
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
		'menu_name'         => __( 'Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'keto' ),
	);

	register_taxonomy( 'category', 'recipe', $args );

}

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo "<strong>";
        the_category(' &bull; ');
        echo "</strong>";
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

function create_units_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Units', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Unit', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Units', 'textdomain' ),
		'all_items'         => __( 'All Units', 'textdomain' ),
		'parent_item'       => __( 'Parent Unit', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Unit:', 'textdomain' ),
		'edit_item'         => __( 'Edit Unit', 'textdomain' ),
		'update_item'       => __( 'Update Unit', 'textdomain' ),
		'add_new_item'      => __( 'Add New Unit', 'textdomain' ),
		'new_item_name'     => __( 'New Unit Name', 'textdomain' ),
		'menu_name'         => __( 'Units', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'unit' ),
	);

	register_taxonomy( 'unit', 'recipe', $args );

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
    'footer_2'  => __( 'Footer 2', 'kp' ),
	'footer_3'  => __( 'Footer 3', 'kp' ),
    'footer_4'  => __( 'Footer 4', 'kp' ),
    'footer_copyright'  => __( 'Footer Copyright', 'kp' )
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
