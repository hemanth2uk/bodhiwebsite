<?php
/**
 * Template Name: Integrated Schools
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Unified Hero Section -->
    <?php 
    $hero_img = get_field('integrated_hero_image') ?: 'https://images.unsplash.com/photo-1523050335102-c3251350202d?auto=format&fit=crop&w=1920';
    ?>
    <section class="about-hero" style="background: linear-gradient(rgba(0,55,50,0.8), rgba(0,55,50,0.9)), url('<?php echo esc_url($hero_img); ?>'); background-size: cover; background-position: center; color: white; padding: 120px 0 80px; text-align: center;">
        <div class="container animate-fade-in">
            <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem;">Seamless Education</span>
            <h1 style="font-size: 3.5rem; margin: 10px 0 20px; color: white;"><?php echo get_field('integrated_hero_title') ?: 'Integrated School Program'; ?></h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 800px; margin: 0 auto;"><?php echo get_field('integrated_hero_desc') ?: 'Bringing expert entrance orientation directly into the school campus. A unified academic journey.'; ?></p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center mb-5 animate-fade-up">
                <h2 style="font-size: 2.5rem; color: var(--primary); font-weight: 800;"><?php echo get_field('int_content_title') ?: 'The Integrated Program: A Unified Academic Journey'; ?></h2>
                <p style="color: var(--text-muted); max-width: 800px; margin: 20px auto; font-size: 1.1rem;"><?php echo get_field('int_intro_text') ?: 'A strategic partnership between Bodhi and prestigious schools to merge curriculum and entrance preparation.'; ?></p>
                <div style="width: 60px; height: 4px; background: var(--accent); margin: 20px auto; border-radius: 2px;"></div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
                <?php for($i=1; $i<=6; $i++): $item = get_field('int_detail_'.$i); if($item): ?>
                <div class="glass-card animate-fade-up delay-<?php echo $i*100; ?>" style="padding: 35px; border-radius: 20px; border-left: 5px solid var(--accent);">
                    <?php 
                    $parts = explode(':', $item, 2);
                    if(count($parts) > 1):
                    ?>
                        <h3 style="margin-bottom: 12px; font-size: 1.25rem; color: var(--primary-dark); font-weight: 700;"><?php echo trim($parts[0]); ?></h3>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;"><?php echo trim($parts[1]); ?></p>
                    <?php else: ?>
                        <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;"><?php echo $item; ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>

    <!-- Why Integrated Section -->
    <section class="section-padding bg-light" style="position: relative; overflow: hidden;">
        <div class="container">
            <div class="section-header text-center mb-5 animate-fade-up">
                <h2 style="font-size: 2.5rem; color: var(--primary); font-weight: 800;"><?php echo get_field('int_why_title') ?: 'Why the Integrated Path is the Most Efficient'; ?></h2>
                <div style="width: 60px; height: 4px; background: var(--accent); margin: 20px auto; border-radius: 2px;"></div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px;">
                <?php for($j=1; $j<=6; $j++): $benefit = get_field('int_benefit_'.$j); if($benefit): ?>
                <div class="benefit-card animate-fade-up delay-<?php echo $j*100; ?>" style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); display: flex; gap: 20px;">
                    <div style="flex-shrink: 0; width: 50px; height: 50px; background: var(--primary-light); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fas fa-star"></i>
                    </div>
                    <div>
                        <?php 
                        $b_parts = explode(':', $benefit, 2);
                        if(count($b_parts) > 1):
                        ?>
                            <h4 style="font-weight: 700; color: var(--primary-dark); margin-bottom: 8px;"><?php echo trim($b_parts[0]); ?></h4>
                            <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;"><?php echo trim($b_parts[1]); ?></p>
                        <?php else: ?>
                            <p style="color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;"><?php echo $benefit; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section-padding" style="background: var(--primary); color: white; text-align: center;">
        <div class="container animate-fade-up">
            <h2 style="font-size: 2.2rem; margin-bottom: 20px;">Ready to Integrate Excellence into Your School?</h2>
            <p style="font-size: 1.1rem; opacity: 0.9; margin-bottom: 40px; max-width: 700px; margin-left: auto; margin-right: auto;">Partner with Bodhi Academy to provide world-class entrance coaching within your school premises.</p>
            <a href="/contact-us" class="btn btn-primary" style="padding: 15px 40px; font-size: 1.1rem;">Request Partnership <i class="fas fa-handshake" style="margin-left: 10px;"></i></a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
