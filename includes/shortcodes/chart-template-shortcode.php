<?php

function wft_chart_template($atts)
{
    global $wpdb;

   

    $atts = shortcode_atts([
        'family_group_id'    => 0
    ], $atts);

    $term_name = get_term($atts['family_group_id'])->name;

    //   echo $term_name;

    $custom_post_type = 'wft'; // defining your custom post type

    $results = $wpdb->get_results($wpdb->prepare("SELECT post_title, meta_value FROM {$wpdb->posts}
        LEFT JOIN {$wpdb->postmeta} ON {$wpdb->posts}.ID = {$wpdb->postmeta}.post_id
        LEFT JOIN  $wpdb->term_relationships  as t ON ID = t.object_id
        WHERE post_type = %s 
        and post_status = %s 
        and t.term_taxonomy_id = %d
        and meta_key = 'parent'", $custom_post_type, 'publish', $atts['family_group_id']));

    $wftree_opts = get_option('wft_opts');

    $results = json_encode($results);
    $wftree_options = json_encode($wftree_opts);

    if (isset($results) && isset($wftree_opts)) {
        $data_to_send = array(
            'results'       => $results,
            'wftree_opts'   => $wftree_options
        );
        wp_localize_script('wft_tree', 'tree_data', $data_to_send);
    }



    //Check if there is internet connection to load the google Chart CDN
    $connected = @fsockopen("www.google.com", 80);
    //website, port  (try 80 or 443)
    if ($connected) {
        $is_conn = true; //action when connected
        fclose($connected);
    } else {
        $is_conn = false; //action in connection failure
    }
    if ($wftree_opts['wft_show_title']== 1) {
        $output = "<div><h3 class='text-center font-weight-bold'>". strtoupper($term_name) . " FAMILY TREE </h3>";
    } else {
        $output="";
    }
   
    if ($is_conn === true) {
        $output .= "<div id='chart_div'></div> </div>";
    } else {
        $output .= "<div class='card text-center bg-danger'>
                    <div class='card-body'>
                    <h5 class='card-title text-light'>Check your internet connection</h5>
                    <p class='card-text text-light'>OOPs!!! Internet is needed to load google chart CDN for the family tree.</p>
                    </div>
                </div></div>";
    }

    return $output;
}
