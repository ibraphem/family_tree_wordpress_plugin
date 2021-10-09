<?php
/*  Plugin Name: Wordpress Family Tree
 * Plugin URI: https://ibrahimolayioye.netlify.app/
 *  Description: A wordpress plugin to accurately create family tree. It will easily link the family lineage accross generations
  * Version: 0.1.0
 * License: 0.1.0
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 *  Author: Ibrahim Olayioye
 *  Author URI: https://ibrahimolayioye.netlify.app/
 *  Text Domain: wft
 */

if (!function_exists('add_action')) {
    echo "I can't be called directly";
    exit;
}

// Setup
define('WORDPRESS_FAMILY_TREE_PLUGIN', __FILE__);

// Includes
include('includes/activate.php');
include('includes/front/enqueue.php');
include('includes/shortcodes/chart-template-shortcode.php');
include('includes/init.php');
include('includes/admin/meta-box.php');
include('includes/admin/meta-box-save.php');
include('includes/admin/init.php');
include('includes/admin/edit-custom-properties.php');
include('includes/admin/add-submenu.php');
include('includes/process/save-options.php');

//Hooks
register_activation_hook(__FILE__, 'wft_activate_plugin');
add_action('wp_enqueue_scripts', 'wft_enqueue_scripts', 100);
add_action('init', 'wft_init');
add_action('add_meta_boxes_wft', 'meta_box_for_members');
add_action('save_post_wft', 'member_save_meta_boxes_data', 10, 2);
add_action('admin_init', 'wft_admin_init');
add_action('admin_menu', 'add_tree_shotcodes_submenu');


//Filters
add_filter('enter_title_here', 'change_title_placeholder', 10, 2);


//Shortcodes
add_shortcode('family_tree', 'wft_chart_template');
