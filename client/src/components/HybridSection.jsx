export default function HybridSection() {
  const steps = [
    {
      num: 1,
      title: 'Plan',
      desc: 'Coordinators set the timetable and teachers add each period’s topic and preparation materials.'
    },
    {
      num: 2,
      title: 'Learn before class',
      desc: 'Students and parents are notified the day before. Students watch short conceptual previews.'
    },
    {
      num: 3,
      title: 'Attend class',
      desc: 'Students join the in-person class already familiar with core theory, maximizing doubt clearance.'
    },
    {
      num: 4,
      title: 'Practise',
      desc: 'A workout drill is released immediately after class, providing instant marks and video explanations.'
    },
    {
      num: 5,
      title: 'Review & support',
      desc: 'Mentors analyze performance trends, assign focused mocks, and offer 1-on-1 doubt sessions.'
    }
  ];

  return (
    <section className="w-sec" id="hybrid" style={{ padding: '60px 0', background: 'var(--surf)' }}>
      <div className="mx" style={{ maxWidth: 1180, margin: '0 auto', padding: '0 20px' }}>
        <h2 style={{ fontSize: 32, textAlign: 'center', color: 'var(--brand-d)', fontWeight: 700 }}>
          How Hybrid Learning Works
        </h2>
        <p style={{ textAlign: 'center', color: 'var(--mute)', maxWidth: 680, margin: '10px auto 36px' }}>
          Learn before class, master in-person, and reinforce after class.
        </p>

        <div style={{
          display: 'grid',
          gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))',
          gap: 16
        }}>
          {steps.map(s => (
            <div
              key={s.num}
              style={{
                background: 'var(--bg)',
                border: '1px solid var(--line)',
                borderRadius: 16,
                padding: 24,
                display: 'flex',
                flexDirection: 'column',
                gap: 8,
                transition: 'transform 0.2s',
              }}
            >
              <span style={{
                width: 36,
                height: 36,
                borderRadius: '50%',
                background: 'var(--brand)',
                color: '#fff',
                display: 'grid',
                placeItems: 'center',
                fontWeight: 700,
                fontSize: 16
              }}>
                {s.num}
              </span>
              <h3 style={{ fontSize: 17, fontWeight: 700, color: 'var(--brand-d)', marginTop: 4 }}>
                {s.title}
              </h3>
              <p style={{ color: 'var(--mute)', fontSize: 13.5, lineHeight: 1.5 }}>
                {s.desc}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

