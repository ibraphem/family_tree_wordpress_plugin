<?php

function wft_admin_init()
{
    include('columns.php');
    include('enqueue.php');

    add_filter('manage_wft_posts_columns', 'wft_add_new_family_tree_columns');
    add_action('manage_wft_posts_custom_column', 'wft_manage_family_tree_columns', 10, 2);
    add_action('admin_enqueue_scripts', 'wft_admin_scripts');
    add_action('admin_post_wft_save_options', 'wft_save_options');
}
