<?php
/**
 * cutes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cutes
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
function cutes_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on cutes, use a find and replace
		* to change 'cutes' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cutes', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'cutes' ),
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
			'cutes_custom_background_args',
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
add_action( 'after_setup_theme', 'cutes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cutes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cutes_content_width', 640 );
}
add_action( 'after_setup_theme', 'cutes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cutes_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cutes' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cutes' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cutes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cutes_scripts() {
	wp_enqueue_style( 'cutes-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cutes-style', 'rtl', 'replace' );


	wp_enqueue_script( 'cutes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'cutes-search', get_template_directory_uri() . '/js/search.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'cutes-dark-mode', get_template_directory_uri() . '/js/darkmod.js', array(), _S_VERSION, true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cutes_scripts' );

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












function custom_get_site_icon_url() {
    $site_icon_id = get_option( 'site_icon' );
    if ( ! empty( $site_icon_id ) ) {
        $site_icon_url = wp_get_attachment_image_url( $site_icon_id, 'full' );
        return $site_icon_url;
    }
    return '';
}












function custom_login_template() {
    include( get_template_directory() . '/login.php' );
}
//add_action('template_redirect', 'custom_login_template');






function getCustomeWords($string, $start = 0, $end = 10) {
	// Split the string into individual words
	$words = explode(' ', $string);

	// Take the first 200 words
	$customeWords = array_slice($words, $start, $end);

	// Join the words back into a string
	$result = implode(' ', $customeWords);

	if (str_word_count($result) < str_word_count($string) and $start == 0) {
		$result = $result . " . . .";
	}

	return $result;
}




function get_read_time_by_words_count($text) {
    // Calculate the number of words in the text
    $words = str_word_count($text);
  
    // Assume an average reading speed of 200 words per minute
    $reading_speed = 200;
  
    // Calculate the read time in seconds
    $read_time_seconds = round(($words / $reading_speed) * 60); // Convert to seconds
  
    // Ensure that the read time is at least 1 second
    if ($read_time_seconds < 1) {
        $read_time_seconds = 1;
    }
  
    // Convert the read time to minutes and seconds
    $read_time_minutes = floor($read_time_seconds / 60);
    $read_time_seconds = $read_time_seconds % 60;
  
    // Return the read time in a human-readable format
    return "$read_time_minutes minutes and $read_time_seconds seconds";
}




function reading_time( $content ) {
	$words_per_minute = 200;
	$word = count( explode(" ", strip_tags( $content ) ) );
	return "زمان مطالعه :" . ceil($word / $words_per_minute) . " دقیقه";
}







function mihanwpcregister( $wp_customize ) {
    $wp_customize->add_section( 'logostyle' , array(
        'title'      => __( 'لوگو و استایل', 'mytheme' ),
        'priority'   => 1,
    ) );
    $wp_customize->add_setting( 'header_textcolor' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'      => __( 'Header Color', 'mytheme' ),
        'section'    => 'logostyle',
        'settings'   => 'header_textcolor',
    ) ) );




    $wp_customize->add_setting( 'blogname', array(
        'default'   => get_bloginfo( 'name' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'blogname', array(
        'label'    => __( 'Site Title', 'textdomain' ),
        'section'  => 'logostyle',
        'settings' => 'blogname',
        'type'     => 'text',
    ) );


}
add_action( 'customize_register', 'mihanwpcregister' );




function mihanwpcregister2( $wp_customize ) {
    $wp_customize->add_section( 'logostyle' , array(
        'title'      => __( 'لوگو و استایل', 'mytheme' ),
        'priority'   => 1,
    ) );
    $wp_customize->add_setting( 'header_textcolor' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'      => __( 'Header Color', 'mytheme' ),
        'section'    => 'logostyle',
        'settings'   => 'header_textcolor',
    ) ) );






    $wp_customize->add_setting( 'blogname', array(
        'default'   => get_bloginfo( 'name' ),
        'transport' => 'refresh',
    ) );



    $wp_customize->add_setting( 'blogdescription', array(
        'default'   => get_bloginfo( 'description' ),
        'transport' => 'refresh',
    ) );


    $wp_customize->add_setting( 'header_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_setting( 'background_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_setting( 'footer_text', array(
        'default'   => 'Your footer text here',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_setting( 'custom_logo', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_setting( 'link_color', array(
        'default'   => '#0000ff',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_setting( 'sidebar_widgets', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );



    $wp_customize->add_setting( 'blogname', array(
        'default'   => get_bloginfo( 'name' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'blogname', array(
        'label'    => __( 'Site Title', 'textdomain' ),
        'section'  => 'title_tagline',
        'settings' => 'blogname',
        'type'     => 'text',
    ) );


    $wp_customize->add_setting( 'blogdescription', array(
        'default'   => get_bloginfo( 'description' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'blogdescription', array(
        'label'    => __( 'Tagline', 'textdomain' ),
        'section'  => 'title_tagline',
        'settings' => 'blogdescription',
        'type'     => 'text',
    ) );


    $wp_customize->add_setting( 'header_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image', array(
        'label'    => __( 'Header Image', 'textdomain' ),
        'section'  => 'header_image',
        'settings' => 'header_image',
    ) ) );


    $wp_customize->add_setting( 'background_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'label'    => __( 'Background Color', 'textdomain' ),
        'section'  => 'colors',
        'settings' => 'background_color',
    ) ) );


    $wp_customize->add_setting( 'footer_text', array(
        'default'   => 'Your footer text here',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'footer_text', array(
        'label'    => __( 'Footer Text', 'textdomain' ),
        'section'  => 'footer_settings',
        'settings' => 'footer_text',
        'type'     => 'text',
    ) );


    $wp_customize->add_setting( 'custom_logo', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo', array(
        'label'    => __( 'Custom Logo', 'textdomain' ),
        'section'  => 'title_tagline',
        'settings' => 'custom_logo',
    ) ) );


    $wp_customize->add_setting( 'link_color', array(
        'default'   => '#0000ff',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'    => __( 'Link Color', 'textdomain' ),
        'section'  => 'colors',
        'settings' => 'link_color',
    ) ) );


    $wp_customize->add_setting( 'sidebar_widgets', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sidebar_widgets', array(
        'label'    => __( 'Sidebar Widgets', 'textdomain' ),
        'section'  => 'sidebar_settings',
        'settings' => 'sidebar_widgets',
        'type'     => 'textarea',
    ) );


    $wp_customize->add_section( 'section_id', array(
        'title'    => __( 'Section Title', 'textdomain' ),
        'priority' => 30, // اولویت نمایش بخش
    ) );


    $wp_customize->add_setting( 'setting_id', array(
        'default'           => 'Default Value',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );




    $wp_customize->add_setting( 'color_setting', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_setting( 'image_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_control( 'setting_id', array(
        'label'    => __( 'Label', 'textdomain' ),
        'section'  => 'section_id',
        'settings' => 'setting_id',
        'type'     => 'text',
    ) );


    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_setting', array(
        'label'    => __( 'Color Setting', 'textdomain' ),
        'section'  => 'section_id',
        'settings' => 'color_setting',
    ) ) );


    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_setting', array(
        'label'    => __( 'Image Setting', 'textdomain' ),
        'section'  => 'section_id',
        'settings' => 'image_setting',
    ) ) );


    $wp_customize->add_control( 'select_setting', array(
        'label'    => __( 'Select Setting', 'textdomain' ),
        'section'  => 'section_id',
        'settings' => 'select_setting',
        'type'     => 'select',
        'choices'  => array(
            'option1' => __( 'Option 1', 'textdomain' ),
            'option2' => __( 'Option 2', 'textdomain' ),
        ),
    ) );


    $wp_customize->add_control( 'radio_setting', array(
        'label'    => __( 'Radio Setting', 'textdomain' ),
        'section'  => 'section_id',
        'settings' => 'radio_setting',
        'type'     => 'radio',
        'choices'  => array(
            'option1' => __( 'Option 1', 'textdomain' ),
            'option2' => __( 'Option 2', 'textdomain' ),
        ),
    ) );


    $wp_customize->add_control( 'checkbox_setting', array(
        'label'    => __( 'Checkbox Setting', 'textdomain' ),
        'section'  => 'section_id',
        'settings' => 'checkbox_setting',
        'type'     => 'checkbox',
    ) );


    $wp_customize->add_control( 'textarea_setting', array(
        'label'    => __( 'Textarea Setting', 'textdomain' ),
        'section'  => 'section_id',
        'settings' => 'textarea_setting',
        'type'     => 'textarea',
    ) );



}
add_action( 'customize_register', 'mihanwpcregister2' );






function my_customizer_settings( $wp_customize ) {
    // افزودن بخش
    $wp_customize->add_section( 'my_custom_section', array(
        'title'    => __( 'My Custom Section', 'textdomain' ),
        'priority' => 30,
    ) );

    // افزودن تنظیم
    $wp_customize->add_setting( 'my_text_setting', array(
        'default'   => 'Default Text',
        'transport' => 'refresh',
    ) );

    // افزودن کنترل
    $wp_customize->add_control( 'my_text_setting', array(
        'label'    => __( 'Text Setting', 'textdomain' ),
        'section'  => 'my_custom_section',
        'settings' => 'my_text_setting',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'my_customizer_settings' );
