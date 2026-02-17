<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- News Hero Section -->
    <section class="about-hero" style="background: linear-gradient(rgba(0,121,107,0.85), rgba(0,77,64,0.95)), url('<?php echo get_template_directory_uri(); ?>/assets/images/news-hero.jpg') center/cover; color: white; padding: 120px 0 80px; text-align: center;">
        <div class="container animate-fade-in">
            <h1 style="font-size: 3.5rem; margin-bottom: 20px;">Exam <span style="color: var(--accent);">News</span> & Updates</h1>
            <p style="font-size: 1.2rem; opacity: 0.9;">Real-time notifications on registrations, exam dates, and admission alerts</p>
        </div>
    </section>

    <!-- News Grid Section -->
    <section class="section-padding" style="background: #f4f7f6;">
        <div class="container">
            <div class="news-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
                
                <?php if (have_posts()) : $i = 0; while (have_posts()) : the_post(); $i++; ?>
                    <?php 
                    $reg_status = get_field('news_registration_status');
                    $news_type = get_field('news_type');
                    $dates_snippet = get_field('news_dates_snippet');
                    $source_url = get_field('news_source_url');
                    
                    $status_class = '';
                    $status_label = '';
                    $status_color = '#6c757d';
                    
                    if ($reg_status == 'live') {
                        $status_label = 'REGISTRATION LIVE';
                        $status_color = '#2ecc71';
                        $status_class = 'pulse-active';
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
                    
                    <article class="glass-card animate-fade-in delay-<?php echo ($i % 5 + 1) * 100; ?>" style="display: flex; flex-direction: column; height: 100%; border-radius: 15px; overflow: hidden; background: white; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03);">
                        
                        <div class="news-header" style="padding: 25px 25px 15px; position: relative;">
                            <?php if ($status_label) : ?>
                                <div class="news-badge <?php echo $status_class; ?>" style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.7rem; font-weight: 800; color: white; background: <?php echo $status_color; ?>; margin-bottom: 15px;">
                                    <?php echo $status_label; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="news-category" style="font-size: 0.75rem; font-weight: 700; color: var(--accent); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">
                                <?php 
                                $type_labels = array(
                                    'medical' => 'Medical Entrance',
                                    'engineering' => 'Engineering Entrance',
                                    'defence' => 'Defence & Design',
                                    'specialized' => 'Specialized Tests',
                                    'general' => 'General Update'
                                );
                                echo $type_labels[$news_type] ?: 'Update';
                                ?>
                            </div>
                            
                            <h3 style="font-size: 1.25rem; line-height: 1.4; margin-bottom: 0;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--primary); text-decoration: none;"><?php the_title(); ?></a>
                            </h3>
                        </div>

                        <div class="news-body" style="padding: 0 25px 20px; flex-grow: 1;">
                            <?php if ($dates_snippet) : ?>
                                <div class="date-snippet" style="background: rgba(0,121,107,0.05); padding: 12px; border-radius: 8px; font-size: 0.85rem; color: #555; margin-bottom: 15px; border-left: 3px solid var(--primary);">
                                    <i class="far fa-calendar-alt" style="margin-right: 8px; color: var(--primary);"></i>
                                    <strong>Key Dates:</strong><br>
                                    <?php echo nl2br(esc_html($dates_snippet)); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div style="font-size: 0.9rem; color: #666; line-height: 1.6;">
                                <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                            </div>
                        </div>

                        <div class="news-footer" style="padding: 15px 25px 25px; border-top: 1px solid rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 0.8rem; color: #999;">
                                <i class="far fa-clock"></i> <?php echo get_the_date('M d'); ?>
                            </span>
                            <div style="display: flex; gap: 15px;">
                                <?php if ($source_url) : ?>
                                    <a href="<?php echo esc_url($source_url); ?>" target="_blank" style="font-size: 0.8rem; color: var(--accent); font-weight: 700; text-decoration: none;">OFFICIAL LINK</a>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" style="font-size: 0.85rem; color: var(--primary); font-weight: 700; text-decoration: none;">DETAILS <i class="fas fa-arrow-right" style="font-size: 0.7rem; margin-left: 4px;"></i></a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; else : ?>
                    <p style="text-align: center; grid-column: 1 / -1; padding: 100px 0;">No news updates found at the moment.</p>
                <?php endif; ?>

            </div>

            <!-- Pagination -->
            <div class="pagination" style="margin-top: 60px; display: flex; justify-content: center; gap: 10px;">
                <?php 
                echo paginate_links( array(
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

    <style>
    .pulse-active {
        animation: pulse shadow 2s infinite;
        box-shadow: 0 0 0 0 rgba(46, 204, 113, 0.4);
    }
    @keyframes pulse-shadow {
        0% { box-shadow: 0 0 0 0 rgba(46, 204, 113, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(46, 204, 113, 0); }
        100% { box-shadow: 0 0 0 0 rgba(46, 204, 113, 0); }
    }
    .glass-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
        transition: all 0.4s ease;
    }
    </style>

</main>

<?php
get_footer();
