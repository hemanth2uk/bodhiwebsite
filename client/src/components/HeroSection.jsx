import { useNavigate } from 'react-router-dom';
import { useState, useEffect, useRef } from 'react';

function Counter({ end, suffix = '', duration = 2000 }) {
  const [count, setCount] = useState(0);
  const ref = useRef(null);
  const started = useRef(false);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting && !started.current) {
          started.current = true;
          const startTime = performance.now();
          const tick = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            setCount(Math.floor(progress * end));
            if (progress < 1) requestAnimationFrame(tick);
          };
          requestAnimationFrame(tick);
        }
      },
      { threshold: 0.3 }
    );
    if (ref.current) observer.observe(ref.current);
    return () => observer.disconnect();
  }, [end, duration]);

  return <span ref={ref}>{count}{suffix}</span>;
}

export default function HeroSection() {
  const navigate = useNavigate();

  return (
    <section className="w-hero" id="home">
      <div className="mx">
        <div className="w-hero-l">
          <div className="w-chip">🌿 Knowledge is Power</div>
          <h1>Awaken the<br />Genius Within</h1>
          <p>
            Like the Bodhi tree symbolizing enlightenment, Bodhi Academy nurtures your potential. Experience world-class coaching for NEET, JEE, and Entrance Exams in a serene, focused environment.
          </p>
          <div className="w-cta">
            <button className="w-b p" onClick={() => navigate('/register')}>Register now →</button>
            <a className="w-b s" href="#courses">Explore courses</a>
          </div>
          <div className="w-mini">
            <div>
              <strong><Counter end={5} suffix="k+" /></strong>
              <span>Students</span>
            </div>
            <div>
              <strong><Counter end={120} suffix="+" /></strong>
              <span>Gurus</span>
            </div>
            <div>
              <strong><Counter end={98} suffix="%" /></strong>
              <span>Success</span>
            </div>
          </div>
        </div>

        <div className="w-vis">
          <div className="w-orb" />
          <div className="w-logo">
            <img src="/logo.svg" alt="Bodhi tree logo" style={{ border: 0, background: 'none', width: '62%', height: 'auto', display: 'block' }} />
          </div>
          <div className="w-fl f1">
            👥 Live class
            <small>Physics · 4:30 PM</small>
          </div>
          <div className="w-fl f2">
            ✅ 98% success
          </div>
          <div className="w-fl f3">
            👩‍🏫 Mentor connect
            <small>Book a slot</small>
          </div>
        </div>
      </div>
    </section>
  );
}
