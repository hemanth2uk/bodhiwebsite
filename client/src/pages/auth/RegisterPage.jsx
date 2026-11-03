import { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { useAuth } from '../../contexts/AuthContext';

export default function RegisterPage() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [phone, setPhone] = useState('');
  const [password, setPassword] = useState('');
  const [role, setRole] = useState('student');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);
  const { register } = useAuth();
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    setLoading(true);
    try {
      await register({ name, email, phone, password, role });
      navigate('/dashboard');
    } catch (err) {
      setError(err.response?.data?.error || 'Registration failed. Please try again.');
    } finally {
      setLoading(false);
    }
  };

  return (
    <div style={{
      minHeight: '100vh',
      display: 'grid',
      gridTemplateColumns: 'repeat(auto-fit, minmax(320px, 1fr))',
      background: 'var(--bg)'
    }}>
      {/* Left banner */}
      <div style={{
        background: 'linear-gradient(145deg, #075c50, #0b7f6e 60%, #3cc0cd)',
        color: '#fff',
        padding: '48px 36px',
        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'center',
        gap: 16
      }}>
        <div style={{ display: 'flex', alignItems: 'center', gap: 12, fontSize: 24, fontWeight: 700 }}>
          <span style={{
            width: 48,
            height: 48,
            borderRadius: '50%',
            background: '#fff',
            display: 'grid',
            placeItems: 'center',
            fontSize: 24
          }}>
            🍃
          </span>
          Bodhi Education
        </div>
        <h1 style={{ fontSize: 40, lineHeight: 1.15, fontWeight: 800 }}>
          Begin your journey<br />to enlightenment
        </h1>
        <p style={{ opacity: 0.9, fontSize: 16, maxWidth: 440, lineHeight: 1.6 }}>
          Register today to access specialized entrance batches, one-on-one mentorship,
          comprehensive mock test series, and interactive classroom learning.
        </p>
        <div style={{ marginTop: 20 }}>
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
            ← Back to website
          </Link>
        </div>
      </div>

      {/* Right register form */}
      <div style={{ display: 'grid', placeItems: 'center', padding: '32px 20px' }}>
        <div style={{
          width: '100%',
          maxWidth: 460,
          background: 'var(--surf)',
          border: '1px solid var(--line)',
          borderRadius: 20,
          boxShadow: 'var(--sh)',
          padding: 32,
          display: 'grid',
          gap: 16
        }}>
          <div>
            <h2 style={{ fontSize: 24, fontWeight: 700, color: 'var(--brand-d)' }}>Create Account</h2>
            <p style={{ color: 'var(--mute)', fontSize: 13.5, marginTop: 4 }}>
              Fill in your details to register on the Bodhi Education Portal.
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

          {/* Role selector */}
          <div>
            <label style={{ display: 'block', fontSize: 13, fontWeight: 600, marginBottom: 8, color: 'var(--ink)' }}>
              I am registering as:
            </label>
            <div style={{ display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', gap: 8 }}>
              {[
                { id: 'student', label: 'Student', icon: '🎓' },
                { id: 'parent', label: 'Parent', icon: '👨‍👩‍👧' },
                { id: 'teacher', label: 'Teacher', icon: '👩‍🏫' }
              ].map(r => (
                <button
                  key={r.id}
                  type="button"
                  onClick={() => setRole(r.id)}
                  style={{
                    border: `1.5px solid ${role === r.id ? 'var(--brand)' : 'var(--line)'}`,
                    background: role === r.id ? 'var(--tint)' : 'var(--surf)',
                    color: role === r.id ? 'var(--brand-d)' : 'var(--mute)',
                    borderRadius: 12,
                    padding: '10px 6px',
                    fontWeight: 700,
                    fontSize: 13,
                    cursor: 'pointer',
                    display: 'grid',
                    placeItems: 'center',
                    gap: 4
                  }}
                >
                  <span style={{ fontSize: 18 }}>{r.icon}</span>
                  {r.label}
                </button>
              ))}
            </div>
          </div>

          <form onSubmit={handleSubmit} style={{ display: 'grid', gap: 12 }}>
            <div>
              <label style={{ display: 'block', fontSize: 13, fontWeight: 600, marginBottom: 4 }}>Full Name</label>
              <input
                type="text"
                required
                value={name}
                onChange={e => setName(e.target.value)}
                placeholder="Enter full name"
                style={{
                  height: 42,
                  width: '100%',
                  padding: '0 12px',
                  borderRadius: 10,
                  border: '1px solid var(--line)',
                  fontSize: 14
                }}
              />
            </div>

            <div>
              <label style={{ display: 'block', fontSize: 13, fontWeight: 600, marginBottom: 4 }}>Email Address</label>
              <input
                type="email"
                required
                value={email}
                onChange={e => setEmail(e.target.value)}
                placeholder="name@example.com"
                style={{
                  height: 42,
                  width: '100%',
                  padding: '0 12px',
                  borderRadius: 10,
                  border: '1px solid var(--line)',
                  fontSize: 14
                }}
              />
            </div>

            <div>
              <label style={{ display: 'block', fontSize: 13, fontWeight: 600, marginBottom: 4 }}>Phone Number</label>
              <input
                type="tel"
                value={phone}
                onChange={e => setPhone(e.target.value)}
                placeholder="+91 98765 43210"
                style={{
                  height: 42,
                  width: '100%',
                  padding: '0 12px',
                  borderRadius: 10,
                  border: '1px solid var(--line)',
                  fontSize: 14
                }}
              />
            </div>

            <div>
              <label style={{ display: 'block', fontSize: 13, fontWeight: 600, marginBottom: 4 }}>Password</label>
              <input
                type="password"
                required
                minLength={6}
                value={password}
                onChange={e => setPassword(e.target.value)}
                placeholder="At least 6 characters"
                style={{
                  height: 42,
                  width: '100%',
                  padding: '0 12px',
                  borderRadius: 10,
                  border: '1px solid var(--line)',
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
                marginTop: 8
              }}
            >
              {loading ? 'Creating account…' : 'Complete Registration →'}
            </button>
          </form>

          <div style={{ textAlign: 'center', fontSize: 13, color: 'var(--mute)' }}>
            Already have an account?{' '}
            <Link to="/login" style={{ color: 'var(--brand)', fontWeight: 700, textDecoration: 'none' }}>
              Log in
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}

