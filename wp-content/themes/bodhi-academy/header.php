<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Bodhi Academy offers world-class coaching for NEET, JEE, and Entrance Exams in a serene, focused environment. Awaken the genius within.">
    <meta name="keywords" content="NEET Coaching, JEE Coaching, Entrance Exams, Bodhi Academy, Tuitions, Education">
    <meta name="author" content="Bodhi Academy">
    
    <!-- Open Graph (Social Media) -->
    <meta property="og:title" content="Bodhi Academy - Awaken the Genius Within">
    <meta property="og:description" content="Join Bodhi Academy for premier entrance exam coaching. Experienced mentors, serene campus, and proven results.">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">
    <meta property="og:url" content="<?php echo home_url(); ?>">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bodhi Academy - Excellence in Education">
    <meta name="twitter:description" content="Empowering students to achieve their dreams in NEET & JEE.">
    
    <title><?php wp_title('|', true, 'right'); ?> Bodhi Academy</title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

	<header id="masthead" class="site-header academia-style">
		
        <!-- Global News Ticker -->
        <div class="news-ticker-wrapper" style="background: var(--primary-dark); padding: 12px 0; border-bottom: 2px solid var(--accent); overflow: hidden; position: relative; z-index: 1001;">
            <div class="container" style="display: flex; align-items: center; gap: 30px;">
                <?php 
                // Get the page ID for the Live Exam Alerts template
                $alerts_page = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'page-live-alerts.php',
                    'number' => 1
                ));
                $alerts_url = !empty($alerts_page) ? get_permalink($alerts_page[0]->ID) : home_url('/live-exam-alerts/');
                ?>
                <a href="<?php echo esc_url($alerts_url); ?>" class="news-label-link" style="text-decoration:none; display:block;">
                    <div class="news-label" style="background: var(--accent); color: #000; padding: 4px 15px; border-radius: 4px; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; white-space: nowrap; box-shadow: 0 4px 10px rgba(255,193,7,0.2);">
                        <i class="fas fa-bullhorn" style="margin-right: 6px;"></i> <?php echo get_field('home_news_title', get_option('page_on_front')) ?: 'Live Exam Alerts'; ?>
                    </div>
                </a>
                <div class="ticker-content" style="flex: 1; overflow: hidden; position: relative; height: 30px;">
                    <div class="ticker-inner animate-scroll" style="display: flex; gap: 60px; white-space: nowrap; align-items: center; color: white; font-weight: 500; font-size: 0.95rem; height: 100%;">
                        
                        <!-- Live Feed from External RSS (Priority & Lively) -->
                        <?php 
                        $live_feed = bodhi_get_live_exam_feed(25);
                        if($live_feed) : 
                            foreach($live_feed as $item) : ?>
                                <a href="<?php echo esc_url($item['link']); ?>" target="_blank" style="color:white; text-decoration:none; display:flex; align-items:center;" class="ticker-item-link" title="Official: <?php echo esc_attr($item['source']); ?>">
                                    <span style="background:#ff3b30; color:white; padding:2px 8px; border-radius:4px; font-size:0.65rem; font-weight:800; margin-right:10px; border:1px solid rgba(255,255,255,0.2);">LIVE</span>
                                    <span style="color:var(--accent); font-weight:700; margin-right:8px; font-size:0.8rem;">[<?php echo esc_html($item['source']); ?>]</span>
                                    <?php echo esc_html($item['title']); ?>
                                    <i class="fas fa-external-link-alt" style="margin-left:8px; font-size:0.7rem; opacity:0.6;"></i>
                                </a>
                                <span style="color:rgba(255,255,255,0.2);">|</span>
                            <?php endforeach;
                        endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <style>
            .ticker-item-link:hover {
                color: var(--accent) !important;
                text-decoration: underline !important;
            }
            .news-label-link:hover .news-label {
                background: white !important;
                transform: translateY(-1px);
                transition: all 0.3s ease;
            }
        </style>
		
        <!-- Top Bar: Logo & Info -->
        <div class="header-top">
            <div class="container top-inner">
                
                <!-- Logo Section -->
                <div class="site-branding">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="logo-image"><?php the_custom_logo(); ?></div>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link">
                            <div class="logo-group">
                                <span class="logo-main"><?php echo get_bloginfo( 'name' ); ?></span>
                                <span class="logo-sub"><?php echo get_bloginfo( 'description' ); ?></span>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Info Widgets -->
                <div class="header-widgets">
                    <div class="widget-item">
                        <div class="icon-circle"><i class="far fa-clock"></i></div>
                        <div class="widget-text">
                            <span class="label"><?php echo get_theme_mod('header_hours_label', 'Monday - Friday'); ?></span>
                            <span class="value"><?php echo get_theme_mod('header_hours_value', '8:00AM - 8:00PM'); ?></span>
                        </div>
                    </div>
                    <div class="widget-item">
                        <div class="icon-circle"><i class="fas fa-phone-alt"></i></div>
                        <div class="widget-text">
                            <span class="label"><?php echo get_theme_mod('header_phone_label', 'Call Us'); ?></span>
                            <span class="value"><?php echo get_theme_mod('header_phone_value', '+91 987 654 3210'); ?></span>
                        </div>
                    </div>
                    
                    <!-- Socials -->
                    <div class="header-socials">
                        <a href="<?php echo esc_url(get_theme_mod('header_fb_link', '#')); ?>"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo esc_url(get_theme_mod('header_tw_link', '#')); ?>"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo esc_url(get_theme_mod('header_ig_link', '#')); ?>"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar: Nav & CTA -->
        <div class="header-bottom">
            <div class="container bottom-inner">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>

                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                        )
                    );
                    ?>
                </nav>

                <div class="header-cta">
                    <a href="<?php echo esc_url( home_url( get_theme_mod('header_cta_link', '/contact-us') ) ); ?>" class="btn-angled">
                        <span><?php echo get_theme_mod('header_cta_text', 'CONTACT US'); ?></span>
                    </a>
                </div>
            </div>
        </div>

	</header>
