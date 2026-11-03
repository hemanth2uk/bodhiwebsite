export default function ContactSection() {
  return (
    <section className="w-sec alt" id="contact" style={{ padding: '60px 0', background: 'var(--surf)' }}>
      <div className="mx" style={{ maxWidth: 1180, margin: '0 auto', padding: '0 20px' }}>
        <h2 style={{ fontSize: 32, textAlign: 'center', color: 'var(--brand-d)', fontWeight: 700 }}>
          Contact Us
        </h2>
        <p style={{ textAlign: 'center', color: 'var(--mute)', maxWidth: 640, margin: '10px auto 36px' }}>
          Visit our learning centres, give us a call, or chat directly on WhatsApp.
        </p>

        <div style={{
          display: 'grid',
          gridTemplateColumns: 'repeat(auto-fit, minmax(280px, 1fr))',
          gap: 20
        }}>
          {/* Address */}
          <div style={{
            background: 'var(--bg)',
            border: '1px solid var(--line)',
            borderRadius: 18,
            padding: 24,
            boxShadow: 'var(--sh)'
          }}>
            <div style={{
              width: 44,
              height: 44,
              borderRadius: 12,
              background: '#d6453d',
              color: '#fff',
              display: 'grid',
              placeItems: 'center',
              fontSize: 20,
              marginBottom: 14
            }}>
              📍
            </div>
            <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)', marginBottom: 8 }}>
              Address
            </h3>
            <p style={{ color: 'var(--mute)', fontSize: 14, lineHeight: 1.6, marginBottom: 16 }}>
              TC No. 73/1970-2 (MSS Arcade), Manacaud, Thiruvananthapuram, Kerala, India, 695009
            </p>
            <a
              href="https://www.google.com/maps/search/?api=1&query=MSS+Arcade+Manacaud+Thiruvananthapuram+695009"
              target="_blank"
              rel="noopener noreferrer"
              style={{ color: 'var(--brand)', fontWeight: 700, textDecoration: 'none', fontSize: 14 }}
            >
              Get directions →
            </a>
          </div>

          {/* Phone */}
          <div style={{
            background: 'var(--bg)',
            border: '1px solid var(--line)',
            borderRadius: 18,
            padding: 24,
            boxShadow: 'var(--sh)'
          }}>
            <div style={{
              width: 44,
              height: 44,
              borderRadius: 12,
              background: '#0b7f6e',
              color: '#fff',
              display: 'grid',
              placeItems: 'center',
              fontSize: 20,
              marginBottom: 14
            }}>
              📞
            </div>
            <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)', marginBottom: 8 }}>
              Phone & WhatsApp
            </h3>
            <p style={{ color: 'var(--mute)', fontSize: 14, lineHeight: 1.6, marginBottom: 16 }}>
              <strong style={{ color: 'var(--ink)' }}>+91 89211 80598</strong><br />
              Counseling & admissions hotline
            </p>
            <div style={{ display: 'flex', gap: 14 }}>
              <a href="tel:+918921180598" style={{ color: 'var(--brand)', fontWeight: 700, textDecoration: 'none', fontSize: 14 }}>
                Call now →
              </a>
              <a
                href="https://wa.me/918921180598"
                target="_blank"
                rel="noopener noreferrer"
                style={{ color: '#25D366', fontWeight: 700, textDecoration: 'none', fontSize: 14 }}
              >
                WhatsApp →
              </a>
            </div>
          </div>

          {/* Hours */}
          <div style={{
            background: 'var(--bg)',
            border: '1px solid var(--line)',
            borderRadius: 18,
            padding: 24,
            boxShadow: 'var(--sh)'
          }}>
            <div style={{
              width: 44,
              height: 44,
              borderRadius: 12,
              background: '#e8a21b',
              color: '#fff',
              display: 'grid',
              placeItems: 'center',
              fontSize: 20,
              marginBottom: 14
            }}>
              🕘
            </div>
            <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)', marginBottom: 8 }}>
              Working Hours
            </h3>
            <p style={{ color: 'var(--mute)', fontSize: 14, lineHeight: 1.6, marginBottom: 16 }}>
              Monday – Friday: 8:00 AM – 8:00 PM<br />
              Saturday & Sunday: 9:00 AM – 6:00 PM
            </p>
            <a href="#courses" style={{ color: 'var(--brand)', fontWeight: 700, textDecoration: 'none', fontSize: 14 }}>
              Explore schedules →
            </a>
          </div>
        </div>

        {/* Learning Centres chips */}
        <div style={{ marginTop: 40, textAlign: 'center' }}>
          <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)', marginBottom: 14 }}>
            Our Learning Centres
          </h3>
          <div style={{ display: 'flex', gap: 12, justifyContent: 'center', flexWrap: 'wrap' }}>
            <span style={{
              border: '1px solid var(--line)',
              background: 'var(--surf)',
              borderRadius: 24,
              padding: '10px 22px',
              fontWeight: 700,
              fontSize: 14,
              boxShadow: 'var(--sh)'
            }}>
              📍 Karamana Centre
            </span>
            <span style={{
              border: '1px solid var(--line)',
              background: 'var(--surf)',
              borderRadius: 24,
              padding: '10px 22px',
              fontWeight: 700,
              fontSize: 14,
              boxShadow: 'var(--sh)'
            }}>
              📍 Neyyattinkara Centre
            </span>
            <span style={{
              border: '1px solid var(--line)',
              background: 'var(--surf)',
              borderRadius: 24,
              padding: '10px 22px',
              fontWeight: 700,
              fontSize: 14,
              boxShadow: 'var(--sh)'
            }}>
              💻 Bodhi Online Campus
            </span>
          </div>
        </div>
      </div>
    </section>
  );
}

