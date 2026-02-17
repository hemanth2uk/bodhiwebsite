<?php
/**
 * Add ACF Field for Blog Post Featured Images
 */

require_once(__DIR__ . '/../../../wp-load.php');

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_blog_post_image',
        'title' => 'Blog Post Featured Image',
        'fields' => array(
            array(
                'key' => 'field_blog_featured_image',
                'label' => 'Featured Image',
                'name' => 'blog_featured_image',
                'type' => 'image',
                'instructions' => 'Upload a featured image for this blog post. Recommended size: 1920x1080px. This will appear on the blog archive page and at the top of the post.',
                'required' => 0,
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
    ));
    
    echo "✓ ACF field group 'Blog Post Featured Image' registered successfully!\n";
    echo "\nNow you can:\n";
    echo "1. Go to WordPress Admin → Posts → Edit any post\n";
    echo "2. Scroll down to find 'Blog Post Featured Image' section\n";
    echo "3. Click 'Add Image' to upload or select an image\n";
    echo "4. Save the post\n";
} else {
    echo "Error: ACF plugin not active!\n";
}
