<?php
/**
 * Template Name: Bodhi Online
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Unified Hero Section -->
    <?php 
    $hero_img = get_field('online_hero_image') ?: 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=1920';
    ?>
    <section class="about-hero" style="background: linear-gradient(rgba(0,55,50,0.8), rgba(0,55,50,0.9)), url('<?php echo esc_url($hero_img); ?>'); background-size: cover; background-position: center; color: white; padding: 120px 0 80px; text-align: center;">
        <div class="container animate-fade-in">
            <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem;">Digital Learning</span>
            <h1 style="font-size: 3.5rem; margin: 10px 0 20px; color: white;"><?php echo get_field('online_hero_title') ?: 'Bodhi Online: Your Digital Sanctuary'; ?></h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 800px; margin: 0 auto;"><?php echo get_field('online_hero_desc') ?: 'Geography should never be a barrier to quality education. Experience Enlightened Learning anywhere.'; ?></p>
        </div>
    </section>

    <!-- Streams Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="section-header text-center mb-5 animate-fade-up">
                <h2 style="font-size: 2.5rem; color: var(--primary); font-weight: 800;"><?php echo get_field('online_stream_title') ?: 'Our Specialized Online Streams'; ?></h2>
                <div style="width: 60px; height: 4px; background: var(--accent); margin: 20px auto; border-radius: 2px;"></div>
            </div>

            <div class="courses-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                <?php for($i=1; $i<=6; $i++): $stream = get_field('online_stream_'.$i); if($stream): ?>
                <div class="glass-card animate-fade-up delay-<?php echo $i*100; ?>" style="padding: 35px; border-radius: 20px;">
                    <div style="font-size: 2rem; color: var(--primary); margin-bottom: 20px;">
                        <i class="fas <?php 
                            $icons = ['fa-graduation-cap', 'fa-book', 'fa-globe', 'fa-user-graduate', 'fa-laptop-code', 'fa-microscope'];
                            echo $icons[$i-1]; 
                        ?>"></i>
                    </div>
                    <?php 
                    $parts = explode(':', $stream, 2);
                    if(count($parts) > 1):
                    ?>
                        <h3 style="margin-bottom: 15px; font-size: 1.3rem;"><?php echo trim($parts[0]); ?></h3>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;"><?php echo trim($parts[1]); ?></p>
                    <?php else: ?>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;"><?php echo $stream; ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>

    <!-- Edge Section (Features) -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center mb-5 animate-fade-up">
                <h2 style="font-size: 2.5rem; color: var(--primary); font-weight: 800;"><?php echo get_field('online_edge_title') ?: 'The Digital "Bodhi" Edge'; ?></h2>
                <div style="width: 60px; height: 4px; background: var(--accent); margin: 20px auto; border-radius: 2px;"></div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px;">
                <?php for($j=1; $j<=6; $j++): $feature = get_field('online_feature_'.$j); if($feature): ?>
                <div class="feature-item animate-fade-up delay-<?php echo $j*100; ?>" style="display: flex; gap: 20px;">
                    <div style="flex-shrink: 0; width: 50px; height: 50px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <?php 
                        $f_parts = explode(':', $feature, 2);
                        if(count($f_parts) > 1):
                        ?>
                            <h4 style="font-weight: 700; color: var(--primary-dark); margin-bottom: 8px;"><?php echo trim($f_parts[0]); ?></h4>
                            <p style="color: var(--text-muted); line-height: 1.6;"><?php echo trim($f_parts[1]); ?></p>
                        <?php else: ?>
                            <p style="color: var(--text-muted); line-height: 1.6;"><?php echo $feature; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
