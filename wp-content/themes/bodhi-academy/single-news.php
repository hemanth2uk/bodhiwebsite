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
            $status_color = '#2ecc71';
        } elseif ($reg_status == 'closing_soon') {
            $status_label = 'CLOSING SOON';
            $status_color = '#f39c12';
        } elseif ($reg_status == 'closed') {
            $status_label = 'CLOSED';
            $status_color = '#e74c3c';
        } elseif ($reg_status == 'upcoming') {
            $status_label = 'UPCOMING';
            $status_color = '#3498db';
        }
        ?>

        <!-- News Post Hero -->
        <section class="post-hero" style="background: linear-gradient(rgba(0,121,107,0.9), rgba(0,77,64,0.95)), url('<?php echo get_template_directory_uri(); ?>/assets/images/news-hero.jpg') center/cover; padding: 100px 0 60px; color: white; text-align: center;">
            <div class="container animate-fade-in">
                <div style="display: inline-block; padding: 6px 15px; border-radius: 4px; background: var(--accent); color: #000; font-weight: 800; font-size: 0.75rem; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px;">
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
                <h1 style="font-size: 3rem; line-height: 1.2; margin-bottom: 20px; font-weight: 800;"><?php the_title(); ?></h1>
                
                <div class="news-meta" style="display: flex; justify-content: center; gap: 30px; font-size: 1rem; opacity: 0.9;">
                    <span><i class="far fa-calendar-alt" style="color: var(--accent); margin-right: 8px;"></i> <?php echo get_the_date('F d, Y'); ?></span>
                    <?php if ($status_label) : ?>
                        <span style="color: <?php echo $status_color; ?>; font-weight: 700;"><i class="fas fa-info-circle" style="margin-right: 8px;"></i> <?php echo $status_label; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- News Content Section -->
        <section class="section-padding" style="background: #fdfdfd;">
            <div class="container">
                <div class="news-layout" style="display: grid; grid-template-columns: 1fr 350px; gap: 50px;">
                    
                    <!-- Main Content Area -->
                    <div class="news-main-content animate-fade-in" style="background: white; padding: 50px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05);">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div style="margin-bottom: 40px; border-radius: 15px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                                <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto; display: block;']); ?>
                            </div>
                        <?php endif; ?>

                        <div class="content-area" style="font-size: 1.15rem; line-height: 1.8; color: #444;">
                            <?php the_content(); ?>
                        </div>

                        <?php if ($source_url) : ?>
                            <div style="margin-top: 50px; padding: 30px; background: #f8fcfb; border-radius: 15px; border: 1px dashed var(--primary); text-align: center;">
                                <h4 style="margin-bottom: 15px; color: var(--primary);">Official Notification & Registration</h4>
                                <p style="font-size: 1rem; color: #666; margin-bottom: 20px;">Access the official portal for detailed information and application.</p>
                                <a href="<?php echo esc_url($source_url); ?>" target="_blank" class="btn-primary" style="background: var(--primary); color: white; padding: 12px 30px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: 700; transition: background 0.3s ease;">VISIT OFFICIAL WEBSITE</a>
                            </div>
                        <?php endif; ?>

                        <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                            <a href="<?php echo get_post_type_archive_link('news'); ?>" style="color: var(--primary); font-weight: 700; text-decoration: none;"><i class="fas fa-chevron-left"></i> BACK TO ALL NEWS</a>
                            <div class="share-links" style="display: flex; gap: 15px; align-items: center;">
                                <span style="font-size: 0.9rem; color: #999; font-weight: 600;">SHARE:</span>
                                <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" target="_blank" style="color: #25D366; font-size: 1.2rem;"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" style="color: #1877F2; font-size: 1.2rem;"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Info -->
                    <aside class="news-sidebar animate-fade-in delay-200">
                        <?php if ($dates_snippet) : ?>
                            <div class="sidebar-card" style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); margin-bottom: 30px;">
                                <h4 style="color: var(--primary); margin-bottom: 20px; font-size: 1.2rem; border-bottom: 2px solid var(--accent); padding-bottom: 10px; display: inline-block;">Important Dates</h4>
                                <div style="font-size: 0.95rem; color: #555; line-height: 1.8;">
                                    <?php echo nl2br(esc_html($dates_snippet)); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="sidebar-card" style="background: var(--primary); color: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); margin-bottom: 30px; position: relative; overflow: hidden;">
                            <div style="position: absolute; top: -20px; right: -20px; font-size: 8rem; color: rgba(255,255,255,0.05);"><i class="fas fa-graduation-cap"></i></div>
                            <h4 style="color: var(--accent); margin-bottom: 15px; font-size: 1.2rem; position: relative;">Ready for success?</h4>
                            <p style="font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px; position: relative;">Join Bodhi Academy for specialized entrance coaching led by expert mentors.</p>
                            <a href="<?php echo home_url('/contact-us'); ?>" style="background: white; color: var(--primary); padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: 700; font-size: 0.9rem; position: relative;">ENQUIRE NOW</a>
                        </div>
                    </aside>
                    
                </div>
            </div>
        </section>

    <?php endwhile; ?>

</main>

<?php
get_footer();
