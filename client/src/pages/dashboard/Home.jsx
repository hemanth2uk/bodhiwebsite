import { useAuth } from '../../contexts/AuthContext';
import { Link } from 'react-router-dom';

export default function Home() {
  const { user } = useAuth();

  return (
    <div style={{ display: 'grid', gap: 24, maxWidth: 1100 }}>
      {/* Banner */}
      <div style={{
        background: 'linear-gradient(135deg, #075c50, #0b7f6e 70%, #3cc0cd)',
        color: '#fff',
        borderRadius: 20,
        padding: '32px 36px',
        display: 'flex',
        flexDirection: 'column',
        gap: 10,
        boxShadow: 'var(--sh)'
      }}>
        <span style={{ fontSize: 13, background: 'rgba(255,255,255,0.2)', padding: '4px 12px', borderRadius: 20, width: 'fit-content', fontWeight: 600 }}>
          Bodhi Portal v3.0
        </span>
        <h1 style={{ fontSize: 32, fontWeight: 800 }}>
          Welcome back, {user?.name}!
        </h1>
        <p style={{ opacity: 0.92, fontSize: 15, maxWidth: 600, lineHeight: 1.6 }}>
          Everything you need for your coaching journey is centralized here. Check your daily timetable, review homework workouts, and connect with your guru.
        </p>
      </div>

      {/* KPI Cards */}
      <div style={{
        display: 'grid',
        gridTemplateColumns: 'repeat(auto-fit, minmax(220px, 1fr))',
        gap: 16
      }}>
        <div style={{
          background: 'linear-gradient(135deg, #0b7f6e, #1a8a55)',
          color: '#fff',
          borderRadius: 16,
          padding: 22,
          boxShadow: 'var(--sh)'
        }}>
          <small style={{ fontSize: 11, fontWeight: 700, textTransform: 'uppercase', opacity: 0.9 }}>
            Overall Attendance
          </small>
          <strong style={{ fontSize: 36, display: 'block', margin: '4px 0' }}>94.2%</strong>
          <span style={{ fontSize: 12, opacity: 0.85 }}>Present in 48 of 51 days</span>
        </div>

        <div style={{
          background: 'linear-gradient(135deg, #0d7a8a, #2a9db0)',
          color: '#fff',
          borderRadius: 16,
          padding: 22,
          boxShadow: 'var(--sh)'
        }}>
          <small style={{ fontSize: 11, fontWeight: 700, textTransform: 'uppercase', opacity: 0.9 }}>
            Pending Fees
          </small>
          <strong style={{ fontSize: 36, display: 'block', margin: '4px 0' }}>₹0.00</strong>
          <span style={{ fontSize: 12, opacity: 0.85 }}>All term dues cleared</span>
        </div>

        <div style={{
          background: 'linear-gradient(135deg, #d6453d, #e8781e)',
          color: '#fff',
          borderRadius: 16,
          padding: 22,
          boxShadow: 'var(--sh)'
        }}>
          <small style={{ fontSize: 11, fontWeight: 700, textTransform: 'uppercase', opacity: 0.9 }}>
            Active Doubts
          </small>
          <strong style={{ fontSize: 36, display: 'block', margin: '4px 0' }}>2</strong>
          <span style={{ fontSize: 12, opacity: 0.85 }}>1 answered • 1 under review</span>
        </div>

        <div style={{
          background: 'linear-gradient(135deg, #5a35a0, #8a63d6)',
          color: '#fff',
          borderRadius: 16,
          padding: 22,
          boxShadow: 'var(--sh)'
        }}>
          <small style={{ fontSize: 11, fontWeight: 700, textTransform: 'uppercase', opacity: 0.9 }}>
            Next Test
          </small>
          <strong style={{ fontSize: 24, display: 'block', margin: '10px 0 4px' }}>Physics Mock</strong>
          <span style={{ fontSize: 12, opacity: 0.85 }}>Saturday, 10:00 AM</span>
        </div>
      </div>

      {/* Quick shortcuts */}
      <div style={{
        background: 'var(--surf)',
        border: '1px solid var(--line)',
        borderRadius: 18,
        padding: 24,
        boxShadow: 'var(--sh)'
      }}>
        <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)', marginBottom: 16 }}>
          Quick Actions
        </h3>
        <div style={{ display: 'flex', gap: 14, flexWrap: 'wrap' }}>
          <Link
            to="/dashboard/attendance"
            style={{
              background: 'var(--tint)',
              color: 'var(--brand-d)',
              padding: '12px 20px',
              borderRadius: 12,
              fontWeight: 700,
              textDecoration: 'none',
              fontSize: 14,
              display: 'inline-flex',
              alignItems: 'center',
              gap: 8
            }}
          >
            📅 View Attendance Calendar
          </Link>
          <Link
            to="/dashboard/doubts"
            style={{
              background: 'var(--tint)',
              color: 'var(--brand-d)',
              padding: '12px 20px',
              borderRadius: 12,
              fontWeight: 700,
              textDecoration: 'none',
              fontSize: 14,
              display: 'inline-flex',
              alignItems: 'center',
              gap: 8
            }}
          >
            ❓ Ask a Guru in Doubt Box
          </Link>
          <Link
            to="/dashboard/fees"
            style={{
              background: 'var(--tint)',
              color: 'var(--brand-d)',
              padding: '12px 20px',
              borderRadius: 12,
              fontWeight: 700,
              textDecoration: 'none',
              fontSize: 14,
              display: 'inline-flex',
              alignItems: 'center',
              gap: 8
            }}
          >
            💳 Review Receipts & Dues
          </Link>
          {user?.role === 'coordinator' && (
            <Link
              to="/dashboard/cms"
              style={{
                background: 'var(--brand)',
                color: '#fff',
                padding: '12px 20px',
                borderRadius: 12,
                fontWeight: 700,
                textDecoration: 'none',
                fontSize: 14,
                display: 'inline-flex',
                alignItems: 'center',
                gap: 8
              }}
            >
              🛠️ Content Management System
            </Link>
          )}
        </div>
      </div>
    </div>
  );
}

