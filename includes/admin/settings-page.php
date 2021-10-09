<?php

function settings_page()
{
    $wftree_opts = get_option('wft_opts'); ?>

<div class="wrap">
    <h3><?php _e("Family Tree Settings", "wft"); ?>
    </h3>
    <?php
                if (isset($_GET['status'])&& $_GET['status'] == 1) {?>

    <div class="alert alert-success">Settings Updated Succesfully</div>

    <?php
                    
                } ?>
    <form method="POST" action="admin-post.php">
        <input type="hidden" name="action" value="wft_save_options" />
        <?php wp_nonce_field('wft_options_verify'); ?>
        <div>
            <label><?php _e("Background Color", "wft"); ?></label>
            <div>
                <input type="color" style="width: 300px;"
                    value="<?php echo $wftree_opts['wft_background_color'] ?>"
                    name="wft_background_color">
            </div>
        </div><br />
        <div>
            <label><?php _e("Text Color", "wft"); ?></label>
            <div>
                <input type="color" style="width: 300px;"
                    value="<?php echo $wftree_opts['wft_color'] ?>"
                    name="wft_color">
            </div>
        </div><br />
        <div>
            <label><?php _e("Font Weight", "wft"); ?></label>
            <div>
                <select name="wft_font_weight" style="width: 300px;">
                    <option value="600" <?php echo $wftree_opts['wft_font_weight'] == 600 ? 'SELECTED' : ""  ?>>600
                    </option>
                    <option value="700" <?php echo $wftree_opts['wft_font_weight'] == 700 ? 'SELECTED' : ""  ?>>700
                    </option>
                    <option value="800" <?php echo $wftree_opts['wft_font_weight'] == 800 ? 'SELECTED' : ""  ?>>800
                    </option>
                    <option value="900" <?php echo $wftree_opts['wft_font_weight'] == 900 ? 'SELECTED' : ""  ?>>900
                    </option>
                </select>
            </div>
        </div>
        <div>
            <label><?php _e("Font Style", "wft"); ?></label>
            <div>
                <select name="wft_font_style" style="width:300px">
                    <option value="normal">normal</option>
                    <option value="italic" <?php echo $wftree_opts['wft_font_style'] == "italic" ? 'SELECTED' : ""  ?>>italic
                    </option>
                    <option value="oblique" <?php echo $wftree_opts['wft_font_style'] == "oblique" ? 'SELECTED' : ""  ?>>oblique
                    </option>
                </select>
            </div>
        </div>
        <div>
            <label><?php _e("Show Title", "wft"); ?></label>
            <div>
                <select name="wft_show_title" style="width:300px">
                    <option value="1">Yes</option>
                    <option value="0" <?php echo $wftree_opts['wft_show_title'] == 0 ? 'SELECTED' : ""  ?>>No
                    </option>
                </select>
            </div>
        </div> <br />
        <div>
            <div>
                <button type="submit" class='button-secondary'><?php _e("Update", "wft"); ?></button>
            </div>
        </div>
    </form>




</div>

<?php
}
