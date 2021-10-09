<?php

function add_tree_shotcodes_submenu()
{
    include('tree-shortcode-page.php');
    include('settings-page.php');
    include('class-wp-family-data.php');

    add_submenu_page(
        'edit.php?post_type=wft',
        'Family Tree Shortcodes',
        'Tree Shortcodes',
        'manage_options',
        'tree_shortcodes',
        'tree_shortcode_page'
    );

    add_submenu_page(
        'edit.php?post_type=wft',
        'Family Tree Settings',
        'Settings',
        'manage_options',
        'wft_settings_page',
        'settings_page'
    );
}
