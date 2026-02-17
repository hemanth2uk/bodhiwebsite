<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- News Hero Section -->
    <section class="about-hero" style="background: linear-gradient(rgba(0,41,36,0.85), rgba(0,77,64,0.95)), url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=1920') no-repeat center center/cover; color: white; padding: 140px 0 100px; text-align: center; position: relative; overflow: hidden;">
        <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: url('https://www.transparenttextures.com/patterns/cubes.png'); opacity: 0.1;"></div>
        <div class="container animate-fade-in" style="position: relative; z-index: 1;">
            <span style="color: var(--accent); font-weight: 800; letter-spacing: 3px; text-transform: uppercase; font-size: 0.85rem; display: block; margin-bottom: 15px;">Stay Informed</span>
            <h1 style="font-size: 4rem; margin-bottom: 25px; font-weight: 800; line-height: 1.1;">Exam <span style="color: var(--accent);">News</span> & Updates</h1>
            <div style="width: 80px; height: 5px; background: var(--accent); margin: 0 auto 30px; border-radius: 2px;"></div>
            <p style="font-size: 1.25rem; opacity: 0.95; max-width: 700px; margin: 0 auto; line-height: 1.6;">Real-time notifications on registrations, exam dates, and crucial admission alerts from the education world.</p>
        </div>
    </section>

    <!-- News Grid Section -->
    <section class="section-padding" style="background: #fdfdfd; padding: 100px 0;">
        <div class="container">
            
            <div class="news-grid-wrapper" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
                
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
                        $status_color = '#00c853';
                        $status_class = 'pulse-active';
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
                    
                    <article class="premium-news-card animate-fade-in" style="display: flex; flex-direction: column; height: 100%; border-radius: 25px; overflow: hidden; background: white; box-shadow: 0 20px 50px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.04); transition: all 0.4s ease;">
                        
                        <div class="news-content-area" style="padding: 35px 35px 25px; flex-grow: 1;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                                <div class="news-cat" style="font-size: 0.8rem; font-weight: 800; color: var(--accent); text-transform: uppercase; letter-spacing: 1.5px;">
                                    <?php 
                                    $type_labels = array(
                                        'medical' => 'Medical',
                                        'engineering' => 'Engineering',
                                        'defence' => 'Defence & Design',
                                        'specialized' => 'Specialized',
                                        'general' => 'General'
                                    );
                                    echo $type_labels[$news_type] ?: 'Update';
                                    ?>
                                </div>
                                <?php if ($status_label) : ?>
                                    <div class="news-badge <?php echo $status_class; ?>" style="padding: 5px 12px; border-radius: 8px; font-size: 0.65rem; font-weight: 900; color: white; background: <?php echo $status_color; ?>;">
                                        <?php echo $status_label; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <h3 style="font-size: 1.4rem; line-height: 1.3; margin-bottom: 20px; font-weight: 700;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--primary); text-decoration: none; transition: color 0.3s;"><?php the_title(); ?></a>
                            </h3>

                            <?php if ($dates_snippet) : ?>
                                <div class="news-dates" style="background: #f8fbfa; padding: 15px 20px; border-radius: 15px; font-size: 0.9rem; color: #444; margin-bottom: 20px; border-left: 4px solid var(--accent);">
                                    <div style="font-weight: 800; font-size: 0.75rem; color: var(--primary); text-transform: uppercase; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
                                        <i class="far fa-calendar-check"></i> Registration Window
                                    </div>
                                    <div style="line-height: 1.5; font-weight: 500;">
                                        <?php echo nl2br(esc_html($dates_snippet)); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div style="font-size: 1rem; color: #666; line-height: 1.7;">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </div>
                        </div>

                        <div class="news-action-footer" style="padding: 25px 35px 35px; border-top: 1px dashed #eee; display: flex; justify-content: space-between; align-items: center; background: #fafcfb;">
                            <span style="font-size: 0.85rem; color: #888; font-weight: 600;">
                                <i class="far fa-clock" style="margin-right: 4px; color: var(--accent);"></i> <?php echo get_the_date('M d, Y'); ?>
                            </span>
                            <div style="display: flex; gap: 20px;">
                                <?php if ($source_url) : ?>
                                    <a href="<?php echo esc_url($source_url); ?>" target="_blank" title="Official Source" style="color: var(--accent); font-size: 1.1rem; transition: transform 0.3s;"><i class="fas fa-external-link-alt"></i></a>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" style="font-size: 0.9rem; color: var(--primary); font-weight: 800; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                                    VIEW INFO <i class="fas fa-arrow-right" style="font-size: 0.75rem; transition: transform 0.3s;" class="arrow-move"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; else : ?>
                    <div style="text-align: center; grid-column: 1 / -1; padding: 120px 0; background: white; border-radius: 30px; border: 2px dashed #eee;">
                        <i class="fas fa-newspaper" style="font-size: 4rem; color: #eee; margin-bottom: 20px;"></i>
                        <h3 style="color: #666; font-size: 1.5rem;">The scroll is currently being written...</h3>
                        <p style="color: #999;">Check back soon for the latest exam updates and news.</p>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Pagination -->
            <?php 
            $big = 999999999;
            $pages = paginate_links( array(
                'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'       => '?paged=%#%',
                'current'      => max( 1, get_query_var('paged') ),
                'total'        => $wp_query->max_num_pages,
                'type'         => 'array',
                'prev_next'    => true,
                'prev_text'    => '<i class="fas fa-chevron-left"></i>',
                'next_text'    => '<i class="fas fa-chevron-right"></i>',
            ) );
            
            if( is_array( $pages ) ) {
                echo '<nav class="premium-pagination" style="margin-top: 80px; display: flex; justify-content: center; gap: 12px;">';
                foreach ( $pages as $page ) {
                    echo str_replace( 'page-numbers', 'page-number-btn', $page );
                }
                echo '</nav>';
            }
            ?>

        </div>
    </section>

    <style>
    .premium-news-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 40px 80px rgba(0,0,0,0.08) !important;
    }
    .premium-news-card:hover h3 a { color: var(--accent); }
    .premium-news-card:hover .arrow-move { transform: translateX(5px); }
    
    .pulse-active {
        animation: pulse-shadow 2s infinite;
    }
    @keyframes pulse-shadow {
        0% { box-shadow: 0 0 0 0 rgba(0, 200, 83, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(0, 200, 83, 0); }
        100% { box-shadow: 0 0 0 0 rgba(0, 200, 83, 0); }
    }
    
    .page-number-btn {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border: 1px solid #eee;
        border-radius: 15px;
        color: var(--primary);
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
    }
    .page-number-btn.current {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        box-shadow: 0 10px 20px rgba(0,77,64,0.15);
    }
    .page-number-btn:hover:not(.current) {
        background: #f0f7f6;
        border-color: var(--primary);
        transform: translateY(-3px);
    }
    
    @media (max-width: 768px) {
        .about-hero h1 { font-size: 2.5rem !important; }
        .news-grid-wrapper { grid-template-columns: 1fr; }
    }
    </style>

</main>

<?php get_footer(); ?>
