<?php
function streamin_theme_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    // Register Menu (Top Right)
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'streamin'),
    ));
}
add_action('after_setup_theme', 'streamin_theme_setup');

// Enqueue Styles
function streamin_scripts() {
    wp_enqueue_style('streamin-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'streamin_scripts');

// Allow Batch Download Field in Custom Fields (Native WP Support)
function streamin_add_custom_meta_box() {
    add_meta_box(
        'batch_download_box',
        'Batch Download Links',
        'streamin_batch_download_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'streamin_add_custom_meta_box');

function streamin_batch_download_callback($post) {
    $batch_1080 = get_post_meta($post->ID, 'batch_1080', true);
    $batch_720 = get_post_meta($post->ID, 'batch_720', true);
    ?>
    <label>Batch 1080p URL:</label><br>
    <input type="text" name="batch_1080" value="<?php echo esc_attr($batch_1080); ?>" style="width:100%; margin-bottom:10px;"><br>
    <label>Batch 720p URL:</label><br>
    <input type="text" name="batch_720" value="<?php echo esc_attr($batch_720); ?>" style="width:100%;">
    <?php
}

function streamin_save_batch_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['batch_1080'])) {
        update_post_meta($post_id, 'batch_1080', sanitize_text_field($_POST['batch_1080']));
    }
    if (isset($_POST['batch_720'])) {
        update_post_meta($post_id, 'batch_720', sanitize_text_field($_POST['batch_720']));
    }
}
add_action('save_post', 'streamin_save_batch_meta');
