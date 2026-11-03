import { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { useAuth } from '../../contexts/AuthContext';

export default function LoginPage() {
  const [email, setEmail] = useState('student@gmail.com');
  const [password, setPassword] = useState('password');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);
  const { login } = useAuth();
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    setLoading(true);
    try {
      await login(email, password);
      navigate('/dashboard');
    } catch (err) {
      setError(err.response?.data?.error || 'Login failed. Please check your credentials.');
    } finally {
      setLoading(false);
    }
  };

  const setDemo = (demoEmail) => {
    setEmail(demoEmail);
    setPassword('password');
    setError('');
  };

  return (
    <div style={{
      minHeight: '100vh',
      display: 'grid',
      gridTemplateColumns: 'repeat(auto-fit, minmax(320px, 1fr))',
      background: 'var(--bg)'
    }}>
      {/* Left hero banner */}
      <div style={{
        background: 'linear-gradient(145deg, #075c50, #0b7f6e 60%, #3cc0cd)',
        color: '#fff',
        padding: '48px 36px',
        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'center',
        gap: 16,
        position: 'relative',
        overflow: 'hidden'
      }}>
        <div style={{ display: 'flex', alignItems: 'center', gap: 12, fontSize: 24, fontWeight: 700 }}>
          <span style={{
            width: 48,
            height: 48,
            borderRadius: '50%',
            background: '#fff',
            display: 'grid',
            placeItems: 'center',
            padding: 6
          }}>
            <img src="/logo.svg" alt="Bodhi" style={{ width: '100%', height: '100%', objectFit: 'contain' }} />
          </span>
          Bodhi Education
        </div>
        <h1 style={{ fontSize: 40, lineHeight: 1.15, fontWeight: 800, marginTop: 12 }}>
          Welcome back to<br />your portal
        </h1>
        <p style={{ opacity: 0.9, fontSize: 16, maxWidth: 440, lineHeight: 1.6 }}>
          Your gateway to excellence in NEET, JEE, and Board coaching. Access live classes,
          workouts, doubts, and continuous mentorship.
        </p>

        <div style={{ marginTop: 24 }}>
          <Link
            to="/"
            style={{
              color: '#fff',
              textDecoration: 'none',
              fontWeight: 600,
              fontSize: 14,
              display: 'inline-flex',
              alignItems: 'center',
              gap: 6,
              background: 'rgba(255,255,255,0.15)',
              padding: '8px 16px',
              borderRadius: 20
            }}
          >
            ← Back to public website
          </Link>
        </div>
      </div>

      {/* Right form card */}
      <div style={{ display: 'grid', placeItems: 'center', padding: '32px 20px' }}>
        <div style={{
          width: '100%',
          maxWidth: 440,
          background: 'var(--surf)',
          border: '1px solid var(--line)',
          borderRadius: 20,
          boxShadow: 'var(--sh)',
          padding: 32,
          display: 'grid',
          gap: 16
        }}>
          <div>
            <h2 style={{ fontSize: 24, fontWeight: 700, color: 'var(--brand-d)' }}>Log In</h2>
            <p style={{ color: 'var(--mute)', fontSize: 13.5, marginTop: 4 }}>
              Sign in with your registered email and password.
            </p>
          </div>

          {error && (
            <div style={{
              background: 'rgba(200,55,45,0.1)',
              color: 'var(--bad)',
              padding: '10px 14px',
              borderRadius: 10,
              fontSize: 13,
              fontWeight: 600
            }}>
              {error}
            </div>
          )}

          <form onSubmit={handleSubmit} style={{ display: 'grid', gap: 14 }}>
            <div>
              <label style={{ display: 'block', fontSize: 13, fontWeight: 600, marginBottom: 6, color: 'var(--ink)' }}>
                Email Address
              </label>
              <input
                type="email"
                required
                value={email}
                onChange={e => setEmail(e.target.value)}
                placeholder="name@example.com"
                style={{
                  height: 44,
                  width: '100%',
                  padding: '0 14px',
                  borderRadius: 10,
                  border: '1px solid var(--line)',
                  background: 'var(--surf)',
                  fontSize: 14
                }}
              />
            </div>

            <div>
              <label style={{ display: 'block', fontSize: 13, fontWeight: 600, marginBottom: 6, color: 'var(--ink)' }}>
                Password
              </label>
              <input
                type="password"
                required
                value={password}
                onChange={e => setPassword(e.target.value)}
                placeholder="Enter password"
                style={{
                  height: 44,
                  width: '100%',
                  padding: '0 14px',
                  borderRadius: 10,
                  border: '1px solid var(--line)',
                  background: 'var(--surf)',
                  fontSize: 14
                }}
              />
            </div>

            <button
              type="submit"
              disabled={loading}
              style={{
                height: 46,
                background: 'var(--brand)',
                color: '#fff',
                border: 0,
                borderRadius: 10,
                fontWeight: 700,
                fontSize: 15,
                cursor: 'pointer',
                marginTop: 6
              }}
            >
              {loading ? 'Logging in…' : 'Log In →'}
            </button>
          </form>

          {/* Demo account pills */}
          <div style={{ borderTop: '1px solid var(--line)', paddingTop: 14, marginTop: 4 }}>
            <span style={{ fontSize: 12, color: 'var(--mute)', fontWeight: 600, display: 'block', marginBottom: 8 }}>
              ⚡ Quick Demo Accounts (pass: password)
            </span>
            <div style={{ display: 'flex', flexWrap: 'wrap', gap: 6 }}>
              {[
                { role: 'Student', email: 'student@gmail.com' },
                { role: 'Parent', email: 'parent@gmail.com' },
                { role: 'Teacher', email: 'teacher@gmail.com' },
                { role: 'Mentor', email: 'mentor@gmail.com' },
                { role: 'Coordinator (CMS Admin)', email: 'coordinator@gmail.com' }
              ].map(d => (
                <button
                  key={d.email}
                  type="button"
                  onClick={() => setDemo(d.email)}
                  style={{
                    background: email === d.email ? 'var(--tint)' : 'var(--surf)',
                    color: email === d.email ? 'var(--brand-d)' : 'var(--mute)',
                    border: `1px solid ${email === d.email ? 'var(--brand)' : 'var(--line)'}`,
                    borderRadius: 16,
                    padding: '4px 10px',
                    fontSize: 11.5,
                    fontWeight: 600,
                    cursor: 'pointer'
                  }}
                >
                  {d.role}
                </button>
              ))}
            </div>
          </div>

          <div style={{ textAlign: 'center', fontSize: 13, color: 'var(--mute)' }}>
            Don't have an account?{' '}
            <Link to="/register" style={{ color: 'var(--brand)', fontWeight: 700, textDecoration: 'none' }}>
              Register now
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}

