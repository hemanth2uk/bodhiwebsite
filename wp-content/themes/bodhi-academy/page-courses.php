<?php
/**
 * Template Name: Courses
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Banner for Internal Page -->
    <section class="about-hero" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url('<?php echo get_field('courses_hero_image') ?: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1920'; ?>'); background-size: cover; background-position: center; color: white; padding: 120px 0 80px; margin-top: var(--header-height);">
        <div class="container text-center">
            <h1 style="color: white; font-size: 3rem; margin-bottom: 20px;"><?php echo get_field('courses_hero_title') ?: 'Explore Our Courses'; ?></h1>
            <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 700px; margin: 0 auto;"><?php echo get_field('courses_hero_desc') ?: 'Comprehensive programs designed by experts to ensure your success in competitive examinations.'; ?></p>
        </div>
    </section>

    <!-- Entrance Coaching -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_field('courses_sec1_title') ?: 'Entrance Coaching'; ?></h2>
                <p><?php echo get_field('courses_sec1_sub') ?: 'Targeted preparation for Medical and Engineering Aspirants.'; ?></p>
            </div>
            
            <div class="courses-grid" style="margin-bottom: 60px;">
                <?php 
                // We have 6 slots for Entrance Coaching: c1 to c6
                for($i=1; $i<=6; $i++) {
                    $img = get_field('c_c'.$i.'_img');
                    $title = get_field('c_c'.$i.'_title');
                    $badge = get_field('c_c'.$i.'_badge');
                    $desc = get_field('c_c'.$i.'_desc');
                    
                    // Fallbacks for display purposes if empty
                    if(!$title && $i==1) { $title='NEET Regular'; $badge='Medical'; $desc='Intensive coaching...'; }
                    if(!$title && $i==2) { $title='JEE Main & Advanced'; $badge='Engineering'; $desc='Rigorous training...'; }
                    // ... (rest rely on user input or empty check, simplified here)
                    
                    if($title): 
                ?>
                <div class="course-card">
                    <div class="course-thumb">
                        <?php if($img): ?>
                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>">
                        <?php else: ?>
                        <div style="width:100%; height:100%; background:#eee; display:flex; align-items:center; justify-content:center; color:#999;">Image</div>
                        <?php endif; ?>
                    </div>
                    <div class="course-body">
                        <span class="course-badge"><?php echo esc_html($badge); ?></span>
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($desc); ?></p>
                        <div class="course-footer">
                            <a href="/contact-us" class="course-link">Enroll Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endif; } ?>
            </div>

            <div class="section-header">
                <h2><?php echo get_field('courses_sec2_title') ?: 'School Tuitions'; ?></h2>
                <p><?php echo get_field('courses_sec2_sub') ?: 'Building strong foundations for academic excellence.'; ?></p>
            </div>
            
            <div class="courses-grid">
                <?php 
                // We have 3 slots for Tuitions: t1 to t3
                for($j=1; $j<=3; $j++) {
                    $t_img = get_field('c_t'.$j.'_image');
                    $t_title = get_field('c_t'.$j.'_title');
                    $t_desc = get_field('c_t'.$j.'_desc');

                    if(!$t_title && $j==1) { $t_title='Classes 8-10'; $t_desc='Foundation courses...'; }
                    
                    if($t_title):
                ?>
                <div class="course-card">
                    <div class="course-thumb">
                        <?php if($t_img): ?>
                            <img src="<?php echo esc_url($t_img); ?>" alt="<?php echo esc_attr($t_title); ?>">
                        <?php else: ?>
                            <div style="width:100%; height:100%; background:#eee; display:flex; align-items:center; justify-content:center; color:#999;">Image</div>
                        <?php endif; ?>
                    </div>
                    <div class="course-body">
                        <span class="course-badge">Foundation</span>
                        <h3><?php echo esc_html($t_title); ?></h3>
                        <p><?php echo esc_html($t_desc); ?></p>
                        <div class="course-footer">
                            <a href="/school-tuitions" class="course-link">View Details</a>
                        </div>
                    </div>
                </div>
                <?php endif; } ?>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
