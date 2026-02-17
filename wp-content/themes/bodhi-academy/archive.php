<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- Archive Hero -->
    <section class="blog-hero" style="position: relative; padding: 100px 0; background: linear-gradient(rgba(0,55,50,0.9), rgba(0,91,79,0.95)), url('<?php echo get_template_directory_uri(); ?>/assets/images/pattern-bg.png'); text-align: center; color: white;">
        <div class="container animate-fade-in">
            <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">Browsing Category</span>
            <h1 style="font-size: 3rem; margin: 10px 0; color: white;"><?php the_archive_title(); ?></h1>
            <div style="opacity: 0.8;"><?php the_archive_description(); ?></div>
        </div>
    </section>

    <!-- Post Grid (Same as Index) -->
    <section class="section-padding bg-light" style="position: relative; z-index: 10; margin-top: -40px;">
        <div class="container">
            <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                
                <?php if (have_posts()) : $i = 0; while (have_posts()) : the_post(); $i++; ?>
                    <article class="glass-card animate-fade-in delay-<?php echo ($i % 5 + 1) * 100; ?>" style="background: white; border-radius: 20px; overflow: hidden; display: flex; flex-direction: column; transition: 0.4s;">
                        <div class="blog-image" style="height: 200px; background: var(--primary); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                            <?php if (has_post_thumbnail()) : the_post_thumbnail('medium_large', ['style' => 'width:100%; height:100%; object-fit:cover;']); else : ?>
                                <i class="fas fa-graduation-cap"></i>
                            <?php endif; ?>
                        </div>
                        <div class="blog-content" style="padding: 30px; flex-grow: 1;">
                            <h3 style="margin-bottom: 15px; font-size: 1.3rem;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--primary); text-decoration: none;"><?php the_title(); ?></a>
                            </h3>
                            <div style="margin-bottom: 20px; font-size: 0.95rem; color: #666;">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" style="color: var(--primary); font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Read More <i class="fas fa-arrow-right" style="font-size: 0.7rem; color: var(--accent);"></i></a>
                        </div>
                    </article>
                <?php endwhile; else : ?>
                    <p style="text-align: center; grid-column: 1 / -1;">No articles found in this category.</p>
                <?php endif; ?>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
