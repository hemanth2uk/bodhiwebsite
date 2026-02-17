<?php
require_once(__DIR__ . '/../../../wp-load.php');

echo "Starting Course Detail Sync...\n";

// Get the Courses page ID
$courses_page = get_page_by_path('courses');
if (!$courses_page) {
    // Try template
    $pages = get_pages([
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-courses.php'
    ]);
    if ($pages) $courses_page = $pages[0];
}

if (!$courses_page) {
    die("Courses page not found!\n");
}

$page_id = $courses_page->ID;
echo "Targeting Courses Page ID: $page_id\n";

$course_details = [
    'pre' => [
        'title' => 'Bodhi Pre-Foundation: Igniting the Spark',
        'target' => 'Students of Classes 5, 6, and 7.',
        'desc' => 'At this age, children are naturally curious. Our Pre-Foundation program is designed to take that curiosity and turn it into a love for Science and Mathematics. Instead of rote memorization, we focus on discovery. We help students understand the "Magic of Math" and the "Secrets of Science" in a way that school textbooks often miss.',
        'points' => "Nurturing Mentorship: Our mentors act as \"Scientific Guides.\" They don't just give answers; they encourage students to ask better questions.\n\nMindful Play: We introduce meditation through simple breathing exercises and \"quiet time.\" This helps children improve their attention span and stay calm.\n\nThe Joy of Sound: We use music to make learning rhythmic and fun, ensuring the child’s association with learning is always happy.\n\nGrowth Tracking: We look for \"Lightbulb Moments,\" tracking how logic is improving and identifying natural interests early on.",
        'signif' => "Fearless Learning: We remove the \"fear of Math\" before it even starts.\n\nCompetitive Edge: Students develop logical reasoning skills needed for Olympiads in a stress-free way.\n\nHolistic Growth: Balancing study with music and meditation ensures well-rounded development."
    ],
    'found' => [
        'title' => 'Bodhi Foundation: Building the Roots of Excellence',
        'target' => 'Students in Classes 8, 9, and 10.',
        'desc' => 'Most students wait until Class 11 to start preparing for competitive exams like NEET or JEE. A Foundation Course introduces these concepts earlier, but at a much more comfortable pace. It bridges the gap between school textbooks and the advanced logic required for national-level entrances.',
        'points' => "Mentorship for Young Minds: Our mentors provide the psychological and academic \"hand-holding\" needed to build early confidence.\n\nThe Power of Focus: By starting meditation at this age, students develop a natural immunity to exam stress.\n\nCreative Learning: Learning through experience from an experienced faculty team.\n\nSmart Analytics: We identify a student's natural strengths—whether a born engineer or a future doctor—long before they choose a stream.",
        'signif' => "Logical Clarity: Students learn the \"Why\" behind the \"What,\" making school exams feel much easier.\n\nEdge over Peers: By Class 11, students are already familiar with 30-40% of the entrance syllabus.\n\nStress-Free Success: Learning spread over three years significantly lowers pressure."
    ],
    'long' => [
        'title' => 'The Bodhi Long-Term Program: Excellence, Your Way',
        'target' => 'Students of Class 11 (+1) and Class 12 (+2).',
        'desc' => 'The transition to higher secondary is a marathon, not a sprint. Our long-term courses are designed to provide consistent, high-quality orientation for NEET, JEE, and KEAM while ensuring the student’s well-being remains a priority.',
        'points' => "Integrated School Program: Expertise delivered within school hours—no extra travel or evening classes.\n\nWeekend Batches: High-quality sessions on second Saturdays and Sundays for those focused on self-study during weekdays.\n\nTuition + Entrance Batches: A hybrid model covering both Board Exam syllabus and competitive patterns in the evenings.",
        'signif' => "Consistency: Spreading the syllabus over two years eliminates last-minute cramming.\n\nMental Resilience: Long-term mentorship helps navigate the highs and lows of academic pressure.\n\nEarly Calibration: Regular analysis over two years allows us to fine-tune exam strategies based on evolving strengths."
    ],
    'crash' => [
        'title' => 'The Bodhi Intensive: Your Final Step to Success',
        'target' => 'Class 12 Students (Post-Board Exams)',
        'desc' => 'The few weeks following your Class 12 exams are the most critical. Competitive exams like NEET, JEE, and KEAM require speed, accuracy, and mental endurance. Our crash course transitions you from "Board Exams" to "Entrance Ranker".',
        'points' => "Strategic Direction: Focus only on what truly matters for the rank with simplifying mentors.\n\nPeak Mental Clarity: Short meditation techniques to ensure focus during three-hour exams.\n\nStress Recovery: A scientific approach to recover from intense study and prevent burnout.\n\nProgress Tracking: Result analysis shows exactly where you are losing time and how to fix it.",
        'signif' => "Bridging the Gap: We shift your mindset from long answers (Boards) to quick thinking (Entrance).\n\nTime Management: Learn which questions to attempt and which to skip—the key to a top rank.\n\nHolistic Strength: Our well-being focus ensures you stay ahead where others might succumb to stress."
    ],
    'rep' => [
        'title' => 'The Bodhi Repeater Program: Refine. Rebuild. Reclaim.',
        'target' => 'Class 12 Completed Students focusing on NEET/JEE/KEAM.',
        'desc' => 'A "gap year" is an investment. We understand that a repeater student doesn\'t need to start from scratch—they need to start smarter. Our program transforms "lost marks" into "earned ranks" in a distraction-free environment.',
        'points' => "Analytical Diagnostics: We begin with a deep analysis of your previous attempt to identify exact pressure points.\n\nResilience & Mindset: Daily mindfulness helps release past weight and approach mocks with fresh focus.\n\nSustainable Intensity: Scientific methodology and rhythmic breaks prevent the common mid-year burnout.\n\nExpert Mentorship: Paired with mentors specializing in the psychology of repeating for constant strategic nudges.",
        'signif' => "Uninterrupted Focus: 100% energy channeled toward one goal without school distractions.\n\nMaturity in Learning: Leveraging deeper understanding for advanced problem-solving.\n\nExperience as an Edge: Using previous exam experience to stay calm while others panic."
    ],
    'tuit' => [
        'title' => 'Bodhi Academic Tuition: Mastering the Foundation',
        'target' => 'Class 11 & 12 (Science & Commerce)',
        'desc' => 'Exclusively dedicated to the school curriculum, our tuition program focuses on Total Subject Mastery. We move away from the rush of entrance coaching to ensure deep, unshakable clarity of concepts for Board Exam excellence.',
        'points' => "Concept-First Mentorship: Bridging the gap between reading and understanding with logic-based learning.\n\nThe Calm Classroom: Integrated mindfulness to clear the \"mental clutter\" of a long school day.\n\nCognitive Harmony: Scientific educational methodology creates a rhythmic environment that prevents fatigue.\n\nDiagnostic Progress: Assessment mirrored on Board Exam patterns with detailed weakness analysis.",
        'signif' => "Academic Confidence: Mastery of core concepts makes school exams and practicals easy.\n\nSolid Foundation: Ensuring high Class 12 marks to open doors to top universities.\n\nEnjoyable Science: Removing entrance pressure allows students to appreciate the fascination of the world."
    ],
    'bridge' => [
        'title' => 'The Bodhi Bridge: Transition with Confidence',
        'target' => 'Students moving from Class 10 to Class 11 (Science).',
        'desc' => 'The jump from 10th-grade Science to +1 Physics, Chemistry, and Biology is an expansion. Concepts become entire textbooks. Our program ensures students enter their new level with a "head start" instead of feeling lost.',
        'points' => "Fundamental Mentorship: Focusing on \"Unlearning and Relearning\" to expand basic logic into advanced concepts.\n\nDeveloping Focus: Introducing meditation early to build the mental stamina required for higher secondary study.\n\nCreative Engagement: Incorporating music to make the transition feel light and enjoyable.\n\nReadiness Analysis: Identifying natural aptitude to help students and parents choose focus subjects.",
        'signif' => "Confidence Building: Starting the school year already familiar with the first few units.\n\nSmoothing the Curve: Gradual introduction of complex topics like Calculus and Organic basics.\n\nProductive Summers: Keeping the mind sharp so the eventual return to school is effortless."
    ]
];

foreach ($course_details as $cat => $data) {
    update_field('cd_' . $cat . '_title', $data['title'], $page_id);
    update_field('cd_' . $cat . '_target', $data['target'], $page_id);
    update_field('cd_' . $cat . '_desc', $data['desc'], $page_id);
    update_field('cd_' . $cat . '_points', $data['points'], $page_id);
    update_field('cd_' . $cat . '_signif', $data['signif'], $page_id);
    echo "Updated Course: " . $data['title'] . "\n";
}

echo "Course Detail Sync Complete!\n";
