<?php get_header(); ?>

<main id="primary" class="site-main">

    <?php while (have_posts()) : the_post(); ?>
        <?php 
        $reg_status = get_field('news_registration_status');
        $news_type = get_field('news_type');
        $dates_snippet = get_field('news_dates_snippet');
        $source_url = get_field('news_source_url');
        
        $status_label = '';
        $status_color = '#6c757d';
        
        if ($reg_status == 'live') {
            $status_label = 'REGISTRATION LIVE';
            $status_color = '#00c853';
        } elseif ($reg_status == 'closing_soon') {
            $status_label = 'CLOSING SOON';
            $status_color = '#ff9100';
        } elseif ($reg_status == 'closed') {
            $status_label = 'CLOSED';
            $status_color = '#ff5252';
        } elseif ($reg_status == 'upcoming') {
            $status_label = 'UPCOMING';
            $status_color = '#2979ff';
        }
        ?>

        <!-- News Post Hero -->
        <section class="post-hero" style="background: linear-gradient(rgba(0,41,36,0.9), rgba(0,77,64,0.95)), url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=1920') no-repeat center center/cover; padding: 140px 0 80px; color: white; text-align: center; position: relative; overflow: hidden;">
            <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: url('https://www.transparenttextures.com/patterns/cubes.png'); opacity: 0.1;"></div>
            <div class="container animate-fade-in" style="position: relative; z-index: 1;">
                <div style="display: inline-block; padding: 6px 18px; border-radius: 8px; background: var(--accent); color: #000; font-weight: 800; font-size: 0.8rem; margin-bottom: 25px; text-transform: uppercase; letter-spacing: 2px; box-shadow: 0 4px 15px rgba(255,193,7,0.3);">
                    <?php 
                    $type_labels = array(
                        'medical' => 'Medical Entrance News',
                        'engineering' => 'Engineering Entrance News',
                        'defence' => 'Defence & Design News',
                        'specialized' => 'Specialized Test News',
                        'general' => 'General Education Update'
                    );
                    echo $type_labels[$news_type] ?: 'News Update';
                    ?>
                </div>
                <h1 style="font-size: 3.5rem; line-height: 1.1; margin-bottom: 30px; font-weight: 800; max-width: 900px; margin-left: auto; margin-right: auto;"><?php the_title(); ?></h1>
                
                <div class="news-meta" style="display: flex; justify-content: center; gap: 40px; font-size: 1.1rem; font-weight: 500;">
                    <span><i class="far fa-calendar-alt" style="color: var(--accent); margin-right: 10px;"></i> <?php echo get_the_date('F d, Y'); ?></span>
                    <?php if ($status_label) : ?>
                        <span style="color: <?php echo $status_color; ?>; font-weight: 800; background: rgba(255,255,255,1); padding: 4px 15px; border-radius: 5px;"><i class="fas fa-info-circle" style="margin-right: 8px;"></i> <?php echo $status_label; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- News Content Section -->
        <section class="section-padding" style="background: #fdfdfd; padding: 100px 0;">
            <div class="container">
                <div class="news-layout" style="display: grid; grid-template-columns: 1fr 380px; gap: 60px;">
                    
                    <!-- Main Content Area -->
                    <div class="news-main-content animate-fade-in" style="background: white; padding: 60px; border-radius: 30px; box-shadow: 0 40px 100px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.04);">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div style="margin-bottom: 50px; border-radius: 20px; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.12);">
                                <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto; display: block;']); ?>
                            </div>
                        <?php endif; ?>

                        <div class="content-area" style="font-size: 1.25rem; line-height: 1.9; color: #333;">
                            <?php the_content(); ?>
                        </div>

                        <?php if ($source_url) : ?>
                            <div style="margin-top: 60px; padding: 45px; background: #f8fbfa; border-radius: 25px; border: 2px dashed rgba(0,77,64,0.1); text-align: center; position: relative;">
                                <div style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--primary); color: white; padding: 5px 20px; border-radius: 20px; font-size: 0.75rem; font-weight: 800;">OFFICIAL SOURCE</div>
                                <h4 style="margin-bottom: 15px; color: var(--primary); font-size: 1.5rem; font-weight: 800;">Registration & Official Portal</h4>
                                <p style="font-size: 1.05rem; color: #666; margin-bottom: 25px; line-height: 1.6;">Click below to access the official notification and registration portal for complete details.</p>
                                <a href="<?php echo esc_url($source_url); ?>" target="_blank" class="btn-primary" style="background: var(--primary); color: white; padding: 18px 40px; border-radius: 12px; text-decoration: none; display: inline-block; font-weight: 800; transition: all 0.3s ease; box-shadow: 0 10px 25px rgba(0,77,64,0.2);">VISIT OFFICIAL WEBSITE <i class="fas fa-external-link-alt" style="margin-left: 10px; font-size: 0.8rem;"></i></a>
                            </div>
                        <?php endif; ?>

                        <div style="margin-top: 60px; padding-top: 40px; border-top: 1px solid #efefef; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                            <a href="<?php echo get_post_type_archive_link('news'); ?>" style="color: var(--primary); font-weight: 800; text-decoration: none; font-size: 0.95rem; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-arrow-left"></i> BACK TO ALL NEWS
                            </a>
                            <div class="share-links" style="display: flex; gap: 20px; align-items: center;">
                                <span style="font-size: 0.85rem; color: #999; font-weight: 800; letter-spacing: 1px;">SHARE NEWS:</span>
                                <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" target="_blank" style="color: #25D366; font-size: 1.4rem; transition: transform 0.3s;"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" style="color: #1877F2; font-size: 1.4rem; transition: transform 0.3s;"><i class="fab fa-facebook"></i></a>
                                <a href="#" style="color: #1DA1F2; font-size: 1.4rem; transition: transform 0.3s;"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Info -->
                    <aside class="news-sidebar">
                        
                        <?php if ($dates_snippet) : ?>
                            <div class="sidebar-card animate-fade-in delay-200" style="background: white; padding: 40px; border-radius: 30px; box-shadow: 0 30px 60px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.04); margin-bottom: 40px;">
                                <h4 style="color: var(--primary); margin-bottom: 25px; font-size: 1.35rem; font-weight: 800; position: relative; padding-bottom: 12px;">
                                    Key Dates
                                    <div style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: var(--accent);"></div>
                                </h4>
                                <div style="font-size: 1.05rem; color: #444; line-height: 1.8; font-weight: 500;">
                                    <?php echo nl2br(esc_html($dates_snippet)); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="sidebar-card animate-fade-in delay-400" style="background: var(--primary); color: white; padding: 45px 40px; border-radius: 30px; box-shadow: 0 30px 60px rgba(0,77,64,0.15); margin-bottom: 40px; position: relative; overflow: hidden;">
                            <div style="position: absolute; top: -30px; right: -30px; font-size: 10rem; color: rgba(255,255,255,0.08); transform: rotate(15deg);"><i class="fas fa-graduation-cap"></i></div>
                            <h4 style="color: var(--accent); margin-bottom: 18px; font-size: 1.5rem; font-weight: 800; position: relative; z-index: 1;">Enlighten Your Future</h4>
                            <p style="font-size: 1.05rem; line-height: 1.7; margin-bottom: 30px; position: relative; z-index: 1; opacity: 0.9;">Take the next step towards your dreams with Bodhi Academy's specialized entrance coaching.</p>
                            <a href="<?php echo home_url('/contact-us'); ?>" style="background: white; color: var(--primary); padding: 15px 30px; border-radius: 12px; text-decoration: none; display: inline-block; font-weight: 800; font-size: 1rem; position: relative; z-index: 1; transition: all 0.3s ease;">ENQUIRE NOW <i class="fas fa-paper-plane" style="margin-left: 8px; font-size: 0.8rem;"></i></a>
                        </div>

                        <!-- Recent News Widget -->
                        <div class="sidebar-card animate-fade-in delay-600" style="background: #fff; padding: 40px; border-radius: 30px; box-shadow: 0 30px 60px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.04);">
                            <h4 style="color: var(--primary); margin-bottom: 25px; font-size: 1.35rem; font-weight: 800;">Recent Updates</h4>
                            <?php 
                            $recent_news = new WP_Query(array(
                                'post_type' => 'news',
                                'posts_per_page' => 3,
                                'post__not_in' => array(get_the_ID())
                            ));
                            if ($recent_news->have_posts()) : while ($recent_news->have_posts()) : $recent_news->the_post();
                            ?>
                                <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #f0f0f0;">
                                    <h5 style="font-size: 1rem; margin-bottom: 8px; line-height: 1.4;">
                                        <a href="<?php the_permalink(); ?>" style="color: #333; text-decoration: none; font-weight: 700; transition: color 0.3s;"><?php the_title(); ?></a>
                                    </h5>
                                    <span style="font-size: 0.8rem; color: #999;"><?php echo get_the_date('M d, Y'); ?></span>
                                </div>
                            <?php endwhile; wp_reset_postdata(); endif; ?>
                        </div>

                    </aside>
                    
                </div>
            </div>
        </section>

        <style>
            .share-links a:hover { transform: translateY(-5px); }
            .content-area p { margin-bottom: 25px; }
            .content-area blockquote {
                padding: 30px;
                background: #f8fbfa;
                border-left: 5px solid var(--accent);
                font-style: italic;
                margin: 40px 0;
                border-radius: 0 15px 15px 0;
            }
            @media (max-width: 991px) {
                .news-layout { grid-template-columns: 1fr; }
                .post-hero h1 { font-size: 2.5rem !important; }
                .news-main-content { padding: 40px 30px; }
            }
        </style>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
