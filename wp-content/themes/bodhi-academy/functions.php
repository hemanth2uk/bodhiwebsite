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
                'default_value' => 'Concept Mastery',
            ),
            array(
                'key' => 'field_why_1_desc',
                'label' => 'Item 1 Desc',
                'name' => 'why_1_desc',
                'type' => 'text',
                'default_value' => 'We don\'t just teach for exams; we teach for deep understanding and long-term retention.',
            ),
             array(
                'key' => 'field_why_2_title',
                'label' => 'Item 2 Title',
                'name' => 'why_2_title',
                'type' => 'text',
                'default_value' => 'Holistic Mentorship',
            ),
            array(
                'key' => 'field_why_2_desc',
                'label' => 'Item 2 Desc',
                'name' => 'why_2_desc',
                'type' => 'text',
                'default_value' => 'Guidance that goes beyond academics, helping students manage stress and stay motivated.',
            ),
             array(
                'key' => 'field_why_3_title',
                'label' => 'Item 3 Title',
                'name' => 'why_3_title',
                'type' => 'text',
                'default_value' => 'Digital & Physical',
            ),
            array(
                'key' => 'field_why_3_desc',
                'label' => 'Item 3 Desc',
                'name' => 'why_3_desc',
                'type' => 'text',
                'default_value' => 'Seamlessly integrated app and classroom experience for 24/7 learning.',
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
                'default_value' => 'High School Foundation',
            ),
            array('key' => 'field_t_track1_badge', 'label' => 'Track 1 Badge', 'name' => 'tuition_track_1_badge', 'type' => 'text', 'default_value' => 'CLASS 8-10'),
            array(
                'key' => 'field_t_track1_desc',
                'label' => 'Track 1 Description',
                'name' => 'tuition_track_1_desc',
                'type' => 'textarea',
                'default_value' => 'Strong foundation for Class 8, 9 & 10 students.',
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
                'default_value' => 'Higher Secondary (+1/+2)',
            ),
            array('key' => 'field_t_track2_badge', 'label' => 'Track 2 Badge', 'name' => 'tuition_track_2_badge', 'type' => 'text', 'default_value' => '+1 & +2'),
            array(
                'key' => 'field_t_track2_desc',
                'label' => 'Track 2 Description',
                'name' => 'tuition_track_2_desc',
                'type' => 'textarea',
                'default_value' => 'Expert coaching for Physics, Chemistry, Maths & Biology.',
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
                'default_value' => 'Board Exam Prep',
            ),
            array('key' => 'field_t_track3_badge', 'label' => 'Track 3 Badge', 'name' => 'tuition_track_3_badge', 'type' => 'text', 'default_value' => 'CRASH COURSE'),
            array(
                'key' => 'field_t_track3_desc',
                'label' => 'Track 3 Description',
                'name' => 'tuition_track_3_desc',
                'type' => 'textarea',
                'default_value' => 'Dedicated batches for final board exam revision.',
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

             array('key' => 'field_c_t3_title', 'label' => 'Tuition 3 Title', 'name' => 'c_t3_title', 'type' => 'text', 'default_value' => 'Class 11 & 12 (Commerce)'),
             array('key' => 'field_c_t3_desc', 'label' => 'Tuition 3 Desc', 'name' => 'c_t3_desc', 'type' => 'textarea', 'default_value' => 'Accountancy, Economics...'),
             array('key' => 'field_c_t3_img', 'label' => 'Tuition 3 Image', 'name' => 'c_t3_image', 'type' => 'image', 'return_format' => 'url'),

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
