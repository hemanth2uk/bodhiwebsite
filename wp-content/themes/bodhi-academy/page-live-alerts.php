<?php
/**
 * Template Name: Live Exam Alerts
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- Hero Section -->
        <section class="live-alerts-hero" style="background: linear-gradient(135deg, var(--primary-dark) 0%, #0a2e26 100%); padding: 100px 0 60px; color: white; position: relative; overflow: hidden;">
            <div class="container" style="position: relative; z-index: 2;">
                <div class="badge" style="background: rgba(255,193,7,0.1); color: var(--accent); padding: 5px 15px; border-radius: 50px; display: inline-block; font-weight: 700; font-size: 0.8rem; margin-bottom: 20px; border: 1px solid rgba(255,193,7,0.3);">
                    <i class="fas fa-satellite-dish" style="margin-right: 8px;"></i> LIVE BROADCAST
                </div>
                <h1 style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px; line-height: 1.1;">Live Exam <span style="color: var(--accent);">Alerts Portal</span></h1>
                <p style="font-size: 1.2rem; opacity: 0.9; max-width: 700px; line-height: 1.6;">Aggregated real-time notifications from Kerala State, CBSE, ICSE, and major entrance exam boards. Never miss a deadline.</p>
            </div>
            <!-- Decorative Elements -->
            <div style="position: absolute; right: -100px; top: -50px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255,193,7,0.05) 0%, transparent 70%); border-radius: 50%;"></div>
        </section>

        <!-- Alerts Content -->
        <section class="alerts-grid-section" style="padding: 60px 0; background: #f8f9fa;">
            <div class="container">
                
                <div class="alerts-container" style="max-width: 1000px; margin: 0 auto;">
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <h3 style="font-weight: 700; color: var(--primary-dark);"><i class="far fa-bell" style="margin-right: 10px; color: var(--accent);"></i> Recent Notifications</h3>
                        <div style="font-size: 0.85rem; color: #666;">
                            <span style="display: inline-block; width: 8px; height: 8px; background: #28a745; border-radius: 50%; margin-right: 5px;"></span> Systems Online & Syncing
                        </div>
                    </div>

                    <div class="alerts-list" style="display: flex; flex-direction: column; gap: 20px;">
                        <?php 
                        $alerts = bodhi_get_live_exam_feed(25); 
                        if ($alerts) : 
                            foreach ($alerts as $alert) : ?>
                                <div class="alert-card" style="background: white; padding: 25px; border-radius: 12px; border-left: 5px solid var(--accent); box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s ease; display: flex; align-items: flex-start; gap: 20px;">
                                    <div class="alert-source" style="background: #f0f2f5; padding: 10px; border-radius: 10px; min-width: 120px; text-align: center;">
                                        <span style="font-size: 0.7rem; color: #888; display: block; text-transform: uppercase; font-weight: 700; margin-bottom: 4px;">Source</span>
                                        <span style="font-size: 0.85rem; font-weight: 800; color: var(--primary-dark);"><?php echo esc_html($alert['source']); ?></span>
                                    </div>
                                    <div class="alert-body" style="flex: 1;">
                                        <div style="font-size: 0.8rem; color: #666; margin-bottom: 8px;">
                                            <i class="far fa-calendar-alt" style="margin-right: 5px;"></i> <?php echo esc_html($alert['date_pref']); ?>
                                        </div>
                                        <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; color: #1a1a1a; line-height: 1.4;"><?php echo esc_html($alert['title']); ?></h4>
                                        <a href="<?php echo esc_url($alert['link']); ?>" target="_blank" class="read-more-btn" style="color: var(--accent); font-weight: 700; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px;">
                                            READ OFFICIAL NOTIFICATION <i class="fas fa-external-link-alt" style="font-size: 0.8rem;"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; 
                        else : ?>
                            <div style="text-align: center; padding: 100px 20px; background: white; border-radius: 15px;">
                                <i class="fas fa-search" style="font-size: 3rem; color: #ddd; margin-bottom: 20px;"></i>
                                <h3>No news items found.</h3>
                                <p>Check back later for live updates.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </section>

    </main>
</div>

<style>
    .alert-card:hover {
        transform: translateX(10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .read-more-btn:hover {
        text-decoration: underline;
    }
    @media (max-width: 768px) {
        .alert-card {
            flex-direction: column;
            padding: 20px;
        }
        .alert-source {
            min-width: unset;
            width: 100%;
        }
        .live-alerts-hero h1 {
            font-size: 2.5rem;
        }
    }
</style>

<?php
get_footer();
