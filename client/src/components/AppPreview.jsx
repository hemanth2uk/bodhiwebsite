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
            width: 240,
            height: 440,
            border: '8px solid #0e1a1e',
            borderRadius: 36,
            background: '#e3f4ee',
            margin: 'auto',
            padding: 12,
            display: 'flex',
            flexDirection: 'column',
            gap: 10,
            boxShadow: '0 20px 40px rgba(0,0,0,0.3)',
            color: '#14313a'
          }}>
            <div style={{
              background: 'linear-gradient(160deg, #0d7a8a, #0b5f6e)',
              color: '#fff',
              padding: '12px 10px',
              borderRadius: 16
            }}>
              <div style={{ fontSize: 11, opacity: 0.9 }}>Good morning</div>
              <div style={{ fontWeight: 700, fontSize: 15 }}>Vishnu S.</div>
              <div style={{ fontSize: 10, opacity: 0.8 }}>Class 11 • Karamana</div>
            </div>

            <div style={{
              background: '#fff',
              borderRadius: 12,
              padding: 10,
              fontSize: 12,
              boxShadow: '0 2px 8px rgba(0,0,0,0.06)'
            }}>
              <span style={{ fontSize: 10, background: '#fff3d0', color: '#8a5a00', padding: '2px 6px', borderRadius: 4, fontWeight: 700 }}>
                TODAY'S CLASS • 9:00 AM
              </span>
              <div style={{ fontWeight: 700, marginTop: 4 }}>Physics: Laws of Motion</div>
              <div style={{ fontSize: 11, color: '#56706a' }}>Prof. Rajesh Nair</div>
            </div>

            <div style={{
              display: 'grid',
              gridTemplateColumns: 'repeat(3, 1fr)',
              gap: 6,
              textAlign: 'center',
              fontSize: 10,
              fontWeight: 600
            }}>
              <div style={{ background: '#fff', padding: 8, borderRadius: 10 }}>🗓️ Timetable</div>
              <div style={{ background: '#fff', padding: 8, borderRadius: 10 }}>🏋️ Workouts</div>
              <div style={{ background: '#fff', padding: 8, borderRadius: 10 }}>❓ Doubt Box</div>
            </div>

            <div style={{
              background: 'linear-gradient(135deg, #0b3b45, #0d9aa5)',
              color: '#fff',
              padding: 10,
              borderRadius: 12,
              marginTop: 'auto',
              fontSize: 11
            }}>
              <div style={{ fontSize: 9, opacity: 0.8 }}>BODHI IGNITE SERIES</div>
              <div style={{ fontWeight: 800, color: '#f5a623' }}>NEET Mock Test 04</div>
            </div>
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

