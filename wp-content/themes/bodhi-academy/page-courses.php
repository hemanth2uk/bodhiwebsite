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
    <section class="section-padding" style="background: radial-gradient(circle at bottom right, #e0f2f1 0%, #ffffff 70%);">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span style="color:var(--primary); font-weight:700; text-transform:uppercase; letter-spacing:2px; font-size:0.9rem;">Empower Your Future</span>
                <h2 style="margin-top:10px;"><?php echo get_field('courses_sec1_title') ?: 'Entrance Coaching'; ?></h2>
                <p><?php echo get_field('courses_sec1_sub') ?: 'Targeted preparation for Medical and Engineering Aspirants.'; ?></p>
            </div>
            
            <div class="courses-grid" style="margin-bottom: 80px;">
                <?php 
                for($i=1; $i<=6; $i++) {
                    $img = get_field('c_c'.$i.'_img');
                    $title = get_field('c_c'.$i.'_title');
                    $badge = get_field('c_c'.$i.'_badge');
                    $desc = get_field('c_c'.$i.'_desc');
                    
                    if(!$title && $i==1) { $title='NEET Regular'; $badge='Medical'; $desc='Comprehensive preparation ecosystem for future Doctors.'; $img='https://images.unsplash.com/photo-1627556592933-ffe99c1cd9eb?auto=format&fit=crop&w=600'; }
                    if(!$title && $i==2) { $title='JEE Advanced'; $badge='Engineering'; $desc='Master the concepts and build problem-solving speed.'; $img='https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=600'; }
                    if(!$title && $i==3) { $title='KEAM'; $badge='State Level'; $desc='Specialized coaching for Kerala Engineering entrance.'; $img='https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=600'; }
                    
                    if($title): 
                ?>
                <div class="course-card animate-fade-up animate-glow delay-<?php echo $i*100; ?>" style="background: white; border-radius: 24px; box-shadow: var(--shadow-card); overflow: hidden; border: 1px solid rgba(0,91,79,0.05);">
                    <div class="course-thumb" style="height: 220px; position: relative; overflow: hidden;">
                        <?php if($img): ?>
                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" style="width:100%; height:100%; object-fit:cover; transition: 0.5s;">
                        <?php else: ?>
                            <div style="width:100%; height:100%; background:var(--primary-light); display:flex; align-items:center; justify-content:center; color:var(--primary);"><i class="fas fa-image fa-2x"></i></div>
                        <?php endif; ?>
                        <div style="position: absolute; top: 15px; left: 15px; background: var(--accent); color: #000; padding: 4px 12px; border-radius: 5px; font-weight: 700; font-size: 0.75rem; box-shadow: 0 5px 15px rgba(255,193,7,0.3);"><?php echo esc_html($badge); ?></div>
                    </div>
                    <div class="course-body" style="padding: 30px;">
                        <h3 style="margin-bottom: 12px; font-size: 1.4rem; color: var(--primary-dark);"><?php echo esc_html($title); ?></h3>
                        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px;"><?php echo esc_html($desc); ?></p>
                        <div class="course-footer" style="padding-top: 20px; border-top: 1px solid #eee;">
                            <a href="/contact-us" class="btn btn-outline" style="width:100%; justify-content:center; padding: 10px 0; border-radius: 12px;">Enroll Now <i class="fas fa-arrow-right" style="margin-left:8px;"></i></a>
                        </div>
                    </div>
                </div>
                <?php endif; } ?>
            </div>

            <div class="section-header animate-fade-up">
                <span style="color:var(--accent); font-weight:700; text-transform:uppercase; letter-spacing:2px; font-size:0.9rem;">Foundations for Life</span>
                <h2 style="margin-top:10px;"><?php echo get_field('courses_sec2_title') ?: 'School Tuitions'; ?></h2>
                <p><?php echo get_field('courses_sec2_sub') ?: 'Building strong foundations for academic excellence.'; ?></p>
            </div>
            
            <div class="courses-grid">
                <?php 
                for($j=1; $j<=3; $j++) {
                    $t_img = get_field('c_t'.$j.'_image');
                    $t_title = get_field('c_t'.$j.'_title');
                    $t_desc = get_field('c_t'.$j.'_desc');

                    if(!$t_title && $j==1) { $t_title='Classes 8-10'; $t_desc='Strengthen your core concepts in Science & Maths.'; $t_img='https://images.unsplash.com/photo-1491841550275-ad7854e35ca6?auto=format&fit=crop&w=600'; }
                    if(!$t_title && $j==2) { $t_title='Class 11 & 12 (Science)'; $t_desc='Board exam preparation with a focus on conceptual clarity.'; $t_img='https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600';}
                    
                    if($t_title):
                ?>
                <div class="course-card animate-fade-up animate-glow delay-<?php echo ($j+6)*100; ?>" style="background: white; border-radius: 24px; box-shadow: var(--shadow-card); overflow: hidden; border: 1px solid rgba(0,91,79,0.05);">
                    <div class="course-thumb" style="height: 220px; overflow: hidden;">
                        <?php if($t_img): ?>
                            <img src="<?php echo esc_url($t_img); ?>" alt="<?php echo esc_attr($t_title); ?>" style="width:100%; height:100%; object-fit:cover; transition: 0.5s;">
                        <?php else: ?>
                             <div style="width:100%; height:100%; background:var(--primary-light); display:flex; align-items:center; justify-content:center; color:var(--primary);"><i class="fas fa-book fa-2x"></i></div>
                        <?php endif; ?>
                    </div>
                    <div class="course-body" style="padding: 30px;">
                        <span class="course-badge" style="background: rgba(0,150,136,0.1); color: #00796b; margin-bottom: 15px;">Academic Support</span>
                        <h3 style="margin-bottom: 12px; font-size: 1.4rem; color: var(--primary-dark);"><?php echo esc_html($t_title); ?></h3>
                        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px;"><?php echo esc_html($t_desc); ?></p>
                        <div class="course-footer" style="padding-top: 20px; border-top: 1px solid #eee;">
                            <a href="/school-tuitions" class="course-link" style="color:var(--primary); font-weight:700;">View Curriculum &rarr;</a>
                        </div>
                    </div>
                </div>
                <?php endif; } ?>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
