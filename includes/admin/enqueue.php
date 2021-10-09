<?php

function wft_admin_scripts()
{
    if (!isset($_GET['page']) || $_GET['page'] != "wft_settings_page" && $_GET['page'] != "tree_shortcodes") {
        return;
    }
    wp_register_style(
        'wft_admin_styles',
        plugins_url('/assets/css/admin-style.css', WORDPRESS_FAMILY_TREE_PLUGIN)
    );

    wp_enqueue_style('wft_admin_styles');
}
