<?php
/**
 * Check Blog Configuration
 */

require_once(__DIR__ . '/../../../wp-load.php');

echo "=== WordPress Blog Configuration ===\n\n";

// Check permalink structure
$permalink_structure = get_option('permalink_structure');
echo "Permalink Structure: " . ($permalink_structure ?: 'Plain (default)') . "\n";

// Check posts page setting
$page_for_posts = get_option('page_for_posts');
echo "Posts Page ID: " . ($page_for_posts ?: 'Not set (using default)') . "\n";

// Check front page setting
$show_on_front = get_option('show_on_front');
$page_on_front = get_option('page_on_front');
echo "Show on Front: $show_on_front\n";
echo "Front Page ID: $page_on_front\n\n";

// List all posts
echo "=== Published Posts ===\n";
$posts = get_posts(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => -1,
));

if ($posts) {
    foreach ($posts as $post) {
        echo "✓ " . $post->post_title . "\n";
        echo "  URL: " . get_permalink($post->ID) . "\n";
    }
} else {
    echo "No posts found!\n";
}

echo "\n=== Recommended URLs to Try ===\n";
echo "1. Main site: " . home_url('/') . "\n";
echo "2. With /blog/: " . home_url('/blog/') . "\n";
echo "3. Category archive: " . home_url('/category/cbse-updates/') . "\n";
echo "4. Category archive: " . home_url('/category/neet-preparation/') . "\n";

echo "\n=== SOLUTION ===\n";
echo "Go to: http://localhost/bodhiwebsite/wp-admin/options-permalink.php\n";
echo "Click 'Save Changes' button to regenerate .htaccess\n";
