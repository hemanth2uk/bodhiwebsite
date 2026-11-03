import { useState, useEffect } from 'react';

const defaultNews = [
  'Admissions open for 2025-26 session — Enroll now!',
  'New Hybrid Learning centres launching in Mumbai & Delhi',
  'Board exam preparation crash course starting Jan 15',
  'Bodhi ranked #1 in student satisfaction — Thank you!',
];

export default function NewsBar() {
  const [items, setItems] = useState(defaultNews);

  useEffect(() => {
    // Duplicate for seamless marquee
    setItems([...defaultNews, ...defaultNews]);
  }, []);

  return (
    <div className="w-top">
      <div className="w-news">
        <div className="w-mq">
          {items.map((t, i) => (
            <span key={i} style={{ marginRight: 48 }}>📢 {t}</span>
          ))}
        </div>
      </div>
      <div className="w-ct">
        <span>📞 1800-123-BODHI</span>
        <span>🕐 Mon–Sat 8am–8pm</span>
      </div>
    </div>
  );
}
