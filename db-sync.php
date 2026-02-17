<?php
/**
 * Database Synchronization & Content Population Script
 * This script programmatically saves all extracted content into ACF fields
 * and creates blog posts for the Bodhi Academy website.
 */

require_once('wp-load.php');

if (!function_exists('update_field')) {
    die('ACF is not active. Please activate ACF first.');
}

echo "Starting Content Synchronization...\n";

// Helper to get page by template
function get_page_by_template($template_name) {
    $pages = get_pages([
        'meta_key' => '_wp_page_template',
        'meta_value' => $template_name,
        'number' => 1
    ]);
    return $pages ? $pages[0]->ID : null;
}

// 1. HOME PAGE CONTENT
$home_id = get_option('page_on_front') ?: get_page_by_template('front-page.php');
if ($home_id) {
    echo "Updating Home Page (ID: $home_id)...\n";
    update_field('home_news_title', 'Latest News & Exam Dates (2026)', $home_id);
    update_field('home_news_1', 'NEET UG 2026: Registration LIVE - Ends March 8, 2026', $home_id);
    update_field('home_news_2', 'JEE Main 2026 (Session 2): Registration ends Feb 25, 2026', $home_id);
    update_field('home_news_3', 'ISI Admission Test 2026: Registration LIVE - Ends March 13, 2026', $home_id);
    update_field('home_news_4', 'IISER Aptitude Test (IAT) 2026: Registration Starts March 5, 2026', $home_id);
    
    // Four Pillars
    update_field('why_1_title', 'Personalized Mentorship', $home_id);
    update_field('why_1_desc', 'Our mentors act as "Scientific Guides," encouraging students to ask better questions and think independently.', $home_id);
    update_field('why_2_title', 'Mental Wellness & Focus', $home_id);
    update_field('why_2_desc', 'Integrated meditation and mindfulness techniques to build natural immunity to exam stress.', $home_id);
    update_field('why_3_title', 'Analytical Growth Tracking', $home_id);
    update_field('why_3_desc', 'Deep result analysis to identify natural strengths and "Lightbulb Moments" early on.', $home_id);
    update_field('why_4_title', 'Creative Learning Environment', $home_id);
    update_field('why_4_desc', 'Scientific educational methodologies and rhythmic learning through music and exploration.', $home_id);
}

// 2. ABOUT US CONTENT
$about_id = get_page_by_template('page-about.php');
if ($about_id) {
    echo "Updating About Page (ID: $about_id)...\n";
    update_field('about_mission_title', 'Our Mission', $about_id);
    update_field('about_mission_text', "To identify, strengthen, and refine the innate abilities of every learner, enabling them to dream confidently and achieve excellence in their professional careers through a highly sophisticated coaching ecosystem.", $about_id);
    update_field('about_vision_title', 'Our Vision', $about_id);
    update_field('about_vision_text', "Bodhi Education envisions itself as a unique and dynamic human resource development initiative dedicated to empowering students by enhancing their skills and unlocking their true potential.", $about_id);
    
    $legacy_content = "Bodhi Education is Kerala’s pioneering educational research and development platform... Comprising a dynamic team of academic experts, researchers, and technocrats, we collaborate to design innovative strategies and cutting-edge technologies that revolutionize India’s education sector.\n\nBodhi believes that, 'every child has his/her own uniqueness'. Find and shape them as future talents are the real task. The motto of the programme is to provide the best quality classes, students support, mentorship and high-power coaching.";
    update_field('legacy_text', $legacy_content, $about_id);
}

// 3. COURSES CONTENT
$courses_id = get_page_by_template('page-courses.php');
if ($courses_id) {
    echo "Updating Courses Page (ID: $courses_id)...\n";
    // Section 1: Entrance
    update_field('c_c1_title', 'NEET Regular', $courses_id);
    update_field('c_c1_desc', 'Consistent, high-quality orientation for NEET while ensuring student well-being remains a priority. Integrated with school hours.', $courses_id);
    update_field('c_c5_title', 'NEET Repeaters', $courses_id);
    update_field('c_c5_desc', 'Refine. Rebuild. Reclaim. Analytical diagnostics and experts in dropper psychology to turn "lost marks" into "earned ranks".', $courses_id);
    update_field('c_c6_title', 'Crash Courses', $courses_id);
    update_field('c_c6_desc', 'Your Final Step to Success. Shifting from Board Exams to Entrance Ranker through speed, accuracy, and mental endurance.', $courses_id);
    
    // Section 2: Tuitions
    update_field('c_t1_title', 'Foundation Classes 8-10', $courses_id);
    update_field('c_t1_desc', 'Building the Roots of Excellence. Bypassing rote memorization to bridge the gap between school and advanced national-level logic.', $courses_id);
    update_field('c_t2_title', 'Class 11 & 12 (Science)', $courses_id);
    update_field('c_t2_desc', 'Mastering the Foundation. Total subject mastery with concept-first mentorship and diagnostic progress assessments.', $courses_id);
}

// 4. SCHOOL & TUITIONS (PROGRAMMES)
$school_id = get_page_by_template('page-school-tuitions.php');
if ($school_id) {
    echo "Updating School & Tuitions Page (ID: $school_id)...\n";
    update_field('tuition_track_1_title', 'Bodhi Online Learning Programme', $school_id);
    update_field('tuition_track_1_desc', 'Your Digital Sanctuary for Learning. 24/7 Doubt Clearance, Adaptive Learning Paths, and Exam-Simulated Environments via the Bodhi App.', $school_id);
    update_field('tuition_track_2_title', 'Offline Science Centers', $school_id);
    update_field('tuition_track_2_desc', 'Where Focus Finds a Home. A unified ecosystem providing physical mentorship, in-person result analysis, and a distraction-free sanctuary.', $school_id);
    update_field('tuition_track_3_title', 'Integrated School Program', $school_id);
    update_field('tuition_track_3_desc', 'The Gift of Time. Bringing expert entrance orientation directly into school campuses to eliminate commute exhaustion and align curricula.', $school_id);
}

// 5. BLOG POSTS
echo "Creating Blog Posts...\n";

$blogs = [
    [
        'title' => 'CBSE Onscreen Marking (OSM): The Complete Guide',
        'content' => "OSM stands for On-Screen Marking. It is the digital system used by the CBSE Board to evaluate answer scripts for Class 10 and 12. Instead of teachers manually correcting physical paper booklets, the entire process is moved to a secure digital platform.\n\n" .
                     "### How the Process Works\n" .
                     "1. Scanning: High resolution digitization.\n" .
                     "2. Digital Distribution: Secure server uploads.\n" .
                     "3. On-Screen Evaluation: Examiners use digital tools to award marks.\n" .
                     "4. Automatic Tabulation: Eliminates totaling errors.\n\n" .
                     "### Student Checklist: Formatting Answer Sheets\n" .
                     "- Use Blue or Black Ballpoint Pen for scanning contrast.\n" .
                     "- Use Dark Pencils (HB/2B) for diagrams.\n" .
                     "- Respect Borders and Margins to avoid cropping.\n" .
                     "- Clearly underline key terms and use bullet points.",
        'slug' => 'cbse-osm-complete-guide'
    ],
    [
        'title' => 'NEET UG 2026: Official Notification & High-Tech Changes',
        'content' => "The official notification for NEET UG 2026 has been released and registration is currently LIVE.\n\n" .
                     "### Important Dates\n" .
                     "- Registration: Feb 8 - March 8, 2026\n" .
                     "- Correction Window: March 10 - 12, 2026\n" .
                     "- Exam Date: May 3, 2026 (Sunday)\n\n" .
                     "### Key Changes for 2026\n" .
                     "1. Aadhaar-based eKYC: Mandatory authentication.\n" .
                     "2. Live Photo Capture: No pre-clicked uploads.\n" .
                     "3. No Optional Questions: All 180 questions are now compulsory.\n" .
                     "4. Reduced Duration: Strictly 3 hours.",
        'slug' => 'neet-ug-2026-notification'
    ]
];

foreach ($blogs as $blog) {
    $existing = get_page_by_path($blog['slug'], OBJECT, 'post');
    if (!$existing) {
        $post_id = wp_insert_post([
            'post_title'   => $blog['title'],
            'post_content' => $blog['content'],
            'post_status'  => 'publish',
            'post_type'    => 'post',
            'post_name'    => $blog['slug']
        ]);
        echo "Created Blog Post: {$blog['title']} (ID: $post_id)\n";
    } else {
        echo "Blog Post Already Exists: {$blog['title']}\n";
    }
}

echo "Synchronization Complete!\n";
