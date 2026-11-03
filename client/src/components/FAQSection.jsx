import { useState, useEffect } from 'react';
import api from '../api';

export default function FAQSection() {
  const [faqs, setFaqs] = useState([]);

  useEffect(() => {
    api.get('/faqs')
      .then(res => setFaqs(res.data))
      .catch(() => {
        setFaqs([
          { id: 1, question: 'What programs are available at Bodhi Education?', answer: 'We offer Pre-Foundation (Classes 5-7), Foundation (Classes 8-10), Long-term (+1, +2), Crash courses, Repeater programs, Academic Tuition, and Summer Bridge courses for NEET, JEE, and KEAM.' },
          { id: 2, question: 'Where are the Bodhi learning centres located?', answer: 'We have physical offline centres at Karamana and Neyyattinkara in Thiruvananthapuram, as well as a full Bodhi Online platform accessible anywhere.' },
          { id: 3, question: 'How does the Hybrid Learning model work?', answer: 'Students learn before class through short preview videos, attend interactive in-person lectures, and reinforce knowledge with post-class workouts and doubt sessions.' },
          { id: 4, question: 'Can parents track their child’s attendance and progress?', answer: 'Yes! The Bodhi Portal provides a dedicated Parent login where you can see daily attendance, test marks, fee receipts, and connect directly with your child’s mentor.' },
          { id: 5, question: 'What is the role of the Mentor at Bodhi?', answer: 'Mentors are experienced guides who address stress, exam anxiety, time management, and motivation, ensuring students maintain high morale and well-being.' },
          { id: 6, question: 'How can I enroll in a course?', answer: 'You can register directly on our website, call us at +91 89211 80598, or visit our Karamana or Neyyattinkara centres for a free counseling session.' }
        ]);
      });
  }, []);

  return (
    <section className="w-sec" id="faq" style={{ padding: '60px 0' }}>
      <div className="mx" style={{ maxWidth: 840, margin: '0 auto', padding: '0 20px' }}>
        <h2 style={{ fontSize: 32, textAlign: 'center', color: 'var(--brand-d)', fontWeight: 700 }}>
          Frequently Asked Questions
        </h2>
        <p style={{ textAlign: 'center', color: 'var(--mute)', margin: '10px auto 36px' }}>
          Find answers to common queries regarding courses, schedules, and admissions.
        </p>

        <div style={{ display: 'grid', gap: 12 }}>
          {faqs.map(faq => (
            <details
              key={faq.id}
              style={{
                background: 'var(--surf)',
                border: '1px solid var(--line)',
                borderRadius: 14,
                padding: '16px 20px',
                boxShadow: 'var(--sh)'
              }}
            >
              <summary style={{ fontWeight: 700, cursor: 'pointer', fontSize: 16, color: 'var(--ink)' }}>
                {faq.question}
              </summary>
              <p style={{ color: 'var(--mute)', marginTop: 10, fontSize: 14.5, lineHeight: 1.6 }}>
                {faq.answer}
              </p>
            </details>
          ))}
        </div>
      </div>
    </section>
  );
}

