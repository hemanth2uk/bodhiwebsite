<?php
/**
 * Fix Blog Menu - Point to Archive
 */

require_once(__DIR__ . '/../../../wp-load.php');

// Option 1: Create a "Blog" page and set it as the posts page
$blog_page = get_page_by_title('Blog');
if (!$blog_page) {
    $blog_page_id = wp_insert_post(array(
        'post_title' => 'Blog',
        'post_name' => 'blog',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_content' => '', // Empty content - WordPress will use index.php template
    ));
    
    // Set this as the posts page
    update_option('page_for_posts', $blog_page_id);
    
    echo "✓ Created 'Blog' page and set as posts page (ID: $blog_page_id)\n";
} else {
    // Set existing page as posts page
    update_option('page_for_posts', $blog_page->ID);
    echo "✓ Set existing 'Blog' page as posts page (ID: {$blog_page->ID})\n";
}

// Flush rewrite rules
flush_rewrite_rules();

echo "\n✅ Blog menu is now fixed!\n";
echo "The BLOGS menu will now show all your posts at: " . home_url('/blog/') . "\n";
echo "\nYour posts:\n";

$posts = get_posts(array('numberposts' => -1));
foreach ($posts as $post) {
    echo "- {$post->post_title}\n";
}
