<?php
/**
 * Fix blog post categories
 */

require_once(__DIR__ . '/../../../wp-load.php');

// Get the NEET post
$posts = get_posts(array(
    'post_type' => 'post',
    'title' => 'NEET UG 2026 - Complete Guide & Important Updates',
    'numberposts' => 1,
));

if ($posts) {
    $post = $posts[0];
    
    // Get category IDs
    $neet_cat = get_term_by('slug', 'neet-preparation', 'category');
    $exam_tips_cat = get_term_by('slug', 'exam-tips', 'category');
    
    $cat_ids = array();
    if ($neet_cat) $cat_ids[] = $neet_cat->term_id;
    if ($exam_tips_cat) $cat_ids[] = $exam_tips_cat->term_id;
    
    if (!empty($cat_ids)) {
        wp_set_post_categories($post->ID, $cat_ids);
        echo "✓ Updated NEET post categories\n";
    }
}

// Get the CBSE post
$posts = get_posts(array(
    'post_type' => 'post',
    'title' => 'CBSE Onscreen Marking (OSM) - The Complete Guide',
    'numberposts' => 1,
));

if ($posts) {
    $post = $posts[0];
    
    // Get category IDs
    $cbse_cat = get_term_by('slug', 'cbse-updates', 'category');
    $exam_tips_cat = get_term_by('slug', 'exam-tips', 'category');
    
    $cat_ids = array();
    if ($cbse_cat) $cat_ids[] = $cbse_cat->term_id;
    if ($exam_tips_cat) $cat_ids[] = $exam_tips_cat->term_id;
    
    if (!empty($cat_ids)) {
        wp_set_post_categories($post->ID, $cat_ids);
        echo "✓ Updated CBSE post categories\n";
    }
}

echo "\n✅ Categories updated! Refresh the blog post to see changes.\n";
