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
    <section id="tracks" class="section-padding" style="padding: 80px 0; background: #f9f9f9;">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 style="font-size: 2.5rem; color: var(--primary); font-weight: 800;"><?php echo get_field('tuition_tracks_title') ?: 'Our Academic Tracks'; ?></h2>
                <p style="color: #666;"><?php echo get_field('tuition_tracks_sub') ?: 'Comprehensive support for every stage of your school journey.'; ?></p>
            </div>

            <div class="tracks-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                
                <!-- Track 1 -->
                <div class="track-card animate-fade-up" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                    <div class="card-img" style="height: 200px; background: #ddd; position: relative;">
                        <?php if($track1_img): ?>
                            <img src="<?php echo esc_url($track1_img); ?>" alt="<?php echo esc_attr($track1_title); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #eee; color: #999;">No Image</div>
                        <?php endif; ?>
                        <div class="track-badge" style="position: absolute; top: 15px; right: 15px; background: white; padding: 5px 12px; border-radius: 5px; font-size: 0.8rem; font-weight: 700; color: var(--primary);"><?php echo get_field('tuition_track_1_badge') ?: 'CLASS 8-10'; ?></div>
                    </div>
                    <div class="card-body" style="padding: 30px;">
                        <h3 style="color: var(--primary); font-size: 1.5rem; margin-bottom: 15px;"><?php echo esc_html($track1_title); ?></h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;"><?php echo esc_html($track1_desc); ?></p>
                        <a href="/contact-us" class="btn-text" style="color: var(--primary); font-weight: 700; text-decoration: none;">Enquire Now &rarr;</a>
                    </div>
                </div>

                <!-- Track 2 -->
                <div class="track-card animate-fade-up delay-100" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                    <div class="card-img" style="height: 200px; background: #ddd; position: relative;">
                         <?php if($track2_img): ?>
                            <img src="<?php echo esc_url($track2_img); ?>" alt="<?php echo esc_attr($track2_title); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #eee; color: #999;">No Image</div>
                        <?php endif; ?>
                         <div class="track-badge" style="position: absolute; top: 15px; right: 15px; background: white; padding: 5px 12px; border-radius: 5px; font-size: 0.8rem; font-weight: 700; color: var(--primary);"><?php echo get_field('tuition_track_2_badge') ?: '+1 & +2'; ?></div>
                    </div>
                    <div class="card-body" style="padding: 30px;">
                        <h3 style="color: var(--primary); font-size: 1.5rem; margin-bottom: 15px;"><?php echo esc_html($track2_title); ?></h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;"><?php echo esc_html($track2_desc); ?></p>
                        <a href="/contact-us" class="btn-text" style="color: var(--primary); font-weight: 700; text-decoration: none;">Enquire Now &rarr;</a>
                    </div>
                </div>

                <!-- Track 3 -->
                <div class="track-card animate-fade-up delay-200" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                    <div class="card-img" style="height: 200px; background: #ddd; position: relative;">
                         <?php if($track3_img): ?>
                            <img src="<?php echo esc_url($track3_img); ?>" alt="<?php echo esc_attr($track3_title); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #eee; color: #999;">No Image</div>
                        <?php endif; ?>
                         <div class="track-badge" style="position: absolute; top: 15px; right: 15px; background: white; padding: 5px 12px; border-radius: 5px; font-size: 0.8rem; font-weight: 700; color: var(--accent);"><?php echo get_field('tuition_track_3_badge') ?: 'CRASH COURSE'; ?></div>
                    </div>
                    <div class="card-body" style="padding: 30px;">
                        <h3 style="color: var(--primary); font-size: 1.5rem; margin-bottom: 15px;"><?php echo esc_html($track3_title); ?></h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;"><?php echo esc_html($track3_desc); ?></p>
                        <a href="/contact-us" class="btn-text" style="color: var(--primary); font-weight: 700; text-decoration: none;">Enquire Now &rarr;</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="why-section" style="padding: 80px 0; background: var(--primary); color: white;">
        <div class="container text-center">
             <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 50px;"><?php echo get_field('tuition_why_title') ?: 'Why Choose Bodhi Tuitions?'; ?></h2>
             <div class="why-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                 <div class="why-item">
                     <i class="fas fa-chalkboard-teacher" style="font-size: 3rem; color: var(--accent); margin-bottom: 20px;"></i>
                     <h4 style="font-size: 1.2rem; margin-bottom: 10px;"><?php echo get_field('tuition_why_1_title') ?: 'Expert Faculty'; ?></h4>
                     <p style="opacity: 0.8;"><?php echo get_field('tuition_why_1_desc') ?: 'Learn from the best minds in the industry with years of experience.'; ?></p>
                 </div>
                 <div class="why-item">
                     <i class="fas fa-book-open" style="font-size: 3rem; color: var(--accent); margin-bottom: 20px;"></i>
                     <h4 style="font-size: 1.2rem; margin-bottom: 10px;"><?php echo get_field('tuition_why_2_title') ?: 'Comprehensive Material'; ?></h4>
                     <p style="opacity: 0.8;"><?php echo get_field('tuition_why_2_desc') ?: 'Detailed study notes and practice papers for every chapter.'; ?></p>
                 </div>
                 <div class="why-item">
                     <i class="fas fa-user-graduate" style="font-size: 3rem; color: var(--accent); margin-bottom: 20px;"></i>
                     <h4 style="font-size: 1.2rem; margin-bottom: 10px;"><?php echo get_field('tuition_why_3_title') ?: 'Personal Guidance'; ?></h4>
                     <p style="opacity: 0.8;"><?php echo get_field('tuition_why_3_desc') ?: 'Individual attention and doubt clearing sessions.'; ?></p>
                 </div>
             </div>
        </div>
    </section>

</div>

<style>
    .track-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }
    .track-card:hover .btn-text {
        text-decoration: underline !important;
    }
</style>

<?php get_footer(); ?>
