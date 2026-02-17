<?php
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

echo "Flushing Caches...\n";

// Flush Object Cache
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
    echo "WP Object Cache Flushed.\n";
}

// Flush Rewrite Rules
flush_rewrite_rules();
echo "Rewrite Rules Flushed.\n";

// Try to flush W3 Total Cache if present
if (function_exists('w3tc_pgcache_flush')) {
    w3tc_pgcache_flush();
    echo "W3TC Page Cache Flushed.\n";
}

// Try to flush WP Super Cache
if (function_exists('wp_cache_clear_cache')) {
    wp_cache_clear_cache();
    echo "WP Super Cache Flushed.\n";
}

echo "All available caches cleared.\n";
