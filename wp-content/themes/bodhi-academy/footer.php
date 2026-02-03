	<footer id="colophon" class="site-footer">
		<div class="container">
            <div class="footer-grid">
                
                <div class="footer-col col-about">
                    <a href="<?php echo home_url(); ?>" class="footer-logo">
                        <span style="color:#FFC107; font-size:1.8rem; font-weight:800;">Bodhi</span> <span style="color:white; font-size:1.8rem; font-weight:700;">Academy</span>
                    </a>
                    <p class="footer-desc" style="margin-top:15px; opacity:0.8;">
                        Empowering students with expert coaching for NEET, JEE, and Entrance Exams.
                    </p>
                    
                    <!-- Newsletter -->
                    <div class="footer-newsletter" style="margin: 25px 0;">
                        <h5 style="color:white; margin-bottom:10px; font-size:0.95rem;">Join our Newsletter</h5>
                        <div style="display:flex; gap:10px;">
                            <input type="email" placeholder="Enter your email" style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.2); padding:10px 15px; border-radius:50px; color:white; width:100%; outline:none;">
                            <button style="background:var(--accent); border:none; width:40px; height:40px; border-radius:50%; color:#000; cursor:pointer; display:flex; align-items:center; justify-content:center;"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>

                    <div class="social-icons">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Column 2: Courses (Displayed as 2 sub-columns) -->
                <div class="footer-col col-courses">
                    <h4 class="footer-heading">Courses</h4>
                    <div class="courses-grid">
                        <ul class="course-list">
                            <li><a href="#">NEET</a></li>
                            <li><a href="#">JEE</a></li>
                            <li><a href="#">KEAM</a></li>
                        </ul>
                        <ul class="course-list">
                            <li><a href="#">CUET</a></li>
                            <li><a href="#">Science 11 & 12</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Column 3: Quick Links -->
                <div class="footer-col col-links">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#">App Login</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Us -->
                <div class="footer-col col-contact">
                    <h4 class="footer-heading">Contact Us</h4>
                    <ul class="contact-list">
                        <li><i class="fas fa-envelope"></i> admissions@bodhiacademy.com</li>
                        <li><i class="fas fa-phone"></i> +91 98765 43210</li>
                        <li><i class="fab fa-whatsapp"></i> +91 98765 43210</li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> 
                            Bodhi Academy,<br>
                            Kaloor, Kochi,<br>
                            Kerala, 682017
                        </li>
                    </ul>
                </div>

            </div><!-- .footer-grid -->
		</div><!-- .container -->

        <!-- Bottom Strip -->
        <div class="site-info-strip">
            <div class="container">
                <nav class="footer-bottom-nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer_bottom',
                            'menu_class'     => 'bottom-menu-list',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
