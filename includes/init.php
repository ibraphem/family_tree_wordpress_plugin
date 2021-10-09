<?php
 
function wft_init()
{
    // set up  labels
    $labels = array(
        'name' => 'Members',
        'singular_name' => 'Member',
        'add_new' => 'Add New Member',
        'add_new_item' => 'Add New Member',
        'edit_item' => 'Edit Member',
        'new_item' => 'New Member',
        'all_items' => 'All Members',
        'view_item' => 'View Member',
        'search_items' => 'Search Members',
        'not_found' =>  'No Members Found',
        'not_found_in_trash' => 'No Members found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Family Tree',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'member'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('wft', $args);
    
    // register taxonomy
    //  register_taxonomy('wft_family_group', 'wft', array('hierarchical' => true, 'label' => 'Family Group', 'query_var' => true, 'rewrite' => array( 'slug' => 'family-group' )));
    register_taxonomy(
        'wft_family_group',
        'wft',
        array(
        'labels' => array(
            'name' => 'Family Group',
            'add_new_item' => 'Add New Family Group',
            'new_item_name' => "New Family Group",
            'all_items' => 'All Family Group',
            'view_item' => 'View Family Group',
            'search_items' => 'Search Family Group',
        ),
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true
    )
    );
}
