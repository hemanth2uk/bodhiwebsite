<?php
/**
 * Template Name: Contact Us
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="about-hero" style="background: linear-gradient(rgba(0,55,50,0.8), rgba(0,55,50,0.9)), url('https://images.unsplash.com/photo-1596524430615-b46475ddff6e?auto=format&fit=crop&w=1920') no-repeat center center/cover; padding: 120px 0 80px; text-align: center; color: white;">
        <div class="container animate-fade-in">
            <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem;">Reach Out</span>
            <h1 style="font-size: 3.5rem; margin: 10px 0 20px; color: white;"><?php echo get_field('contact_hero_title') ?: 'Contact Bodhi Academy'; ?></h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;"><?php echo get_field('contact_hero_desc') ?: 'Have questions about admissions or courses? We are here to help you achieve your academic goals.'; ?></p>
        </div>
    </section>

    <!-- Contact Content Wrapper -->
    <section class="section-padding" style="position: relative; z-index: 10; padding-top: 60px;">
        <div class="container">
            <div class="contact-wrapper glass-card animate-fade-in" style="overflow: hidden; display: grid; grid-template-columns: 1fr 1.5fr; background: rgba(255,255,255,0.95); border-radius: 30px; box-shadow: 0 30px 60px rgba(0,0,0,0.1); border: 1px solid rgba(255,255,255,0.8);">
                
                <!-- Left: Contact Info (Teal Gradient) -->
                <div class="contact-info" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); padding: 60px; color: white; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">
                    <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: url('https://www.transparenttextures.com/patterns/cubes.png'); opacity: 0.05;"></div>
                    <div style="position: relative; z-index: 1;">
                        <h3 style="color: white; margin-bottom: 40px; font-size: 2.5rem; font-weight: 800;">Let's Connect</h3>
                        <p style="margin-bottom: 40px; opacity: 0.8; font-size: 1.1rem;">Whether you are a student or a parent, we are here to guide you toward enlightenment and success.</p>
                        
                        <div class="info-item" style="margin-bottom: 35px; display: flex; gap: 20px;">
                            <div style="width: 55px; height: 55px; background: rgba(255,255,255,0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; color: var(--accent); flex-shrink: 0; font-size: 1.4rem; border: 1px solid rgba(255,255,255,0.2);">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 style="color:white; font-size:1.1rem; margin-bottom:8px; font-weight: 700;">Location</h4>
                                <p style="font-size: 0.95rem; opacity: 0.85; line-height: 1.7; white-space: pre-line;">
                                    <?php echo get_field('contact_address') ?: "Bodhi Academy, 2nd Floor,\nNear Kaloor Metro Station,\nKochi, Kerala, 682017"; ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="info-item" style="margin-bottom: 35px; display: flex; gap: 20px;">
                            <div style="width: 55px; height: 55px; background: rgba(255,255,255,0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; color: var(--accent); flex-shrink: 0; font-size: 1.4rem; border: 1px solid rgba(255,255,255,0.2);">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4 style="color:white; font-size:1.1rem; margin-bottom:8px; font-weight: 700;">Call Us</h4>
                                <p style="font-size: 1.1rem; font-weight: 600; margin-bottom: 5px;"><?php echo get_field('contact_phone_1') ?: '+91 98765 43210'; ?></p>
                                <p style="font-size: 0.95rem; opacity: 0.85;"><?php echo get_field('contact_phone_2') ?: '0484 - 2345678'; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Presence -->
                    <div style="position: relative; z-index: 1; background: rgba(255,255,255,0.05); padding: 25px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1);">
                        <p style="margin-bottom: 20px; font-weight: 700; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px; color: var(--accent);">Follow Our Success</p>
                        <div style="display: flex; gap: 15px;">
                            <?php 
                            $fb = get_field('contact_fb') ?: '#';
                            $ig = get_field('contact_ig') ?: '#';
                            $tw = get_field('contact_tw') ?: '#';
                            $li = get_field('contact_li') ?: '#';
                            ?>
                            <a href="<?php echo $fb; ?>" class="social-icon" style="width: 45px; height: 45px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--primary); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);"><i class="fab fa-facebook-f"></i></a>
                            <a href="<?php echo $ig; ?>" class="social-icon" style="width: 45px; height: 45px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--primary); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);"><i class="fab fa-instagram"></i></a>
                            <a href="<?php echo $li; ?>" class="social-icon" style="width: 45px; height: 45px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--primary); transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Right: Form Section -->
                <div class="contact-form-section" style="padding: 70px; background: white;">
                    <div style="margin-bottom: 50px;">
                        <span style="color: var(--accent); font-weight: 800; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 3px;">Inquiry Hub</span>
                        <h2 style="font-size: 2.8rem; color: var(--primary); margin: 10px 0 15px; font-weight: 800;">Send a Message</h2>
                        <p style="color: #666; font-size: 1.1rem; line-height: 1.6;">Fill out the form below and our response team will get back to you within 24 hours.</p>
                    </div>
                    
                    <div class="cf7-style-wrap">
                        <?php 
                        $contact_form = get_field('contact_form_shortcode') ?: '[contact-form-7 title="Contact Bodhi Academy (Premium)"]';
                        echo do_shortcode($contact_form); 
                        ?>
                    </div>

                    <style>
                        .cf7-style-wrap input[type="text"],
                        .cf7-style-wrap input[type="email"],
                        .cf7-style-wrap input[type="tel"],
                        .cf7-style-wrap select,
                        .cf7-style-wrap textarea {
                            width: 100%;
                            padding: 18px 25px;
                            border: 2px solid #f0f4f3;
                            border-radius: 15px;
                            background: #f8fbfa;
                            font-family: inherit;
                            font-size: 1rem;
                            color: #333;
                            transition: all 0.3s ease;
                            margin-bottom: 5px;
                        }
                        .cf7-style-wrap input:focus,
                        .cf7-style-wrap textarea:focus {
                            outline: none;
                            border-color: var(--primary);
                            background: #fff;
                            box-shadow: 0 10px 25px rgba(0,91,79,0.05);
                        }
                        .cf7-style-wrap .btn-premium {
                            width: 100%;
                            padding: 22px;
                            background: var(--primary);
                            color: white;
                            border: none;
                            border-radius: 15px;
                            font-weight: 800;
                            font-size: 1.1rem;
                            letter-spacing: 1.5px;
                            cursor: pointer;
                            transition: all 0.4s ease;
                            box-shadow: 0 15px 30px rgba(0,91,79,0.2);
                        }
                        .cf7-style-wrap .btn-premium:hover {
                            background: var(--primary-dark);
                            transform: translateY(-5px);
                            box-shadow: 0 20px 40px rgba(0,91,79,0.3);
                        }
                        .wpcf7-spinner { float: right; margin-top: -50px; }
                        .wpcf7-not-valid-tip { font-size: 0.8rem; color: #e74c3c; margin-top: 5px; }
                        .wpcf7-response-output { 
                            margin: 20px 0 0 !important; 
                            border-radius: 12px !important; 
                            padding: 15px 25px !important;
                            font-weight: 600;
                            text-align: center;
                        }
                    </style>
                </div>
            </div>
            
            <!-- Map Integration -->
             <div class="animate-fade-in" style="margin-top: 100px; border-radius: 30px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.1); height: 500px; position: relative;">
                 <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.071850119859!2d76.284240776!3d9.981881790122176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d40f53195ed%3A0xe549015c8e378f8!2sKaloor%2C%20Kochi%2C%20Kerala!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                 </iframe>
                 <div style="position: absolute; bottom: 30px; left: 30px; background: rgba(255,255,255,0.9); backdrop-filter: blur(10px); padding: 25px 35px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: 1px solid white;">
                    <h4 style="color: var(--primary); font-size: 1.1rem; margin-bottom: 5px;">Bodhi Academy Kochi</h4>
                    <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">2nd Floor, Near Kaloor Metro Station</p>
                    <a href="<?php echo get_field('contact_map_url') ?: '#'; ?>" target="_blank" style="color: var(--primary); font-weight: 700; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                        Open in Google Maps <i class="fas fa-external-link-alt" style="font-size: 0.8rem; color: var(--accent);"></i>
                    </a>
                 </div>
             </div>
             
        </div>
    </section>

</main>

<?php get_footer(); ?>
