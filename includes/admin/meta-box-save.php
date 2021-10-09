<?php

function member_save_meta_boxes_data($post_id)
{


    // check for correct user capabilities - stop internal xss from customers
    if (! current_user_can('edit_post', $post_id)) {
        return "capabilities";
    }

    // update fields
    if (isset($_REQUEST['birth_date'])) {
        update_post_meta($post_id, 'birth_date', sanitize_text_field($_POST['birth_date']));
    }

    if (isset($_REQUEST['death_date'])) {
        update_post_meta($post_id, 'death_date', sanitize_text_field($_POST['death_date']));
    }

    if (isset($_REQUEST['gender'])) {
        update_post_meta($post_id, 'gender', sanitize_text_field($_POST['gender']));
    }

    if (isset($_REQUEST['parent'])) {
        update_post_meta($post_id, 'parent', sanitize_text_field($_POST['parent']));
    }
}
