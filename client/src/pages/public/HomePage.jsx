import NewsBar from '../../components/NewsBar';
import Navbar from '../../components/Navbar';
import HeroSection from '../../components/HeroSection';
import HeroSlider from '../../components/HeroSlider';
import StatsBar from '../../components/StatsBar';
import AboutSection from '../../components/AboutSection';
import CoursesSection from '../../components/CoursesSection';
import ServicesSection from '../../components/ServicesSection';
import HybridSection from '../../components/HybridSection';
import AppPreview from '../../components/AppPreview';
import TestimonialsSection from '../../components/TestimonialsSection';
import FAQSection from '../../components/FAQSection';
import ContactSection from '../../components/ContactSection';
import Footer from '../../components/Footer';
import FloatingButtons from '../../components/FloatingButtons';

export default function HomePage() {
  return (
    <div style={{ minHeight: '100vh', background: 'var(--bg)', color: 'var(--ink)' }}>
      <NewsBar />
      <Navbar />
      <main>
        <HeroSection />
        <HeroSlider />
        <StatsBar />
        <AboutSection />
        <CoursesSection />
        <ServicesSection />
        <HybridSection />
        <AppPreview />
        <TestimonialsSection />
        <ContactSection />
        <FAQSection />
      </main>
      <Footer />
      <FloatingButtons />
    </div>
  );
}

