<?php
/**
 * auvint functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package auvint
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

require get_template_directory() . '/customizer-repeater/functions.php';


// require get_template_directory() . '/customizer-repeater/functions.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function auvint_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on auvint, use a find and replace
		* to change 'auvint' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'auvint', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'auvint' ),
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
			'auvint_custom_background_args',
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
add_action( 'after_setup_theme', 'auvint_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function auvint_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'auvint_content_width', 640 );
}
add_action( 'after_setup_theme', 'auvint_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function auvint_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'auvint' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'auvint' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'auvint_widgets_init' );



add_filter( 'wp_default_scripts', 'change_default_jquery' );

function change_default_jquery( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

/**
 * Enqueue scripts and styles.
 */
function auvint_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/src/dist/css/style.css', false, '1.1', 'all');
	wp_style_add_data( 'style', 'rtl', 'replace' );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'main.js', get_template_directory_uri() . '/src/dist/js/app.min.js', false, '1.1', true );
}
add_action( 'wp_enqueue_scripts', 'auvint_scripts' );


add_filter( 'get_custom_logo', 'change_logo_class' );


function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'header__bottom_logo', $html );

    return $html;
}

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


/**
 * Add automatic image sizes
 */

if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'preview-img', 500, 375, true );
}






$services_labels = array(
	'name' => 'Услуги',
	'singular_name' => 'Услуга',
	'add_new' => 'Добавить услугу',
	'add_new_item' => 'Добавить услугу',
	'edit_item' => 'Редактировать услугу',
	'new_item' => 'Новая услуга',
	'all_items' => 'Все услуги',
	'search_items' => 'Искать услуги',
	'not_found' =>  'Услуг по заданным критериям не найдено.',
	'not_found_in_trash' => 'В корзине нет услуг.',
	'menu_name' => 'Услуги'
);

$services_args = array(
	'labels' => $services_labels,
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => false,
	'menu_icon' => 'dashicons-image-filter',
	'menu_position' => 4,
	'supports' => array( 'title', 'editor', 'thumbnail' )
);

register_post_type( 'services', $services_args );




$products_labels = array(
	'name' => 'Товары',
	'singular_name' => 'Товар',
	'add_new' => 'Добавить товар',
	'add_new_item' => 'Добавить товар',
	'edit_item' => 'Редактировать товар',
	'new_item' => 'Новый товар',
	'all_items' => 'Все товары',
	'search_items' => 'Искать товары',
	'not_found' =>  'Товаров по заданным критериям не найдено.',
	'not_found_in_trash' => 'В корзине нет товаров.',
	'menu_name' => 'Товары'
);

$products_args = array(
	'labels' => $products_labels,
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => false,
	'menu_icon' => 'dashicons-image-filter',
	'menu_position' => 4,
	'supports' => array( 'title', 'editor', 'thumbnail' )
);

register_post_type( 'products', $products_args );




$portfolio_labels = array(
	'name' => 'Портфолио',
	'singular_name' => 'Портфолио',
	'add_new' => 'Добавить портфолио',
	'add_new_item' => 'Добавить портфолио',
	'edit_item' => 'Редактировать портфолио',
	'new_item' => 'Новое портфолио',
	'all_items' => 'Все портфолио',
	'search_items' => 'Искать портфолио',
	'not_found' =>  'Портфолио по заданным критериям не найдено.',
	'not_found_in_trash' => 'В корзине нет портфолио.',
	'menu_name' => 'Портфолио'
);

$portfolio_args = array(
	'labels' => $portfolio_labels,
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => false,
	'menu_icon' => 'dashicons-image-filter',
	'menu_position' => 4,
	'supports' => array( 'title', 'editor', 'thumbnail' )
);

register_post_type( 'portfolio', $portfolio_args );



$categories_labels = array(
	'name' => 'Категории',
	'singular_name' => 'Категория',
	'add_new' => 'Добавить категорию',
	'add_new_item' => 'Добавить категори',
	'edit_item' => 'Редактировать категори',
	'new_item' => 'Новая категория',
	'all_items' => 'Все категории',
	'search_items' => 'Искать категории',
	'not_found' =>  'Категорий по заданным критериям не найдено.',
	'not_found_in_trash' => 'В корзине нет категорий.',
	'menu_name' => 'Категории'
);

$categories_args = array(
	'labels' => $categories_labels,
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => false,
	'menu_icon' => 'dashicons-image-filter',
	'menu_position' => 4,
	'supports' => array( 'title', 'editor', 'thumbnail' )
);

register_post_type( 'categories', $categories_args );



$news_labels = array(
	'name' => 'Новости',
	'singular_name' => 'Новость',
	'add_new' => 'Добавить новость',
	'add_new_item' => 'Добавить новость',
	'edit_item' => 'Редактировать новость',
	'new_item' => 'Новая новость',
	'all_items' => 'Все новости',
	'search_items' => 'Искать новости',
	'not_found' =>  'Новостей по заданным критериям не найдено.',
	'not_found_in_trash' => 'В корзине нет новостей.',
	'menu_name' => 'Новости'
);

$news_args = array(
	'labels' => $news_labels,
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => false,
	'menu_icon' => 'dashicons-image-filter',
	'menu_position' => 4,
	'supports' => array( 'title', 'editor', 'thumbnail' )
);

register_post_type( 'news', $news_args );

/**
 * Добавляет страницу настройки темы в админку Вордпресса
 */
function mytheme_customize_register( $wp_customize ) {
	/*
	Добавляем секцию в настройки темы
	*/
	$wp_customize->add_section(
		// ID
		'data_site_section',
		// Arguments array
		array(
			'title' => 'Данные сайта',
			'capability' => 'edit_theme_options',
			'description' => "Тут можно указать данные сайта"
		)
	);
	/*
	Добавляем поле email site_email
	*/
	$wp_customize->add_setting(
		// ID
		'site_email',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_email_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Email",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_email'
		)
	);


	/*
	Добавляем поле Телефон site_phone
	*/
	$wp_customize->add_setting(
		// ID
		'site_phone',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_phone_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Телефон",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_phone'
		)
	);

	/*
	Добавляем поле Горячая линия site_hot
	*/
	$wp_customize->add_setting(
		// ID
		'site_hot',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_hot_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Горячая линия",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_hot'
		)
	);
	/*
	Добавляем поле Адрес site_hot
	*/
	$wp_customize->add_setting(
		// ID
		'site_address',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_address_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Адрес",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_address'
		)
	);


	/*
	Добавляем поле Адрес site_map
	*/
	$wp_customize->add_setting(
		// ID
		'site_map',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_map_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Код карты",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_map'
		)
	);
	
	

	/*
	Добавляем поле копирайт site_copyright
	*/
	// $wp_customize->add_setting(
	// 	// ID
	// 	'site_copyright',
	// 	// Arguments array
	// 	array(
	// 		'default' => '',
	// 		'type' => 'option'
	// 	)
	// );
	// $wp_customize->add_control(
	// 	// ID
	// 	'site_copyright_control',
	// 	// Arguments array
	// 	array(
	// 		'type' => 'text',
	// 		'label' => "Копирайт",
	// 		'section' => 'data_site_section',
	// 		// This last one must match setting ID from above
	// 		'settings' => 'site_copyright'
	// 	)
	// );

	/*
	Добавляем поле ссылку site_link
	*/
	// $wp_customize->add_setting(
	// 	// ID
	// 	'site_link',
	// 	// Arguments array
	// 	array(
	// 		'default' => '',
	// 		'type' => 'option'
	// 	)
	// );
	// $wp_customize->add_control(
	// 	// ID
	// 	'site_link_control',
	// 	// Arguments array
	// 	array(
	// 		'type' => 'text',
	// 		'label' => "Ссылка на Affiliate disclosure",
	// 		'section' => 'data_site_section',
	// 		// This last one must match setting ID from above
	// 		'settings' => 'site_link'
	// 	)
	// );



	/*
	Добавляем поле ссылку site_text
	*/
	// $wp_customize->add_setting(
	// 	// ID
	// 	'site_text',
	// 	// Arguments array
	// 	array(
	// 		'default' => '',
	// 		'type' => 'option'
	// 	)
	// );
	// $wp_customize->add_control(
	// 	// ID
	// 	'site_text_control',
	// 	// Arguments array
	// 	array(
	// 		'type' => 'textarea',
	// 		'label' => "Текст в подвале",
	// 		'section' => 'data_site_section',
	// 		// This last one must match setting ID from above
	// 		'settings' => 'site_text'
	// 	)
	// );



	/*
	Добавляем поле ссылку на signin site_signin
	*/
	// $wp_customize->add_setting(
	// 	// ID
	// 	'site_signin',
	// 	// Arguments array
	// 	array(
	// 		'default' => '',
	// 		'type' => 'option'
	// 	)
	// );
	// $wp_customize->add_control(
	// 	// ID
	// 	'site_signin_control',
	// 	// Arguments array
	// 	array(
	// 		'type' => 'text',
	// 		'label' => "Ссылка на Sign In",
	// 		'section' => 'data_site_section',
	// 		// This last one must match setting ID from above
	// 		'settings' => 'site_signin'
	// 	)
	// );

	/*
	Добавляем поле ссылку на signup site_signup
	*/
	
	$wp_customize->add_setting( 'site_socials', array(
	'sanitize_callback' => 'customizer_repeater_sanitize'
	));
	$wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'site_socials', array(
		'label'   => esc_html__('Социальные сети','customizer-repeater'),
		'section' => 'data_site_section',
		'priority' => 1,
		'customizer_repeater_image_control' => true,
		'customizer_repeater_icon_control' => true,
		'customizer_repeater_title_control' => false,
		'customizer_repeater_link_control' => true,
	) ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );





