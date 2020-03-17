<?php
/*
*
* Unlike style.css, the functions.php of a child theme does not override its counterpart from the parent.
* Instead, it is loaded in addition to the parent’s functions.php. (Specifically, it is loaded right before the parent theme's functions.php).
* Source: http://codex.wordpress.org/Child_Themes#Using_functions.php
*
* Be sure not to define functions, that already exist in the parent theme!
* A common pattern is to prefix function names with the (child) theme name.
* Also if the parent theme supports pluggable functions you can use function_exists( 'put_the_function_name_here' ) checks.
*/


/**
  * Set up Child Theme's textdomain.
  *
  * Declare textdomain for this child theme.
  * Translations can be added to the /languages/ directory.
  */
function understrap_business_theme_setup() {
    load_child_theme_textdomain( 'understrap-business', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'understrap_business_theme_setup' );

/**
 * Loads parent and child themes' style.css
 */
function understrap_business_child_theme_enqueue_styles() {
    $parent_style = 'understrap_business_parent_style';
    $parent_base_dir = 'understrap';

    wp_enqueue_style( $parent_style,
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme( $parent_base_dir ) ? wp_get_theme( $parent_base_dir )->get('Version') : ''
    );

    wp_enqueue_style( $parent_style . '_child_style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
function understrap_portfolio_scripts() {
	wp_enqueue_script('countdowntimer',get_stylesheet_directory_uri() . '/Assets/js/countdown.min.js', array('jquery'));
	wp_enqueue_script('timer',get_stylesheet_directory_uri() . '/Assets/js/timer.js', array('jquery'));
	//wp_enqueue_script('portfolio',get_stylesheet_directory_uri() . '/Assets/js/portfolio.js', array( 'jquery' ));

	$ed_banner_event_timer = get_theme_mod( 'event-date', true );
	$banner_event_timer    = new DateTime( get_theme_mod( 'event-date', '2020-08-20' ) );
	$today                 = new DateTime( date('Y-m-d') );
	$banner_timer          = '';

	if( $banner_event_timer > $today ){
		$banner_timer = get_theme_mod( 'event-date', '2020-08-20' );
	}


	$array = array(
		'rtl'                => is_rtl(),
		'singular'           => is_singular(),
		'banner_event_timer' => $banner_timer,
	);

	wp_localize_script( 'timer', 'the_conference_data', $array );
}

add_action( 'wp_enqueue_scripts', 'understrap_portfolio_scripts' );


/* Kirki installer helper */
include_once get_theme_file_path( 'kirki-installer-helper.php' );
include_once get_theme_file_path( 'customize.php' );



add_action( 'wp_enqueue_scripts', 'understrap_business_child_theme_enqueue_styles' );

add_action( 'after_setup_theme', 'understrap_business_setup' );

if ( ! function_exists( 'understrap_business_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_business_setup() {

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
			'default-color' => 'f7f8fa',
			'default-image' => '',
		) ) );


	}
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' [...]<p><a class="understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Continue Reading...',
			'understrap-business' ) . '</a></p>';
		}
		return $post_excerpt;
	}
}

//create empty stylesheet handles to add the inline styles
wp_register_style( 'understrap-gradient', false );
wp_enqueue_style( 'understrap-gradient' );
/**
 * Build a background-gradient style for CSS
 *
 * @param $color_1      hex color value
 * @param $color_2      hex color value
 *
 * @return string       CSS definition
 */
function kirki_build_gradients( $color_1, $color_2 ) {

    $styles  = 'background:'.$color_1.';';
    $styles .= 'background:-moz-linear-gradient(top,'.$color_1.' 0%,'.$color_2.' 100%);';
    $styles .= 'background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,'.$color_1.'), color-stop(100%,'.$color_2.'));';
    $styles .= 'background:-webkit-linear-gradient(top,'.$color_1.' 0%,'.$color_2.' 100%);';
    $styles .= 'background:-o-linear-gradient(top,'.$color_1.' 0%,'.$color_2.' 100%);';
    $styles .= 'background:-ms-linear-gradient(top,'.$color_1.' 0%,'.$color_2.' 100%);';
    $styles .= 'background:linear-gradient(to bottom,'.$color_1.' 0%,'.$color_2.' 100%);';
    $styles .= "filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='".$color_1."', endColorstr='".$color_2."',GradientType=0);";

    return $styles;

}

/**
 * Build & enqueue the complete CSS for headers.
 *
 * @return void
 */
function understrap_enqueue_header_gradients() {

    $color_1 = get_theme_mod( 'color_1', 'rgba(247, 0, 104,0.8)' );
    $color_2 = get_theme_mod( 'color_2', 'rgba(68, 16, 102,0.6)' );

    $css = '.home #hero::before, .home #stats::before, .home #sponsors::before{'.kirki_build_gradients( $color_1, $color_2 ).'}';
    wp_add_inline_style( 'understrap-gradient', $css );

}
add_action( 'wp_enqueue_scripts', 'understrap_enqueue_header_gradients', 999 );


/**
 * Register support for Gutenberg wide images in your theme
 */
function mytheme_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );