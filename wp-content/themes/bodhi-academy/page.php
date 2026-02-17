<?php get_header(); ?>

<main id="primary" class="site-main">

    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Standard Page Hero -->
        <header class="page-hero" style="position: relative; padding: 100px 0 60px; background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; text-align: center; overflow: hidden;">
            <div class="hero-shape shape-1" style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
            <div class="container animate-fade-in">
                <h1 style="color: white; font-size: 3rem; margin-bottom: 0;"><?php the_title(); ?></h1>
            </div>
        </header>

        <!-- Page Content -->
        <section class="section-padding" style="background: #fdfdfd;">
            <div class="container">
                <div class="glass-card animate-fade-in" style="background: white; padding: 60px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); min-height: 400px;">
                    <div class="entry-content" style="font-size: 1.1rem; line-height: 1.8; color: #444;">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
