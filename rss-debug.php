<?php
require_once('wp-load.php');

echo "<h2>RSS Debug Feed</h2>";

$sources = get_field('live_exam_rss_sources', 'options');
if (!$sources) {
    echo "No sources found in ACF. Using defaults...<br>";
    $sources = array(
        array('source_name' => 'KERALA', 'feed_url' => 'https://www.manoramaonline.com/sitemap/google-news-education-news/jcr:content/mm-section-full-parsys/google_news_feed.xml'),
        array('source_name' => 'CBSE', 'feed_url' => 'https://news.google.com/rss/search?q=CBSE+when:7d&hl=en-IN&gl=IN&ceid=IN:en')
    );
}

foreach ($sources as $source) {
    echo "Testing Source: " . $source['source_name'] . " (" . $source['feed_url'] . ")<br>";
    
    $rss = fetch_feed($source['feed_url']);
    
    if (is_wp_error($rss)) {
        echo "<b>ERROR:</b> " . $rss->get_error_message() . "<br>";
    } else {
        $item_count = $rss->get_item_quantity();
        echo "<b>SUCCESS:</b> Found " . $item_count . " items.<br>";
        
        $items = $rss->get_items(0, 3);
        foreach ($items as $item) {
            echo "- " . $item->get_title() . "<br>";
        }
    }
    echo "<hr>";
}

// Check cURL
if (function_exists('curl_version')) {
    echo "cURL is enabled.<br>";
} else {
    echo "cURL is DISABLED.<br>";
}
