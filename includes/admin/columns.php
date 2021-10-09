<?php

function wft_add_new_family_tree_columns($columns)
{
    $new_columns                    =   [];
    $new_columns['cb']              =   '<input type="checkbox"/>';
    $new_columns ['title']          =   __('Title', 'wft');
    $new_columns ['wft_family_group']     =   __('Family Group', 'wft');
    $new_columns ['parent']         =   __('Parent', 'wft');
    $new_columns ['birth_date']     =   __('Birth Date', 'wft');
    $new_columns ['death_date']     =   __('Death Date', 'wft');
    $new_columns ['gender']         =   __('Gender', 'wft');
    $new_columns ['date']           =   __('Date', 'wft');

    return $new_columns;
}

function wft_manage_family_tree_columns($column, $post_id)
{
    global $post;
    switch ($column) {
        case 'parent':
            $wft       =    get_post_meta($post_id, 'parent', true);
            echo isset($wft) ? $wft : 'N/A';
            break;
        case 'birth_date':
            $wft       =    get_post_meta($post_id, 'birth_date', true);
            echo isset($wft) ?$wft : 'N/A';
            break;
        case 'death_date':
            $wft       =    get_post_meta($post_id, 'death_date', true);
            echo isset($wft) ?$wft : 'N/A';
            break;
        case 'gender':
            $wft       =    get_post_meta($post_id, 'gender', true);
            echo isset($wft) ?$wft : 'N/A';
            break;
        case 'wft_family_group':
            $terms = get_the_terms($post_id, 'wft_family_group');
            if (!empty($terms)) {
                $out = array();
                foreach ($terms as $term) {
                    $out[] =  esc_html(sanitize_term_field('name', $term->name, $term->term_id, 'wft_family_group', 'display'));
                    //     '&lt;a href="%s">%s&lt;/a>',
                     //   esc_url(add_query_arg(array( 'post_type' => $post->post_type, 'wft_family_group' => $term->slug ), 'edit.php')),
                }
                echo join(', ', $out);
            } else {
                _e('N/A');
            }
            break;
        default:
            break;
    }
}
