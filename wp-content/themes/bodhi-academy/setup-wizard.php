<?php
/**
 * Template Name: Setup Wizard
 */
// Load WordPress Core if accessed directly
if ( !defined('ABSPATH') ) {
    require_once( dirname(dirname(dirname(dirname(__FILE__)))) . '/wp-load.php' );
}

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

// Security check: Only allow admin
if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page. Please log in as an administrator.');
}

$pages = [
    'Home' => 'front-page.php',
    'About Us' => 'page-about.php',
    'Courses' => 'page-courses.php',
    'School & Tuitions' => '',
    'Scholarship' => '',
    'Blogs' => '',
    'News' => '',
    'Careers' => '',
    'Contact Us' => 'page-contact.php'
];

$menu_name = 'Primary Menu';
$menu_exists = wp_get_nav_menu_object($menu_name);

// 1. Create Pages
echo "<h1>Bodhi Academy Setup Wizard</h1>";
echo "<ul>";

$page_ids = [];

foreach ($pages as $title => $template) {
    $page_check = get_page_by_title($title);
    $new_page_id = null;
    
    if (!isset($page_check->ID)) {
        $new_page_id = wp_insert_post(array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => "Placeholder content for $title.",
            'post_status' => 'publish',
            'post_author' => 1,
        ));
        
        if ($new_page_id && !is_wp_error($new_page_id)) {
            echo "<li style='color:green;'>Created Page: <strong>$title</strong></li>";
            if (!empty($template)) {
                update_post_meta($new_page_id, '_wp_page_template', $template);
                echo "<li> - Assigned Template: $template</li>";
            }
        }
    } else {
        $new_page_id = $page_check->ID;
        echo "<li style='color:orange;'>Page already exists: <strong>$title</strong></li>";
         if (!empty($template)) {
                update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
    $page_ids[$title] = $new_page_id;
}

// 2. Set Static Front Page
$home_id = $page_ids['Home'];
if ($home_id) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_id);
    echo "<li style='color:blue;'><strong>Set 'Home' as Static Front Page.</strong></li>";
}

// 3. Create Menu
if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);
    echo "<li style='color:green;'>Created Menu: <strong>$menu_name</strong></li>";
    
    // Add pages to menu
    foreach ($page_ids as $title => $id) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'  => $title,
            'menu-item-object-id' => $id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type'   => 'post_type',
        ));
    }
    
    // Assign to location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
    echo "<li style='color:blue;'><strong>Assigned Menu to Primary Location.</strong></li>";
    
} else {
    echo "<li style='color:orange;'>Menu '$menu_name' already exists. Skipping creation.</li>";
}

echo "</ul>";
echo "<h2>Setup Complete! <a href='".home_url()."'>Visit Website</a></h2>";
