<?php

function wft_activate_plugin()
{
    if (version_compare(get_bloginfo('version'), '5.0', '<')) {
        wp_die(__("You must update Wordpress to use this plugin.", "wft
        "));
    }

    $wftree_opts   =    get_option('wft_opts');
    
    if (!$wftree_opts) {
        $opts                   =       [
            'wft_background_color'  =>      "#ff0000",
            'wft_color'             =>      "#ffffff",
            'wft_font_weight'       =>      600,
            'wft_font_style'        =>      "italic",
            'wft_show_title'        =>      1
        ];

        add_option('wft_opts', $opts);
    }
}
