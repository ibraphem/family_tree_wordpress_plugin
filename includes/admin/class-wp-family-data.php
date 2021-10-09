<?php

if (! class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class Family_Data_Table extends WP_List_Table
{
    public $new_data = [];
    public $family_data = [];
    
    public function get_taxonomy()
    {
        $taxonomy = 'wft_family_group';
        $terms = get_terms($taxonomy);

        foreach ($terms as $term) {
            $this->new_data['Family'] = $term->name;
            $this->new_data['Shortcode'] = "[family_tree family_group_id=$term->term_taxonomy_id]";

            $this->family_data[] = $this->new_data;
        }
        return $this->family_data;
    }
   
   
    public function get_columns()
    {
        $columns = array(
          'Family' => 'Family Group',
          'Shortcode'    => 'Shortcode',
        );
        return $columns;
    }
      
    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $this->get_taxonomy();
    }

    public function column_default($item, $column_name)
    {
        switch ($column_name) {
          case 'Family':
          case 'Shortcode':
            return $item[ $column_name ];
          default:
            return print_r($item, true) ; //Show the whole array for troubleshooting purposes
        }
    }
}
