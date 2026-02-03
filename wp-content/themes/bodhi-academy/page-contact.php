<?php
/**
 * Template Name: Contact Us
 */
get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="contact-hero" style="position: relative; height: 60vh; min-height: 400px; background: linear-gradient(rgba(0,55,50,0.8), rgba(0,91,79,0.9)), url('https://images.unsplash.com/photo-1596524430615-b46475ddff6e?auto=format&fit=crop&w=1920') no-repeat center center/cover; display: flex; align-items: center; justify-content: center; text-align: center; color: white;">
        <div class="container">
            <span style="color: var(--accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem;">Get in Touch</span>
            <h1 style="font-size: 3.5rem; margin: 10px 0 20px; color: white;">Contact Bodhi Academy</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Have questions about admissions or courses? We are here to help you achieve your academic goals.</p>
        </div>
    </section>

    <!-- Contact Content Wrapper (Floating Card Style) -->
    <section class="section-padding" style="margin-top: -100px; position: relative; z-index: 10;">
        <div class="container">
            <div class="contact-wrapper" style="background: white; box-shadow: 0 20px 60px rgba(0,0,0,0.1); border-radius: 20px; overflow: hidden; display: grid; grid-template-columns: 1fr 1.5fr;">
                
                <!-- Left: Contact Info (Teal) -->
                <div class="contact-info" style="background: var(--primary); padding: 50px; color: white; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3 style="color: white; margin-bottom: 30px; font-size: 1.8rem;">Contact Info</h3>
                        
                        <div class="info-item" style="margin-bottom: 30px; display: flex; gap: 20px;">
                            <div style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--accent); flex-shrink: 0;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 style="color:white; font-size:1.1rem; margin-bottom:5px;">Visit Us</h4>
                                <p style="font-size: 0.95rem; opacity: 0.9; line-height: 1.6;">
                                    Bodhi Academy, 2nd Floor,<br>
                                    Near Kaloor Metro Station,<br>
                                    Kochi, Kerala, 682017
                                </p>
                            </div>
                        </div>
                        
                        <div class="info-item" style="margin-bottom: 30px; display: flex; gap: 20px;">
                            <div style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--accent); flex-shrink: 0;">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4 style="color:white; font-size:1.1rem; margin-bottom:5px;">Call Us</h4>
                                <p style="font-size: 0.95rem; opacity: 0.9;">+91 98765 43210</p>
                                <p style="font-size: 0.95rem; opacity: 0.9;">0484 - 2345678</p>
                            </div>
                        </div>

                        <div class="info-item" style="margin-bottom: 30px; display: flex; gap: 20px;">
                            <div style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--accent); flex-shrink: 0;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 style="color:white; font-size:1.1rem; margin-bottom:5px;">Email Us</h4>
                                <p style="font-size: 0.95rem; opacity: 0.9;">admissions@bodhiacademy.com</p>
                                <p style="font-size: 0.95rem; opacity: 0.9;">info@bodhiacademy.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Socials -->
                    <div>
                        <p style="margin-bottom: 15px; font-weight: 600;">Follow Us</p>
                        <div style="display: flex; gap: 15px;">
                            <a href="#" style="color: white; opacity: 0.8; font-size: 1.2rem;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" style="color: white; opacity: 0.8; font-size: 1.2rem;"><i class="fab fa-instagram"></i></a>
                            <a href="#" style="color: white; opacity: 0.8; font-size: 1.2rem;"><i class="fab fa-twitter"></i></a>
                            <a href="#" style="color: white; opacity: 0.8; font-size: 1.2rem;"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Right: Form (White) -->
                <div class="contact-form-section" style="padding: 60px;">
                    <h2 class="mb-2" style="font-size: 2rem;">Send us a message</h2>
                    <p style="margin-bottom: 40px; color: var(--text-muted);">Feel free to ask about our courses, fee structure, or admission process.</p>
                    
                    <form action="#" method="POST">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: var(--text-main);">Full Name</label>
                                <input type="text" class="form-control" placeholder="John Doe" style="width: 100%; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f9fafb;">
                            </div>
                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: var(--text-main);">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="+91 90000..." style="width: 100%; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f9fafb;">
                            </div>
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: var(--text-main);">Email Address</label>
                            <input type="email" class="form-control" placeholder="john@example.com" style="width: 100%; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f9fafb;">
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: var(--text-main);">Interested Course</label>
                            <select class="form-control" style="width: 100%; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f9fafb;">
                                <option>Select a Course</option>
                                <option>NEET Regular</option>
                                <option>JEE Advanced</option>
                                <option>KEAM / CUET</option>
                                <option>Foundation (Class 8-10)</option>
                            </select>
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 30px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: var(--text-main);">Your Message</label>
                            <textarea class="form-control" rows="4" placeholder="How can we help you?" style="width: 100%; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f9fafb; resize: none;"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px;">Send Message</button>
                    </form>
                </div>
            </div>
            
            <!-- Map Section -->
             <div style="margin-top: 80px; border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-card); height: 400px; position: relative;">
                 <!-- Static Image for Map Placeholder to look Attractive -->
                 <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1920" alt="Map Location" style="width: 100%; height: 100%; object-fit: cover;">
                 <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px 40px; border-radius: 50px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); font-weight: 700; color: var(--primary);">
                    <i class="fas fa-map-marked-alt" style="margin-right: 10px; color: var(--accent);"></i> Locate on Google Maps
                 </div>
             </div>
             
        </div>
    </section>

</main>

<?php get_footer(); ?>
