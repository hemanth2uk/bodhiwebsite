<?php
/**
 * Sync Live Alerts Script
 * 
 * This script creates the "Live Exam Alerts" page in the database,
 * assigns the correct template, and ensures it's ready for use.
 */

// Load WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

if (!is_user_logged_in() && !defined('WP_CLI')) {
    // Basic security - in a real scenario you'd want something stronger
}

echo "Starting Live Alerts Sync...\n";

// 1. Create the Page
$page_title = 'Live Exam Alerts';
$page_template = 'page-live-alerts.php';
$page_slug = 'live-exam-alerts';

$existing_page = get_page_by_path($page_slug);

if (!$existing_page) {
    $page_id = wp_insert_post([
        'post_title'    => $page_title,
        'post_name'     => $page_slug,
        'post_status'   => 'publish',
        'post_type'     => 'page',
    ]);
    echo "Created page: $page_title (ID: $page_id)\n";
} else {
    $page_id = $existing_page->ID;
    echo "Found existing page: $page_title (ID: $page_id)\n";
}

// 2. Assign Template
update_post_meta($page_id, '_wp_page_template', $page_template);
echo "Assigned template: $page_template to Page ID: $page_id\n";

// 3. (Optional) Set some default ACF values for RSS Sources if they don't exist
// Note: functions.php already has hardcoded defaults as backup, 
// so this is just for the Admin UI visibility.
if (function_exists('update_field')) {
    $current_sources = get_field('live_exam_rss_sources', 'options');
    if (empty($current_sources)) {
        $default_sources = array(
            array(
                'source_name' => 'KERALA STATE',
                'feed_url' => 'https://news.google.com/rss/search?q=Kerala+exam+notifications&hl=en-IN&gl=IN&ceid=IN:en',
            ),
            array(
                'source_name' => 'CBSE/ICSE',
                'feed_url' => 'https://news.google.com/rss/search?q=CBSE+ICSE+exam+date+notifications&hl=en-IN&gl=IN&ceid=IN:en',
            ),
            array(
                'source_name' => 'ENTRANCE NEWS',
                'feed_url' => 'https://news.google.com/rss/search?q=NEET+JEE+KEAM+exam+notifications&hl=en-IN&gl=IN&ceid=IN:en',
            )
        );
        update_field('live_exam_rss_sources', $default_sources, 'options');
        echo "Populated default RSS sources in Footer Settings.\n";
    }
}

// 4. Flush Rewrites
flush_rewrite_rules();
echo "Flushed rewrite rules.\n";

echo "Sync Complete! You can now view the page at: " . get_permalink($page_id) . "\n";
