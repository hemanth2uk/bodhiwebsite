<?php
/**
 * Sync Programmes Script
 * 
 * This script creates the new Programme pages, assigns templates, 
 * populates initial ACF data, and updates the primary navigation menu.
 */

// Load WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

if (!is_user_logged_in() && !defined('WP_CLI')) {
    // Basic security for manual execution
    // die('Access Denied');
}

echo "Starting Sync...\n";

// 1. Create Pages and Assign Templates
$programmes = [
    'online' => [
        'title' => 'Bodhi Online',
        'template' => 'page-online-program.php'
    ],
    'offline' => [
        'title' => 'Offline Centers',
        'template' => 'page-offline-centers.php'
    ],
    'integrated' => [
        'title' => 'Integrated Schools',
        'template' => 'page-integrated-schools.php'
    ]
];

$page_ids = [];

foreach ($programmes as $key => $data) {
    $existing_page = get_page_by_path(sanitize_title($data['title']));
    
    if (!$existing_page) {
        $page_id = wp_insert_post([
            'post_title'    => $data['title'],
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ]);
        echo "Created page: {$data['title']} (ID: $page_id)\n";
    } else {
        $page_id = $existing_page->ID;
        echo "Found existing page: {$data['title']} (ID: $page_id)\n";
    }
    
    update_post_meta($page_id, '_wp_page_template', $data['template']);
    $page_ids[$key] = $page_id;
}

// 2. Update Menu
$locations = get_nav_menu_locations();
$menu_id = isset($locations['primary']) ? $locations['primary'] : 0;
$menu_exists = $menu_id ? wp_get_nav_menu_object($menu_id) : false;

echo "Targeting Menu ID: $menu_id\n";

if ($menu_exists) {
    echo "Menu Name: " . $menu_exists->name . "\n";
    $menu_items = wp_get_nav_menu_items($menu_id);
    
    // Find "School & Tuitions" item
    $target_item_id = 0;
    echo "Found " . count($menu_items) . " items in menu\n";
    foreach ($menu_items as $item) {
        $clean_title = html_entity_decode($item->title);
        echo "Checking item ID {$item->ID}: [{$item->title}] (Parent: {$item->menu_item_parent}) URL: {$item->url}\n";
        if (stripos($clean_title, 'School & Tuitions') !== false || 
            stripos($item->title, 'School &#038; Tuitions') !== false ||
            stripos($item->url, 'school-tuitions') !== false ||
            $item->title == 'PROGRAMMES') {
            
            $target_item_id = $item->ID;
            echo "MATCH FOUND! Target Item ID: $target_item_id\n";
            
            // Rename it to Programmes - Force using wp_update_post as well
            wp_update_post([
                'ID' => $target_item_id,
                'post_title' => 'PROGRAMMES'
            ]);
            
            wp_update_nav_menu_item($menu_id, $target_item_id, [
                'menu-item-title' => 'PROGRAMMES',
                'menu-item-url'   => '#', 
                'menu-item-status' => 'publish'
            ]);
            echo "Renamed menu item ID $target_item_id to PROGRAMMES\n";
            break;
        }
    }
    
    if ($target_item_id) {
        echo "Proceeding to add sub-items for parent $target_item_id...\n";
        // Add sub-menu items if they don't exist
        foreach ($page_ids as $key => $page_id) {
            $exists = false;
            foreach ($menu_items as $item) {
                if ($item->object_id == $page_id) {
                    // Update parent if it's top-level
                    if ($item->menu_item_parent != $target_item_id) {
                        wp_update_nav_menu_item($menu_id, $item->ID, [
                            'menu-item-parent-id' => $target_item_id,
                        ]);
                        echo "Updated parent for {$programmes[$key]['title']} (ID: {$item->ID}) to $target_item_id\n";
                    } else {
                        echo "Sub-item {$programmes[$key]['title']} already exists for parent $target_item_id\n";
                    }
                    $exists = true;
                    break;
                }
            }
            
            if (!$exists) {
                $sub_id = wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title'     => $programmes[$key]['title'],
                    'menu-item-object-id' => $page_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-parent-id' => $target_item_id,
                    'menu-item-status'    => 'publish',
                ]);
                echo "Added sub-menu item: {$programmes[$key]['title']} (ID: $sub_id) parent $target_item_id\n";
            }
        }
        
    } else {
        echo "CRITICAL: Target item 'School & Tuitions' NOT FOUND in menu items list!\n";
    }
} else {
    echo "Menu location 'primary' NOT ASSIGNED!\n";
}

// 3. Populate Content (ACF)
echo "Populating ACF Content...\n";

$content_data = [
    'online' => [
        'online_hero_title' => 'Bodhi Online: Your Digital Sanctuary for Learning',
        'online_hero_desc'  => 'At Bodhi, we believe that geography should never be a barrier to quality education. Through the Bodhi App, we have translated our core philosophy into a powerful digital ecosystem.',
        'online_stream_title' => 'Our Specialized Online Streams',
        'online_stream_1' => 'Entrance Coaching: Dedicated digital modules for NEET, JEE, and KEAM.',
        'online_stream_2' => 'Academic Tuitions: Comprehensive syllabus coverage for Class 11 & 12 Boards.',
        'online_stream_3' => 'International Tuitions: Specialized support for students following international curricula.',
        'online_stream_4' => 'One-to-One Support: Personalized, private sessions for students who require an individual pace and focused attention.',
        'online_edge_title' => 'The Digital "Bodhi" Edge',
        'online_feature_1' => '24/7 Doubt Clearance & Mentoring: Learning doesn\'t stop after the live class. Our students have round-the-clock access to expert mentors.',
        'online_feature_2' => 'Concept-Wise Video Lectures: We break down complex Science and Math into digestible, high-quality video modules for Self-Paced Mastery.',
        'online_feature_3' => 'Comprehensive Study Vault: Gain access to a massive library of meticulously prepared Notes, PYQ Discussions, and curated materials.',
        'online_feature_4' => 'Mock Exams & Real-Time Analytics: Our app performs deep Result Analysis on every test you take, instantly showing strengths and focus areas.',
        'online_feature_5' => 'Live Interactive Classes: Experience the energy of a real classroom from home with two-way communication.',
        'online_feature_6' => 'Adaptive Learning Paths: Our app uses Result Analysis to suggest specific concept lectures based on your performance.',
    ],
    'offline' => [
        'offline_hero_title' => 'Bodhi Offline Science Centers: Where Focus Finds a Home',
        'offline_hero_desc'  => 'Our Offline Science Centers serve as the heart of the Bodhi experience—a sanctuary where students come together to pursue academic mastery.',
        'offline_content_title' => 'A Unified Ecosystem of Excellence',
        'offline_intro_text' => 'From our youngest learners to our most dedicated repeaters, the offline centers provide a disciplined, distraction-free environment that a home setting often cannot match.',
        'offline_item_1' => 'The Early Years (Pre-Foundation & Foundation): For students in Classes 5 through 10, we build Scientific Temperament through hands-on logic.',
        'offline_item_2' => 'The Academic Core (Plus One & Plus Two Tuition): Dedicated space for Class 11 and 12 students to master school curriculum and secure high marks.',
        'offline_item_3' => 'The Competitive Edge (Entrance Orientation): Hubs for intensive NEET, JEE, and KEAM preparation with the benefit of the peer-group effect.',
        'offline_advantage_title' => 'The Bodhi Offline Advantage',
        'offline_adv_1' => 'Physical Mentorship: No substitute for the eye contact and immediate feedback of a physical mentor present to guide and encourage.',
        'offline_adv_2' => 'In-Person Result Analysis: Mentors sit with students to analyze OMR sheets or mock test data, providing immediate strategies for improvement.',
        'offline_adv_3' => 'Structured Routine: A space designed for the "Whole Student", balancing rigorous study with necessary mental well-being.',
        'offline_adv_4' => 'Distraction-Free Environment: A disciplined setting that allows students to reach their dreams bridging any academic gaps.',
    ],
    'integrated' => [
        'int_hero_title' => 'Bodhi\'s Integrated School Program',
        'int_hero_desc'  => 'Bringing our expert entrance orientation directly into the school campus, eliminating exhaustion from commuting and maximizing self-study time.',
        'int_content_title' => 'The Integrated Program: A Unified Academic Journey',
        'int_intro_text' => 'A strategic partnership where school curriculum and entrance preparation (NEET/JEE/KEAM) are merged into a single, streamlined timetable.',
        'int_detail_1' => 'Single Timetable, Zero Conflict: We align our teaching with the school\'s schedule. When school teaches a chapter, we cover entrance-level applications simultaneously.',
        'int_detail_2' => 'The Gift of Time: Completion of entrance coaching during school hours saves 3–4 hours of travel daily, reclaimed for self-study and hobbies.',
        'int_detail_3' => 'Unified Mentorship: Our mentors work on-site, bridging the gap between Board Exam Theory and Entrance Application.',
        'int_detail_4' => 'On-Campus Analysis: Mock exams in the familiar school environment with immediate collaborative result analysis.',
        'int_why_title' => 'Why the Integrated Path is the Most Efficient',
        'int_benefit_1' => 'Maximum Productivity: No evening classes or extra travel means more energy for quality learning.',
        'int_benefit_2' => 'Synchronized Learning: Total harmony between board exams and competitive entrance prep.',
        'int_benefit_3' => 'Integrated Wellness: Controlling the schedule allows us to weave in wellness pillars throughout the day.',
    ]
];

foreach ($page_ids as $key => $page_id) {
    if (isset($content_data[$key])) {
        foreach ($content_data[$key] as $field_key => $value) {
            update_field($field_key, $value, $page_id);
        }
        echo "Populated fields for " . $programmes[$key]['title'] . "\n";
    }
}

echo "Sync Complete!\n";
