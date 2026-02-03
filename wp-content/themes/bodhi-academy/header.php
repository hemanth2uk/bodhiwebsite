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
