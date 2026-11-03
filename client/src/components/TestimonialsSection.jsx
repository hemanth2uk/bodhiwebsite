import { useState, useEffect } from 'react';
import api from '../api';

export default function TestimonialsSection() {
  const [list, setList] = useState([]);

  useEffect(() => {
    api.get('/testimonials')
      .then(res => setList(res.data))
      .catch(() => {
        // Fallback
        setList([
          {
            id: 1,
            name: 'Dr. Rajesh Kumar (Parent)',
            role: 'Father of Ananya (NEET AIR 412)',
            quote: 'The calm, focused Bodhi approach changed Ananya’s preparation completely. She cracked NEET without feeling burned out.',
            stars: 5
          },
          {
            id: 2,
            name: 'Adithya S. (Student)',
            role: 'JEE Advanced Ranker',
            quote: 'The teachers at Karamana centre make Physics so intuitive. The post-class workouts and doubt clearance box were game changers.',
            stars: 5
          },
          {
            id: 3,
            name: 'Meera Nair (Student)',
            role: 'Class 12 Board 98.4%',
            quote: 'Tuition plus entrance hybrid batch gave me the exact balance I needed between school examinations and competitive entrance prep.',
            stars: 5
          }
        ]);
      });
  }, []);

  return (
    <section className="w-sec alt" id="testimonials" style={{ padding: '60px 0', background: 'var(--surf)' }}>
      <div className="mx" style={{ maxWidth: 1180, margin: '0 auto', padding: '0 20px' }}>
        <h2 style={{ fontSize: 32, textAlign: 'center', color: 'var(--brand-d)', fontWeight: 700 }}>
          Student & Parent Voices
        </h2>
        <p style={{ textAlign: 'center', color: 'var(--mute)', maxWidth: 640, margin: '10px auto 36px' }}>
          Hear what our learners and their families say about life and studies at Bodhi.
        </p>

        <div style={{
          display: 'grid',
          gridTemplateColumns: 'repeat(auto-fit, minmax(280px, 1fr))',
          gap: 20
        }}>
          {list.map(t => (
            <div
              key={t.id}
              style={{
                background: 'var(--bg)',
                border: '1.5px solid var(--line)',
                borderRadius: 18,
                padding: 24,
                display: 'flex',
                flexDirection: 'column',
                gap: 12,
                boxShadow: 'var(--sh)',
                transition: 'transform 0.2s'
              }}
            >
              <div style={{ color: '#f59e0b', fontSize: 18 }}>
                {'★'.repeat(t.stars || 5)}
              </div>
              <p style={{ fontStyle: 'italic', color: 'var(--ink)', fontSize: 14.5, lineHeight: 1.6, flex: 1 }}>
                "{t.quote}"
              </p>
              <div>
                <strong style={{ display: 'block', fontSize: 15, color: 'var(--brand-d)' }}>{t.name}</strong>
                <span style={{ fontSize: 12, color: 'var(--mute)' }}>{t.role}</span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

