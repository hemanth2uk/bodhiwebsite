<?php get_header(); ?>

<main id="primary" class="site-main">

    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Unified Post Hero -->
        <header class="about-hero" style="background: linear-gradient(rgba(0,55,50,0.8), rgba(0,55,50,0.9)); color: white; padding: 120px 0 80px; text-align: center;">
            <div class="container animate-fade-in">
                <div style="margin-bottom: 20px;">
                    <span style="background: var(--accent); color: var(--primary); padding: 5px 20px; border-radius: 50px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">
                        <?php the_category(', '); ?>
                    </span>
                </div>
                <h1 style="font-size: 3rem; margin-bottom: 25px; line-height: 1.2;"><?php the_title(); ?></h1>
                <div style="display: flex; align-items: center; justify-content: center; gap: 20px; opacity: 0.8; font-size: 0.95rem;">
                    <span><i class="far fa-calendar-alt" style="color: var(--accent);"></i> <?php echo get_the_date(); ?></span>
                    <span><i class="far fa-user" style="color: var(--accent);"></i> By Bodhi Expert</span>
                    <span><i class="far fa-clock" style="color: var(--accent);"></i> 5 min read</span>
                </div>
            </div>
        </header>

        <section class="section-padding" style="background: #fdfdfd; position: relative;">
            <div class="container">
                <style>
                    .post-layout {
                        display: grid;
                        grid-template-columns: 1fr 350px;
                        gap: 60px;
                    }
                    @media (max-width: 1024px) {
                        .post-layout {
                            grid-template-columns: 1fr;
                            gap: 40px;
                        }
                        .post-sidebar {
                            order: 2;
                        }
                    }
                </style>
                <div class="post-layout">
                    
                    <!-- Main Content -->
                    <div class="post-main-content animate-fade-in" style="background: white; padding: 50px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05);">
                        <?php 
                        // Check for ACF image first, then WordPress featured image
                        $featured_img = get_field('blog_featured_image');
                        if (!$featured_img && has_post_thumbnail()) {
                            $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        }
                        
                        if ($featured_img) : ?>
                            <div style="margin-bottom: 40px; border-radius: 15px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                                <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: auto; display: block;">
                            </div>
                        <?php endif; ?>

                        <div class="entry-content" style="font-size: 1.1rem; line-height: 1.9; color: #333;">
                            <style>
                                .entry-content h2 {
                                    color: var(--primary);
                                    font-size: 2rem;
                                    margin: 50px 0 25px;
                                    padding-bottom: 15px;
                                    border-bottom: 3px solid var(--accent);
                                    font-weight: 700;
                                }
                                .entry-content h3 {
                                    color: var(--primary);
                                    font-size: 1.5rem;
                                    margin: 40px 0 20px;
                                    font-weight: 600;
                                }
                                .entry-content p {
                                    margin-bottom: 20px;
                                    text-align: justify;
                                }
                                .entry-content ul, .entry-content ol {
                                    margin: 25px 0;
                                    padding-left: 30px;
                                }
                                .entry-content li {
                                    margin-bottom: 12px;
                                    line-height: 1.8;
                                }
                                .entry-content strong {
                                    color: var(--primary);
                                    font-weight: 700;
                                }
                                .entry-content table {
                                    width: 100%;
                                    margin: 30px 0;
                                    border-collapse: collapse;
                                    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                                    border-radius: 10px;
                                    overflow: hidden;
                                }
                                .entry-content table th {
                                    background: var(--primary);
                                    color: white;
                                    padding: 15px;
                                    text-align: left;
                                    font-weight: 600;
                                }
                                .entry-content table td {
                                    padding: 12px 15px;
                                    border: 1px solid #e0e0e0;
                                }
                                .entry-content table tr:nth-child(even) {
                                    background: #f9f9f9;
                                }
                                .entry-content table tr:hover {
                                    background: #f0f9f8;
                                }
                                .entry-content blockquote {
                                    border-left: 5px solid var(--accent);
                                    background: linear-gradient(135deg, #e0f2f1 0%, #ffffff 100%);
                                    padding: 25px 30px;
                                    margin: 30px 0;
                                    border-radius: 10px;
                                    font-style: italic;
                                    color: var(--primary);
                                }
                                .entry-content a {
                                    color: var(--primary);
                                    text-decoration: underline;
                                    font-weight: 600;
                                    transition: color 0.3s ease;
                                }
                                .entry-content a:hover {
                                    color: var(--accent);
                                }
                                .entry-content img {
                                    max-width: 100%;
                                    height: auto;
                                    border-radius: 15px;
                                    margin: 30px 0;
                                    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                                }
                                
                                /* Mobile Responsive */
                                @media (max-width: 768px) {
                                    .entry-content {
                                        font-size: 1rem !important;
                                    }
                                    .entry-content h2 {
                                        font-size: 1.6rem;
                                    }
                                    .entry-content h3 {
                                        font-size: 1.3rem;
                                    }
                                    .entry-content table {
                                        font-size: 0.9rem;
                                    }
                                }
                            </style>
                            <?php the_content(); ?>
                        </div>

                        <!-- Post Footer/Tags -->
                        <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                            <div class="post-tags">
                                <?php the_tags('<span style="font-weight:700; color:var(--primary); margin-right:10px;">Tags:</span> ', ', '); ?>
                            </div>
                            <div class="post-share" style="display: flex; gap: 15px;">
                                <span style="font-weight: 700; size: 0.9rem;">Share:</span>
                                <a href="#" style="color: #3b5998;"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" style="color: #1da1f2;"><i class="fab fa-twitter"></i></a>
                                <a href="#" style="color: #25d366;"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="post-sidebar">
                        
                        <!-- Recent Posts Card -->
                        <div class="glass-card" style="padding: 30px; margin-bottom: 40px; background: rgba(255,255,255,0.7);">
                            <h4 style="margin-bottom: 25px; border-left: 4px solid var(--accent); padding-left: 15px; color: var(--primary);">Recent Updates</h4>
                            <div class="recent-posts-list">
                                <?php
                                $recent_posts = get_posts(['numberposts' => 4, 'post__not_in' => [get_the_ID()]]);
                                foreach ($recent_posts as $post) : setup_postdata($post);
                                ?>
                                    <div style="margin-bottom: 20px; display: flex; gap: 15px; align-items: center;">
                                        <div style="width: 70px; height: 70px; border-radius: 10px; background: var(--primary); flex-shrink: 0; overflow: hidden;">
                                            <?php if (has_post_thumbnail()) : the_post_thumbnail('thumbnail', ['style' => 'width:100%; height:100%; object-fit:cover;']); else : ?>
                                                <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:white; font-size:1.2rem;"><i class="fas fa-newspaper"></i></div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <h5 style="font-size: 0.95rem; line-height: 1.4; margin-bottom: 5px;">
                                                <a href="<?php the_permalink(); ?>" style="color: var(--primary); text-decoration: none;"><?php the_title(); ?></a>
                                            </h5>
                                            <span style="font-size: 0.8rem; opacity: 0.6;"><?php echo get_the_date(); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; wp_reset_postdata(); ?>
                            </div>
                        </div>

                        <!-- CTA Card -->
                        <div style="background: var(--primary); padding: 40px 30px; border-radius: 20px; color: white; text-align: center; position: sticky; top: 100px;">
                            <i class="fas fa-paper-plane" style="font-size: 3rem; color: var(--accent); margin-bottom: 20px;"></i>
                            <h4 style="color: white; margin-bottom: 15px;">Ready to Start?</h4>
                            <p style="font-size: 0.9rem; opacity: 0.8; margin-bottom: 25px;">Join thousands of students achieving their dreams with Bodhi Academy.</p>
                            <a href="/contact-us" class="btn btn-accent" style="display: block; width: 100%;">Enquire Now</a>
                        </div>

                    </aside>

                </div>
            </div>
        </section>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
