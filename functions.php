<?php
/**
 * rrunningcyclepassion functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rrunningcyclepassion
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rrunningcyclepassion_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on rrunningcyclepassion, use a find and replace
		* to change 'rrunningcyclepassion' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rrunningcyclepassion', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	register_nav_menu('menu', 'main_menu');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rrunningcyclepassion' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'rrunningcyclepassion_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rrunningcyclepassion_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rrunningcyclepassion_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rrunningcyclepassion_content_width', 640 );
}
add_action( 'after_setup_theme', 'rrunningcyclepassion_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rrunningcyclepassion_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rrunningcyclepassion' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rrunningcyclepassion' ),
			'before_widget' => '<section id="%1$s" class="FixedWidget__fixed_widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rrunningcyclepassion_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rrunningcyclepassion_scripts() {
	wp_enqueue_style( 'rrunningcyclepassion-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rrunningcyclepassion-style', 'rtl', 'replace' );

	wp_enqueue_style('rrunningcyclepassion_theme-slick-theme', get_template_directory_uri() . '/css/slick/slick-theme.css');
	wp_enqueue_style('rrunningcyclepassion_theme-slick', get_template_directory_uri() . '/css/slick/slick.css');
	wp_enqueue_style('rrunningcyclepassion_theme-bootstrap', get_template_directory_uri() .'/css/main.css');
    wp_enqueue_style('rrunningcyclepassion_theme-main', get_template_directory_uri() .'/css/bootstrap.min.css');
	wp_enqueue_style('rrunningcyclepassion_theme-woocommerce', get_template_directory_uri() .'/css/woocommerce.css');

	wp_enqueue_script( 'rrunningcyclepassion-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js');
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rrunningcyclepassion_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function rrunningcyclepassion_theme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'rrunningcyclepassion_theme_add_woocommerce_support' );


/**
 * Ajouter taxonomie "Marque"
 */
add_action( 'init', 'register_custom_taxonomy' );

function register_custom_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Marques', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Marque', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Rechercher des marques', 'textdomain' ),
        'popular_items'              => __( 'Marques populaires', 'textdomain' ),
        'all_items'                  => __( 'Toutes les marques', 'textdomain' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Modifier la marque', 'textdomain' ),
        'update_item'                => __( 'Mettre à jour la marque', 'textdomain' ),
        'add_new_item'               => __( 'Ajouter une nouvelle marque', 'textdomain' ),
        'new_item_name'              => __( 'Nom de la nouvelle marque', 'textdomain' ),
        'separate_items_with_commas' => __( 'Séparer les marques avec des virgules', 'textdomain' ),
        'add_or_remove_items'        => __( 'Ajouter ou supprimer des marques', 'textdomain' ),
        'choose_from_most_used'      => __( 'Choisir parmi les marques les plus utilisées', 'textdomain' ),
        'not_found'                  => __( 'Aucune marque trouvée', 'textdomain' ),
        'menu_name'                  => __( 'Marques', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true, // true si la taxonomie doit avoir des sous-catégories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );

    register_taxonomy( 'marque', array( 'product' ), $args );
}

/**
 * Modifier le texte sur le bouton des produits variables
 */
add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
	global $product;
	$text = $product->is_purchasable() ? __( 'Voir le produit', 'woocommerce' ) : __( 'Voir le produit', 'woocommerce' );
	return $text;
}, 10 );


add_filter( 'gridlist_toggle_button_output', 'custom_gridlist_toggle_button_output', 10, 3 );
function custom_gridlist_toggle_button_output( $output, $grid_view, $list_view ) {
    // Remplacez les icônes par défaut par vos propres icônes personnalisées
    $grid_icon = '<img src="/wp-content/uploads/2023/05/grid.svg" alt="">'; // Remplacez 'custom-grid-icon' par la classe CSS de votre icône de grille personnalisée
    $list_icon = '<img src="/wp-content/uploads/2023/05/list.svg" alt="">'; // Remplacez 'custom-list-icon' par la classe CSS de votre icône de liste personnalisée

    // Remplace les icônes par défaut par les icônes personnalisées
    $output = str_replace( '<span class="dashicons dashicons-grid-view"></span>', $grid_icon, $output );
    $output = str_replace( '<span class="dashicons dashicons-exerpt-view"></span>', $list_icon, $output );

    return $output;
};

function custom_woocommerce_breadcrumb_defaults( $defaults ) {
    $defaults['delimiter'] = '  >  ';
    return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'custom_woocommerce_breadcrumb_defaults' );









