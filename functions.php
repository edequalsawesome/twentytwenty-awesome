<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Twenty Twenty Gone Awesome
 */
 
 function twentytwenty_gone_awesome_enqueue_styles() {
	 $parent_style = 'twentytwenty';
	 
	 wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	 wp_enqueue_style( 'awesome-style', get_stylesheet_directory_uri() . '/inc/2k20-styles.css', array( $parent_style ) );
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_gone_awesome_enqueue_styles' );

/**
 * Add post formats
 *
 *
 * @return string URL
 */
 
 function twentytwenty_post_formats_setup() {
	 $post_formats = array( 
		 'aside',
		 'gallery',
		 'link',
		 'image',
		 'quote',
		 'status',
		 'video',
		 'audio',
	 );
	 
    add_theme_support( 'post-formats', $post_formats );
}
add_action( 'after_setup_theme', 'twentytwenty_post_formats_setup' );

/**
 * Returns the URL from the post.
 *
 * @uses get_the_link() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * Straight-up stolen from Hemingway Rewritten
 *
 * @return string URL
 */
 
 
function twentytwenty_gone_awesome_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}