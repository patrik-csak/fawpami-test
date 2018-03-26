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

namespace Fawpami;

function register_post_type()
{
    $singular = 'Custom Post Type';
    $plural = 'Custom Post Types';

    \register_post_type('fawpami_cpt', [
        'labels' => [
            'name' => $singular,
            'singular_name' => $singular,
            'add_new_item' => "Add New {$singular}",
            'edit_item' => "Edit {$singular}",
            'new_item' => "New {$singular}",
            'view_item' => "View {$singular}",
            'view_items' => "View {$plural}",
            'search_items' => "Search {$plural}",
            'not_found' => "No {$plural} found",
            'not_found_in_trash' => "No {$plural} found in Trash",
            'all_items' => "All {$plural}",
            'archives' => "{$singular} Archives",
            'attributes' => "{$singular} Attributes",
            'insert_into_item' => "Insert into {$singular}",
            'uploaded_to_this_item' => "Uploaded to this {$singular}",
        ],
        'public' => true,
        'menu_icon' => 'fab fa-font-awesome-alt',
    ]);
}

add_action('init', __NAMESPACE__ . '\\register_post_type');

function add_menu_page()
{
    \add_menu_page(
        'Custom Menu Page',
        'Custom Menu Page',
        'manage_options',
        'custom_menu_page',
        '',
        'fab fa-font-awesome'
    );
}

add_action('admin_menu', __NAMESPACE__ . '\\add_menu_page');
