<?php

function wft_save_options()
{
    //Check user capability
    if (!current_user_can('manage_options')) {
        wp_die(__("You are not allowed to be on this page", "wft"));
    }

    //Check nonce
    check_admin_referer('wft_options_verify');

    $wftree_opts   =    get_option('wft_opts');
    
    $wftree_opts['wft_background_color']  =      $_POST['wft_background_color'];
    $wftree_opts['wft_color']             =      $_POST['wft_color'];
    $wftree_opts['wft_font_weight']       =      absint($_POST['wft_font_weight']);
    $wftree_opts['wft_font_style']        =      $_POST['wft_font_style'];
    $wftree_opts['wft_show_title']        =      absint($_POST['wft_show_title']);

    update_option('wft_opts', $wftree_opts);
    wp_redirect(admin_url('edit.php?post_type=wft&page=wft_settings_page&status=1'));
}
