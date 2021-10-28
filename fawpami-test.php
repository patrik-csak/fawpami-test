<?php
/*
 * Plugin Name: FAWPAMI Test
 * Plugin URI: https://github.com/ptrkcsk/font-awesome-wordpress-admin-menu-icons
 * Description: A plugin for testing 'FA WP Admin Menu Icons' plugin
 * Version: 1.0.0
 * Author: Patrik Csak
 * Author URI: github.com/ptrkcsk
 * License: UNLICENSED
 */

namespace Fawpami;

function register_post_type($post_type, $label, $icon)
{
    \register_post_type($post_type, [
        'labels' => [
            'name' => $label,
            'singular_name' => $label,
            'add_new_item' => "Add New {$label}",
            'edit_item' => "Edit {$label}",
            'new_item' => "New {$label}",
            'view_item' => "View {$label}",
            'view_items' => "View {$label}s",
            'search_items' => "Search {$label}s",
            'not_found' => "No {$label}s found",
            'not_found_in_trash' => "No {$label}s found in Trash",
            'all_items' => "All {$label}s",
            'archives' => "{$label} Archives",
            'attributes' => "{$label} Attributes",
            'insert_into_item' => /** @lang text */ "Insert into {$label}",
            'uploaded_to_this_item' => "Uploaded to this {$label}",
        ],
        'public' => true,
        'menu_icon' => $icon,
    ]);
}

add_action('init', function () {
    register_post_type(
        'fawpami_cpt',
        'Custom Post Type',
        'fab fa-font-awesome'
    );
    register_post_type('fawpami_bad_icon', 'Bad Icon', 'fas fa-foo');
});

function add_menu_page()
{
    \add_menu_page(
        'Custom Menu Page',
        'Custom Menu Page',
        'manage_options',
        'custom_menu_page',
        '',
        'fab fa-font-awesome-alt'
    );
}

add_action('admin_menu', __NAMESPACE__ . '\\add_menu_page');
