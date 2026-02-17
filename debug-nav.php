<?php
require_once('C:/wamp64/www/bodhiwebsite/wp-load.php');

echo "--- PAGES ---" . PHP_EOL;
$pages = get_pages();
foreach($pages as $p) {
    echo "ID: " . $p->ID . " | Slug: " . $p->post_name . " | Title: " . $p->post_title . PHP_EOL;
}

echo PHP_EOL . "--- MENU ITEMS (Primary Menu) ---" . PHP_EOL;
$menu_items = wp_get_nav_menu_items('Primary Menu');
if($menu_items) {
    foreach($menu_items as $item) {
        echo "Label: " . $item->title . " | URL: " . $item->url . PHP_EOL;
    }
} else {
    echo "Primary Menu not found." . PHP_EOL;
}

echo PHP_EOL . "--- PERMALINK INFO ---" . PHP_EOL;
echo "News Archive URL (if news CPT exists): " . get_post_type_archive_link('news') . PHP_EOL;
echo "Posts Page: " . get_permalink(get_option('page_for_posts')) . PHP_EOL;
