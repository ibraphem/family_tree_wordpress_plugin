<?php

function wft_enqueue_scripts()
{
    wp_register_style(
        'wft_bootstrap',
        plugins_url('/assets/css/bootstrap.css', WORDPRESS_FAMILY_TREE_PLUGIN)
    );

    wp_enqueue_style('wft_bootstrap');

    wp_register_script(
        'wft_google_chart',
        'https://www.gstatic.com/charts/loader.js',
        null,
        null,
        true
    );

    wp_register_script(
        'wft_tree',
        plugins_url(
            '/assets/js/tree.js',
            WORDPRESS_FAMILY_TREE_PLUGIN
        ),
        ['wft_google_chart'],
        null,
        true
    );

    wp_enqueue_script('wft_google_chart');
    wp_enqueue_script('wft_tree');
}
