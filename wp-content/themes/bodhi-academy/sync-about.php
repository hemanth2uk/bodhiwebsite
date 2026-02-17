<?php
// Sync About Us content from extracted document
require_once(__DIR__ . '/../../../wp-load.php');

$page = get_page_by_path('about-us');
if (!$page) {
    echo "About Us page not found!\n";
    exit;
}

$page_id = $page->ID;

// Main content from the document
$main_content = "Bodhi Education is Kerala's pioneering educational research and development platform, dedicated to empowering students by enhancing their skills and unlocking their true potential. We support the students to attain their goals. Comprising a dynamic team of academic experts, researchers, and technocrats, we collaborate to design innovative strategies and cutting-edge technologies that revolutionize India's education sector.";

$philosophy_content = "Bodhi believes that, \"every child has his/her own uniqueness\". Find and shape them as future talents are the real task. Bodhi Education envisions itself as a unique and dynamic human resource development initiative dedicated to empowering students through a highly sophisticated coaching and support ecosystem. We aim to identify, strengthen, and refine the innate abilities of every learner, enabling them to dream confidently and achieve excellence in their chosen professional careers.

Through integrated academic excellence, mentorship-driven guidance, technology-enabled learning, and value-based education, Bodhi Education seeks to create competent, confident, and socially responsible professionals who contribute meaningfully to society.

Bodhi devoted to build a strong foundation in child through the professional academic endeavours and best coaching practices. With an ultimate aim to mould and support the students, Bodhi designs a unique coaching pattern which is ideal for nurturing academic excellence among students.";

$programmes_desc = "The programmes are offered for the standard 6 to 12 students to build them with sound subject base, vibrant problem solving skills and competitive exam skills. We aim, to strengthen the student's mathematical skills, competitive mind set, confidence and courage to crack their ambitions.

Our online - offline combination and learning app help the students to reach their best in well organised coaching programmes. The blunt of most effective classroom teaching supplemented by recorded classes, live online sessions, doubt clearance sessions, discussions, mock exams, self evaluations through the learning app. The combined programme helps our students to prepare their own strategy and schedule for their coaching by utilising valuable time in a more meaningful way.

The programmes such as \"Bodhi Science Centres\", \"Integrated schools\", Online learning programme and \"Empower Her\" were the innovative programmes to fullfill the ultimate goal of Bodhi.";

$mission_text = "To provide the best quality classes, students support, mentorship and high-power coaching to create a strong community of younger population with high capacity, skill and talent. It aims to provide a highly specialised and sophisticated coaching and support for the students to fine tune their innate abilities.";

$vision_text = "Bodhi Education envisions itself as a unique and dynamic human resource development initiative dedicated to empowering students through a highly sophisticated coaching and support ecosystem. We aim to identify, strengthen, and refine the innate abilities of every learner, enabling them to dream confidently and achieve excellence in their chosen professional careers.";

// Update fields
update_field('about_hero_title', 'About <span class="text-accent" style="color:var(--accent);">Bodhi Education</span>', $page_id);
update_field('about_hero_subtitle', "Kerala's Pioneering Educational Research and Development Platform", $page_id);

update_field('about_main_title', 'Who We Are', $page_id);
update_field('about_main_content', $main_content, $page_id);

update_field('about_philosophy_title', 'Our Philosophy & Approach', $page_id);
update_field('about_philosophy_content', $philosophy_content, $page_id);

update_field('about_programmes_title', 'Our Programmes', $page_id);
update_field('about_programmes_desc', $programmes_desc, $page_id);

update_field('about_mission_title', 'Our Mission', $page_id);
update_field('about_mission_text', $mission_text, $page_id);

update_field('about_vision_title', 'Our Vision', $page_id);
update_field('about_vision_text', $vision_text, $page_id);

update_field('legacy_title', 'Our Story', $page_id);
update_field('legacy_text', '<p>' . $main_content . '</p><p>' . nl2br($philosophy_content) . '</p>', $page_id);

// Founder information - to be updated manually with photo
update_field('founder_name', 'Founder Name', $page_id);
update_field('founder_title', 'Founder & Director', $page_id);

echo "About Us page content updated successfully!\n";
echo "Please upload founder photo and signature in WordPress admin.\n";
