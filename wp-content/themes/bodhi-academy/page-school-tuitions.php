<?php
/**
 * Template Name: School & Tuitions
 */

get_header();

// Fetch ACF Fields
$hero_title = get_field('tuition_hero_title') ?: 'Academic Excellence';
$hero_sub   = get_field('tuition_hero_sub') ?: 'School Tuitions & Foundation Courses';
$hero_img   = get_field('tuition_hero_image') ?: get_template_directory_uri() . '/assets/images/hero-bg.jpg';

// Tracks
$track1_title = get_field('tuition_track_1_title') ?: 'High School Foundation';
$track1_desc  = get_field('tuition_track_1_desc') ?: 'Strong foundation for Class 8, 9 & 10 students.';
$track1_img   = get_field('tuition_track_1_image');

$track2_title = get_field('tuition_track_2_title') ?: 'Higher Secondary (+1/+2)';
$track2_desc  = get_field('tuition_track_2_desc') ?: 'Expert coaching for Physics, Chemistry, Maths & Biology.';
$track2_img   = get_field('tuition_track_2_image');

$track3_title = get_field('tuition_track_3_title') ?: 'Board Exam Prep';
$track3_desc  = get_field('tuition_track_3_desc') ?: 'Dedicated batches for final board exam revision.';
$track3_img   = get_field('tuition_track_3_image');
?>

<div class="tuitions-page">

    <!-- Hero Section -->
    <section class="hero-section" style="background: url('<?php echo esc_url($hero_img); ?>') no-repeat center center/cover; position: relative; height: 60vh; display: flex; align-items: center;">
        <div class="overlay" style="position: absolute; inset: 0; background: linear-gradient(90deg, rgba(0,77,64,0.9), rgba(0,77,64,0.4));"></div>
        
        <div class="container" style="position: relative; z-index: 2;">
            <div class="hero-content animate-fade-up" style="max-width: 700px;">
                <span class="badge" style="background: var(--accent); color: #000; padding: 5px 15px; border-radius: 20px; font-weight: 700; font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase;"><?php echo get_field('tuition_hero_badge') ?: 'Build Your Future'; ?></span>
                <h1 style="font-size: 3.5rem; font-weight: 800; color: white; margin: 20px 0; line-height: 1.1;"><?php echo esc_html($hero_title); ?></h1>
                <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9); margin-bottom: 30px;"><?php echo esc_html($hero_sub); ?></p>
                <a href="#tracks" class="btn btn-primary" style="padding: 15px 40px; font-size: 1rem; box-shadow: 0 10px 20px rgba(0,0,0,0.2);"><?php echo get_field('tuition_hero_btn') ?: 'Explore Batches'; ?></a>
            </div>
        </div>
    </section>

    <!-- Academic Tracks Section -->
    <section id="tracks" class="section-padding" style="padding: 100px 0; background: radial-gradient(circle at top left, #f5fbfb 0%, #ffffff 100%);">
        <div class="container">
            <div class="section-header text-center mb-5 animate-fade-up">
                <span style="color:var(--primary); font-weight:700; text-transform:uppercase; letter-spacing:2px; font-size:0.9rem;">Tailored Learning Paths</span>
                <h2 style="font-size: 3rem; color: var(--primary); font-weight: 800; margin-top:10px;"><?php echo get_field('tuition_tracks_title') ?: 'Our Academic Tracks'; ?></h2>
                <div style="width: 80px; height: 4px; background: var(--accent); margin: 20px auto; border-radius: 2px;"></div>
                <p style="color: #666; max-width: 700px; margin: 0 auto;"><?php echo get_field('tuition_tracks_sub') ?: 'Comprehensive support for every stage of your school journey.'; ?></p>
            </div>

            <div class="tracks-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; margin-top: 50px;">
                
                <!-- Track 1 -->
                <div class="track-card animate-fade-up glass-card" style="border-radius: 30px; overflow: hidden; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); border: 1px solid var(--glass-border);">
                    <div class="card-img" style="height: 240px; position: relative; overflow: hidden;">
                        <?php if($track1_img): ?>
                            <img src="<?php echo esc_url($track1_img); ?>" alt="<?php echo esc_attr($track1_title); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #e0f2f1, #b2dfdb); color: var(--primary);"><i class="fas fa-laptop-code fa-3x"></i></div>
                        <?php endif; ?>
                        <div class="track-badge" style="position: absolute; top: 20px; right: 20px; background: var(--accent); color: #000; padding: 6px 15px; border-radius: 30px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; box-shadow: 0 5px 15px rgba(255,193,7,0.3);"><?php echo get_field('tuition_track_1_badge') ?: 'ONLINE LEARNING'; ?></div>
                    </div>
                    <div class="card-body" style="padding: 40px;">
                        <h3 style="color: var(--primary-dark); font-size: 1.6rem; font-weight: 700; margin-bottom: 20px; line-height: 1.3;"><?php echo esc_html($track1_title); ?></h3>
                        <p style="color: #555; line-height: 1.8; margin-bottom: 30px; font-size: 0.95rem;"><?php echo esc_html($track1_desc); ?></p>
                        <a href="/contact-us" class="btn btn-primary" style="width:100%; justify-content:center; border-radius: 15px; padding: 12px 0;">Get Started <i class="fas fa-rocket" style="margin-left:10px;"></i></a>
                    </div>
                </div>

                <!-- Track 2 -->
                <div class="track-card animate-fade-up delay-100 glass-card" style="border-radius: 30px; overflow: hidden; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); border: 1px solid var(--glass-border);">
                    <div class="card-img" style="height: 240px; position: relative; overflow: hidden;">
                         <?php if($track2_img): ?>
                            <img src="<?php echo esc_url($track2_img); ?>" alt="<?php echo esc_attr($track2_title); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #e0f2f1, #b2dfdb); color: var(--primary);"><i class="fas fa-campground fa-3x"></i></div>
                        <?php endif; ?>
                         <div class="track-badge" style="position: absolute; top: 20px; right: 20px; background: var(--accent); color: #000; padding: 6px 15px; border-radius: 30px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; box-shadow: 0 5px 15px rgba(255,193,7,0.3);"><?php echo get_field('tuition_track_2_badge') ?: 'OFFLINE CENTERS'; ?></div>
                    </div>
                    <div class="card-body" style="padding: 40px;">
                        <h3 style="color: var(--primary-dark); font-size: 1.6rem; font-weight: 700; margin-bottom: 20px; line-height: 1.3;"><?php echo esc_html($track2_title); ?></h3>
                        <p style="color: #555; line-height: 1.8; margin-bottom: 30px; font-size: 0.95rem;"><?php echo esc_html($track2_desc); ?></p>
                        <a href="/contact-us" class="btn btn-primary" style="width:100%; justify-content:center; border-radius: 15px; padding: 12px 0;">Visit Center <i class="fas fa-map-marker-alt" style="margin-left:10px;"></i></a>
                    </div>
                </div>

                <!-- Track 3 -->
                <div class="track-card animate-fade-up delay-200 glass-card" style="border-radius: 30px; overflow: hidden; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); border: 1px solid var(--glass-border);">
                    <div class="card-img" style="height: 240px; position: relative; overflow: hidden;">
                         <?php if($track3_img): ?>
                            <img src="<?php echo esc_url($track3_img); ?>" alt="<?php echo esc_attr($track3_title); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #e0f2f1, #b2dfdb); color: var(--primary);"><i class="fas fa-school fa-3x"></i></div>
                        <?php endif; ?>
                         <div class="track-badge" style="position: absolute; top: 20px; right: 20px; background: var(--accent); color: #000; padding: 6px 15px; border-radius: 30px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; box-shadow: 0 5px 15px rgba(255,193,7,0.3);"><?php echo get_field('tuition_track_3_badge') ?: 'CAMPUS PROGRAM'; ?></div>
                    </div>
                    <div class="card-body" style="padding: 40px;">
                        <h3 style="color: var(--primary-dark); font-size: 1.6rem; font-weight: 700; margin-bottom: 20px; line-height: 1.3;"><?php echo esc_html($track3_title); ?></h3>
                        <p style="color: #555; line-height: 1.8; margin-bottom: 30px; font-size: 0.95rem;"><?php echo esc_html($track3_desc); ?></p>
                        <a href="/contact-us" class="btn btn-primary" style="width:100%; justify-content:center; border-radius: 15px; padding: 12px 0;">Enquire Now <i class="fas fa-graduation-cap" style="margin-left:10px;"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="why-section" style="padding: 120px 0; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(255,255,255,0.03); border-radius: 50%;"></div>
        <div style="position: absolute; bottom: -100px; left: -100px; width: 400px; height: 400px; background: rgba(255,255,255,0.03); border-radius: 50%;"></div>
        
        <div class="container text-center" style="position: relative; z-index: 2;">
             <div class="animate-fade-up">
                <span style="color:var(--accent); font-weight:700; text-transform:uppercase; letter-spacing:2px; font-size:0.9rem;">The Bodhi Advantage</span>
                <h2 style="font-size: 3rem; font-weight: 800; margin-top: 20px; margin-bottom: 60px;"><?php echo get_field('tuition_why_title') ?: 'Why Choose Bodhi Tuitions?'; ?></h2>
             </div>

             <div class="why-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 50px;">
                 <div class="why-item animate-fade-up" style="background: rgba(255,255,255,0.05); padding: 50px 30px; border-radius: 20px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
                     <div style="width: 80px; height: 80px; background: rgba(255,193,7,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px;">
                        <i class="fas fa-chalkboard-teacher" style="font-size: 2.5rem; color: var(--accent);"></i>
                     </div>
                     <h4 style="font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;"><?php echo get_field('tuition_why_1_title') ?: 'Expert Mentorship'; ?></h4>
                     <p style="opacity: 0.8; line-height: 1.6;"><?php echo get_field('tuition_why_1_desc') ?: 'Learn from academic experts who bridge the gap between theory and application.'; ?></p>
                 </div>

                 <div class="why-item animate-fade-up delay-100" style="background: rgba(255,255,255,0.05); padding: 50px 30px; border-radius: 20px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
                     <div style="width: 80px; height: 80px; background: rgba(255,193,7,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px;">
                        <i class="fas fa-brain" style="font-size: 2.5rem; color: var(--accent);"></i>
                     </div>
                     <h4 style="font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;"><?php echo get_field('tuition_why_2_title') ?: 'Result Analytics'; ?></h4>
                     <p style="opacity: 0.8; line-height: 1.6;"><?php echo get_field('tuition_why_2_desc') ?: 'Every result is analyzed to identify natural strengths and fine-tune your exam strategy.'; ?></p>
                 </div>

                 <div class="why-item animate-fade-up delay-200" style="background: rgba(255,255,255,0.05); padding: 50px 30px; border-radius: 20px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
                     <div style="width: 80px; height: 80px; background: rgba(255,193,7,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px;">
                        <i class="fas fa-spa" style="font-size: 2.5rem; color: var(--accent);"></i>
                     </div>
                     <h4 style="font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;"><?php echo get_field('tuition_why_3_title') ?: 'Holistic Wellness'; ?></h4>
                     <p style="opacity: 0.8; line-height: 1.6;"><?php echo get_field('tuition_why_3_desc') ?: 'Short mindfulness sessions ensure you stay calm and focused during intense study.'; ?></p>
                 </div>
             </div>
        </div>
    </section>

</div>

<style>
    .track-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(0,0,0,0.12) !important;
    }
    .track-card:hover img {
        transform: scale(1.1);
    }
    .why-item {
        transition: transform 0.3s ease;
    }
    .why-item:hover {
        transform: scale(1.05);
        background: rgba(255,255,255,0.08) !important;
    }
</style>

<?php get_footer(); ?>
