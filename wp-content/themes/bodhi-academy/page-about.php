<?php
/**
 * Template Name: About Us
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Page Header -->
    <!-- Page Header -->
    <?php
        $about_bg = get_field('about_hero_image') ?: 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1920';
    ?>
    <section class="about-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo esc_url($about_bg); ?>'); background-size: cover; background-position: center; color: white; padding: 100px 0;">
        <div class="container">
            <h1 style="color: white;"><?php echo get_field('about_hero_title') ?: 'About <span class="text-accent" style="color:var(--accent);">Bodhi Academy</span>'; ?></h1>
            <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem;"><?php echo get_field('about_hero_subtitle') ?: 'Empowering minds, Transforming lives since 2010.'; ?></p>
        </div>
    </section>

    <!-- Our Story -->
    <section class="section-padding">
        <div class="container">
            <div class="hero-grid">
                <div class="about-image">
                   <?php 
                       $legacy_img = get_field('legacy_side_image') ?: 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=800';
                   ?>
                   <img src="<?php echo esc_url($legacy_img); ?>" alt="Campus Building" style="border-radius: 16px; box-shadow: var(--shadow-card);">
                </div>
                <div class="about-content">
                    <h2><?php echo get_field('legacy_title') ?: 'Our Legacy'; ?></h2>
                    <?php 
                        $legacy_text = get_field('legacy_text');
                        if($legacy_text) {
                            echo $legacy_text;
                        } else {
                            echo '<p>Bodhi Academy was founded with the vision of providing high-quality, accessible education to aspirants of competitive examinations. Over the years, we have evolved into a center of excellence, known for our rigorous academic standards and student-centric approach.</p>
                            <p>We believe that every student has the potential to achieve greatness. Our role is to provide the guidance, resources, and environment to unlock that potential.</p>';
                        }
                    ?>
                    
                    <div style="margin-top: 30px;">
                        <?php 
                            $sig_img = get_field('founder_signature') ?: 'https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=200';
                        ?>
                        <img src="<?php echo esc_url($sig_img); ?>" alt="Signature" style="opacity: 0.7; width: 150px;">
                        <p style="font-weight: 600; font-size: 0.9rem;"><?php echo get_field('founder_name') ?: 'Dr. A. Kumar, Founder'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <div style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-card);">
                    <img src="<?php echo esc_url($img1); ?>" alt="Infra 1" style="height: 250px; width: 100%; object-fit: cover;">
                    <div style="padding: 15px; background: white;"><h3><?php echo get_field('infra_1_title') ?: 'Smart Classrooms'; ?></h3></div>
                </div>
                
                <!-- Item 2 -->
                <?php $img2 = get_field('infra_2_image') ?: 'https://images.unsplash.com/photo-1568667256549-094345857637?auto=format&fit=crop&w=600'; ?>
                <div style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-card);">
                    <img src="<?php echo esc_url($img2); ?>" alt="Infra 2" style="height: 250px; width: 100%; object-fit: cover;">
                     <div style="padding: 15px; background: white;"><h3><?php echo get_field('infra_2_title') ?: 'Digital Library'; ?></h3></div>
                </div>

                <!-- Item 3 -->
                <?php $img3 = get_field('infra_3_image') ?: 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=600'; ?>
                <div style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-card);">
                    <img src="<?php echo esc_url($img3); ?>" alt="Infra 3" style="height: 250px; width: 100%; object-fit: cover;">
                     <div style="padding: 15px; background: white;"><h3><?php echo get_field('infra_3_title') ?: 'Science Labs'; ?></h3></div>
                </div>
             </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
