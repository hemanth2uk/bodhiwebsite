<?php
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

$menus = wp_get_nav_menus();
echo "Registered Menus:\n";
foreach($menus as $menu) {
    echo "- Name: " . $menu->name . " (ID: " . $menu->term_id . ")\n";
    $items = wp_get_nav_menu_items($menu->term_id);
    foreach($items as $item) {
        echo "  - Item: [" . $item->title . "] (ID: " . $item->ID . ", Parent: " . $item->menu_item_parent . ", URL: " . $item->url . ")\n";
    }
}

echo "\nTheme Locations:\n";
$theme_locations = get_registered_nav_menus();
foreach($theme_locations as $location => $description) {
    echo "- Location: " . $location . " ($description)\n";
}
