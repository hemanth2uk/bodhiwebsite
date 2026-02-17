<?php
/**
 * Template Name: Offline Centers
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Unified Hero Section -->
    <?php 
    $hero_img = get_field('offline_hero_image') ?: 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1920';
    ?>
    <section class="about-hero" style="background: linear-gradient(rgba(0,55,50,0.8), rgba(0,55,50,0.9)), url('<?php echo esc_url($hero_img); ?>'); background-size: cover; background-position: center; color: white; padding: 120px 0 80px; text-align: center;">
        <div class="container animate-fade-in">
            <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem;">Physical Learning Hubs</span>
            <h1 style="font-size: 3.5rem; margin: 10px 0 20px; color: white;"><?php echo get_field('offline_hero_title') ?: 'Bodhi Offline Science Centers'; ?></h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 800px; margin: 0 auto;"><?php echo get_field('offline_hero_desc') ?: 'Where Focus Finds a Home. A sanctuary for academic mastery and personal growth.'; ?></p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center mb-5 animate-fade-up">
                <h2 style="font-size: 2.5rem; color: var(--primary); font-weight: 800;"><?php echo get_field('offline_content_title') ?: 'A Unified Ecosystem of Excellence'; ?></h2>
                <p style="color: var(--text-muted); max-width: 800px; margin: 20px auto; font-size: 1.1rem;"><?php echo get_field('offline_intro_text') ?: 'Our physical centers house all our specialized streams under one roof, ensuring a continuous journey of growth.'; ?></p>
                <div style="width: 60px; height: 4px; background: var(--accent); margin: 20px auto; border-radius: 2px;"></div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px;">
                <?php for($i=1; $i<=6; $i++): $item = get_field('offline_item_'.$i); if($item): ?>
                <div class="glass-card animate-fade-up delay-<?php echo $i*100; ?>" style="padding: 40px; border-radius: 24px; background: white; box-shadow: var(--shadow-card);">
                    <?php 
                    $parts = explode(':', $item, 2);
                    if(count($parts) > 1):
                    ?>
                        <h3 style="margin-bottom: 15px; font-size: 1.4rem; color: var(--primary); font-weight: 700;"><?php echo trim($parts[0]); ?></h3>
                        <p style="color: var(--text-muted); line-height: 1.7;"><?php echo trim($parts[1]); ?></p>
                    <?php else: ?>
                        <p style="color: var(--text-muted); line-height: 1.7;"><?php echo $item; ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>

    <!-- Advantage Section -->
    <section class="section-padding bg-offset" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(255,255,255,0.03); border-radius: 50%;"></div>
        <div class="container">
            <div class="section-header text-center mb-5 animate-fade-up">
                <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase;">Direct Mentorship</span>
                <h2 style="font-size: 2.5rem; color: white; font-weight: 800; margin-top: 15px;"><?php echo get_field('offline_adv_title') ?: 'The Bodhi Offline Advantage'; ?></h2>
                <div style="width: 60px; height: 4px; background: var(--accent); margin: 20px auto; border-radius: 2px;"></div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                <?php for($j=1; $j<=3; $j++): $adv = get_field('offline_adv_'.$j); if($adv): ?>
                <div class="why-item animate-fade-up delay-<?php echo ($j+3)*100; ?>" style="background: rgba(255,255,255,0.05); padding: 40px; border-radius: 25px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
                    <?php 
                    $f_parts = explode(':', $adv, 2);
                    if(count($f_parts) > 1):
                    ?>
                        <h4 style="font-weight: 800; color: var(--accent); margin-bottom: 15px; font-size: 1.3rem;"><?php echo trim($f_parts[0]); ?></h4>
                        <p style="color: rgba(255,255,255,0.85); line-height: 1.7; font-size: 1rem;"><?php echo trim($f_parts[1]); ?></p>
                    <?php else: ?>
                        <p style="color: rgba(255,255,255,0.85); line-height: 1.7; font-size: 1rem;"><?php echo $adv; ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
