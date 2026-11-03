import { useState, useEffect, useRef, useCallback } from 'react';
import api from '../api';

const fallbackSlides = [
  { title: 'Admissions Open 2025-26', description: 'Enroll now for IIT-JEE, NEET, and Foundation courses. Limited seats available!', bg: 'linear-gradient(135deg, #0b7f6e, #43b692)' },
  { title: 'Hybrid Learning Model', description: 'Experience the best of online and offline education with our innovative hybrid approach.', bg: 'linear-gradient(135deg, #075c50, #0b7f6e)' },
  { title: '98% Success Rate', description: 'Our students consistently achieve top ranks in competitive exams across India.', bg: 'linear-gradient(135deg, #14313a, #0b7f6e)' },
];

export default function HeroSlider() {
  const [slides, setSlides] = useState(fallbackSlides);
  const [idx, setIdx] = useState(0);
  const timer = useRef(null);

  useEffect(() => {
    (async () => {
      try {
        const { data } = await api.get('/content/hero-slides');
        if (data?.length) setSlides(data);
      } catch { /* use fallback */ }
    })();
  }, []);

  const next = useCallback(() => setIdx((i) => (i + 1) % slides.length), [slides.length]);
  const prev = () => setIdx((i) => (i - 1 + slides.length) % slides.length);

  useEffect(() => {
    timer.current = setInterval(next, 5000);
    return () => clearInterval(timer.current);
  }, [next]);

  return (
    <section className="sec" style={{ paddingTop: 20 }}>
      <div className="mx">
        <div className="w-car">
          <div className="w-tr" style={{ transform: `translateX(-${idx * 100}%)` }}>
            {slides.map((s, i) => (
              <div className="w-sl" key={i} style={{ background: s.bg || 'linear-gradient(135deg,#0b7f6e,#43b692)' }}>
                <div>
                  <h2>{s.title}</h2>
                  <p>{s.description}</p>
                </div>
              </div>
            ))}
          </div>
          <button className="w-ar lt" onClick={prev}>◂</button>
          <button className="w-ar rt" onClick={next}>▸</button>
        </div>
        <div className="w-dots">
          {slides.map((_, i) => (
            <button key={i} className={i === idx ? 'on' : ''} onClick={() => setIdx(i)} />
          ))}
        </div>
      </div>
    </section>
  );
}
