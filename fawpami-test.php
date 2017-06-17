<?php

/*
 * Plugin Name: FAWPAMI Test
 * Plugin URI: https://github.com/ptrkcsk/font-awesome-wordpress-admin-menu-icons
 * Description: A plugin for testing 'FA WP Admin Menu Icons' plugin
 * Version: 1.0.0
 * Author: Patrik Csak
 * Author URI: patrikcsak.com
 * License: UNLICENSED
 */

namespace FAWPAMI;

const PREFIX = 'fawpami';

function register_post_type() {
	/**
	 * @param string $variant 'singular' or 'plural'
	 *
	 * @return string
	 */
	function name( $variant ) {
		switch ( $variant ) {
			case 'singular':
				return 'Custom Post Type';
				break;
			case 'plural':
				return 'Custom Post Types';
				break;
		}
	}

	\register_post_type( PREFIX . '_cpt', [
		'labels' => [
			'name'                  => name( 'singular' ),
			'singular_name'         => name( 'singular' ),
			'add_new_item'          => 'Add New Custom ' . name( 'singular' ),
			'edit_item'             => 'Edit ' . name( 'singular' ),
			'new_item'              => 'New ' . name( 'singular' ),
			'view_item'             => 'View ' . name( 'singular' ),
			'view_items'            => 'View ' . name( 'plural' ),
			'search_items'          => 'Search ' . name( 'plural' ),
			'not_found'             => 'No ' . name( 'plural' ) . ' found',
			'not_found_in_trash'    => 'No ' . name( 'plural' ) . ' found in Trash',
			'all_items'             => 'All ' . name( 'plural' ),
			'archives'              => name( 'singular' ) . ' Archives',
			'attributes'            => name( 'singular' ) . ' Attributes',
			'insert_into_item'      => 'Insert into ' . name( 'singular' ),
			'uploaded_to_this_item' => 'Uploaded to this ' . name( 'singular' ),
		],
		'public' => true,
		// 👇 Uncomment and add a Font Awesome icon name to test
		// 'menu_icon' => 'fa-<icon-name>',
	] );
}

add_action( 'init', __NAMESPACE__ . '\\register_post_type' );
