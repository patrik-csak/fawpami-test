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

namespace FawpamiTest;

use function add_menu_page;
use function register_post_type;

function registerPostType(
    string $name,
    string $label,
    string $icon = null,
): void
{
    register_post_type($name, [
        'labels' => [
            'name' => $label,
            'singular_name' => $label,
            'add_new_item' => "Add New $label",
            'edit_item' => "Edit $label",
            'new_item' => "New $label",
            'view_item' => "View $label",
            'view_items' => "View {$label}s",
            'search_items' => "Search {$label}s",
            'not_found' => "No {$label}s found",
            'not_found_in_trash' => "No {$label}s found in Trash",
            'all_items' => "All {$label}s",
            'archives' => "$label Archives",
            'attributes' => "$label Attributes",
            'insert_into_item' => /** @lang text */ "Insert into $label",
            'uploaded_to_this_item' => "Uploaded to this $label",
        ],
        'public' => true,
        'menu_icon' => $icon,
    ]);
}

add_action('init', static function () {
    registerPostType(
        name: 'fa_cutlery',
        label: 'fa-solid fa-cutlery',
        icon: 'fa-solid fa-cutlery',
    );
    registerPostType(
        name: 'fa_utensils',
        label: 'fa-solid fa-utensils',
        icon: 'fa-solid fa-utensils',
    );
    registerPostType(
        name: 'fa_utensils_short',
        label: 'fas fa-utensils',
        icon: 'fas fa-utensils',
    );
    registerPostType(
        name: 'bad_icon',
        label: 'fa-solid fa-foo',
        icon: 'fa-solid fa-foo',
    );
    registerPostType(
        name: 'dashicon',
        label: 'dashicons-admin-users',
        icon: 'dashicons-admin-users',
    );
    registerPostType(
        name: 'no_icon',
        label: 'No Icon',
    );
});

function addMenuPage(string $title, string $slug, string $icon = ''): void
{
    add_menu_page(
        page_title: $title,
        menu_title: $title,
        capability: 'manage_options',
        menu_slug: $slug,
        icon_url: $icon,
    );
}

add_action('admin_menu', static function () {
    addMenuPage(
        title: 'fa-solid fa-cutlery',
        slug: 'fa_cutlery',
        icon: 'fa-solid fa-cutlery',
    );
    addMenuPage(
        title: 'fa-solid fa-utensils',
        slug: 'fa_utensils',
        icon: 'fa-solid fa-utensils',
    );
    addMenuPage(
        title: 'fas fa-utensils',
        slug: 'fa_utensils',
        icon: 'fas fa-utensils',
    );
    addMenuPage(
        title: 'fa-solid fa-foo',
        slug: 'fa_utensils',
        icon: 'fa-solid fa-foo',
    );
    addMenuPage(
        title: 'dashicons-admin-users',
        slug: 'dashicons_admin_users',
        icon: 'dashicons-admin-users',
    );
    addMenuPage(
        title: 'No Icon',
        slug: 'no_icon',
    );
});
