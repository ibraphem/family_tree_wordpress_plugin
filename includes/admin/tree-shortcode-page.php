<?php


function tree_shortcode_page()
{
    require_once('class-wp-family-data.php');

    $family_group_table = new Family_Data_Table();
    $family_group_table->prepare_items(); ?>
<div class="wrap">
  <div id="icon-users" class="icon32"></div>
  <h2>Family Tree Shortcodes</h2>
  <?php $family_group_table->display(); ?>
</div>
<?php
}
