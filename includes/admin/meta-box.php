<?php
function meta_box_for_members($post)
{
    add_meta_box('wft_id', __('Additional info', 'wft'), 'member_meta_box_html_output', 'wft', 'normal', 'low');
    // print_r($post);
}

function output_parents_list($wft)
{
    global $wpdb;

    $custom_post_type = 'wft'; // defining your custom post type

    // A sql query to return all post titles
    $results = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title FROM {$wpdb->posts} 
    WHERE post_type = %s and post_status = %s", $custom_post_type, 'publish'), ARRAY_A);

    // Return null if we found no results
    if (! $results) {
        return;
    }

    // HTML for our select printing post titles as loop
    $output = '<p><label for="parent" class="info-label">Parent: </label><select name="parent" class="input-width">';

    $output .= '<option '.selected(
        get_post_meta($wft->ID, 'parent', true),
        "",
        false
    ).' value="' . "" . '">' . "Nil" . '</option>';
    foreach ($results as $index => $post) {
        $output .= '<option value="' . $post['post_title'] . '" '.selected(
            get_post_meta($wft->ID, 'parent', true),
            $post['post_title'],
            false
        ).'>' . $post['post_title'] . '</option>';
    }

    $output .= '</select></p>'; // end of select element

    // get the html
    return $output;
}

function member_meta_box_html_output($post)
{
    wp_nonce_field(basename(__FILE__), 'member_meta_box_nonce'); //used later for security
    echo "<p><label for='gender' class='info-label'>Gender: </label>
        <select name='gender' class='input-width'>
        <option value='Male' ".selected(
        get_post_meta($post->ID, 'gender', true),
        'Male',
        false
    )." >Male</option>
    <option value='Female' ".selected(
        get_post_meta($post->ID, 'gender', true),
        'Female',
        false
    )." >Female</option>
        </select>
    </p>";
    echo output_parents_list($post);
    echo '<p><label for="birth_date" class="info-label">'.__('Birth date:', 'wft').'</label><input type="text" class="input-width" name="birth_date" value='.get_post_meta($post->ID, 'birth_date', true).'>&nbsp; &nbsp; (YYYY-MM-DD)</p>';
    echo '<p><label for="death_date" class="info-label">'.__('Death date:', 'wft').'</label><input type="text" class="input-width" name="death_date" value='.get_post_meta($post->ID, 'death_date', true).'>&nbsp; &nbsp; (YYYY-MM-DD)</p>';
}
