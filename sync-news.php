<?php
require_once('C:/wamp64/www/bodhiwebsite/wp-load.php');

if (!post_type_exists('news')) {
    die("News Post Type not found.");
}

$file_path = 'C:/wamp64/www/bodhiwebsite/updates/news_content_py.txt';
$content = file_get_contents($file_path);

if (preg_match('/--- START: NEWS.docx ---(.*?)--- END: NEWS.docx ---/s', $content, $matches)) {
    $news_raw = trim($matches[1]);
} else {
    die("Could not find NEWS section.");
}

// Clear existing news items to avoid duplicates/messy state during dev
/*
$old_news = get_posts(['post_type' => 'news', 'numberposts' => -1]);
foreach($old_news as $on) wp_delete_post($on->ID, true);
*/

$lines = explode("\n", $news_raw);
$items = [];
$current_category = 'general';
$current_item = null;

foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line)) continue;
    if ($line == 'NEWS') continue;

    // Detect Categories
    if (stripos($line, 'Medical') !== false) { $current_category = 'medical'; continue; }
    if (stripos($line, 'Engineering') !== false) { $current_category = 'engineering'; continue; }
    if (stripos($line, 'Defence & Design') !== false) { $current_category = 'defence'; continue; }
    if (stripos($line, 'Central Universities') !== false) { $current_category = 'specialized'; continue; }

    // Detect new item starts (Starts with uppercase title and usually followed by status/dates)
    // Professional exams usually have "2026" or "Test" or "Entrance" in them
    if (preg_match('/^[A-Z0-9].*?:$/', $line) || preg_match('/^[A-Z][A-Z\s]+2026/', $line) || stripos($line, 'Admission Test') !== false || stripos($line, 'Aptitude Test') !== false) {
        if ($current_item) $items[] = $current_item;
        $current_item = [
            'title' => rtrim($line, ':'),
            'category' => $current_category,
            'lines' => [],
            'status' => 'none',
            'dates' => [],
            'url' => ''
        ];
        continue;
    }

    if ($current_item) {
        $current_item['lines'][] = $line;
        if (stripos($line, 'Registration Status: LIVE') !== false) $current_item['status'] = 'live';
        elseif (stripos($line, 'Registration Status: CLOSED') !== false) $current_item['status'] = 'closed';
        elseif (stripos($line, 'Last Date') !== false || stripos($line, 'Exam Date') !== false || stripos($line, 'Correction Window') !== false) {
            $current_item['dates'][] = $line;
        }
        if (stripos($line, 'Website:') !== false) {
            $parts = explode('Website:', $line);
            $current_item['url'] = trim($parts[1]);
        }
    }
}
if ($current_item) $items[] = $current_item;

$count = 0;
foreach ($items as $item) {
    if (strlen($item['title']) < 3) continue;

    $post_content = implode("\n", $item['lines']);
    $post_data = array(
        'post_title'    => $item['title'],
        'post_content'  => nl2br($post_content),
        'post_status'   => 'publish',
        'post_type'     => 'news',
        'post_author'   => 1,
    );

    $existing_post = get_page_by_path(sanitize_title($item['title']), OBJECT, 'news');
    if ($existing_post) {
        $post_data['ID'] = $existing_post->ID;
        $post_id = wp_update_post($post_data);
    } else {
        $post_id = wp_insert_post($post_data);
    }

    if ($post_id) {
        update_field('news_registration_status', $item['status'], $post_id);
        update_field('news_type', $item['category'], $post_id);
        update_field('news_dates_snippet', implode("\n", $item['dates']), $post_id);
        if ($item['url']) update_field('news_source_url', $item['url'], $post_id);
        echo "Synced: " . $item['title'] . PHP_EOL;
        $count++;
    }
}

echo "Total Synced: $count" . PHP_EOL;
