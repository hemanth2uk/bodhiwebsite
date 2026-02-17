<?php
/**
 * Template Name: Courses
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Banner -->
    <section class="about-hero" style="background: linear-gradient(rgba(0,55,50,0.8), rgba(0,55,50,0.9)), url('<?php echo get_field('courses_hero_image') ?: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1920'; ?>'); background-size: cover; background-position: center; color: white; padding: 140px 0 100px; text-align: center;">
        <div class="container animate-fade-in">
            <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem;">Education Reimagined</span>
            <h1 style="color: white; font-size: 3.5rem; margin: 15px 0 25px; font-weight: 800;"><?php echo get_field('courses_hero_title') ?: 'Comprehensive Course Ecosystem'; ?></h1>
            <p style="color: rgba(255,255,255,0.9); font-size: 1.25rem; max-width: 800px; margin: 0 auto; line-height: 1.6;"><?php echo get_field('courses_hero_desc') ?: 'From childhood curiosity to career-defining exams, we guide every step of your academic journey.'; ?></p>
        </div>
    </section>

    <!-- Interactive Course Navigator -->
    <section class="section-padding bg-light" style="padding-top: 80px;">
        <div class="container">
            <div class="section-header text-center mb-5 animate-fade-up">
                <h2 style="font-size: 2.5rem; color: var(--primary); font-weight: 800;">Choose Your Academic Pathway</h2>
                <p style="color: var(--text-muted); max-width: 700px; margin: 20px auto;">Click on a category to explore our specialized methodology and philosophy.</p>
                <div style="width: 60px; height: 4px; background: var(--accent); margin: 20px auto; border-radius: 2px;"></div>
            </div>

            <!-- Tab Navigation -->
            <div class="course-tabs" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-bottom: 60px;">
                <?php 
                $types = [
                    'pre' => 'Pre-Foundation',
                    'found' => 'Foundation',
                    'long' => 'Long-Term',
                    'crash' => 'Crash Course',
                    'rep' => 'Repeaters',
                    'tuit' => 'Tuition',
                    'bridge' => 'Bridge Course'
                ];
                $first = true;
                foreach($types as $key => $label):
                ?>
                <button class="course-tab-btn <?php echo $first ? 'active' : ''; ?> animate-fade-up" 
                        onclick="showCourse('<?php echo $key; ?>', this)"
                        style="padding: 12px 25px; border-radius: 50px; border: 2px solid var(--primary); background: transparent; color: var(--primary); font-weight: 700; transition: all 0.3s; cursor: pointer;">
                    <?php echo $label; ?>
                </button>
                <?php $first = false; endforeach; ?>
            </div>

            <!-- Tab Content -->
            <div id="course-content-area" class="animate-fade-in" style="min-height: 600px;">
                <?php 
                $first = true;
                foreach($types as $key => $label):
                    $title = get_field('cd_'.$key.'_title');
                    if(!$title) continue;
                ?>
                <div id="course-<?php echo $key; ?>" class="course-panel" style="<?php echo $first ? 'display: block;' : 'display: none;'; ?>">
                    
                    <?php 
                    $course_image = get_field('cd_'.$key.'_image');
                    // Fallback images for each category
                    $fallback_images = [
                        'pre' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1920',
                        'found' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=1920',
                        'long' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1920',
                        'crash' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=1920',
                        'rep' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1920',
                        'tuit' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1920',
                        'bridge' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1920'
                    ];
                    if(!$course_image) $course_image = $fallback_images[$key];
                    ?>
                    
                    <!-- Hero Image Section -->
                    <div class="course-hero animate-fade-up" style="position: relative; height: 400px; border-radius: 30px; overflow: hidden; margin-bottom: 50px; box-shadow: 0 20px 60px rgba(0,91,79,0.15);">
                        <img src="<?php echo esc_url($course_image); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(0,91,79,0.85) 0%, rgba(0,55,50,0.7) 100%); display: flex; align-items: center; justify-content: center; padding: 40px;">
                            <div style="text-align: center; color: white;">
                                <span style="display: inline-block; background: var(--accent); color: #000; padding: 8px 20px; border-radius: 50px; font-weight: 700; font-size: 0.9rem; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(255,193,7,0.4);"><?php echo get_field('cd_'.$key.'_target'); ?></span>
                                <h3 style="font-size: 2.8rem; color: white; margin: 0; font-weight: 900; line-height: 1.2; text-shadow: 0 4px 20px rgba(0,0,0,0.3);"><?php echo $title; ?></h3>
                            </div>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 50px; margin-bottom: 50px;">
                        
                        <!-- Left: Description & Significance -->
                        <div class="animate-fade-up delay-100">
                            <div style="background: white; padding: 45px; border-radius: 30px; box-shadow: var(--shadow-card); margin-bottom: 30px; border-top: 5px solid var(--primary);">
                                <h4 style="color: var(--primary); font-weight: 800; margin-bottom: 20px; font-size: 1.5rem; display: flex; align-items: center; gap: 12px;">
                                    <i class="fas fa-info-circle" style="color: var(--accent);"></i>
                                    What is This?
                                </h4>
                                <div style="font-size: 1.05rem; line-height: 1.8; color: #444;">
                                    <?php echo nl2br(get_field('cd_'.$key.'_desc')); ?>
                                </div>
                            </div>
                            
                            <div style="background: linear-gradient(135deg, #e0f2f1 0%, #ffffff 100%); padding: 45px; border-radius: 30px; box-shadow: var(--shadow-card); border-left: 6px solid var(--accent);">
                                <h4 style="color: var(--primary); font-weight: 800; margin-bottom: 20px; font-size: 1.5rem; display: flex; align-items: center; gap: 12px;">
                                    <i class="fas fa-star" style="color: var(--accent);"></i>
                                    Why It Matters
                                </h4>
                                <div style="line-height: 1.8; color: #333; font-size: 1.05rem;">
                                    <?php echo nl2br(get_field('cd_'.$key.'_signif')); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Methodology Points -->
                        <div class="animate-fade-up delay-200">
                            <h4 style="font-size: 1.7rem; color: var(--primary); font-weight: 800; margin-bottom: 35px; padding-left: 25px; border-left: 5px solid var(--accent); display: flex; align-items: center; gap: 12px;">
                                <i class="fas fa-lightbulb" style="color: var(--accent);"></i>
                                The Bodhi Way
                            </h4>
                            <div style="display: grid; gap: 20px;">
                                <?php 
                                $points = explode("\n\n", get_field('cd_'.$key.'_points'));
                                $icons = ['fa-check-circle', 'fa-brain', 'fa-heart', 'fa-chart-line', 'fa-users', 'fa-trophy'];
                                foreach($points as $idx => $point):
                                    $p_parts = explode(':', $point, 2);
                                    $icon = $icons[$idx % count($icons)];
                                ?>
                                <div class="glass-card" style="padding: 30px; border-radius: 20px; transition: all 0.3s; background: white; box-shadow: 0 5px 20px rgba(0,91,79,0.08); border-left: 4px solid var(--primary);">
                                    <div style="display: flex; gap: 20px; align-items: start;">
                                        <div style="flex-shrink: 0; width: 45px; height: 45px; background: linear-gradient(135deg, var(--primary), #00695c); border-radius: 12px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,91,79,0.2);">
                                            <i class="fas <?php echo $icon; ?>" style="color: white; font-size: 1.1rem;"></i>
                                        </div>
                                        <div style="flex: 1;">
                                            <?php if(count($p_parts) > 1): ?>
                                                <h5 style="color: var(--primary-dark); font-weight: 800; margin-bottom: 10px; font-size: 1.15rem;"><?php echo trim($p_parts[0]); ?></h5>
                                                <p style="font-size: 0.98rem; line-height: 1.6; color: var(--text-muted); margin: 0;"><?php echo trim($p_parts[1]); ?></p>
                                            <?php else: ?>
                                                <p style="font-size: 0.98rem; line-height: 1.6; color: var(--text-muted); margin: 0;"><?php echo $point; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                    
                    <div style="margin-top: 60px; text-align: center; padding: 50px; background: linear-gradient(135deg, rgba(0,91,79,0.05), rgba(255,193,7,0.05)); border-radius: 30px;">
                        <h4 style="color: var(--primary); font-size: 1.8rem; margin-bottom: 20px; font-weight: 800;">Ready to Begin Your Journey?</h4>
                        <p style="color: var(--text-muted); margin-bottom: 30px; font-size: 1.1rem;">Join thousands of successful students who chose the Bodhi path.</p>
                        <a href="/contact-us" class="btn" style="padding: 18px 50px; border-radius: 50px; font-size: 1.15rem; box-shadow: 0 10px 30px rgba(0,91,79,0.2); display: inline-flex; align-items: center; gap: 12px;">
                            <i class="fas fa-rocket"></i>
                            Enroll in <?php echo $label; ?>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                <?php $first = false; endforeach; ?>
            </div>

        </div>
    </section>

    <style>
        .course-tab-btn.active {
            background: var(--primary) !important;
            color: white !important;
            box-shadow: 0 10px 20px rgba(0,91,79,0.2);
            transform: translateY(-3px);
        }
        .course-tab-btn:hover:not(.active) {
            background: rgba(0,91,79,0.05);
            transform: translateY(-2px);
        }
        .course-panel { display: none; }
        .course-panel.active { display: block; }
        
        /* Enhanced hover effects */
        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,91,79,0.15) !important;
        }
        
        .course-hero img {
            transition: transform 0.5s ease;
        }
        
        .course-hero:hover img {
            transform: scale(1.05);
        }
        
        #course-content-area {
            transition: opacity 0.3s ease;
        }
    </style>

    <script>
        function showCourse(key, btn) {
            // Update Buttons
            document.querySelectorAll('.course-tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Update Content with transition
            const area = document.getElementById('course-content-area');
            area.style.opacity = '0';
            
            setTimeout(() => {
                document.querySelectorAll('.course-panel').forEach(p => p.style.display = 'none');
                const target = document.getElementById('course-' + key);
                if(target) {
                    target.style.display = 'block';
                    area.style.opacity = '1';
                }
            }, 300);
        }
    </script>

</main>

<?php get_footer(); ?>
