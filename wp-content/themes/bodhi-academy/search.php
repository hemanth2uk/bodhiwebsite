<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- Search Hero -->
    <section class="blog-hero" style="position: relative; padding: 100px 0; background: linear-gradient(rgba(0,55,50,0.9), rgba(0,91,79,0.95)); text-align: center; color: white;">
        <div class="container animate-fade-in">
            <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">Search Results</span>
            <h1 style="font-size: 3rem; margin: 10px 0; color: white;">
                <?php printf( esc_html__( 'Results for: %s', 'bodhi-academy' ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>
        </div>
    </section>

    <!-- Results Grid -->
    <section class="section-padding bg-light" style="position: relative; z-index: 10; margin-top: -40px;">
        <div class="container">
            <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                
                <?php if (have_posts()) : $i = 0; while (have_posts()) : the_post(); $i++; ?>
                    <article class="glass-card animate-fade-in" style="background: white; border-radius: 20px; padding: 40px; border: 1px solid rgba(0,0,0,0.05);">
                        <span style="font-size: 0.75rem; color: var(--accent); font-weight: 700; text-transform: uppercase;"><?php echo get_post_type(); ?></span>
                        <h3 style="margin: 10px 0 15px; font-size: 1.4rem;">
                            <a href="<?php the_permalink(); ?>" style="color: var(--primary); text-decoration: none;"><?php the_title(); ?></a>
                        </h3>
                        <div style="color: #666; font-size: 0.95rem; margin-bottom: 25px;">
                            <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" style="color: var(--primary); font-weight: 700; display: flex; align-items: center; gap: 8px;">View Detail <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></a>
                    </article>
                <?php endwhile; else : ?>
                    <div style="text-align: center; grid-column: 1 / -1; padding: 60px;">
                        <i class="fas fa-search-minus" style="font-size: 4rem; color: #ddd; margin-bottom: 20px;"></i>
                        <h2 style="color: var(--primary);">No Results Found</h2>
                        <p>Try searching for different keywords.</p>
                        <div style="max-width: 500px; margin: 30px auto;">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
