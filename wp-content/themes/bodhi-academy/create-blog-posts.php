<?php
/**
 * Create Blog Posts from Blogs.docx
 * This script creates individual WordPress posts for each blog topic
 */

require_once(__DIR__ . '/../../../wp-load.php');

// Function to create or get category
function get_or_create_category($name, $slug) {
    $cat = get_term_by('slug', $slug, 'category');
    if (!$cat) {
        $result = wp_insert_term($name, 'category', array('slug' => $slug));
        if (!is_wp_error($result)) {
            return $result['term_id'];
        }
    }
    return $cat->term_id;
}

// Create categories
$cbse_cat = get_or_create_category('CBSE Updates', 'cbse-updates');
$neet_cat = get_or_create_category('NEET Preparation', 'neet-preparation');
$exam_tips_cat = get_or_create_category('Exam Tips', 'exam-tips');

echo "Categories created/verified.\n\n";

// ===== BLOG POST 1: CBSE OSM Guide (English) =====
$post1_title = "CBSE Onscreen Marking (OSM) - The Complete Guide";
$post1_content = <<<HTML
<h2>What is CBSE OSM?</h2>
<p>OSM stands for <strong>On-Screen Marking</strong>. It is the digital system used by the CBSE Board to evaluate answer scripts for Class 10 and 12. Instead of teachers manually correcting physical paper booklets, the entire process is moved to a secure digital platform.</p>

<h2>How the Process Works</h2>
<ol>
<li><strong>Scanning:</strong> Once the exam is over, all answer booklets are collected and sent to regional centers where they are scanned at high resolution.</li>
<li><strong>Digital Distribution:</strong> The scanned copies are uploaded to a secure server. These digital scripts are then distributed electronically to examiners across the country.</li>
<li><strong>On-Screen Evaluation:</strong> Examiners log into a secure system and mark the answers using a computer. They use a mouse or a stylus to tick, underline, and award marks for each step.</li>
<li><strong>Automatic Tabulation:</strong> The software automatically adds up the marks, eliminating any human error in totaling.</li>
</ol>

<h2>Why is this important for students?</h2>
<p>Understanding OSM helps a student change the way they present their answers to ensure they get the maximum marks.</p>

<h3>Clarity is Key</h3>
<p>Since the examiner sees a scanned image of your paper, your handwriting and diagrams must be clear. Light pencil work or faint handwriting may not scan well, making it difficult for the examiner to read.</p>

<h3>Structured Answering</h3>
<p>The OSM software often displays the marking scheme alongside the student's answer. Students should write in points and use headings, making it easier for the examiner to match their points with the marking scheme.</p>

<h3>Margin Discipline</h3>
<p>Students must avoid writing in the margins or near the edges of the paper. During the scanning process, information written on the very edge of the page might get cropped out.</p>

<h3>Step Marking</h3>
<p>The system allows examiners to award marks for every correct step. Even if the final answer is wrong, the digital interface makes it very easy for the teacher to see and reward your intermediate steps.</p>

<h2>Significance of OSM</h2>
<ul>
<li><strong>Transparency:</strong> It reduces the chances of bias or manipulation.</li>
<li><strong>Zero Errors:</strong> It removes the risk of "un-evaluated questions" or "totaling mistakes."</li>
<li><strong>Faster Results:</strong> Digital marking significantly speeds up the evaluation process, leading to earlier result declarations.</li>
</ul>

<h2>Student Checklist: Formatting Answer Sheets for OSM</h2>
<p>Since your answer script will be scanned and viewed on a digital screen by the examiner, your presentation must be "scanner-friendly." Follow these essential guidelines:</p>

<h3>1. Choice of Stationery</h3>
<ul>
<li><strong>Use Blue or Black Ballpoint Pen:</strong> These provide the best contrast for high-resolution scanning. Avoid gel pens or ink pens as they can smudge or bleed through the paper.</li>
<li><strong>Dark Pencils for Diagrams:</strong> Use a dark pencil (like HB or 2B) for all drawings. If the pencil work is too light, it may appear invisible or faint on the examiner's screen.</li>
<li><strong>Avoid Whitener:</strong> Do not use correction fluid. If you make a mistake, simply put a single horizontal line through it.</li>
</ul>

<h3>2. Layout and Margins</h3>
<ul>
<li><strong>Respect the Borders:</strong> Never write anything in the margins or at the very edge of the page. During scanning, text near the edges can be cropped out or lost.</li>
<li><strong>Question Numbers:</strong> Clearly write the question number in the designated area. Make sure it is bold and legible so the examiner can instantly identify the answer.</li>
</ul>

<h3>3. Handwriting and Clarity</h3>
<ul>
<li><strong>Maintain Spacing:</strong> Leave sufficient space between words and lines. A cluttered page is much harder to read on a computer screen than on physical paper.</li>
<li><strong>Legibility:</strong> If your handwriting is naturally small, try to write slightly larger and clearer for the digital format.</li>
</ul>

<h3>4. Structuring for the Screen</h3>
<ul>
<li><strong>Use Bullet Points:</strong> Examiners often view your answer alongside a digital marking scheme. Using bullet points and sub-headings makes it easier for them to tick off your correct points.</li>
<li><strong>Underline Key Terms:</strong> Use a pen to underline keywords or final answers. This draws the examiner's eye immediately to the most important parts of your response.</li>
</ul>

<h3>5. Diagrams and Graphs</h3>
<ul>
<li><strong>Label with Pen:</strong> While you draw with a pencil, try to label your diagrams with a pen. This ensures the labels remain sharp and readable after scanning.</li>
<li><strong>Clear Graph Points:</strong> On graph paper, ensure your plotted points are dark and your scales are clearly written.</li>
</ul>

<h3>6. Finishing Touches</h3>
<ul>
<li><strong>Tie Sheets Securely:</strong> Use the provided thread to tie additional sheets firmly but not too tightly. Avoid stapling, as staples can jam the high-speed scanners or damage the paper during the digitization process.</li>
<li><strong>Check the OMR Front Page:</strong> Ensure your Roll Number and Subject Code are bubbled accurately and darkly. This is how the system links the digital file to your identity.</li>
</ul>

<div style="background: linear-gradient(135deg, #e0f2f1 0%, #ffffff 100%); padding: 30px; border-radius: 15px; margin: 30px 0; border-left: 5px solid var(--primary);">
<p style="font-size: 1.1rem; margin: 0;"><strong>💡 Pro-Tip:</strong> Imagine you are looking at a photo of your paper on a phone screen. If it looks clear and organized there, it will look great for the examiner too!</p>
</div>
HTML;

// Check if post already exists
$existing_post1 = get_page_by_title($post1_title, OBJECT, 'post');
if (!$existing_post1) {
    $post1_id = wp_insert_post(array(
        'post_title' => $post1_title,
        'post_content' => $post1_content,
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array($cbse_cat, $exam_tips_cat),
        'tags_input' => 'CBSE, OSM, On-Screen Marking, Exam Tips, Class 10, Class 12, Answer Writing',
    ));
    
    if ($post1_id) {
        echo "✓ Created: $post1_title (ID: $post1_id)\n";
    }
} else {
    echo "⚠ Post already exists: $post1_title\n";
}

// ===== BLOG POST 2: NEET UG 2026 Guide (English) =====
$post2_title = "NEET UG 2026 - Complete Guide & Important Updates";
$post2_content = <<<HTML
<p>For NEET UG 2026, the official notification has been released and registration is currently live. Since you are aiming for this cycle, here is the most current and vital information you need to stay on track.</p>

<h2>📅 Important Dates (Mark Your Calendar)</h2>
<div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,91,79,0.1); margin: 20px 0;">
<ul style="list-style: none; padding: 0;">
<li>📝 <strong>Registration Started:</strong> February 8, 2026</li>
<li>⏰ <strong>Last Date to Apply:</strong> March 8, 2026 (9:00 PM)</li>
<li>💳 <strong>Last Date for Fee Payment:</strong> March 8, 2026 (11:50 PM)</li>
<li>✏️ <strong>Correction Window:</strong> March 10 – March 12, 2026</li>
<li>🎫 <strong>Admit Card Release:</strong> Expected late April 2026</li>
<li>📖 <strong>Exam Date:</strong> May 3, 2026 (Sunday)</li>
<li>⏱️ <strong>Exam Timing:</strong> 2:00 PM to 5:00 PM (3 hours)</li>
<li>📊 <strong>Result Declaration:</strong> Expected in June 2026</li>
</ul>
</div>

<h2>🆕 Big Changes for 2026</h2>
<p>NTA has introduced some high-tech updates this year to improve security and transparency:</p>

<h3>Aadhaar-based eKYC</h3>
<p>For the first time, registration involves mandatory Aadhaar-based electronic authentication. Ensure your Aadhaar is linked to an active mobile number.</p>

<h3>Live Photo Capture</h3>
<p>Instead of just uploading a pre-clicked photo, the application portal will capture a live photograph of you via webcam or smartphone to prevent impersonation.</p>

<h3>No Optional Questions</h3>
<p>Unlike recent years, the "Section B" internal choice (where you could pick 10 out of 15 questions) has been removed. <strong>All 180 questions are now compulsory.</strong></p>

<h3>Reduced Duration</h3>
<p>The exam duration is now strictly <strong>3 hours (180 minutes)</strong> for 180 questions, down from the previous 3 hours and 20 minutes.</p>

<h2>📋 Exam Pattern & Marking</h2>
<table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
<thead>
<tr style="background: var(--primary); color: white;">
<th style="padding: 12px; text-align: left;">Feature</th>
<th style="padding: 12px; text-align: left;">Details</th>
</tr>
</thead>
<tbody>
<tr style="background: #f9f9f9;">
<td style="padding: 10px; border: 1px solid #ddd;">Mode</td>
<td style="padding: 10px; border: 1px solid #ddd;">Offline (Pen and Paper / OMR)</td>
</tr>
<tr>
<td style="padding: 10px; border: 1px solid #ddd;">Total Marks</td>
<td style="padding: 10px; border: 1px solid #ddd;"><strong>720</strong></td>
</tr>
<tr style="background: #f9f9f9;">
<td style="padding: 10px; border: 1px solid #ddd;">Question Count</td>
<td style="padding: 10px; border: 1px solid #ddd;">180 (45 Physics, 45 Chemistry, 90 Biology)</td>
</tr>
<tr>
<td style="padding: 10px; border: 1px solid #ddd;">Marking Scheme</td>
<td style="padding: 10px; border: 1px solid #ddd;">+4 for correct, -1 for incorrect, 0 for unattempted</td>
</tr>
<tr style="background: #f9f9f9;">
<td style="padding: 10px; border: 1px solid #ddd;">Languages</td>
<td style="padding: 10px; border: 1px solid #ddd;">13 languages (including English, Hindi, and Malayalam)</td>
</tr>
</tbody>
</table>

<h2>✅ Eligibility & Fees</h2>
<h3>Age Requirement</h3>
<p>You must be at least 17 years old by December 31, 2026 (Born on or before Dec 31, 2009). There is no upper age limit.</p>

<h3>Qualifying Marks</h3>
<p>12th Pass with Physics, Chemistry, Biology/Biotechnology, and English:</p>
<ul>
<li><strong>General:</strong> 50% aggregate in PCB</li>
<li><strong>OBC/SC/ST:</strong> 40% aggregate in PCB</li>
</ul>

<h3>Application Fee</h3>
<ul>
<li><strong>General:</strong> ₹1,700</li>
<li><strong>General-EWS/OBC-NCL:</strong> ₹1,600</li>
<li><strong>SC/ST/PwBD/Third Gender:</strong> ₹1,000</li>
</ul>

<h2>📄 Documents Required for Upload</h2>
<ul>
<li><strong>Passport Size Photo:</strong> White background, 80% face coverage, ears visible (10–200 KB)</li>
<li><strong>Postcard Size Photo:</strong> (4"x6") taken on or after Jan 1, 2026 (10–200 KB)</li>
<li><strong>Signature:</strong> On white paper with black/blue pen (4–30 KB)</li>
<li><strong>Thumb Impressions:</strong> Left and right-hand fingers and thumb impressions</li>
<li><strong>Address Proof:</strong> Aadhaar, Voter ID, or Utility bill (PDF)</li>
<li><strong>Class 10 Certificate:</strong> (50–300 KB PDF)</li>
</ul>

<h2>📊 The Competition</h2>
<div style="background: linear-gradient(135deg, #fff3e0 0%, #ffffff 100%); padding: 25px; border-radius: 15px; margin: 20px 0; border-left: 5px solid var(--accent);">
<h3 style="margin-top: 0;">Student Statistics</h3>
<ul>
<li><strong>Estimated Applicants (2026):</strong> Over 2.5 to 2.6 million (25+ Lakhs) students</li>
<li><strong>Previous Year Trend:</strong> In 2025, approximately 2.4 million students appeared</li>
<li><strong>Success Ratio:</strong> Only about 2% to 3% of total applicants secure a Government MBBS seat</li>
</ul>
</div>

<h2>🏥 MBBS Seat Matrix</h2>
<table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
<thead>
<tr style="background: var(--primary); color: white;">
<th style="padding: 12px; text-align: left;">Category</th>
<th style="padding: 12px; text-align: left;">Number of Colleges</th>
<th style="padding: 12px; text-align: left;">Total MBBS Seats</th>
</tr>
</thead>
<tbody>
<tr style="background: #f9f9f9;">
<td style="padding: 10px; border: 1px solid #ddd;">Government Colleges</td>
<td style="padding: 10px; border: 1px solid #ddd;">~390</td>
<td style="padding: 10px; border: 1px solid #ddd;">~56,500</td>
</tr>
<tr>
<td style="padding: 10px; border: 1px solid #ddd;">Private/Deemed Colleges</td>
<td style="padding: 10px; border: 1px solid #ddd;">~325</td>
<td style="padding: 10px; border: 1px solid #ddd;">~52,000</td>
</tr>
<tr style="background: #f9f9f9;">
<td style="padding: 10px; border: 1px solid #ddd;"><strong>Total (India)</strong></td>
<td style="padding: 10px; border: 1px solid #ddd;"><strong>~715</strong></td>
<td style="padding: 10px; border: 1px solid #ddd;"><strong>~1,08,500</strong></td>
</tr>
</tbody>
</table>

<h2>🎯 High-Demand Institutional Seats</h2>
<ul>
<li><strong>AIIMS</strong> (All India Institutes of Medical Sciences): ~2,044 seats (across 20+ campuses)</li>
<li><strong>JIPMER</strong> (Puducherry & Karaikal): ~250 seats</li>
<li><strong>AFMC</strong> (Armed Forces Medical College, Pune): ~150 seats</li>
<li><strong>BHU & AMU:</strong> ~250 seats combined</li>
</ul>

<h2>📌 Reservation & Quotas</h2>
<h3>All India Quota (15%)</h3>
<p>Approximately 8,500 seats are open to students from all over India based purely on NEET rank.</p>

<h3>State Quota (85%)</h3>
<p>Approximately 48,000 seats are reserved for students of their respective home states (domicile).</p>

<h3>Category-wise Reservation (Central Pool)</h3>
<ul>
<li><strong>OBC (NCL):</strong> 27%</li>
<li><strong>EWS:</strong> 10%</li>
<li><strong>SC:</strong> 15%</li>
<li><strong>ST:</strong> 7.5%</li>
<li><strong>PwD:</strong> 5% (Horizontal reservation)</li>
</ul>

<div style="background: linear-gradient(135deg, #e0f2f1 0%, #ffffff 100%); padding: 30px; border-radius: 15px; margin: 30px 0; border-left: 5px solid var(--primary);">
<p style="font-size: 1.1rem; margin: 0;"><strong>⚠️ Important:</strong> Your choice of examination city is now strictly determined by the current and permanent addresses you provide in the form.</p>
</div>
HTML;

$existing_post2 = get_page_by_title($post2_title, OBJECT, 'post');
if (!$existing_post2) {
    $post2_id = wp_insert_post(array(
        'post_title' => $post2_title,
        'post_content' => $post2_content,
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array($neet_cat, $exam_tips_cat),
        'tags_input' => 'NEET, NEET 2026, Medical Entrance, MBBS, NTA, Exam Preparation, AIIMS',
    ));
    
    if ($post2_id) {
        echo "✓ Created: $post2_title (ID: $post2_id)\n";
    }
} else {
    echo "⚠ Post already exists: $post2_title\n";
}

echo "\n✅ Blog post creation completed!\n";
echo "Visit: http://localhost/bodhiwebsite/blog/ to see your new posts.\n";
