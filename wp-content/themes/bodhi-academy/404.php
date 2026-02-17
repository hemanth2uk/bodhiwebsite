<?php get_header(); ?>

<main id="primary" class="site-main">

    <section class="error-404 not-found" style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); position: relative; overflow: hidden; padding: 100px 0;">
        
        <!-- Animated Background Elements -->
        <div class="hero-shape shape-1" style="position: absolute; top: -100px; right: -100px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0,91,79,0.05) 0%, transparent 70%); border-radius: 50%;"></div>
        <div class="hero-shape shape-2" style="position: absolute; bottom: -100px; left: -100px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(212,175,55,0.05) 0%, transparent 70%); border-radius: 50%;"></div>

        <div class="container text-center animate-fade-in" style="position: relative; z-index: 1;">
            
            <div style="font-size: 10rem; font-weight: 900; line-height: 1; margin-bottom: 20px; background: linear-gradient(135deg, var(--primary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; opacity: 0.15; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%;">
                404
            </div>

            <div class="glass-card" style="padding: 60px; max-width: 600px; margin: 0 auto; background: rgba(255,255,255,0.8); border: 1px solid white;">
                <div style="margin-bottom: 30px;">
                    <i class="fas fa-search" style="font-size: 4rem; color: var(--accent); opacity: 0.8;"></i>
                </div>
                <h1 style="color: var(--primary); font-size: 2.5rem; margin-bottom: 20px;">Page Not Found</h1>
                <p style="font-size: 1.1rem; color: #666; margin-bottom: 40px; line-height: 1.6;">
                    The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. 
                    Let's get you back on the right path to success.
                </p>
                <div style="display: flex; gap: 20px; justify-content: center;">
                    <a href="<?php echo home_url(); ?>" class="btn btn-primary">
                        Return Home
                    </a>
                    <a href="<?php echo home_url('/courses'); ?>" class="btn btn-accent">
                        View Courses
                    </a>
                </div>
            </div>

            <div style="margin-top: 50px;">
                <p style="color: var(--primary); font-weight: 600;">Or reach out to us at:</p>
                <a href="mailto:info@bodhiacademy.com" style="color: var(--primary); text-decoration: none; font-size: 1.1rem;">info@bodhiacademy.com</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
