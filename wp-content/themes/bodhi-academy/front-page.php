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
    
    <!-- News Ticker Section -->
    <div class="news-ticker-wrapper" style="background: var(--primary-dark); padding: 15px 0; border-bottom: 2px solid var(--accent); overflow: hidden;">
        <div class="container" style="display: flex; align-items: center; gap: 30px;">
            <div class="news-label" style="background: var(--accent); color: #000; padding: 5px 20px; border-radius: 5px; font-weight: 800; font-size: 0.8rem; text-transform: uppercase; white-space: nowrap; box-shadow: 0 4px 10px rgba(255,193,7,0.3);">
                <i class="fas fa-bullhorn" style="margin-right: 8px;"></i> <?php echo get_field('home_news_title') ?: 'Latest News'; ?>
            </div>
            <div class="ticker-content" style="flex: 1; overflow: hidden; position: relative; height: 30px;">
                <div class="ticker-inner animate-scroll" style="display: flex; gap: 100px; white-space: nowrap; align-items: center; color: white; font-weight: 500; font-size: 0.95rem;">
                    <span><?php echo get_field('home_news_1') ?: 'NEET UG 2026: Registration LIVE - Ends March 8, 2026'; ?></span>
                    <span><?php echo get_field('home_news_2') ?: 'JEE Main 2026 (Session 2): Registration LIVE - Ends Feb 25'; ?></span>
                    <span><?php echo get_field('home_news_3') ?: 'ISI Admission Test 2026: Registration LIVE - Exam May 10'; ?></span>
                    <!-- Loop back for seamless scrolling -->
                    <span><?php echo get_field('home_news_1') ?: 'NEET UG 2026: Registration LIVE - Ends March 8, 2026'; ?></span>
                </div>
            </div>
        </div>
    </div>

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
                    
                    <div class="pillars-grid" style="margin-top:40px; display:grid; grid-template-columns: 1fr 1fr; gap:25px;">
                        <div class="pillar-item animate-fade-up" style="background: white; padding: 25px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); transition: 0.3s;">
                            <div style="width:50px; height:50px; background:rgba(0,150,136,0.1); border-radius:15px; display:flex; align-items:center; justify-content:center; color:var(--primary); margin-bottom:15px;"><i class="fas fa-chalkboard-teacher fa-lg"></i></div>
                            <h3 style="font-size:1.1rem; margin-bottom:8px;"><?php echo get_field('why_1_title') ?: 'Mentorship Driven'; ?></h3>
                            <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;"><?php echo get_field('why_1_desc') ?: 'Expert mentors bridge the gap between school theory and entrance application.'; ?></p>
                        </div>
                        <div class="pillar-item animate-fade-up delay-100" style="background: white; padding: 25px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); transition: 0.3s;">
                            <div style="width:50px; height:50px; background:rgba(0,150,136,0.1); border-radius:15px; display:flex; align-items:center; justify-content:center; color:var(--primary); margin-bottom:15px;"><i class="fas fa-spa fa-lg"></i></div>
                            <h3 style="font-size:1.1rem; margin-bottom:8px;"><?php echo get_field('why_2_title') ?: 'Focus & Wellness'; ?></h3>
                            <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;"><?php echo get_field('why_2_desc') ?: 'Integrated meditation and stress management for peak academic performance.'; ?></p>
                        </div>
                        <div class="pillar-item animate-fade-up delay-200" style="background: white; padding: 25px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); transition: 0.3s;">
                            <div style="width:50px; height:50px; background:rgba(0,150,136,0.1); border-radius:15px; display:flex; align-items:center; justify-content:center; color:var(--primary); margin-bottom:15px;"><i class="fas fa-chart-pie fa-lg"></i></div>
                            <h3 style="font-size:1.1rem; margin-bottom:8px;"><?php echo get_field('why_3_title') ?: 'Smart Analytics'; ?></h3>
                            <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;"><?php echo get_field('why_3_desc') ?: 'Meticulous result analysis to identify and refine your innate potential.'; ?></p>
                        </div>
                        <div class="pillar-item animate-fade-up delay-300" style="background: white; padding: 25px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); transition: 0.3s;">
                            <div style="width:50px; height:50px; background:rgba(0,150,136,0.1); border-radius:15px; display:flex; align-items:center; justify-content:center; color:var(--primary); margin-bottom:15px;"><i class="fas fa-palette fa-lg"></i></div>
                            <h3 style="font-size:1.1rem; margin-bottom:8px;"><?php echo get_field('why_4_title') ?: 'Creative Learning'; ?></h3>
                            <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;"><?php echo get_field('why_4_desc') ?: 'Scientific methodologies and rhythmic learning environments for better retention.'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
