import { useState, useEffect, useRef } from 'react';

const stats = [
  { label: 'Students', end: 5000, suffix: '+' },
  { label: 'Expert Gurus', end: 120, suffix: '+' },
  { label: 'Success Rate', end: 98, suffix: '%' },
  { label: 'Learning Centres', end: 15, suffix: '+' },
];

function AnimatedNum({ end, suffix }) {
  const [val, setVal] = useState(0);
  const ref = useRef(null);
  const started = useRef(false);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting && !started.current) {
          started.current = true;
          const dur = 2000;
          const startTime = performance.now();
          const tick = (now) => {
            const p = Math.min((now - startTime) / dur, 1);
            setVal(Math.floor(p * end));
            if (p < 1) requestAnimationFrame(tick);
          };
          requestAnimationFrame(tick);
        }
      },
      { threshold: 0.3 }
    );
    if (ref.current) observer.observe(ref.current);
    return () => observer.disconnect();
  }, [end]);

  return <strong ref={ref}>{val.toLocaleString()}{suffix}</strong>;
}

export default function StatsBar() {
  return (
    <div className="w-st mx">
      {stats.map((s) => (
        <div key={s.label}>
          <AnimatedNum end={s.end} suffix={s.suffix} />
          <span>{s.label}</span>
        </div>
      ))}
    </div>
  );
}
