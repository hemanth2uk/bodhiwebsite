import { useState, useEffect } from 'react';
import api from '../api';

const fallback = {
  title: 'About Bodhi Education',
  description: 'Founded with a vision to make quality education accessible to every student in India, Bodhi Education combines time-tested teaching methodologies with cutting-edge technology. Our hybrid learning model ensures students get personalized attention whether they learn online or at our physical centres.',
  mission: 'We believe every child has the potential to excel. Our mission is to nurture that potential through dedicated mentorship, comprehensive curriculum, and an environment that fosters curiosity and growth.',
};

export default function AboutSection() {
  const [about, setAbout] = useState(fallback);

  useEffect(() => {
    (async () => {
      try {
        const { data } = await api.get('/content/about');
        if (data?.title) setAbout(data);
      } catch { /* use fallback */ }
    })();
  }, []);

  return (
    <section className="sec" id="about">
      <div className="mx">
        <div className="w-ab">
          <div className="w-ab-l">
            <span className="tag">About Us</span>
            <h2>{about.title}</h2>
            <p>{about.description}</p>
            <p>{about.mission}</p>
            <a href="#contact" className="w-b p" style={{ marginTop: 20 }}>Learn more →</a>
          </div>
          <div className="w-pan" style={{
            position: 'relative',
            overflow: 'hidden',
            borderRadius: '24px',
            boxShadow: '0 20px 40px rgba(7, 92, 80, 0.18)',
            border: '2px solid rgba(31, 179, 196, 0.25)',
            aspectRatio: '4/3',
            background: 'linear-gradient(135deg, #075c50, #0b7f6e)',
            minHeight: 340
          }}>
            <img
              src="/about-education.jpg"
              alt="Bodhi Education - Smart Hybrid Coaching"
              style={{
                width: '100%',
                height: '100%',
                objectFit: 'cover',
                display: 'block'
              }}
            />
            {/* Glassmorphic overlay badge */}
            <div style={{
              position: 'absolute',
              bottom: 14,
              left: 14,
              right: 14,
              background: 'rgba(255, 255, 255, 0.94)',
              backdropFilter: 'blur(10px)',
              borderRadius: 14,
              padding: '10px 16px',
              display: 'flex',
              alignItems: 'center',
              justifyContent: 'space-between',
              boxShadow: '0 8px 24px rgba(0,0,0,0.18)'
            }}>
              <div style={{ display: 'flex', alignItems: 'center', gap: 10 }}>
                <img src="/logo.svg" alt="Bodhi" style={{ width: 28, height: 28, flexShrink: 0 }} />
                <div>
                  <strong style={{ fontSize: 13.5, color: 'var(--brand-d)', display: 'block', lineHeight: 1.2 }}>
                    Bodhi Smart Learning
                  </strong>
                  <span style={{ fontSize: 11, color: 'var(--mute)' }}>NEET • JEE • Foundation • Tuition</span>
                </div>
              </div>
              <span style={{
                background: 'var(--tint)',
                color: 'var(--brand-d)',
                fontWeight: 700,
                fontSize: 11,
                padding: '4px 10px',
                borderRadius: 20,
                whiteSpace: 'nowrap'
              }}>
                Classroom + Online
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
