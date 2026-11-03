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
          <div className="w-pan" style={{ display: 'grid', placeItems: 'center', background: '#fff', borderRadius: 'var(--r)', padding: 32, boxShadow: 'var(--sh)' }}>
            <img src="/logo.svg" alt="Bodhi Education" style={{ width: '70%', maxWidth: 240, height: 'auto', display: 'block' }} />
          </div>
        </div>
      </div>
    </section>
  );
}
