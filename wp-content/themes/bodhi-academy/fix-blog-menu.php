<?php
/**
 * Fix Blog Menu Link
 * This script updates the "Blogs" menu item to point to the blog archive instead of a static page
 */

require_once(__DIR__ . '/../../../wp-load.php');

// Get the primary menu
$menu_name = 'primary';
$locations = get_nav_menu_locations();
$menu_id = $locations[$menu_name];

if (!$menu_id) {
    echo "Primary menu not found!\n";
    exit;
}

$menu_items = wp_get_nav_menu_items($menu_id);

// Find and update the Blogs menu item
foreach ($menu_items as $item) {
    if (strtolower($item->title) === 'blogs' || strtolower($item->title) === 'blog') {
        // Update to point to blog archive
        $blog_url = home_url('/blog/');
        
        wp_update_nav_menu_item($menu_id, $item->ID, array(
            'menu-item-title' => 'Blogs',
            'menu-item-url' => $blog_url,
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-object' => 'custom',
        ));
        
        echo "✓ Updated 'Blogs' menu item to point to: $blog_url\n";
        break;
    }
}

// Also delete the static "Blogs" page if it exists
$blogs_page = get_page_by_title('Blogs');
if ($blogs_page && $blogs_page->post_content === 'Placeholder content for Blogs.') {
    wp_delete_post($blogs_page->ID, true);
    echo "✓ Deleted placeholder 'Blogs' page\n";
}

// Set blog page settings
update_option('show_on_front', 'page');
update_option('page_on_front', get_option('page_on_front')); // Keep existing home page
update_option('page_for_posts', 0); // Use default blog archive

echo "\n✅ Blog setup completed!\n";
echo "Visit: " . home_url('/blog/') . " or " . home_url() . " (if blog is homepage)\n";
