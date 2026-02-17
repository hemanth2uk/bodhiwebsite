<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- Blog Hero Section -->
    <section class="about-hero" style="background: linear-gradient(rgba(0,55,50,0.8), rgba(0,55,50,0.9)), url('<?php echo get_template_directory_uri(); ?>/assets/images/blog-hero.jpg') center/cover; color: white; padding: 120px 0 80px; text-align: center;">
        <div class="container animate-fade-in">
            <h1 style="font-size: 3.5rem; margin-bottom: 20px;">Latest <span style="color: var(--accent);">Updates</span></h1>
            <p style="font-size: 1.2rem; opacity: 0.9;">Stay informed with the latest news, exam updates, and educational insights</p>
        </div>
    </section>

    <!-- Blog Grid Section -->
    <section class="section-padding" style="background: #f8f9fa;">
        <div class="container">
            <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
                
                <?php if (have_posts()) : $i = 0; while (have_posts()) : the_post(); $i++; ?>
                    <article class="glass-card animate-fade-in delay-<?php echo ($i % 5 + 1) * 100; ?>" style="display: flex; flex-direction: column; height: 100%; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); background: rgba(255,255,255,0.9);">
                        <?php 
                        // Check for ACF image first, then WordPress featured image
                        $featured_img = get_field('blog_featured_image');
                        if (!$featured_img && has_post_thumbnail()) {
                            $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        }
                        
                        if ($featured_img) : ?>
                            <div class="blog-image" style="height: 220px; overflow: hidden; position: relative;">
                                <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                                <div class="blog-date" style="position: absolute; top: 20px; right: 20px; background: var(--accent); color: var(--primary); padding: 5px 15px; border-radius: 5px; font-weight: 700; font-size: 0.8rem; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                    <?php echo get_the_date('M d, Y'); ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="blog-image" style="height: 220px; background: linear-gradient(135deg, var(--primary), var(--secondary)); position: relative;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('https://www.transparenttextures.com/patterns/cubes.png'); opacity: 0.1;"></div>
                                <div class="blog-date" style="position: absolute; top: 20px; right: 20px; background: var(--accent); color: var(--primary); padding: 5px 15px; border-radius: 5px; font-weight: 700; font-size: 0.8rem;">
                                    <?php echo get_the_date('M d, Y'); ?>
                                </div>
                                <div style="height: 100%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.2); font-size: 3rem;">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="blog-content" style="padding: 30px; flex-grow: 1; display: flex; flex-direction: column;">
                            <div class="blog-meta" style="margin-bottom: 15px; font-size: 0.85rem; color: var(--primary); opacity: 0.7; font-weight: 600;">
                                <i class="fas fa-folder-open" style="margin-right: 5px; color: var(--accent);"></i> <?php the_category(', '); ?>
                            </div>
                            <h3 style="margin-bottom: 15px; font-size: 1.4rem; line-height: 1.4; transition: color 0.3s ease;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--primary); text-decoration: none;"><?php the_title(); ?></a>
                            </h3>
                            <div style="margin-bottom: 25px; color: var(--text-muted); line-height: 1.6; font-size: 0.95rem;">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </div>
                            <div style="margin-top: auto; display: flex; justify-content: space-between; align-items: center; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
                                <span style="font-size: 0.85rem; color: var(--text-muted);">
                                    <i class="far fa-clock" style="margin-right: 5px; color: var(--accent);"></i> 5 min read
                                </span>
                                <a href="<?php the_permalink(); ?>" class="btn-link" style="color: var(--primary); font-weight: 700; font-size: 0.9rem; text-decoration: none; transition: color 0.3s ease;">
                                    READ ARTICLE <i class="fas fa-arrow-right" style="margin-left: 5px; color: var(--accent);"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; else : ?>
                    <p style="text-align: center; grid-column: 1 / -1; padding: 100px 0;">No articles found. Stay tuned for updates!</p>
                <?php endif; ?>

            </div>

            <!-- Pagination -->
            <div class="pagination" style="margin-top: 60px; display: flex; justify-content: center; gap: 10px;">
                <?php 
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $wp_query->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'prev_next'    => true,
                    'prev_text'    => '<i class="fas fa-chevron-left"></i>',
                    'next_text'    => '<i class="fas fa-chevron-right"></i>',
                ) );
                ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
