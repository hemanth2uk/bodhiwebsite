<?php

function bodhi_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary' => 'Primary Menu',
        'footer_courses' => 'Footer - Courses Menu',
        'footer_quick_links' => 'Footer - Quick Links Menu',
        'footer_bottom'  => 'Footer - Bottom Bar Menu',
    ) );

    // Enable Custom Logo
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'bodhi_setup' );

/*
 * Add ACF Options Page for Footer
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer Settings',
        'menu_slug'     => 'footer-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-layout',
    ));
}

function bodhi_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'bodhi-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap', array(), null );
    
    // Enqueue FontAwesome for Social Icons (optional but good for 'attractiveness')
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0' );

    // Enqueue Main Stylesheet
    wp_enqueue_style( 'bodhi-style', get_stylesheet_uri(), array(), '1.0.0' );

    // Enqueue Navigation JS
    wp_enqueue_script( 'bodhi-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'bodhi_scripts' );

/*
 * Register ACF Fields Programmatically
 */
if( function_exists('acf_add_local_field_group') ):

    // HOME PAGE FIELDS
    acf_add_local_field_group(array(
        'key' => 'group_home_hero',
        'title' => 'Home Page - Hero Section',
        'fields' => array(
            array(
                'key' => 'field_home_badge',
                'label' => 'Hero Badge Text',
                'name' => 'hero_badge_text',
                'type' => 'text',
                'default_value' => 'Knowledge is Power',
            ),
            array(
                'key' => 'field_home_title',
                'label' => 'Hero Title (Top Line)',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'Awaken the',
            ),
            array(
                'key' => 'field_home_subtitle',
                'label' => 'Hero Subtitle (Highlighted)',
                'name' => 'hero_subtitle',
                'type' => 'text',
                'default_value' => 'Genius Within',
            ),
            array(
                'key' => 'field_home_desc',
                'label' => 'Hero Description',
                'name' => 'hero_description',
                'type' => 'textarea',
                'default_value' => 'Like the Bodhi tree symbolizing enlightenment, Bodhi Academy nurtures your potential. Experience world-class coaching for NEET, JEE, and Entrance Exams in a serene, focused environment.',
            ),
            array(
                'key' => 'field_home_img',
                'label' => 'Hero Image',
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // Buttons
            array(
                'key' => 'field_home_btn1_text',
                'label' => 'Button 1 Text',
                'name' => 'hero_btn_1_text',
                'type' => 'text',
                'default_value' => 'Explore Courses',
            ),
            array(
                'key' => 'field_home_btn1_link',
                'label' => 'Button 1 Link',
                'name' => 'hero_btn_1_link',
                'type' => 'text',
                'default_value' => '/courses',
            ),
            array(
                'key' => 'field_home_btn2_text',
                'label' => 'Button 2 Text',
                'name' => 'hero_btn_2_text',
                'type' => 'text',
                'default_value' => 'Join Our Family',
            ),
            array(
                'key' => 'field_home_btn2_link',
                'label' => 'Button 2 Link',
                'name' => 'hero_btn_2_link',
                'type' => 'text',
                'default_value' => '/contact',
            ),
            // Stats
            array(
                'key' => 'field_stat_1',
                'label' => 'Stat: Students',
                'name' => 'stat_students',
                'type' => 'text',
                'default_value' => '5k+',
            ),
            array(
                'key' => 'field_stat_2',
                'label' => 'Stat: Gurus',
                'name' => 'stat_gurus',
                'type' => 'text',
                'default_value' => '120+',
            ),
            array(
                'key' => 'field_stat_3',
                'label' => 'Stat: Success Rate',
                'name' => 'stat_success',
                'type' => 'text',
                'default_value' => '98%',
            ),
            // News Section
            array(
                'key' => 'field_home_news_title',
                'label' => 'News Section Title',
                'name' => 'home_news_title',
                'type' => 'text',
                'default_value' => 'Latest News & Exam Dates',
            ),
            array(
                'key' => 'field_home_news_1',
                'label' => 'News Item 1 Text',
                'name' => 'home_news_1',
                'type' => 'text',
                'default_value' => 'NEET UG 2026: Registration LIVE - Ends March 8, 2026',
            ),
            array(
                'key' => 'field_home_news_1_link',
                'label' => 'News Item 1 Link',
                'name' => 'home_news_1_link',
                'type' => 'text',
                'instructions' => 'Optional link for this item.',
            ),
            array(
                'key' => 'field_home_news_2',
                'label' => 'News Item 2 Text',
                'name' => 'home_news_2',
                'type' => 'text',
                'default_value' => 'JEE Main 2026 (Session 2): Registration LIVE - Ends Feb 25',
            ),
            array(
                'key' => 'field_home_news_2_link',
                'label' => 'News Item 2 Link',
                'name' => 'home_news_2_link',
                'type' => 'text',
                'instructions' => 'Optional link for this item.',
            ),
            array(
                'key' => 'field_home_news_3',
                'label' => 'News Item 3 Text',
                'name' => 'home_news_3',
                'type' => 'text',
                'default_value' => 'ISI Admission Test 2026: Registration LIVE - Exam May 10',
            ),
            array(
                'key' => 'field_home_news_3_link',
                'label' => 'News Item 3 Link',
                'name' => 'home_news_3_link',
                'type' => 'text',
                'instructions' => 'Optional link for this item.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
        ),
    ));

    // HOME PAGE - COURSES SECTION
    acf_add_local_field_group(array(
        'key' => 'group_home_courses',
        'title' => 'Home Page - Courses Section',
        'fields' => array(
            array(
                'key' => 'field_courses_title',
                'label' => 'Section Title',
                'name' => 'courses_title',
                'type' => 'text',
                'default_value' => 'Pathways to Success',
            ),
            array(
                'key' => 'field_courses_desc',
                'label' => 'Section Description',
                'name' => 'courses_desc',
                'type' => 'text',
                'default_value' => 'Choose the right path for your academic journey.',
            ),
            // Course 1
            array(
                'key' => 'field_c1_title',
                'label' => 'Course 1 Title',
                'name' => 'c1_title',
                'type' => 'text',
                'default_value' => 'NEET Regular',
            ),
             array(
                'key' => 'field_c1_badge',
                'label' => 'Course 1 Badge',
                'name' => 'c1_badge',
                'type' => 'text',
                'default_value' => 'Medical',
            ),
             array(
                'key' => 'field_c1_desc',
                'label' => 'Course 1 Desc',
                'name' => 'c1_desc',
                'type' => 'text',
                'default_value' => 'Comprehensive ecosystem for future Doctors.',
            ),
             array(
                'key' => 'field_c1_img',
                'label' => 'Course 1 Image',
                'name' => 'c1_img',
                'type' => 'image',
                'return_format' => 'url',
            ),
             // Course 2
            array(
                'key' => 'field_c2_title',
                'label' => 'Course 2 Title',
                'name' => 'c2_title',
                'type' => 'text',
                'default_value' => 'JEE Advanced',
            ),
             array(
                'key' => 'field_c2_badge',
                'label' => 'Course 2 Badge',
                'name' => 'c2_badge',
                'type' => 'text',
                'default_value' => 'Engineering',
            ),
             array(
                'key' => 'field_c2_desc',
                'label' => 'Course 2 Desc',
                'name' => 'c2_desc',
                'type' => 'text',
                'default_value' => 'Master the concepts of Physics and Math.',
            ),
             array(
                'key' => 'field_c2_img',
                'label' => 'Course 2 Image',
                'name' => 'c2_img',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // Course 3
            array(
                'key' => 'field_c3_title',
                'label' => 'Course 3 Title',
                'name' => 'c3_title',
                'type' => 'text',
                'default_value' => 'NEET Repeaters',
            ),
             array(
                'key' => 'field_c3_badge',
                'label' => 'Course 3 Badge',
                'name' => 'c3_badge',
                'type' => 'text',
                'default_value' => 'Repeaters',
            ),
             array(
                'key' => 'field_c3_desc',
                'label' => 'Course 3 Desc',
                'name' => 'c3_desc',
                'type' => 'text',
                'default_value' => 'Focus deeply for one year to achieve your dream.',
            ),
             array(
                'key' => 'field_c3_img',
                'label' => 'Course 3 Image',
                'name' => 'c3_img',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // Course 4
            array(
                'key' => 'field_c4_title',
                'label' => 'Course 4 Title',
                'name' => 'c4_title',
                'type' => 'text',
                'default_value' => 'Class 8-10',
            ),
             array(
                'key' => 'field_c4_badge',
                'label' => 'Course 4 Badge',
                'name' => 'c4_badge',
                'type' => 'text',
                'default_value' => 'Foundation',
            ),
             array(
                'key' => 'field_c4_desc',
                'label' => 'Course 4 Desc',
                'name' => 'c4_desc',
                'type' => 'text',
                'default_value' => 'Early preparation for a bright future.',
            ),
             array(
                'key' => 'field_c4_img',
                'label' => 'Course 4 Image',
                'name' => 'c4_img',
                'type' => 'image',
                'return_format' => 'url',
            ),
             // Course 5
            array(
                'key' => 'field_c5_title',
                'label' => 'Course 5 Title',
                'name' => 'c5_title',
                'type' => 'text',
                'default_value' => 'CUET / KEAM',
            ),
             array(
                'key' => 'field_c5_badge',
                'label' => 'Course 5 Badge',
                'name' => 'c5_badge',
                'type' => 'text',
                'default_value' => 'Entrance',
            ),
             array(
                'key' => 'field_c5_desc',
                'label' => 'Course 5 Desc',
                'name' => 'c5_desc',
                'type' => 'text',
                'default_value' => 'Unlock doors to prestigious universities.',
            ),
             array(
                'key' => 'field_c5_img',
                'label' => 'Course 5 Image',
                'name' => 'c5_img',
                'type' => 'image',
                'return_format' => 'url',
            ),
             // Course 6
            array(
                'key' => 'field_c6_title',
                'label' => 'Course 6 Title',
                'name' => 'c6_title',
                'type' => 'text',
                'default_value' => 'Crash Courses',
            ),
             array(
                'key' => 'field_c6_badge',
                'label' => 'Course 6 Badge',
                'name' => 'c6_badge',
                'type' => 'text',
                'default_value' => 'Short Term',
            ),
             array(
                'key' => 'field_c6_desc',
                'label' => 'Course 6 Desc',
                'name' => 'c6_desc',
                'type' => 'text',
                'default_value' => 'Final lap preparation for competitive exams.',
            ),
             array(
                'key' => 'field_c6_img',
                'label' => 'Course 6 Image',
                'name' => 'c6_img',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
        ),
    ));

    // HOME PAGE - WHY CHOOSE US
    acf_add_local_field_group(array(
        'key' => 'group_home_why',
        'title' => 'Home Page - Why Choose Us',
        'fields' => array(
            array(
                'key' => 'field_why_title',
                'label' => 'Section Title',
                'name' => 'why_choose_title',
                'type' => 'text',
                'default_value' => 'Education that Enlightens',
            ),
             array(
                'key' => 'field_why_img',
                'label' => 'Side Image',
                'name' => 'why_choose_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // Items
            array(
                'key' => 'field_why_1_title',
                'label' => 'Item 1 Title',
                'name' => 'why_1_title',
                'type' => 'text',
                'default_value' => 'Mentorship Driven',
            ),
            array(
                'key' => 'field_why_1_desc',
                'label' => 'Item 1 Desc',
                'name' => 'why_1_desc',
                'type' => 'text',
                'default_value' => 'Expert mentors bridge the gap between school theory and entrance application.',
            ),
             array(
                'key' => 'field_why_2_title',
                'label' => 'Item 2 Title',
                'name' => 'why_2_title',
                'type' => 'text',
                'default_value' => 'Focus & Wellness',
            ),
            array(
                'key' => 'field_why_2_desc',
                'label' => 'Item 2 Desc',
                'name' => 'why_2_desc',
                'type' => 'text',
                'default_value' => 'Integrated meditation and stress management for peak academic performance.',
            ),
             array(
                'key' => 'field_why_3_title',
                'label' => 'Item 3 Title',
                'name' => 'why_3_title',
                'type' => 'text',
                'default_value' => 'Smart Analytics',
            ),
            array(
                'key' => 'field_why_3_desc',
                'label' => 'Item 3 Desc',
                'name' => 'why_3_desc',
                'type' => 'text',
                'default_value' => 'Meticulous result analysis to identify and refine your innate potential.',
            ),
            array(
                'key' => 'field_why_4_title',
                'label' => 'Item 4 Title',
                'name' => 'why_4_title',
                'type' => 'text',
                'default_value' => 'Creative Learning',
            ),
            array(
                'key' => 'field_why_4_desc',
                'label' => 'Item 4 Desc',
                'name' => 'why_4_desc',
                'type' => 'text',
                'default_value' => 'Scientific methodologies and rhythmic learning environments for better retention.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
        ),
    ));

    // ABOUT PAGE FIELDS
    acf_add_local_field_group(array(
        'key' => 'group_about_hero',
        'title' => 'About Page Content',
        'fields' => array(
            array(
                'key' => 'field_about_title',
                'label' => 'Hero Title',
                'name' => 'about_hero_title',
                'type' => 'text',
                'default_value' => 'About Bodhi Academy',
            ),
             array(
                'key' => 'field_about_sub',
                'label' => 'Hero Subtitle',
                'name' => 'about_hero_subtitle',
                'type' => 'text',
                'default_value' => 'Empowering minds...',
            ),
            array(
                'key' => 'field_about_img',
                'label' => 'Hero Background Image',
                'name' => 'about_hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // Mission & Vision
            array(
                'key' => 'field_about_mission_title',
                'label' => 'Mission Title',
                'name' => 'about_mission_title',
                'type' => 'text',
                'default_value' => 'Our Mission',
            ),
            array(
                'key' => 'field_about_mission_text',
                'label' => 'Mission Text',
                'name' => 'about_mission_text',
                'type' => 'textarea',
                'default_value' => "Our mission is to find and transform the student's talents into a highly skilled and resourceful force through advanced science education and expert-led entrance coaching.",
            ),
            array(
                'key' => 'field_about_vision_title',
                'label' => 'Vision Title',
                'name' => 'about_vision_title',
                'type' => 'text',
                'default_value' => 'Our Vision',
            ),
            array(
                'key' => 'field_about_vision_text',
                'label' => 'Vision Text',
                'name' => 'about_vision_text',
                'type' => 'textarea',
                'default_value' => "To become a transformative human resource development platform that nurtures students’ innate potential, empowers their aspirations, and shapes future-ready professionals through advanced coaching, mentorship, and innovative learning systems.",
            ),
            array(
                'key' => 'field_legacy_title',
                'label' => 'Story Title',
                'name' => 'legacy_title',
                'type' => 'text',
                'default_value' => 'Our Legacy',
            ),
             array(
                'key' => 'field_legacy_img',
                'label' => 'Story Side Image',
                'name' => 'legacy_side_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_legacy_text',
                'label' => 'Our Story (Content)',
                'name' => 'legacy_text',
                'type' => 'wysiwyg',
            ),
            // Founder
            array(
                'key' => 'field_founder_sig',
                'label' => 'Founder Signature Image',
                'name' => 'founder_signature',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_founder_name',
                'label' => 'Founder Name',
                'name' => 'founder_name',
                'type' => 'text',
                'default_value' => 'Dr. A. Kumar, Founder',
            ),
            // Infrastructure Section
            array(
                'key' => 'field_infra_title',
                'label' => 'Infrastructure Section Title',
                'name' => 'infra_title',
                'type' => 'text',
                'default_value' => 'Our Infrastructure',
            ),
             array(
                'key' => 'field_infra_desc',
                'label' => 'Infrastructure Description',
                'name' => 'infra_desc',
                'type' => 'text',
                'default_value' => 'State-of-the-art facilities for focused learning.',
            ),
            // Infrastructure Item 1
            array(
                'key' => 'field_infra_1_title',
                'label' => 'Infra Item 1 Title',
                'name' => 'infra_1_title',
                'type' => 'text',
                'default_value' => 'Smart Classrooms',
            ),
            array(
                'key' => 'field_infra_1_img',
                'label' => 'Infra Item 1 Image',
                'name' => 'infra_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
             // Infrastructure Item 2
             array(
                'key' => 'field_infra_2_title',
                'label' => 'Infra Item 2 Title',
                'name' => 'infra_2_title',
                'type' => 'text',
                'default_value' => 'Digital Library',
            ),
            array(
                'key' => 'field_infra_2_img',
                'label' => 'Infra Item 2 Image',
                'name' => 'infra_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
             // Infrastructure Item 3
             array(
                'key' => 'field_infra_3_title',
                'label' => 'Infra Item 3 Title',
                'name' => 'infra_3_title',
                'type' => 'text',
                'default_value' => 'Science Labs',
            ),
            array(
                'key' => 'field_infra_3_img',
                'label' => 'Infra Item 3 Image',
                'name' => 'infra_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-about.php',
                ),
            ),
        ),
    ));

endif;

/*
 * Customizer Settings for Header
 */
function bodhi_customize_register( $wp_customize ) {
    
    // Section: Header Settings
    $wp_customize->add_section('bodhi_header_section', array(
        'title'    => __('Header Settings', 'bodhi-academy'),
        'priority' => 30,
    ));

    // --- Operating Hours ---
    $wp_customize->add_setting('header_hours_label', array('default' => 'Monday - Friday'));
    $wp_customize->add_control('header_hours_label', array(
        'label'   => 'Hours Label',
        'section' => 'bodhi_header_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('header_hours_value', array('default' => '8:00AM - 8:00PM'));
    $wp_customize->add_control('header_hours_value', array(
        'label'   => 'Hours Value',
        'section' => 'bodhi_header_section',
        'type'    => 'text',
    ));

    // --- Phone ---
    $wp_customize->add_setting('header_phone_label', array('default' => 'Call Us'));
    $wp_customize->add_control('header_phone_label', array(
        'label'   => 'Phone Label',
        'section' => 'bodhi_header_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('header_phone_value', array('default' => '+91 987 654 3210'));
    $wp_customize->add_control('header_phone_value', array(
        'label'   => 'Phone Number',
        'section' => 'bodhi_header_section',
        'type'    => 'text',
    ));

    // --- Socials ---
    $wp_customize->add_setting('header_fb_link', array('default' => '#'));
    $wp_customize->add_control('header_fb_link', array(
        'label'   => 'Facebook Link',
        'section' => 'bodhi_header_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('header_tw_link', array('default' => '#'));
    $wp_customize->add_control('header_tw_link', array(
        'label'   => 'Twitter Link',
        'section' => 'bodhi_header_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('header_ig_link', array('default' => '#'));
    $wp_customize->add_control('header_ig_link', array(
        'label'   => 'Instagram Link',
        'section' => 'bodhi_header_section',
        'type'    => 'url',
    ));

    // --- CTA Button ---
    $wp_customize->add_setting('header_cta_text', array('default' => 'CONTACT US'));
    $wp_customize->add_control('header_cta_text', array(
        'label'   => 'Contact Button Text',
        'section' => 'bodhi_header_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('header_cta_link', array('default' => '/contact-us'));
    $wp_customize->add_control('header_cta_link', array(
        'label'   => 'Contact Button Link',
        'section' => 'bodhi_header_section',
        'type'    => 'text',
    ));

    // --- Logo Size ---
    $wp_customize->add_setting('header_logo_size', array('default' => '75'));
    $wp_customize->add_control('header_logo_size', array(
        'label'       => 'Logo Height (px)',
        'section'     => 'title_tagline', // Add to the Site Identity section
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 40,
            'max'  => 150,
            'step' => 5,
        ),
    ));
}
add_action( 'customize_register', 'bodhi_customize_register' );

/*
 * Register ACF Fields for SCHOOL & TUITIONS PAGE
 */
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_school_tuitions',
        'title' => 'School & Tuitions Page',
        'fields' => array(
            // HERO
            array(
                'key' => 'field_t_hero_title',
                'label' => 'Hero Title',
                'name' => 'tuition_hero_title',
                'type' => 'text',
                'default_value' => 'Academic Excellence',
            ),
            array(
                'key' => 'field_t_hero_sub',
                'label' => 'Hero Subtitle',
                'name' => 'tuition_hero_sub',
                'type' => 'text',
                'default_value' => 'School Tuitions & Foundation Courses',
            ),
             array(
                'key' => 'field_t_hero_img',
                'label' => 'Hero Image',
                'name' => 'tuition_hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // Hero Extras
            array('key' => 'field_t_hero_badge', 'label' => 'Hero Badge', 'name' => 'tuition_hero_badge', 'type' => 'text', 'default_value' => 'Build Your Future'),
            array('key' => 'field_t_hero_btn', 'label' => 'Hero Button Text', 'name' => 'tuition_hero_btn', 'type' => 'text', 'default_value' => 'Explore Batches'),

            // Tracks Section Header
            array('key' => 'field_t_tracks_title', 'label' => 'Tracks Section Title', 'name' => 'tuition_tracks_title', 'type' => 'text', 'default_value' => 'Our Academic Tracks'),
            array('key' => 'field_t_tracks_sub', 'label' => 'Tracks Section Sub', 'name' => 'tuition_tracks_sub', 'type' => 'text', 'default_value' => 'Comprehensive support for every stage of your school journey.'),

            // Track 1
            array(
                'key' => 'field_t_track1_title',
                'label' => 'Track 1 Title',
                'name' => 'tuition_track_1_title',
                'type' => 'text',
                'default_value' => 'Bodhi Online Learning Programme',
            ),
            array('key' => 'field_t_track1_badge', 'label' => 'Track 1 Badge', 'name' => 'tuition_track_1_badge', 'type' => 'text', 'default_value' => 'ONLINE LEARNING'),
            array(
                'key' => 'field_t_track1_desc',
                'label' => 'Track 1 Description',
                'name' => 'tuition_track_1_desc',
                'type' => 'textarea',
                'default_value' => 'Your digital sanctuary for learning. Through the Bodhi App, we bring expert coaching, 24/7 doubt clearance, and real-time analytics to your fingertips, ensuring geography is never a barrier to excellence.',
            ),
             array(
                'key' => 'field_t_track1_img',
                'label' => 'Track 1 Image',
                'name' => 'tuition_track_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
             // TRACK 2
             array(
                'key' => 'field_t_track2_title',
                'label' => 'Track 2 Title',
                'name' => 'tuition_track_2_title',
                'type' => 'text',
                'default_value' => 'Offline Science Centers',
            ),
            array('key' => 'field_t_track2_badge', 'label' => 'Track 2 Badge', 'name' => 'tuition_track_2_badge', 'type' => 'text', 'default_value' => 'OFFLINE CENTERS'),
            array(
                'key' => 'field_t_track2_desc',
                'label' => 'Track 2 Description',
                'name' => 'tuition_track_2_desc',
                'type' => 'textarea',
                'default_value' => 'The heart of the Bodhi experience. Our centers provide a disciplined, distraction-free environment for specialized NEET, JEE, and KEAM preparation with face-to-face mentorship.',
            ),
             array(
                'key' => 'field_t_track2_img',
                'label' => 'Track 2 Image',
                'name' => 'tuition_track_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
             // TRACK 3
             array(
                'key' => 'field_t_track3_title',
                'label' => 'Track 3 Title',
                'name' => 'tuition_track_3_title',
                'type' => 'text',
                'default_value' => 'Integrated School Program',
            ),
            array('key' => 'field_t_track3_badge', 'label' => 'Track 3 Badge', 'name' => 'tuition_track_3_badge', 'type' => 'text', 'default_value' => 'CAMPUS PROGRAM'),
            array(
                'key' => 'field_t_track3_desc',
                'label' => 'Track 3 Description',
                'name' => 'tuition_track_3_desc',
                'type' => 'textarea',
                'default_value' => 'Eliminate the exhaustion of commute. We bring our expert coaching directly into your school campus, aligning the curriculum for a unified and efficient academic journey.',
            ),
             array(
                'key' => 'field_t_track3_img',
                'label' => 'Track 3 Image',
                'name' => 'tuition_track_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // WHY CHOOSE SECTION
            array(
                'key' => 'field_t_why_title',
                'label' => 'Why Choose Title',
                'name' => 'tuition_why_title',
                'type' => 'text',
                'default_value' => 'Why Choose Bodhi Tuitions?',
            ),
            // Item 1
            array(
                'key' => 'field_t_why1_title',
                'label' => 'Why Item 1 Title',
                'name' => 'tuition_why_1_title',
                'type' => 'text',
                'default_value' => 'Expert Faculty',
            ),
            array(
                'key' => 'field_t_why1_desc',
                'label' => 'Why Item 1 Desc',
                'name' => 'tuition_why_1_desc',
                'type' => 'textarea',
                'default_value' => 'Learn from the best minds in the industry.',
            ),
            // Item 2
            array(
                'key' => 'field_t_why2_title',
                'label' => 'Why Item 2 Title',
                'name' => 'tuition_why_2_title',
                'type' => 'text',
                'default_value' => 'Comprehensive Material',
            ),
            array(
                'key' => 'field_t_why2_desc',
                'label' => 'Why Item 2 Desc',
                'name' => 'tuition_why_2_desc',
                'type' => 'textarea',
                'default_value' => 'Detailed study notes and practice papers.',
            ),
            // Item 3
            array(
                'key' => 'field_t_why3_title',
                'label' => 'Why Item 3 Title',
                'name' => 'tuition_why_3_title',
                'type' => 'text',
                'default_value' => 'Personal Guidance',
            ),
            array(
                'key' => 'field_t_why3_desc',
                'label' => 'Why Item 3 Desc',
                'name' => 'tuition_why_3_desc',
                'type' => 'textarea',
                'default_value' => 'Individual attention and doubt clearing.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-school-tuitions.php',
                ),
            ),
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '108', // ID from user screenshot
                ),
            ),
        ),
    ));

    // COURSES PAGE FIELDS
    acf_add_local_field_group(array(
        'key' => 'group_courses_page',
        'title' => 'Courses Page',
        'fields' => array(
            // Hero
            array('key' => 'field_c_hero_title', 'label' => 'Hero Title', 'name' => 'courses_hero_title', 'type' => 'text', 'default_value' => 'Explore Our Courses'),
            array('key' => 'field_c_hero_desc', 'label' => 'Hero Description', 'name' => 'courses_hero_desc', 'type' => 'textarea', 'default_value' => 'Comprehensive programs designed by experts.'),
            array('key' => 'field_c_hero_img', 'label' => 'Hero Image', 'name' => 'courses_hero_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Section 1 Header
            array('key' => 'field_c_sec1_title', 'label' => 'Section 1 Title', 'name' => 'courses_sec1_title', 'type' => 'text', 'default_value' => 'Entrance Coaching'),
            array('key' => 'field_c_sec1_sub', 'label' => 'Section 1 Subtitle', 'name' => 'courses_sec1_sub', 'type' => 'text', 'default_value' => 'Targeted preparation for Medical and Engineering Aspirants.'),

            // Section 1 Items (6 slots)
            // (I will create a loop here conceptually, but for ACF registration I list them)
            array('key' => 'field_c_c1_title', 'label' => 'Course 1 Title', 'name' => 'c_c1_title', 'type' => 'text', 'default_value' => 'NEET Regular'),
            array('key' => 'field_c_c1_badge', 'label' => 'Course 1 Badge', 'name' => 'c_c1_badge', 'type' => 'text', 'default_value' => 'Medical'),
            array('key' => 'field_c_c1_desc', 'label' => 'Course 1 Desc', 'name' => 'c_c1_desc', 'type' => 'textarea', 'default_value' => 'Intensive coaching...'),
            array('key' => 'field_c_c1_img', 'label' => 'Course 1 Image', 'name' => 'c_c1_img', 'type' => 'image', 'return_format' => 'url'),

            array('key' => 'field_c_c2_title', 'label' => 'Course 2 Title', 'name' => 'c_c2_title', 'type' => 'text', 'default_value' => 'JEE Main & Advanced'),
            array('key' => 'field_c_c2_badge', 'label' => 'Course 2 Badge', 'name' => 'c_c2_badge', 'type' => 'text', 'default_value' => 'Engineering'),
            array('key' => 'field_c_c2_desc', 'label' => 'Course 2 Desc', 'name' => 'c_c2_desc', 'type' => 'textarea', 'default_value' => 'Rigorous training...'),
            array('key' => 'field_c_c2_img', 'label' => 'Course 2 Image', 'name' => 'c_c2_img', 'type' => 'image', 'return_format' => 'url'),
            
            array('key' => 'field_c_c3_title', 'label' => 'Course 3 Title', 'name' => 'c_c3_title', 'type' => 'text', 'default_value' => 'KEAM'),
            array('key' => 'field_c_c3_badge', 'label' => 'Course 3 Badge', 'name' => 'c_c3_badge', 'type' => 'text', 'default_value' => 'State Level'),
            array('key' => 'field_c_c3_desc', 'label' => 'Course 3 Desc', 'name' => 'c_c3_desc', 'type' => 'textarea', 'default_value' => 'Specialized coaching for KEAM.'),
            array('key' => 'field_c_c3_img', 'label' => 'Course 3 Image', 'name' => 'c_c3_img', 'type' => 'image', 'return_format' => 'url'),

            array('key' => 'field_c_c4_title', 'label' => 'Course 4 Title', 'name' => 'c_c4_title', 'type' => 'text', 'default_value' => 'CUET'),
            array('key' => 'field_c_c4_badge', 'label' => 'Course 4 Badge', 'name' => 'c_c4_badge', 'type' => 'text', 'default_value' => 'University'),
            array('key' => 'field_c_c4_desc', 'label' => 'Course 4 Desc', 'name' => 'c_c4_desc', 'type' => 'textarea', 'default_value' => 'Preparation for CUET.'),
            array('key' => 'field_c_c4_img', 'label' => 'Course 4 Image', 'name' => 'c_c4_img', 'type' => 'image', 'return_format' => 'url'),

            array('key' => 'field_c_c5_title', 'label' => 'Course 5 Title', 'name' => 'c_c5_title', 'type' => 'text', 'default_value' => 'NEET Repeaters'),
            array('key' => 'field_c_c5_badge', 'label' => 'Course 5 Badge', 'name' => 'c_c5_badge', 'type' => 'text', 'default_value' => 'Special'),
            array('key' => 'field_c_c5_desc', 'label' => 'Course 5 Desc', 'name' => 'c_c5_desc', 'type' => 'textarea', 'default_value' => 'Dedicated one-year program.'),
            array('key' => 'field_c_c5_img', 'label' => 'Course 5 Image', 'name' => 'c_c5_img', 'type' => 'image', 'return_format' => 'url'),

            array('key' => 'field_c_c6_title', 'label' => 'Course 6 Title', 'name' => 'c_c6_title', 'type' => 'text', 'default_value' => 'Crash Courses'),
            array('key' => 'field_c_c6_badge', 'label' => 'Course 6 Badge', 'name' => 'c_c6_badge', 'type' => 'text', 'default_value' => 'Fast Track'),
            array('key' => 'field_c_c6_desc', 'label' => 'Course 6 Desc', 'name' => 'c_c6_desc', 'type' => 'textarea', 'default_value' => 'Short-term intensive courses.'),
            array('key' => 'field_c_c6_img', 'label' => 'Course 6 Image', 'name' => 'c_c6_img', 'type' => 'image', 'return_format' => 'url'),

            // Section 2 Header
            array('key' => 'field_c_sec2_title', 'label' => 'Section 2 Title', 'name' => 'courses_sec2_title', 'type' => 'text', 'default_value' => 'School Tuitions'),
            array('key' => 'field_c_sec2_sub', 'label' => 'Section 2 Subtitle', 'name' => 'courses_sec2_sub', 'type' => 'text', 'default_value' => 'Building strong foundations.'),

             // Section 2 Items (3 slots)
             array('key' => 'field_c_t1_title', 'label' => 'Tuition 1 Title', 'name' => 'c_t1_title', 'type' => 'text', 'default_value' => 'Classes 8-10'),
             array('key' => 'field_c_t1_desc', 'label' => 'Tuition 1 Desc', 'name' => 'c_t1_desc', 'type' => 'textarea', 'default_value' => 'Foundation courses for High School.'),
             array('key' => 'field_c_t1_img', 'label' => 'Tuition 1 Image', 'name' => 'c_t1_image', 'type' => 'image', 'return_format' => 'url'),

             array('key' => 'field_c_t2_title', 'label' => 'Tuition 2 Title', 'name' => 'c_t2_title', 'type' => 'text', 'default_value' => 'Class 11 & 12 (Science)'),
             array('key' => 'field_c_t2_desc', 'label' => 'Tuition 2 Desc', 'name' => 'c_t2_desc', 'type' => 'textarea', 'default_value' => 'Board exam preparation.'),
             array('key' => 'field_c_t2_img', 'label' => 'Tuition 2 Image', 'name' => 'c_t2_image', 'type' => 'image', 'return_format' => 'url'),

            array(
                'key' => 'field_c_t3_title',
                'label' => 'Tuition 3 Title',
                'name' => 'c_t3_title',
                'type' => 'text',
                'default_value' => 'Class 11 & 12 (Commerce)',
            ),
            array(
                'key' => 'field_c_t3_desc',
                'label' => 'Tuition 3 Desc',
                'name' => 'c_t3_desc',
                'type' => 'textarea',
                'default_value' => 'Accountancy, Economics...',
            ),
            array(
                'key' => 'field_c_t3_img',
                'label' => 'Tuition 3 Image',
                'name' => 'c_t3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-courses.php',
                ),
            ),
        ),
    ));

    // CONTACT PAGE FIELDS
    acf_add_local_field_group(array(
        'key' => 'group_contact_page',
        'title' => 'Contact Page',
        'fields' => array(
            array('key' => 'field_con_hero_title', 'label' => 'Hero Title', 'name' => 'contact_hero_title', 'type' => 'text', 'default_value' => 'Contact Bodhi Academy'),
            array('key' => 'field_con_hero_desc', 'label' => 'Hero Description', 'name' => 'contact_hero_desc', 'type' => 'text', 'default_value' => 'Have questions about admissions or courses? We are here to help you achieve your academic goals.'),
            
            // Address
            array('key' => 'field_con_address', 'label' => 'Physical Address', 'name' => 'contact_address', 'type' => 'textarea', 'default_value' => "Bodhi Academy, 2nd Floor,\nNear Kaloor Metro Station,\nKochi, Kerala, 682017"),
            
            // Phones
            array('key' => 'field_con_phone_1', 'label' => 'Phone 1', 'name' => 'contact_phone_1', 'type' => 'text', 'default_value' => '+91 98765 43210'),
            array('key' => 'field_con_phone_2', 'label' => 'Phone 2', 'name' => 'contact_phone_2', 'type' => 'text', 'default_value' => '0484 - 2345678'),
            
            // Emails
            array('key' => 'field_con_email_1', 'label' => 'Email 1', 'name' => 'contact_email_1', 'type' => 'text', 'default_value' => 'admissions@bodhiacademy.com'),
            array('key' => 'field_con_email_2', 'label' => 'Email 2', 'name' => 'contact_email_2', 'type' => 'text', 'default_value' => 'info@bodhiacademy.com'),
            
            // Socials (Override global if needed)
            array('key' => 'field_con_fb', 'label' => 'Facebook URL', 'name' => 'contact_fb', 'type' => 'url'),
            array('key' => 'field_con_ig', 'label' => 'Instagram URL', 'name' => 'contact_ig', 'type' => 'url'),
            array('key' => 'field_con_tw', 'label' => 'Twitter URL', 'name' => 'contact_tw', 'type' => 'url'),
            array('key' => 'field_con_li', 'label' => 'LinkedIn URL', 'name' => 'contact_li', 'type' => 'url'),

            // Map
            array('key' => 'field_con_map_url', 'label' => 'Google Maps Link', 'name' => 'contact_map_url', 'type' => 'url', 'default_value' => 'https://goo.gl/maps/example'),
            array('key' => 'field_con_map_embed', 'label' => 'Google Maps Embed URL', 'name' => 'contact_map_embed_url', 'type' => 'textarea', 'instructions' => 'Paste the "src" URL from the Google Maps iframe embed code.', 'default_value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.071850119859!2d76.284240776!3d9.981881790122176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d40f53195ed%3A0xe549015c8e378f8!2sKaloor%2C%20Kochi%2C%20Kerala!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin'),

            // Shortcode
            array('key' => 'field_con_shortcode', 'label' => 'Contact Form Shortcode', 'name' => 'contact_form_shortcode', 'type' => 'text', 'default_value' => '[contact-form-7 title="Contact Bodhi Academy (Premium)"]'),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-contact.php',
                ),
            ),
        ),
    ));

endif;

/*
 * Output Dynamic Customizer CSS
 */
function bodhi_customize_css() {
    ?>
    <style type="text/css">
        .logo-image .custom-logo-link img,
        .logo-image .custom-logo,
        .logo-image img {
            max-height: <?php echo get_theme_mod('header_logo_size', '75'); ?>px !important;
        }
        .logo-image {
            max-height: <?php echo get_theme_mod('header_logo_size', '75'); ?>px !important;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'bodhi_customize_css' );

/*
 * BODHI SECURITY SUITE
 * Added for enhanced site security ("Surerity")
 */

// 1. Hide WordPress Version (Security by Obscurity)
remove_action('wp_head', 'wp_generator');

// 2. Disable XML-RPC (Prevents Brute Force/DDoS attacks)
add_filter('xmlrpc_enabled', '__return_false');

// 3. Remove XML-RPC & wlwmanifest links from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// 4. Add HTTP Security Headers
function bodhi_security_headers() {
    if ( !is_admin() ) {
        header( 'X-Frame-Options: SAMEORIGIN' ); // Prevents Clickjacking
        header( 'X-XSS-Protection: 1; mode=block' ); // Block XSS
        header( 'X-Content-Type-Options: nosniff' ); // Prevent MIME sniffing
        header( 'Referrer-Policy: no-referrer-when-downgrade' );
    }
}
add_action( 'send_headers', 'bodhi_security_headers' );

// 5. Block User Enumeration (Scans for ?author=1)
function bodhi_block_user_enumeration() {
    if ( is_admin() ) return;
    $author = get_query_var( 'author' );
    if ( $author ) {
        wp_redirect( home_url(), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'bodhi_block_user_enumeration' );

    // ONLINE PROGRAMME FIELDS
    acf_add_local_field_group(array(
        'key' => 'group_online_program',
        'title' => 'Programmes: Bodhi Online',
        'fields' => array(
            array('key' => 'field_online_hero_title', 'label' => 'Hero Title', 'name' => 'online_hero_title', 'type' => 'text', 'default_value' => 'Bodhi Online: Your Digital Sanctuary for Learning'),
            array('key' => 'field_online_hero_desc', 'label' => 'Hero Description', 'name' => 'online_hero_desc', 'type' => 'textarea', 'default_value' => 'Through the Bodhi App, we have translated our core philosophy of "Enlightened Learning" into a powerful digital ecosystem.'),
            array('key' => 'field_online_hero_img', 'label' => 'Hero Image', 'name' => 'online_hero_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Streams
            array('key' => 'field_online_streams_title', 'label' => 'Streams Title', 'name' => 'online_streams_title', 'type' => 'text', 'default_value' => 'Our Specialized Online Streams'),
            array('key' => 'field_online_stream_1', 'label' => 'Stream 1 (Entrance)', 'name' => 'online_stream_1', 'type' => 'textarea', 'default_value' => 'Entrance Coaching: Dedicated digital modules for NEET, JEE, and KEAM.'),
            array('key' => 'field_online_stream_2', 'label' => 'Stream 2 (Academic)', 'name' => 'online_stream_2', 'type' => 'textarea', 'default_value' => 'Academic Tuitions: Comprehensive syllabus coverage for Class 11 & 12 Boards.'),
            array('key' => 'field_online_stream_3', 'label' => 'Stream 3 (International)', 'name' => 'online_stream_3', 'type' => 'textarea', 'default_value' => 'International Tuitions: Specialized support for students following international curricula.'),
            array('key' => 'field_online_stream_4', 'label' => 'Stream 4 (Support)', 'name' => 'online_stream_4', 'type' => 'textarea', 'default_value' => 'One-to-One Support: Personalized, private sessions for students who require an individual pace.'),
            
            // Features
            array('key' => 'field_online_edge_title', 'label' => 'Edge Section Title', 'name' => 'online_edge_title', 'type' => 'text', 'default_value' => 'The Digital "Bodhi" Edge'),
            array('key' => 'field_online_feature_1', 'label' => 'Feature 1 (Doubt)', 'name' => 'online_feature_1', 'type' => 'textarea', 'default_value' => '24/7 Doubt Clearance & Mentoring: Learning doesn\'t stop after the live class.'),
            array('key' => 'field_online_feature_2', 'label' => 'Feature 2 (Videos)', 'name' => 'online_feature_2', 'type' => 'textarea', 'default_value' => 'Concept-Wise Video Lectures: Self-Paced Mastery of complex Science and Math.'),
            array('key' => 'field_online_feature_3', 'label' => 'Feature 3 (Vault)', 'name' => 'online_feature_3', 'type' => 'textarea', 'default_value' => 'Comprehensive Study Vault: Notes, PYQ Discussions, and curated materials.'),
            array('key' => 'field_online_feature_4', 'label' => 'Feature 4 (Test)', 'name' => 'online_feature_4', 'type' => 'textarea', 'default_value' => 'Mock Exams & Real-Time Analytics: Deep analysis of strengths and focus areas.'),
        ),
        'location' => array(array(array('param' => 'page_template', 'operator' => '==', 'value' => 'page-online-program.php'))),
    ));

    // OFFLINE CENTERS FIELDS
    acf_add_local_field_group(array(
        'key' => 'group_offline_centers',
        'title' => 'Programmes: Offline Centers',
        'fields' => array(
            array('key' => 'field_offline_hero_title', 'label' => 'Hero Title', 'name' => 'offline_hero_title', 'type' => 'text', 'default_value' => 'Bodhi Offline Science Centers'),
            array('key' => 'field_offline_hero_desc', 'label' => 'Hero Description', 'name' => 'offline_hero_desc', 'type' => 'textarea', 'default_value' => 'Where Focus Finds a Home. A physical space designed for academic mastery and personal growth.'),
            array('key' => 'field_offline_hero_img', 'label' => 'Hero Image', 'name' => 'offline_hero_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Ecosystem
            array('key' => 'field_offline_eco_title', 'label' => 'Ecosystem Title', 'name' => 'offline_eco_title', 'type' => 'text', 'default_value' => 'A Unified Ecosystem of Excellence'),
            array('key' => 'field_offline_eco_1', 'label' => 'The Early Years', 'name' => 'offline_eco_1', 'type' => 'textarea', 'default_value' => 'Classes 5-10: Building "Scientific Temperament" through hands-on logic.'),
            array('key' => 'field_offline_eco_2', 'label' => 'The Academic Core', 'name' => 'offline_eco_2', 'type' => 'textarea', 'default_value' => 'Plus One & Plus Two: Concept Clarity and Board Exam Excellence.'),
            array('key' => 'field_offline_eco_3', 'label' => 'The Competitive Edge', 'name' => 'offline_eco_3', 'type' => 'textarea', 'default_value' => 'NEET, JEE, KEAM: Intensive preparation with the "peer-group effect".'),
            
            // Advantage
            array('key' => 'field_offline_adv_title', 'label' => 'Advantage Title', 'name' => 'offline_adv_title', 'type' => 'text', 'default_value' => 'The Bodhi Offline Advantage'),
            array('key' => 'field_offline_adv_1', 'label' => 'Physical Mentorship', 'name' => 'offline_adv_1', 'type' => 'textarea', 'default_value' => 'Immediate feedback and real-time guidance from present educators.'),
            array('key' => 'field_offline_adv_2', 'label' => 'In-Person Analysis', 'name' => 'offline_adv_2', 'type' => 'textarea', 'default_value' => 'Face-to-face test discussions and strategy sessions.'),
            array('key' => 'field_offline_adv_3', 'label' => 'Structured Routine', 'name' => 'offline_adv_3', 'type' => 'textarea', 'default_value' => 'A space designed to balance rigorous study with mental well-being.'),
        ),
        'location' => array(array(array('param' => 'page_template', 'operator' => '==', 'value' => 'page-offline-centers.php'))),
    ));

    // INTEGRATED SCHOOLS FIELDS
    acf_add_local_field_group(array(
        'key' => 'group_integrated_schools',
        'title' => 'Programmes: Integrated Schools',
        'fields' => array(
            array('key' => 'field_integrated_hero_title', 'label' => 'Hero Title', 'name' => 'integrated_hero_title', 'type' => 'text', 'default_value' => 'Integrated School Program'),
            array('key' => 'field_integrated_hero_desc', 'label' => 'Hero Description', 'name' => 'integrated_hero_desc', 'type' => 'textarea', 'default_value' => 'Zero commute, maximum focus. Expert entrance orientation delivered directly on your school campus.'),
            array('key' => 'field_integrated_hero_img', 'label' => 'Hero Image', 'name' => 'integrated_hero_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Features
            array('key' => 'field_integrated_why_title', 'label' => 'Why Integrated Title', 'name' => 'integrated_why_title', 'type' => 'text', 'default_value' => 'Why the Integrated Path is Most Efficient'),
            array('key' => 'field_integrated_item_1', 'label' => 'Single Timetable', 'name' => 'integrated_item_1', 'type' => 'textarea', 'default_value' => 'Zero Conflict: Entrance prep aligned perfectly with school teaching schedules.'),
            array('key' => 'field_integrated_item_2', 'label' => 'The Gift of Time', 'name' => 'integrated_item_2', 'type' => 'textarea', 'default_value' => 'Save 3-4 hours daily of travel time, reclaimed for self-study and wellness.'),
            array('key' => 'field_integrated_item_3', 'label' => 'Unified Mentorship', 'name' => 'integrated_item_3', 'type' => 'textarea', 'default_value' => 'On-site mentors bridging the gap between board theory and entrance apps.'),
            array('key' => 'field_integrated_item_4', 'label' => 'On-Campus Analysis', 'name' => 'integrated_item_4', 'type' => 'textarea', 'default_value' => 'Mock exams in familiar environments with immediate collaborative analysis.'),
        ),
        'location' => array(array(array('param' => 'page_template', 'operator' => '==', 'value' => 'page-integrated-schools.php'))),
    ));

    // COURSES DETAIL SECTIONS (Phase 5)
    acf_add_local_field_group(array(
        'key' => 'group_courses_details',
        'title' => 'Courses: Deep Details',
        'fields' => array(
            // pre, found, long, crash, rep, tuit, bridge
            array('key' => 'field_cd_pre_title', 'label' => '1. Pre-Foundation Title', 'name' => 'cd_pre_title', 'type' => 'text'),
            array('key' => 'field_cd_pre_image', 'label' => 'Pre-Foundation Image', 'name' => 'cd_pre_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_cd_pre_target', 'label' => 'Pre-Foundation Target', 'name' => 'cd_pre_target', 'type' => 'text'),
            array('key' => 'field_cd_pre_desc', 'label' => 'Pre-Foundation Description', 'name' => 'cd_pre_desc', 'type' => 'textarea'),
            array('key' => 'field_cd_pre_points', 'label' => 'Pre-Foundation Points', 'name' => 'cd_pre_points', 'type' => 'textarea'),
            array('key' => 'field_cd_pre_signif', 'label' => 'Pre-Foundation Significance', 'name' => 'cd_pre_signif', 'type' => 'textarea'),

            array('key' => 'field_cd_found_title', 'label' => '2. Foundation Title', 'name' => 'cd_found_title', 'type' => 'text'),
            array('key' => 'field_cd_found_image', 'label' => 'Foundation Image', 'name' => 'cd_found_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_cd_found_target', 'label' => 'Foundation Target', 'name' => 'cd_found_target', 'type' => 'text'),
            array('key' => 'field_cd_found_desc', 'label' => 'Foundation Description', 'name' => 'cd_found_desc', 'type' => 'textarea'),
            array('key' => 'field_cd_found_points', 'label' => 'Foundation Points', 'name' => 'cd_found_points', 'type' => 'textarea'),
            array('key' => 'field_cd_found_signif', 'label' => 'Foundation Significance', 'name' => 'cd_found_signif', 'type' => 'textarea'),

            array('key' => 'field_cd_long_title', 'label' => '3. Long-Term Title', 'name' => 'cd_long_title', 'type' => 'text'),
            array('key' => 'field_cd_long_image', 'label' => 'Long-Term Image', 'name' => 'cd_long_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_cd_long_target', 'label' => 'Long-Term Target', 'name' => 'cd_long_target', 'type' => 'text'),
            array('key' => 'field_cd_long_desc', 'label' => 'Long-Term Description', 'name' => 'cd_long_desc', 'type' => 'textarea'),
            array('key' => 'field_cd_long_points', 'label' => 'Long-Term Points', 'name' => 'cd_long_points', 'type' => 'textarea'),
            array('key' => 'field_cd_long_signif', 'label' => 'Long-Term Significance', 'name' => 'cd_long_signif', 'type' => 'textarea'),

            array('key' => 'field_cd_crash_title', 'label' => '4. Crash Course Title', 'name' => 'cd_crash_title', 'type' => 'text'),
            array('key' => 'field_cd_crash_image', 'label' => 'Crash Course Image', 'name' => 'cd_crash_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_cd_crash_target', 'label' => 'Crash Course Target', 'name' => 'cd_crash_target', 'type' => 'text'),
            array('key' => 'field_cd_crash_desc', 'label' => 'Crash Course Description', 'name' => 'cd_crash_desc', 'type' => 'textarea'),
            array('key' => 'field_cd_crash_points', 'label' => 'Crash Course Points', 'name' => 'cd_crash_points', 'type' => 'textarea'),
            array('key' => 'field_cd_crash_signif', 'label' => 'Crash Course Significance', 'name' => 'cd_crash_signif', 'type' => 'textarea'),

            array('key' => 'field_cd_rep_title', 'label' => '5. Repeaters Title', 'name' => 'cd_rep_title', 'type' => 'text'),
            array('key' => 'field_cd_rep_image', 'label' => 'Repeaters Image', 'name' => 'cd_rep_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_cd_rep_target', 'label' => 'Repeaters Target', 'name' => 'cd_rep_target', 'type' => 'text'),
            array('key' => 'field_cd_rep_desc', 'label' => 'Repeaters Description', 'name' => 'cd_rep_desc', 'type' => 'textarea'),
            array('key' => 'field_cd_rep_points', 'label' => 'Repeaters Points', 'name' => 'cd_rep_points', 'type' => 'textarea'),
            array('key' => 'field_cd_rep_signif', 'label' => 'Repeaters Significance', 'name' => 'cd_rep_signif', 'type' => 'textarea'),

            array('key' => 'field_cd_tuit_title', 'label' => '6. Tuition Title', 'name' => 'cd_tuit_title', 'type' => 'text'),
            array('key' => 'field_cd_tuit_image', 'label' => 'Tuition Image', 'name' => 'cd_tuit_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_cd_tuit_target', 'label' => 'Tuition Target', 'name' => 'cd_tuit_target', 'type' => 'text'),
            array('key' => 'field_cd_tuit_desc', 'label' => 'Tuition Description', 'name' => 'cd_tuit_desc', 'type' => 'textarea'),
            array('key' => 'field_cd_tuit_points', 'label' => 'Tuition Points', 'name' => 'cd_tuit_points', 'type' => 'textarea'),
            array('key' => 'field_cd_tuit_signif', 'label' => 'Tuition Significance', 'name' => 'cd_tuit_signif', 'type' => 'textarea'),

            array('key' => 'field_cd_bridge_title', 'label' => '7. Bridge Course Title', 'name' => 'cd_bridge_title', 'type' => 'text'),
            array('key' => 'field_cd_bridge_image', 'label' => 'Bridge Course Image', 'name' => 'cd_bridge_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_cd_bridge_target', 'label' => 'Bridge Course Target', 'name' => 'cd_bridge_target', 'type' => 'text'),
            array('key' => 'field_cd_bridge_desc', 'label' => 'Bridge Course Description', 'name' => 'cd_bridge_desc', 'type' => 'textarea'),
            array('key' => 'field_cd_bridge_points', 'label' => 'Bridge Course Points', 'name' => 'cd_bridge_points', 'type' => 'textarea'),
            array('key' => 'field_cd_bridge_signif', 'label' => 'Bridge Course Significance', 'name' => 'cd_bridge_signif', 'type' => 'textarea'),
        ),
        'location' => array(array(array('param' => 'page_template', 'operator' => '==', 'value' => 'page-courses.php'))),
    ));


    // ABOUT US PAGE FIELDS (Phase 7)
    acf_add_local_field_group(array(
        'key' => 'group_about_page',
        'title' => 'About Us Page Content',
        'fields' => array(
            // Hero Section
            array('key' => 'field_about_hero_title', 'label' => 'Hero Title', 'name' => 'about_hero_title', 'type' => 'text'),
            array('key' => 'field_about_hero_subtitle', 'label' => 'Hero Subtitle', 'name' => 'about_hero_subtitle', 'type' => 'text'),
            array('key' => 'field_about_hero_image', 'label' => 'Hero Background Image', 'name' => 'about_hero_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Main About Section
            array('key' => 'field_about_main_title', 'label' => 'Main Section Title', 'name' => 'about_main_title', 'type' => 'text'),
            array('key' => 'field_about_main_content', 'label' => 'Main About Content', 'name' => 'about_main_content', 'type' => 'wysiwyg'),
            array('key' => 'field_about_main_image', 'label' => 'Main Section Image', 'name' => 'about_main_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Philosophy Section
            array('key' => 'field_about_philosophy_title', 'label' => 'Philosophy Title', 'name' => 'about_philosophy_title', 'type' => 'text'),
            array('key' => 'field_about_philosophy_content', 'label' => 'Philosophy Content', 'name' => 'about_philosophy_content', 'type' => 'wysiwyg'),
            
            // Programmes Section
            array('key' => 'field_about_programmes_title', 'label' => 'Programmes Section Title', 'name' => 'about_programmes_title', 'type' => 'text'),
            array('key' => 'field_about_programmes_desc', 'label' => 'Programmes Description', 'name' => 'about_programmes_desc', 'type' => 'textarea'),
            
            // Founder Section
            array('key' => 'field_founder_name', 'label' => 'Founder Name', 'name' => 'founder_name', 'type' => 'text'),
            array('key' => 'field_founder_title', 'label' => 'Founder Title/Designation', 'name' => 'founder_title', 'type' => 'text'),
            array('key' => 'field_founder_photo', 'label' => 'Founder Photo', 'name' => 'founder_photo', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_founder_signature', 'label' => 'Founder Signature Image', 'name' => 'founder_signature', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_founder_message', 'label' => 'Founder Message', 'name' => 'founder_message', 'type' => 'wysiwyg'),
            
            // Mission & Vision
            array('key' => 'field_about_mission_title', 'label' => 'Mission Title', 'name' => 'about_mission_title', 'type' => 'text'),
            array('key' => 'field_about_mission_text', 'label' => 'Mission Text', 'name' => 'about_mission_text', 'type' => 'textarea'),
            array('key' => 'field_about_vision_title', 'label' => 'Vision Title', 'name' => 'about_vision_title', 'type' => 'text'),
            array('key' => 'field_about_vision_text', 'label' => 'Vision Text', 'name' => 'about_vision_text', 'type' => 'textarea'),
            
            // Legacy/Story Section
            array('key' => 'field_legacy_title', 'label' => 'Story Section Title', 'name' => 'legacy_title', 'type' => 'text'),
            array('key' => 'field_legacy_text', 'label' => 'Story Content', 'name' => 'legacy_text', 'type' => 'wysiwyg'),
            array('key' => 'field_legacy_side_image', 'label' => 'Story Section Image', 'name' => 'legacy_side_image', 'type' => 'image', 'return_format' => 'url'),
            
            // Infrastructure
            array('key' => 'field_infra_title', 'label' => 'Infrastructure Title', 'name' => 'infra_title', 'type' => 'text'),
            array('key' => 'field_infra_desc', 'label' => 'Infrastructure Description', 'name' => 'infra_desc', 'type' => 'text'),
            array('key' => 'field_infra_1_title', 'label' => 'Infra Item 1 Title', 'name' => 'infra_1_title', 'type' => 'text'),
            array('key' => 'field_infra_1_image', 'label' => 'Infra Item 1 Image', 'name' => 'infra_1_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_infra_2_title', 'label' => 'Infra Item 2 Title', 'name' => 'infra_2_title', 'type' => 'text'),
            array('key' => 'field_infra_2_image', 'label' => 'Infra Item 2 Image', 'name' => 'infra_2_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_infra_3_title', 'label' => 'Infra Item 3 Title', 'name' => 'infra_3_title', 'type' => 'text'),
            array('key' => 'field_infra_3_image', 'label' => 'Infra Item 3 Image', 'name' => 'infra_3_image', 'type' => 'image', 'return_format' => 'url'),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-about.php',
                ),
            ),
        ),
    ));

    // Blog Post Featured Image Field (Phase 8)
    acf_add_local_field_group(array(
        'key' => 'group_blog_post_image',
        'title' => 'Blog Post Featured Image',
        'fields' => array(
            array(
                'key' => 'field_blog_featured_image',
                'label' => 'Featured Image',
                'name' => 'blog_featured_image',
                'type' => 'image',
                'instructions' => 'Upload a featured image for this blog post. Recommended size: 1920x1080px',
                'required' => 0,
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
    ));

    // News Post Type Registration (Phase 9)
    function register_news_post_type() {
        $labels = array(
            'name'                  => _x( 'News', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'News', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'News', 'text_domain' ),
            'name_admin_bar'        => __( 'News', 'text_domain' ),
            'archives'              => __( 'News Archives', 'text_domain' ),
            'attributes'            => __( 'News Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent News:', 'text_domain' ),
            'all_items'             => __( 'All News', 'text_domain' ),
            'add_new_item'          => __( 'Add New News Item', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New News Item', 'text_domain' ),
            'edit_item'             => __( 'Edit News Item', 'text_domain' ),
            'update_item'           => __( 'Update News Item', 'text_domain' ),
            'view_item'             => __( 'View News Item', 'text_domain' ),
            'view_items'            => __( 'View News', 'text_domain' ),
            'search_items'          => __( 'Search News', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'News Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set news featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove news featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as news featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into news', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this news', 'text_domain' ),
            'items_list'            => __( 'News list', 'text_domain' ),
            'items_list_navigation' => __( 'News list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter news list', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'News', 'text_domain' ),
            'description'           => __( 'Latest education and exam news', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-megaphone',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rewrite'               => array('slug' => 'news'),
        );
        register_post_type( 'news', $args );
    }
    add_action( 'init', 'register_news_post_type', 0 );

    // News Metadata ACF Fields (Phase 9)
    acf_add_local_field_group(array(
        'key' => 'group_news_metadata',
        'title' => 'News Metadata',
        'fields' => array(
            array(
                'key' => 'field_news_status',
                'label' => 'Registration Status',
                'name' => 'news_registration_status',
                'type' => 'select',
                'instructions' => 'Is registration currently open?',
                'required' => 0,
                'choices' => array(
                    'none' => 'None',
                    'live' => 'LIVE',
                    'closing_soon' => 'Closing Soon',
                    'closed' => 'CLOSED',
                    'upcoming' => 'Upcoming',
                ),
                'default_value' => 'none',
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_news_type',
                'label' => 'News Category',
                'name' => 'news_type',
                'type' => 'select',
                'instructions' => 'Type of news item',
                'required' => 0,
                'choices' => array(
                    'medical' => 'Medical (NEET)',
                    'engineering' => 'Engineering (JEE/KEAM)',
                    'defence' => 'Defence & Design',
                    'specialized' => 'Specialized Tests',
                    'general' => 'General Updates',
                ),
                'default_value' => 'general',
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_news_important_dates',
                'label' => 'Important Dates Snippet',
                'name' => 'news_dates_snippet',
                'type' => 'textarea',
                'instructions' => 'Briefly list important dates (shown on cards)',
                'required' => 0,
                'rows' => 3,
            ),
            array(
                'key' => 'field_news_source',
                'label' => 'Source Link / Official Website',
                'name' => 'news_source_url',
                'type' => 'url',
                'instructions' => 'Link to official notification or website',
                'required' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'news',
                ),
            ),
        ),
    ));

    // FOOTER SETTINGS FIELDS
    acf_add_local_field_group(array(
        'key' => 'group_footer_settings',
        'title' => 'Footer settings',
        'fields' => array(
            // ABOUT COLUMN
            array(
                'key' => 'tab_footer_about',
                'label' => 'About Section',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_footer_desc',
                'label' => 'Footer Description',
                'name' => 'footer_description',
                'type' => 'textarea',
                'default_value' => 'Empowering students with expert coaching for NEET, JEE, and Entrance Exams.',
            ),
            
            // SOCIAL LINKS
            array(
                'key' => 'tab_footer_social',
                'label' => 'Social Links',
                'type' => 'tab',
            ),
            array('key' => 'field_f_fb', 'label' => 'Facebook URL', 'name' => 'footer_facebook', 'type' => 'url', 'default_value' => '#'),
            array('key' => 'field_f_ig', 'label' => 'Instagram URL', 'name' => 'footer_instagram', 'type' => 'url', 'default_value' => '#'),
            array('key' => 'field_f_yt', 'label' => 'YouTube URL', 'name' => 'footer_youtube', 'type' => 'url', 'default_value' => '#'),
            array('key' => 'field_f_li', 'label' => 'LinkedIn URL', 'name' => 'footer_linkedin', 'type' => 'url', 'default_value' => '#'),
            
            // CONTACT COLUMN
            array(
                'key' => 'tab_footer_contact',
                'label' => 'Contact Info',
                'type' => 'tab',
            ),
            array('key' => 'field_f_email', 'label' => 'Contact Email', 'name' => 'footer_email', 'type' => 'text', 'default_value' => 'admissions@bodhiacademy.com'),
            array('key' => 'field_f_phone', 'label' => 'Phone 1', 'name' => 'footer_phone', 'type' => 'text', 'default_value' => '+91 98765 43210'),
            array('key' => 'field_f_wa', 'label' => 'WhatsApp Number', 'name' => 'footer_whatsapp', 'type' => 'text', 'default_value' => '+91 98765 43210'),
            array('key' => 'field_f_address', 'label' => 'Address Line 1', 'name' => 'footer_address_1', 'type' => 'text', 'default_value' => 'Bodhi Academy,'),
            array('key' => 'field_f_address_2', 'label' => 'Address Line 2', 'name' => 'footer_address_2', 'type' => 'text', 'default_value' => 'Kaloor, Kochi,'),
            array('key' => 'field_f_address_3', 'label' => 'Address Line 3', 'name' => 'footer_address_3', 'type' => 'text', 'default_value' => 'Kerala, 682017'),

            // LIVE FEED
            array(
                'key' => 'tab_live_feed',
                'label' => 'Live Exam Feed',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_rss_feed_url',
                'label' => 'RSS Feed URL',
                'name' => 'live_exam_rss_url',
                'type' => 'url',
                'instructions' => 'External RSS feed for exam notifications (e.g. Manorama Education).',
                'default_value' => 'https://www.manoramaonline.com/sitemap/google-news-education-news/jcr:content/mm-section-full-parsys/google_news_feed.xml',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'footer-settings',
                ),
            ),
        ),
    ));

    // Flush rewrite rules on theme activation/switch for news CPT
    function bodhi_flush_news_rewrites() {
        register_news_post_type();
        flush_rewrite_rules();
    }
    add_action( 'after_switch_theme', 'bodhi_flush_news_rewrites' );

/**
 * Fetch and parse Live Exam Feed from RSS
 */
function bodhi_get_live_exam_feed($limit = 5) {
    if ( !function_exists('fetch_feed') ) {
        include_once(ABSPATH . WPINC . '/feed.php');
    }

    $rss_url = get_field('live_exam_rss_url', 'options');
    if (!$rss_url) {
        $rss_url = 'https://www.manoramaonline.com/sitemap/google-news-education-news/jcr:content/mm-section-full-parsys/google_news_feed.xml';
    }

    $rss = fetch_feed($rss_url);
    $items = array();

    if ( !is_wp_error($rss) ) {
        $maxitems = $rss->get_item_quantity($limit);
        $rss_items = $rss->get_items(0, $maxitems);

        foreach ( $rss_items as $item ) {
            $title = $item->get_title();
            // Optional: Clean title if needed
            $items[] = array(
                'title' => $title,
                'link'  => $item->get_permalink(),
                'date'  => $item->get_date('j M Y'),
                'source'=> 'LIVE'
            );
        }
    }

    return $items;
}
