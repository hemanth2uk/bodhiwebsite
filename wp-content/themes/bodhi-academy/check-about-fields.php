<?php
// Check if About Us fields are populated
require_once(__DIR__ . '/../../../wp-load.php');

$page = get_page_by_path('about-us');
if (!$page) {
    echo "About Us page not found!\n";
    exit;
}

$page_id = $page->ID;
echo "Page ID: $page_id\n";
echo "Page Title: " . $page->post_title . "\n\n";

// Check all fields
$fields_to_check = [
    'about_hero_title',
    'about_hero_subtitle',
    'about_main_title',
    'about_main_content',
    'about_philosophy_title',
    'about_philosophy_content',
    'about_programmes_title',
    'about_programmes_desc',
    'about_mission_title',
    'about_mission_text',
    'about_vision_title',
    'about_vision_text',
    'founder_name',
    'founder_title',
    'legacy_title',
];

foreach ($fields_to_check as $field) {
    $value = get_field($field, $page_id);
    if ($value) {
        echo "✓ $field: " . substr($value, 0, 50) . "...\n";
    } else {
        echo "✗ $field: EMPTY\n";
    }
}

echo "\n--- Checking raw post meta ---\n";
global $wpdb;
$meta = $wpdb->get_results($wpdb->prepare(
    "SELECT meta_key, meta_value FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key LIKE %s",
    $page_id,
    'about_%'
));

echo "Found " . count($meta) . " meta entries starting with 'about_'\n";
foreach ($meta as $m) {
    echo $m->meta_key . " => " . substr($m->meta_value, 0, 30) . "...\n";
}
