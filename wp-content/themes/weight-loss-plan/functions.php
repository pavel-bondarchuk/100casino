<?php
/* Theme Functions */
add_action( 'after_setup_theme', 'after_setup_theme' );
function after_setup_theme() {
	// load_theme_textdomain( 'tocr', get_template_directory() . '/languages' );
	load_theme_textdomain( 'tocr' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'articles-item-logo', 255, 108, true );
	add_image_size( 'view-sidebar-logo', 300, 133, true );
	add_image_size( 'top-sites-item-logo', 300, 133, true );
	add_image_size( 'slot-site-logo', 315, 140, true );
	register_nav_menus( [
		'primary_navigation' => __( 'Header', 'tocr' ),
		'secondary_navigation' => __( 'Footer', 'tocr' )
	] );
	add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 35,
		'flex-width'  => true,
	) );
};
add_action('wp_enqueue_scripts', 'wp_enqueue_assets', 10);
function wp_enqueue_assets() {
	wp_enqueue_style( 'fonts', fonts_url(), array(), null );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	if(!is_page(13) && !is_page(2)){
	wp_enqueue_style( 'bundle', get_theme_file_uri('bundle.css') );
	}
	wp_enqueue_style( 'raty', get_theme_file_uri('raty/lib/jquery.raty.css') );
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'plugin', get_theme_file_uri('plugins.js'), '', '', false );
	wp_enqueue_script( 'init', get_theme_file_uri('init.js'), '', '', false );
	wp_enqueue_script( 'raty', get_theme_file_uri('raty/lib/jquery.raty.js'), '', '', false );
	wp_enqueue_script( 'cookie', get_theme_file_uri('jquery-cookie-master/src/jquery.cookie.js'), '', '', false );
	
	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' );
}
function fonts_url() {
	$fonts_url = '';
	$roboto = _x( 'on', 'roboto font: on or off', 'tocr' );

	if ( 'off' !== $roboto ) {
		$font_families = array();

		$font_families[] = 'Roboto:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,cyrillic' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );
function widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tocr' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'tocr' ),
		'before_widget' => '<div id="%1$s" class="view-sidebar-top-sites">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'widgets_init' );
///
if ( ! function_exists( 'excerpt_more' ) ) {
	function excerpt_more( $more ) {
		return '';
	}
}
add_filter( 'excerpt_more', 'excerpt_more' );
///
function my_excerpt_length($length){
return 47;
}
add_filter('excerpt_length', 'my_excerpt_length');
//
/**
 * Обрезка текста (excerpt). Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
 *
 * @param string/array $args Параметры.
 *
 * @return string HTML
 *
 * @ver 2.6.5
 */
function kama_excerpt( $args = '' ){
	global $post;

	if( is_string($args) )
		parse_str( $args, $args );

	$rg = (object) array_merge( array(
		'maxchar'     => 350,   // Макс. количество символов.
		'text'        => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
								// Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется
								// все до <!--more--> вместе с HTML.
		'autop'       => true,  // Заменить переносы строк на <p> и <br> или нет?
		'save_tags'   => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
		'more_text'   => 'Читать дальше...', // Текст ссылки `Читать дальше`.
		'ignore_more' => false, // нужно ли игнорировать <!--more--> в контенте
	), $args );

	$rg = apply_filters( 'kama_excerpt_args', $rg );

	if( ! $rg->text )
		$rg->text = $post->post_excerpt ?: $post->post_content;

	$text = $rg->text;
	// убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
	$text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text );
	// убираем шоткоды: [singlepic id=3]. Учитывает markdown
	$text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text );
	$text = trim( $text );

	// <!--more-->
	if( ! $rg->ignore_more  &&  strpos( $text, '<!--more-->') ){
		preg_match('/(.*)<!--more-->/s', $text, $mm );

		$text = trim( $mm[1] );

		$text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
	}
	// text, excerpt, content
	else {
		$text = trim( strip_tags($text, $rg->save_tags) );

		// Обрезаем
		if( mb_strlen($text) > $rg->maxchar ){
			$text = mb_substr( $text, 0, $rg->maxchar );
			$text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1...', $text ); // кил последнее слово, оно 99% неполное
		}
	}

	// сохраняем переносы строк. Упрощенный аналог wpautop()
	if( $rg->autop ){
		$text = preg_replace(
			array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
			array('',     '</p><p>',  '<br />', '</p>'),
			$text
		);
	}

	$text = apply_filters( 'kama_excerpt', $text, $rg );

	if( isset($text_append) )
		$text .= $text_append;

	return ( $rg->autop && $text ) ? "<p>$text</p>" : $text;
}
/* Сhangelog:
 * 2.6.5 - Параметр ignore_more
 * 2.6.4 - Убрал пробел между словом и многоточием
 * 2.6.3 - Рефакторинг
 * 2.6.2 - Добавил регулярку для удаления блочных шорткодов вида: [foo]some data[/foo]
 * 2.6   - Удалил параметр 'save_format' и заменил его на два параметра 'autop' и 'save_tags'.
 *       - Немного изменил логику кода.
 */
// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}
function cptui_register_my_cpts() {

	/**
	 * Post Type: Vendors.
	 */

	$labels = [
		"name" => __( "Vendors", "tocr" ),
		"singular_name" => __( "Vendor", "tocr" ),
	];

	$args = [
		"label" => __( "Vendors", "tocr" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "vendor", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "vendor", $args );

	/**
	 * Post Type: Live Casinos.
	 */

	$labels = [
		"name" => __( "Live Casinos", "tocr" ),
		"singular_name" => __( "Live Casino", "tocr" ),
	];

	$args = [
		"label" => __( "Live Casinos", "tocr" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "live_casino", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "live_casino", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
