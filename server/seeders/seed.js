const bcrypt = require('bcryptjs');
const { 
  sequelize, User, Page, Course, Service, FAQ, 
  Testimonial, HeroSlide, SiteSetting, Centre, Batch, 
  Fee, Timetable 
} = require('../models');

async function seed() {
  try {
    await sequelize.authenticate();
    console.log('Connected to MySQL for seeding...');

    // 1. Seed Users (password: "password" for all)
    const salt = await bcrypt.genSalt(10);
    const password_hash = await bcrypt.hash('password', salt);

    const usersData = [
      { name: 'Demo Student', email: 'student@gmail.com', role: 'student', phone: '+91 98765 43210' },
      { name: 'Demo Parent', email: 'parent@gmail.com', role: 'parent', phone: '+91 98765 43211' },
      { name: 'Demo Teacher', email: 'teacher@gmail.com', role: 'teacher', phone: '+91 98765 43212' },
      { name: 'Demo Mentor', email: 'mentor@gmail.com', role: 'mentor', phone: '+91 98765 43213' },
      { name: 'Demo Coordinator', email: 'coordinator@gmail.com', role: 'coordinator', phone: '+91 98765 43214' }
    ];

    for (const u of usersData) {
      const existing = await User.findOne({ where: { email: u.email } });
      if (!existing) {
        await User.create({
          ...u,
          password_hash,
          status: 'active'
        });
      }
    }
    console.log('✅ Demo Users seeded');

    // 2. Seed Site Settings
    const settingsData = {
      site_name: 'Bodhi Education',
      tagline: 'Awaken the Genius Within',
      logo_url: '/logo.png',
      phone: '+91 89211 80598',
      whatsapp: '918921180598',
      email: 'info@bodhieducation.com',
      address: 'TC No. 73/1970-2 (MSS Arcade), Manacaud, Thiruvananthapuram, Kerala, India, 695009',
      hours: 'Mon – Fri 8:00 AM – 8:00 PM',
      news_ticker: '🎯 NEET & JEE 2027 admissions open | Bodhi Science Centres at Karamana & Neyyattinkara | Free demo classes available'
    };

    for (const [key, val] of Object.entries(settingsData)) {
      const existing = await SiteSetting.findOne({ where: { setting_key: key } });
      if (!existing) {
        await SiteSetting.create({ setting_key: key, setting_value: val });
      }
    }
    console.log('✅ Site Settings seeded');

    // 3. Seed About Page
    const aboutContent = `Bodhi Education is Kerala’s pioneering educational research and development platform, dedicated to empowering students by enhancing their skills and unlocking their true potential. We support the students to attain their goals. Comprising a dynamic team of academic experts, researchers, and technocrats, we collaborate to design innovative strategies and cutting-edge technologies that revolutionize India’s education sector.

Bodhi believes that, "every child has his/her own uniqueness". Find and shape them as future talents are the real task. Bodhi Education envisions itself as a unique and dynamic human resource development initiative dedicated to empowering students through a highly sophisticated coaching and support ecosystem. We aim to identify, strengthen, and refine the innate abilities of every learner, enabling them to dream confidently and achieve excellence in their chosen professional careers.

Through integrated academic excellence, mentorship-driven guidance, technology-enabled learning, and value-based education, Bodhi Education seeks to create competent, confident, and socially responsible professionals who contribute meaningfully to society.`;

    const existingAbout = await Page.findOne({ where: { slug: 'about-us' } });
    if (!existingAbout) {
      await Page.create({
        slug: 'about-us',
        title: 'Welcome to Bodhi Education',
        content: aboutContent,
        meta_description: 'About Bodhi Education, leading entrance coaching and educational research platform in Kerala.'
      });
    }
    console.log('✅ About page seeded');

    // 4. Seed Courses
    const coursesData = [
      {
        title: 'Pre-Foundation',
        slug: 'pre-foundation',
        short_desc: 'Igniting the Spark of Science & Math discovery for young minds.',
        description: 'Target Group: Classes 5, 6, and 7. Instead of rote memorization, we turn natural curiosity into a love for Science and Mathematics through fearless learning, mindful play, and nurturing mentorship.',
        color: '#0b7f6e',
        icon: '🌱',
        target_group: 'Classes 5, 6, 7',
        highlights: ['Discovery-based learning', 'Olympiad & Talent exams', 'Nurturing mentorship', 'Mindful breathing'],
        display_order: 1
      },
      {
        title: 'Foundation',
        slug: 'foundation',
        short_desc: 'Building the Roots of Excellence for NEET, JEE & National Entrances.',
        description: 'Target Group: Classes 8, 9, and 10. Bridges the gap between school textbooks and advanced entrance logic at a comfortable pace with smart analytics and conceptual clarity.',
        color: '#1a8a55',
        icon: '🏛️',
        target_group: 'Classes 8, 9, 10',
        highlights: ['30-40% entrance syllabus covered early', 'Stress-free 3-year preparation', 'Logical clarity', 'Smart analytics'],
        display_order: 2
      },
      {
        title: 'Long-term (+1 & +2)',
        slug: 'long-term',
        short_desc: 'Excellence Your Way — Integrated school, weekend, or tuition hybrid batches.',
        description: 'Target Group: Classes 11 and 12 (+1 & +2). A 2-year marathon covering NEET, JEE, and KEAM with high consistency, mental resilience, and continuous personalized calibration.',
        color: '#0d7f93',
        icon: '🎯',
        target_group: 'Classes 11 & 12',
        highlights: ['Integrated School Program', 'Weekend Batches', 'Tuition + Entrance hybrid', '2-year consistent mentoring'],
        display_order: 3
      },
      {
        title: 'Crash Course',
        slug: 'crash-course',
        short_desc: 'Your Final Step to Entrance Ranker — Speed, accuracy & mental endurance.',
        description: 'Target Group: Post Class 12. Strategic direction and intensive practice directly after board exams to turn subject knowledge into top entrance ranks with zero panic.',
        color: '#d6453d',
        icon: '⚡',
        target_group: 'Post Class 12',
        highlights: ['Time management shortcuts', 'Stress recovery & peak mental clarity', 'Daily mock drills', 'Doubt clearance'],
        display_order: 4
      },
      {
        title: 'Repeaters (Droppers)',
        slug: 'repeaters',
        short_desc: 'Refine. Rebuild. Reclaim. Transforming lost marks into earned ranks.',
        description: 'Target Group: Class 12 Pass-outs dedicating a year exclusively to NEET, JEE, or KEAM. Analytical diagnostics of past attempts, daily mindfulness, and advanced problem-solving.',
        color: '#b86e00',
        icon: '🔥',
        target_group: 'Class 12 Pass-outs',
        highlights: ['100% focused gap-year investment', 'Diagnostic error analysis', 'Zen-like resilience', 'Specialist dropper mentors'],
        display_order: 5
      },
      {
        title: 'Academic Tuition',
        slug: 'academic-tuition',
        short_desc: 'Mastering the Foundation — Conceptual clarity & Board Exam excellence.',
        description: 'Focus exclusively on the Class 11 & 12 Board Exam curriculum. Total subject mastery without entrance pressure so students enjoy science and score 95%+ in boards.',
        color: '#5a35a0',
        icon: '📖',
        target_group: 'Classes 11 & 12',
        highlights: ['Concept-first mentorship', 'Calm classroom environment', 'Board exam pattern diagnostics', 'Solid academic marks'],
        display_order: 6
      },
      {
        title: 'Bridge Course',
        slug: 'bridge-course',
        short_desc: 'Transition with Confidence — From 10th-grade to 11th-grade Science.',
        description: 'Conducted during Summer Holidays for students moving from Class 10 to Class 11. Introduces complex topics like Calculus and Organic Chemistry gently with a solid head start.',
        color: '#e8781e',
        icon: '🌉',
        target_group: 'Class 10 to 11 moving',
        highlights: ['Summer break head start', 'Smoothing the steep science curve', 'Aptitude readiness analysis', 'Fun & creative learning'],
        display_order: 7
      }
    ];

    for (const c of coursesData) {
      const existing = await Course.findOne({ where: { slug: c.slug } });
      if (!existing) {
        await Course.create(c);
      }
    }
    console.log('✅ Courses seeded');

    // 5. Seed Services
    const servicesData = [
      { title: 'Live & Recorded Classes', description: 'Stream interactive live sessions with Gurus or watch high-definition recordings anytime 24/7.', icon: '🎥', color: '#0b7f6e', display_order: 1 },
      { title: 'Smart Timetable & Reminders', description: 'Daily personalized schedules with notifications the day before so students arrive prepared.', icon: '🗓️', color: '#075c50', display_order: 2 },
      { title: 'Post-Class Workouts & Mocks', description: 'Practice immediate workouts after every class with instant marks, hints, and video solutions.', icon: '🏋️', color: '#1a8a55', display_order: 3 },
      { title: 'Doubt Clearance Box', description: 'Post doubts directly to subject specialists with step-by-step verified explanations within hours.', icon: '❓', color: '#d6453d', display_order: 4 },
      { title: 'Personal Mentor Connect', description: 'One-on-one psychological and academic guidance to overcome anxiety and build confidence.', icon: '👩‍🏫', color: '#8a63d6', display_order: 5 },
      { title: 'Attendance & Performance Tracking', description: 'Live punch-in monitoring, percentage calendars, and detailed report cards accessible by parents.', icon: '📊', color: '#b86e00', display_order: 6 }
    ];

    for (const s of servicesData) {
      const count = await Service.count();
      if (count === 0) {
        await Service.bulkCreate(servicesData);
        break;
      }
    }
    console.log('✅ Services seeded');

    // 6. Seed FAQs
    const faqsData = [
      { question: 'What programs are available at Bodhi Education?', answer: 'We offer Pre-Foundation (Classes 5-7), Foundation (Classes 8-10), Long-term (+1, +2), Crash courses, Repeater programs, Academic Tuition, and Summer Bridge courses for NEET, JEE, and KEAM.', display_order: 1 },
      { question: 'Where are the Bodhi learning centres located?', answer: 'We have physical offline centres at Karamana and Neyyattinkara in Thiruvananthapuram, as well as a full Bodhi Online platform accessible anywhere.', display_order: 2 },
      { question: 'How does the Hybrid Learning model work?', answer: 'Students learn before class through short preview videos, attend interactive in-person lectures, and reinforce knowledge with post-class workouts and doubt sessions.', display_order: 3 },
      { question: 'Can parents track their child’s attendance and progress?', answer: 'Yes! The Bodhi Portal provides a dedicated Parent login where you can see daily attendance, test marks, fee receipts, and connect directly with your child’s mentor.', display_order: 4 },
      { question: 'What is the role of the Mentor at Bodhi?', answer: 'Mentors are experienced guides who address stress, exam anxiety, time management, and motivation, ensuring students maintain high morale and well-being.', display_order: 5 },
      { question: 'How can I enroll in a course?', answer: 'You can register directly on our website, call us at +91 89211 80598, or visit our Karamana or Neyyattinkara centres for a free counseling session.', display_order: 6 }
    ];

    const faqsCount = await FAQ.count();
    if (faqsCount === 0) {
      await FAQ.bulkCreate(faqsData);
    }
    console.log('✅ FAQs seeded');

    // 7. Seed Testimonials
    const testimonialsData = [
      { name: 'Dr. Rajesh Kumar (Parent)', role: 'Father of Ananya (NEET AIR 412)', quote: 'The calm, focused Bodhi approach changed Ananya’s preparation completely. She cracked NEET without feeling burned out.', stars: 5, display_order: 1 },
      { name: 'Adithya S. (Student)', role: 'JEE Advanced Ranker', quote: 'The teachers at Karamana centre make Physics so intuitive. The post-class workouts and doubt clearance box were game changers.', stars: 5, display_order: 2 },
      { name: 'Meera Nair (Student)', role: 'Class 12 Board 98.4%', quote: 'Tuition plus entrance hybrid batch gave me the exact balance I needed between school examinations and competitive entrance prep.', stars: 5, display_order: 3 }
    ];

    const testCount = await Testimonial.count();
    if (testCount === 0) {
      await Testimonial.bulkCreate(testimonialsData);
    }
    console.log('✅ Testimonials seeded');

    // 8. Seed Hero Slides
    const heroSlidesData = [
      {
        title: 'Awaken the Genius Within',
        subtitle: '🍃 Knowledge is Power',
        description: 'World-class coaching for NEET, JEE, KEAM, and Foundation in a serene, high-performance environment.',
        bg_color: '#075c50',
        stats: { students: '5,000+', gurus: '120+', success: '98%' },
        display_order: 1
      },
      {
        title: 'Hybrid Learning That Works',
        subtitle: '🚀 Learn • Practice • Master',
        description: 'Combine the best of offline classroom teaching with 24/7 web & mobile app access.',
        bg_color: '#0b7f6e',
        stats: { students: '5,000+', centres: '2 + Online', success: '98%' },
        display_order: 2
      }
    ];

    const heroCount = await HeroSlide.count();
    if (heroCount === 0) {
      await HeroSlide.bulkCreate(heroSlidesData);
    }
    console.log('✅ Hero Slides seeded');

    // 9. Seed Centres
    const centresData = [
      { name: 'Karamana Centre', location: 'Karamana, Thiruvananthapuram, Kerala' },
      { name: 'Neyyattinkara Centre', location: 'Neyyattinkara, Thiruvananthapuram, Kerala' },
      { name: 'Bodhi Online', location: 'Global Virtual Campus' }
    ];

    const centreCount = await Centre.count();
    if (centreCount === 0) {
      await Centre.bulkCreate(centresData);
    }
    console.log('✅ Centres seeded');

    console.log('🎉 Seeding completed successfully!');
    process.exit(0);
  } catch (err) {
    console.error('❌ Seeding failed:', err);
    process.exit(1);
  }
}

seed();

