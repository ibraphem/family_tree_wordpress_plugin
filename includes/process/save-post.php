<?php

function wft_save_post_admin($post_id, $post, $update)
{

    // check for nonce to top xss
    /*   if (!isset($_POST['member_meta_box_nonce']) || !wp_verify_nonce($_POST['member_meta_box_nonce'], basename(__FILE__))) {
           echo "nonce";
           die;
           // return 'nonce';
       } */

    // check for correct user capabilities - stop internal xss from customers
    if (! current_user_can('edit_post', $post_id)) {
        echo "capabilities";
        die;
        //return "capabilities";
    }

  
    
    
    $wft_data = get_post_meta($post_id, 'wft_data', true);
    $wft_data = empty($wft_data) ? [] : $wft_data;
    $wft_data['birth_date'] = isset($_REQUEST['birth_date']) ? sanitize_text_field($_REQUEST['birth_date']) : "";
    $wft_data['death_date'] = isset($_REQUEST['death_date']) ? sanitize_text_field($_REQUEST['death_date']) : "";

    update_post_meta($post_id, 'birth_date', sanitize_text_field($_POST['birth_date']));
}
