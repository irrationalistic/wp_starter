<?


/******************************************************************
*
* GLOBAL DEFINES
*
******************************************************************/
define('THEME_DOMAIN', 'wp_starter');


/******************************************************************
*
* SETUP - register blog elements like sidebars and menus here
*
******************************************************************/
function setup(){
	//clean out the header
	head_cleanup();

	//theme supports
	add_theme_support('post-thumbnails');
	add_theme_support('menus');

	//menus
	register_nav_menus(array(
		'main-nav' => __('Main Navigation', THEME_DOMAIN),
		'footer-nav' => __('Footer Navigation', THEME_DOMAIN)
	));
}
add_action('after_setup_theme', 'setup', 15);


/******************************************************************
*
* HEAD CLEANUP - remove unnecessary parts from the wp header
* https://github.com/eddiemachado/bones/blob/master/library/bones.php
*
******************************************************************/
function head_cleanup(){
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 );
}

function remove_wp_ver_css_js($src){
	if(strpos($src, 'ver=')) $src = remove_query_arg( 'ver', $src );
	return $src;
}


/******************************************************************
*
* FILTER IMAGE P TAGS - clean ptags from images
* http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
*
******************************************************************/
function custom_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'custom_filter_ptags_on_images');


/******************************************************************
*
* EXCERPT MORE
*
******************************************************************/
function custom_excerpt_more($more){
	global $post;
	return '... <a href="'.get_permalink( $post->ID ).'" title="Read '.get_the_title( $post->ID ).'">Read more &raquo;</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');


/******************************************************************
*
* POST CLASS - add the "last" class to the list
*
******************************************************************/
function custom_post_class($classes){
	global $wp_query;
	if(($wp_query->current_post+1) == $wp_query->post_count) $classes[] = 'last';
	return $classes;
}
add_filter('post_class', 'custom_post_class');


/******************************************************************
*
* HELPERS
*
******************************************************************/

function custom_page_title($separator){
	bloginfo('name');
	wp_title($separator);
}

function get_datelink(){
	global $post;
	$year = get_the_time('Y' , $post->ID );
	$month = get_the_time('m' , $post->ID );

	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="date">%3$s</a>',
		get_month_link( $year, $month ),
		esc_attr( sprintf( __( 'Posts from %s' ), $month . "." . $year ) ),
		get_the_date('l j F, Y \a\t g:i a')
	);
	return $link;
}

function get_authorlink(){
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ),
		get_the_author()
	);
	return $link;
}

function main_nav(){
	wp_nav_menu(array(
		'theme_location'  => 'main-nav',
		'container'       => false,
		'container_class' => 'menu-primary-container',
		'menu_class'      => 'menu main-nav clearfix',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu'
	));
}
function footer_nav(){
	wp_nav_menu(array(
		'theme_location'  => 'footer-nav',
		'container'       => false,
		'container_class' => 'menu-primary-container',
		'menu_class'      => 'menu footer-nav clearfix',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu'
	));
}