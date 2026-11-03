import { useNavigate } from 'react-router-dom';

export default function AppPreview() {
  const navigate = useNavigate();

  return (
    <section className="w-sec" style={{ padding: '60px 0' }}>
      <div className="mx" style={{ maxWidth: 1180, margin: '0 auto', padding: '0 20px' }}>
        <div style={{
          background: 'linear-gradient(135deg, #075c50, #0b9a6d)',
          color: '#fff',
          borderRadius: 24,
          padding: '44px 36px',
          display: 'grid',
          gridTemplateColumns: 'minmax(240px, 280px) 1fr',
          gap: 36,
          alignItems: 'center'
        }}>
          {/* Phone Mockup Frame */}
          <div style={{
            display: 'flex',
            justifyContent: 'center',
            alignItems: 'center',
            padding: '10px 0'
          }}>
            <img
              src="/bodhi-mobile-app.png"
              alt="Bodhi Student Portal Mobile App"
              style={{
                width: '100%',
                maxWidth: 290,
                height: 'auto',
                display: 'block',
                filter: 'drop-shadow(0 20px 35px rgba(0,0,0,0.35))',
                transition: 'transform 0.3s ease'
              }}
            />
          </div>

          {/* Right description */}
          <div>
            <span style={{
              background: 'rgba(255,255,255,0.2)',
              borderRadius: 20,
              padding: '4px 14px',
              fontSize: 12,
              fontWeight: 700,
              display: 'inline-block',
              marginBottom: 12
            }}>
              📱 Web & Mobile Portal
            </span>
            <h2 style={{ fontSize: 32, fontWeight: 700, lineHeight: 1.2, marginBottom: 14 }}>
              Your Study Companion Everywhere
            </h2>
            <p style={{ opacity: 0.92, fontSize: 16, lineHeight: 1.6, maxWidth: 580, marginBottom: 20 }}>
              Live classes, recorded lessons, handwritten notes, mock tests, doubt box, attendance,
              and fee management in a single login. Built for phone and desktop.
            </p>

            <div style={{ display: 'flex', gap: 10, flexWrap: 'wrap', marginBottom: 24 }}>
              <span style={{ background: 'rgba(255,255,255,0.18)', borderRadius: 20, padding: '6px 14px', fontSize: 13, fontWeight: 600 }}>
                ⏱️ 24x7 Access
              </span>
              <span style={{ background: 'rgba(255,255,255,0.18)', borderRadius: 20, padding: '6px 14px', fontSize: 13, fontWeight: 600 }}>
                📅 Smart Timetable
              </span>
              <span style={{ background: 'rgba(255,255,255,0.18)', borderRadius: 20, padding: '6px 14px', fontSize: 13, fontWeight: 600 }}>
                📚 Curated Study Material
              </span>
              <span style={{ background: 'rgba(255,255,255,0.18)', borderRadius: 20, padding: '6px 14px', fontSize: 13, fontWeight: 600 }}>
                👩‍🏫 Dedicated Mentor Connect
              </span>
            </div>

            <div style={{ display: 'flex', gap: 12, flexWrap: 'wrap' }}>
              <button
                onClick={() => navigate('/login')}
                style={{
                  background: '#fff',
                  color: '#075c50',
                  border: 0,
                  borderRadius: 24,
                  padding: '12px 28px',
                  fontWeight: 700,
                  fontSize: 14,
                  cursor: 'pointer'
                }}
              >
                Open Student Portal →
              </button>
              <button
                onClick={() => navigate('/register')}
                style={{
                  background: 'transparent',
                  color: '#fff',
                  border: '1.5px solid #fff',
                  borderRadius: 24,
                  padding: '12px 24px',
                  fontWeight: 700,
                  fontSize: 14,
                  cursor: 'pointer'
                }}
              >
                Create Account
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

