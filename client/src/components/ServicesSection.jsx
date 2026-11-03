import { useState, useEffect } from 'react';
import api from '../api';

const fallbackServices = [
  { icon: '🎥', title: 'Live Interactive Classes', description: 'Engage with expert faculty in real-time with HD video classes and instant doubt resolution.' },
  { icon: '📝', title: 'Smart Assessments', description: 'AI-powered tests that adapt to your level and provide detailed performance analytics.' },
  { icon: '👨‍🏫', title: 'Personal Mentorship', description: 'Dedicated mentors track your progress and provide personalized study plans.' },
  { icon: '📱', title: 'Mobile Learning App', description: 'Learn anywhere, anytime with our feature-rich mobile app available on iOS and Android.' },
  { icon: '📖', title: 'Study Material', description: 'Comprehensive notes, question banks, and video lectures curated by top educators.' },
  { icon: '🏆', title: 'Scholarship Tests', description: 'Regular scholarship exams offering fee waivers up to 100% for deserving students.' },
];

export default function ServicesSection() {
  const [services, setServices] = useState(fallbackServices);

  useEffect(() => {
    (async () => {
      try {
        const { data } = await api.get('/content/services');
        if (data?.length) setServices(data);
      } catch { /* use fallback */ }
    })();
  }, []);

  return (
    <section className="sec" id="services">
      <div className="mx">
        <div className="sec-t">
          <span className="tag">Our Services</span>
          <h2>What We Offer</h2>
          <p>End-to-end education services designed to maximize your learning outcomes.</p>
        </div>
        <div className="w-sv">
          {services.map((s, i) => (
            <div key={i}>
              <div className="ico">{s.icon}</div>
              <h3>{s.title}</h3>
              <p>{s.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
