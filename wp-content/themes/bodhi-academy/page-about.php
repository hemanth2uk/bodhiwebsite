<?php
/**
 * Template Name: About Us
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Page Header -->
    <?php
        $about_bg = get_field('about_hero_image') ?: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1920';
    ?>
    <section class="about-hero" style="background: linear-gradient(rgba(0,55,50,0.8), rgba(0,55,50,0.9)), url('<?php echo esc_url($about_bg); ?>'); background-size: cover; background-position: center; color: white; padding: 120px 0 80px; text-align: center;">
        <div class="container animate-fade-in">
            <h1 style="color: white;"><?php echo get_field('about_hero_title') ?: 'About <span class="text-accent" style="color:var(--accent);">Bodhi Education</span>'; ?></h1>
            <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem;"><?php echo get_field('about_hero_subtitle') ?: "Kerala's Pioneering Educational Research and Development Platform"; ?></p>
        </div>
    </section>

    <!-- Main About Section -->
    <section class="section-padding">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
                <div class="animate-fade-up">
                    <?php 
                        $main_img = get_field('about_main_image') ?: 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800';
                    ?>
                    <img src="<?php echo esc_url($main_img); ?>" alt="About Bodhi" style="border-radius: 30px; box-shadow: 0 20px 60px rgba(0,91,79,0.15); width: 100%;">
                </div>
                <div class="animate-fade-up delay-100">
                    <h2 style="margin-bottom: 30px;"><?php echo get_field('about_main_title') ?: 'Who We Are'; ?></h2>
                    <div style="font-size: 1.05rem; line-height: 1.8; color: var(--text-muted);">
                        <?php echo get_field('about_main_content') ?: '<p>Bodhi Education is dedicated to empowering students through innovative learning solutions.</p>'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="mission-vision section-padding bg-offset" style="position: relative; overflow: hidden;">
        <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(0, 91, 79, 0.03); border-radius: 50%; pointer-events: none;"></div>

        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                <!-- Mission Card -->
                <div class="mv-card animate-fade-up" style="background: white; padding: 40px; border-radius: 20px; box-shadow: var(--shadow-card); border-top: 5px solid var(--primary); transition: 0.3s; position: relative; z-index: 2;">
                    <div style="width: 60px; height: 60px; background: var(--primary-light); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--primary); margin-bottom: 25px; font-size: 1.5rem;">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;"><?php echo get_field('about_mission_title') ?: 'Our Mission'; ?></h3>
                    <p style="color: var(--text-muted); line-height: 1.8; font-size: 1.05rem;">
                        <?php echo get_field('about_mission_text') ?: "To provide the best quality classes, students support, mentorship and high-power coaching."; ?>
                    </p>
                </div>

                <!-- Vision Card -->
                <div class="mv-card animate-fade-up delay-100" style="background: white; padding: 40px; border-radius: 20px; box-shadow: var(--shadow-card); border-top: 5px solid var(--accent); transition: 0.3s; position: relative; z-index: 2;">
                    <div style="width: 60px; height: 60px; background: #fffbec; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--accent); margin-bottom: 25px; font-size: 1.5rem;">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;"><?php echo get_field('about_vision_title') ?: 'Our Vision'; ?></h3>
                    <p style="color: var(--text-muted); line-height: 1.8; font-size: 1.05rem;">
                        <?php echo get_field('about_vision_text') ?: "To become a transformative human resource development platform."; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <?php if(get_field('about_philosophy_content')): ?>
    <section class="section-padding">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_field('about_philosophy_title') ?: 'Our Philosophy & Approach'; ?></h2>
            </div>
            <div style="background: linear-gradient(135deg, #e0f2f1 0%, #ffffff 100%); padding: 50px; border-radius: 30px; box-shadow: var(--shadow-card); border-left: 6px solid var(--primary);">
                <div style="font-size: 1.05rem; line-height: 1.9; color: #333;">
                    <?php echo get_field('about_philosophy_content'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Founder Section -->
    <section class="section-padding bg-offset">
        <div class="container">
            <div style="display: grid; grid-template-columns: 350px 1fr; gap: 60px; align-items: center;">
                <div class="animate-fade-up">
                    <?php 
                        $founder_photo = get_field('founder_photo') ?: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400';
                    ?>
                    <div style="position: relative;">
                        <img src="<?php echo esc_url($founder_photo); ?>" alt="<?php echo get_field('founder_name') ?: 'Founder'; ?>" style="border-radius: 20px; box-shadow: 0 20px 60px rgba(0,91,79,0.2); width: 100%; aspect-ratio: 3/4; object-fit: cover;">
                        <div style="position: absolute; bottom: -20px; left: 50%; transform: translateX(-50%); background: white; padding: 15px 30px; border-radius: 50px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; white-space: nowrap;">
                            <p style="font-weight: 800; color: var(--primary); margin: 0; font-size: 1.1rem;"><?php echo get_field('founder_name') ?: 'Founder Name'; ?></p>
                            <p style="font-size: 0.9rem; color: var(--text-muted); margin: 5px 0 0 0;"><?php echo get_field('founder_title') ?: 'Founder & Director'; ?></p>
                        </div>
                    </div>
                </div>
                <div class="animate-fade-up delay-100">
                    <h2 style="margin-bottom: 25px;">Message from the Founder</h2>
                    <div style="font-size: 1.05rem; line-height: 1.9; color: var(--text-muted); margin-bottom: 30px;">
                        <?php 
                            $founder_msg = get_field('founder_message');
                            if($founder_msg) {
                                echo $founder_msg;
                            } else {
                                echo '<p>At Bodhi Education, we believe in nurturing every student\'s unique potential. Our commitment is to provide world-class education that transforms lives and builds futures.</p>';
                            }
                        ?>
                    </div>
                    <?php 
                        $sig_img = get_field('founder_signature');
                        if($sig_img):
                    ?>
                    <img src="<?php echo esc_url($sig_img); ?>" alt="Signature" style="opacity: 0.7; width: 150px;">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Programmes Overview -->
    <?php if(get_field('about_programmes_desc')): ?>
    <section class="section-padding">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_field('about_programmes_title') ?: 'Our Programmes'; ?></h2>
            </div>
            <div style="background: white; padding: 50px; border-radius: 30px; box-shadow: var(--shadow-card); border-top: 5px solid var(--accent);">
                <div style="font-size: 1.05rem; line-height: 1.9; color: #444;">
                    <?php echo nl2br(get_field('about_programmes_desc')); ?>
                </div>
                <div style="margin-top: 40px; text-align: center;">
                    <a href="/programmes" class="btn" style="padding: 18px 50px; border-radius: 50px; font-size: 1.15rem; box-shadow: 0 10px 30px rgba(0,91,79,0.2); display: inline-flex; align-items: center; gap: 12px;">
                        <i class="fas fa-graduation-cap"></i>
                        Explore Our Programmes
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Infrastructure -->
    <section class="section-padding bg-offset">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_field('infra_title') ?: 'Our Infrastructure'; ?></h2>
                <p><?php echo get_field('infra_desc') ?: 'State-of-the-art facilities for focused learning.'; ?></p>
            </div>
             <div class="courses-grid">
                <!-- Item 1 -->
                <?php $img1 = get_field('infra_1_image') ?: 'https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=600'; ?>
                <div class="animate-fade-up" style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-card); transition: transform 0.3s;">
                    <img src="<?php echo esc_url($img1); ?>" alt="Infra 1" style="height: 250px; width: 100%; object-fit: cover;">
                    <div style="padding: 20px; background: white;"><h3><?php echo get_field('infra_1_title') ?: 'Smart Classrooms'; ?></h3></div>
                </div>
                
                <!-- Item 2 -->
                <?php $img2 = get_field('infra_2_image') ?: 'https://images.unsplash.com/photo-1568667256549-094345857637?auto=format&fit=crop&w=600'; ?>
                <div class="animate-fade-up delay-100" style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-card); transition: transform 0.3s;">
                    <img src="<?php echo esc_url($img2); ?>" alt="Infra 2" style="height: 250px; width: 100%; object-fit: cover;">
                     <div style="padding: 20px; background: white;"><h3><?php echo get_field('infra_2_title') ?: 'Digital Library'; ?></h3></div>
                </div>

                <!-- Item 3 -->
                <?php $img3 = get_field('infra_3_image') ?: 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=600'; ?>
                <div class="animate-fade-up delay-200" style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-card); transition: transform 0.3s;">
                    <img src="<?php echo esc_url($img3); ?>" alt="Infra 3" style="height: 250px; width: 100%; object-fit: cover;">
                     <div style="padding: 20px; background: white;"><h3><?php echo get_field('infra_3_title') ?: 'Science Labs'; ?></h3></div>
                </div>
             </div>
        </div>
    </section>

    <style>
        .mv-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,91,79,0.15) !important;
        }
        
        .courses-grid > div:hover {
            transform: translateY(-8px);
        }
    </style>

</main>

<?php get_footer(); ?>
