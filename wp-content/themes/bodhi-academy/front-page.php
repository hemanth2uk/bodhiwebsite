<?php
/**
 * Template Name: Front Page v6 (Animated Bodhi)
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Section with Animations -->
    <!-- Modern Hero (Glassmorphism) -->
    <!-- Hero Section with Animations -->
    <!-- Modern Hero (Glassmorphism) -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-grid">
                <!-- Left Content: Text & Buttons -->
                <div class="hero-content">
                    <span class="badge animate-fade-up" style="background: rgba(255,193,7,0.2); color: #b45309; padding: 6px 16px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; margin-bottom: 20px; display: inline-block;">
                        <i class="fas fa-leaf" style="margin-right:8px;"></i> <?php echo get_field('hero_badge_text') ?: 'Knowledge is Power'; ?>
                    </span>
                    <h1 class="animate-fade-up delay-100">
                        <?php echo get_field('hero_title') ?: 'Awaken the'; ?> <br>
                        <span><?php echo get_field('hero_subtitle') ?: 'Genius Within'; ?></span>
                    </h1>
                    <p class="hero-text animate-fade-up delay-200">
                        <?php echo get_field('hero_description') ?: 'Like the Bodhi tree symbolizing enlightenment, Bodhi Academy nurtures your potential. Experience world-class coaching for NEET, JEE, and Entrance Exams in a serene, focused environment.'; ?>
                    </p>
                    <div class="animate-fade-up delay-300" style="display: flex; gap: 15px;">
                        <a href="<?php echo site_url(get_field('hero_btn_1_link') ?: '/courses'); ?>" class="btn btn-primary" style="padding: 15px 35px; font-size: 1rem; box-shadow: 0 10px 25px rgba(0,91,79,0.3);"><?php echo get_field('hero_btn_1_text') ?: 'Explore Courses'; ?></a>
                        <a href="<?php echo site_url(get_field('hero_btn_2_link') ?: '/contact'); ?>" class="btn btn-outline" style="padding: 15px 35px; font-size: 1rem;"><?php echo get_field('hero_btn_2_text') ?: 'Join Our Family'; ?></a>
                    </div>
                </div>
                
                <!-- Right Visual: Image + Floating Glass Card -->
                <div class="hero-visual animate-float">
                    <!-- Golden Buddha Image -->
                    <?php 
                        $hero_img = get_field('hero_image');
                        if( ! $hero_img ) {
                            $hero_img = 'https://images.pexels.com/photos/1797161/pexels-photo-1797161.jpeg?auto=compress&cs=tinysrgb&w=800';
                        }
                    ?>
                    <img src="<?php echo esc_url($hero_img); ?>" alt="Hero Image" class="hero-img-main">
                    
                    <!-- Glass Stats Card (Floating Over Image) -->
                    <div class="stats-glass-card animate-fade-in delay-300">
                        <div class="stat-item">
                            <span class="stat-val"><?php echo get_field('stat_students') ?: '5k+'; ?></span>
                            <span class="stat-label">Students</span>
                        </div>
                        <div style="width: 1px; height: 40px; background: rgba(0,0,0,0.1);"></div>
                        <div class="stat-item">
                            <span class="stat-val"><?php echo get_field('stat_gurus') ?: '120+'; ?></span>
                            <span class="stat-label">Gurus</span>
                        </div>
                        <div style="width: 1px; height: 40px; background: rgba(0,0,0,0.1);"></div>
                        <div class="stat-item">
                            <span class="stat-val"><?php echo get_field('stat_success') ?: '98%'; ?></span>
                            <span class="stat-label">Success</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header animate-fade-up">
                <h2><?php echo get_field('courses_title') ?: 'Pathways to Success'; ?></h2>
                <p><?php echo get_field('courses_desc') ?: 'Choose the right path for your academic journey.'; ?></p>
            </div>
            
            <div class="courses-grid">
                <?php for($i=1; $i<=6; $i++): 
                    $def_title = ['','NEET Regular','JEE Advanced','NEET Repeaters','Class 8-10','CUET / KEAM','Crash Courses'][$i];
                    $def_badge = ['','Medical','Engineering','Repeaters','Foundation','Entrance','Short Term'][$i];
                    $def_img   = ['','https://images.unsplash.com/photo-1627556592933-ffe99c1cd9eb','https://images.unsplash.com/photo-1581092160562-40aa08e78837','https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8','https://images.unsplash.com/photo-1491841550275-ad7854e35ca6','https://images.unsplash.com/photo-1523580494863-6f3031224c94','https://images.unsplash.com/photo-1517245386807-bb43f82c33c4'][$i];
                    
                    $img = get_field('c'.$i.'_img') ?: $def_img . '?auto=format&fit=crop&w=600&q=80';
                ?>
                <div class="course-card animate-fade-up delay-100">
                    <div class="course-thumb">
                        <img src="<?php echo esc_url($img); ?>" alt="Course <?php echo $i; ?>">
                    </div>
                    <div class="course-body">
                        <span class="course-badge"><?php echo get_field('c'.$i.'_badge') ?: $def_badge; ?></span>
                        <h3><?php echo get_field('c'.$i.'_title') ?: $def_title; ?></h3>
                        <p><?php echo get_field('c'.$i.'_desc') ?: 'Leading course for success.'; ?></p>
                        <div class="course-footer">
                            <span style="font-weight:600; font-size:0.9rem;"><?php echo $def_badge; ?></span>
                            <a href="#" class="course-link">Details <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            
            <div style="text-align:center; margin-top:50px;">
                <a href="<?php echo site_url('/courses'); ?>" class="btn btn-outline" style="padding: 15px 40px;">View Full Curriculum</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="section-padding bg-offset" style="position:relative; overflow:hidden;">
        <!-- Delicate Background Graphic -->
        <div style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:0.03; background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Bodhi_Leaf_Silhouette.svg/1200px-Bodhi_Leaf_Silhouette.svg.png') no-repeat center center; background-size: contain; pointer-events: none;"></div>
        
        <div class="container">
            <div class="hero-grid">
                <div class="hero-image-wrapper animate-fade-up">
                    <?php 
                        $why_img = get_field('why_choose_image');
                        if( ! $why_img ) {
                            $why_img = 'https://images.unsplash.com/photo-1531545514256-b1400bc00f31?auto=format&fit=crop&w=800&q=80';
                        }
                    ?>
                    <img src="<?php echo esc_url($why_img); ?>" alt="Meditation/Study" class="hero-img-real">
                </div>
                <div class="hero-content">
                    <span style="color:var(--primary); font-weight:700; text-transform:uppercase; letter-spacing:1px; font-size:0.9rem;">The Bodhi Advantage</span>
                    <h2 style="margin-top:10px;">
                        <?php echo get_field('why_choose_title') ?: 'Education that <br> Enlightens'; ?>
                    </h2>
                    
                    <div style="margin-top:30px; display:flex; flex-direction:column; gap:20px;">
                        <div style="display:flex; gap:20px;">
                            <div style="min-width:50px; height:50px; background:white; border-radius:50%; display:flex; align-items:center; justify-content:center; color:var(--primary); box-shadow:0 5px 15px rgba(0,0,0,0.05);"><i class="fas fa-brain"></i></div>
                            <div>
                                <h3><?php echo get_field('why_1_title') ?: 'Concept Mastery'; ?></h3>
                                <p style="font-size:0.95rem; color:var(--text-muted);"><?php echo get_field('why_1_desc') ?: 'We don\'t just teach for exams; we teach for deep understanding and long-term retention.'; ?></p>
                            </div>
                        </div>
                        <div style="display:flex; gap:20px;">
                            <div style="min-width:50px; height:50px; background:white; border-radius:50%; display:flex; align-items:center; justify-content:center; color:var(--primary); box-shadow:0 5px 15px rgba(0,0,0,0.05);"><i class="fas fa-users-cog"></i></div>
                            <div>
                                <h3><?php echo get_field('why_2_title') ?: 'Holistic Mentorship'; ?></h3>
                                <p style="font-size:0.95rem; color:var(--text-muted);"><?php echo get_field('why_2_desc') ?: 'Guidance that goes beyond academics, helping students manage stress and stay motivated.'; ?></p>
                            </div>
                        </div>
                        <div style="display:flex; gap:20px;">
                            <div style="min-width:50px; height:50px; background:white; border-radius:50%; display:flex; align-items:center; justify-content:center; color:var(--primary); box-shadow:0 5px 15px rgba(0,0,0,0.05);"><i class="fas fa-laptop"></i></div>
                            <div>
                                <h3><?php echo get_field('why_3_title') ?: 'Digital & Physical'; ?></h3>
                                <p style="font-size:0.95rem; color:var(--text-muted);"><?php echo get_field('why_3_desc') ?: 'Seamlessly integrated app and classroom experience for 24/7 learning.'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
