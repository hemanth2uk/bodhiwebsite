<?php
/**
 * Flush WordPress Rewrite Rules
 * This fixes 404 errors after creating new posts or pages
 */

require_once(__DIR__ . '/../../../wp-load.php');

// Flush rewrite rules
flush_rewrite_rules();

echo "✅ Permalink structure refreshed!\n";
echo "\nYour blog should now be accessible at:\n";
echo "- http://localhost/bodhiwebsite/ (main blog archive)\n";
echo "- http://localhost/bodhiwebsite/blog/ (if using custom permalink)\n";
echo "\nIndividual posts:\n";

// List all published posts
$posts = get_posts(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => -1,
));

foreach ($posts as $post) {
    echo "- " . $post->post_title . ": " . get_permalink($post->ID) . "\n";
}

echo "\nIf you still see 404 errors, go to:\n";
echo "WordPress Admin → Settings → Permalinks → Click 'Save Changes'\n";
