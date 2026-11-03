import { useState } from 'react';
import { NavLink, Outlet, useNavigate, Link } from 'react-router-dom';
import { useAuth } from '../../contexts/AuthContext';

export default function DashboardLayout() {
  const { user, logout } = useAuth();
  const navigate = useNavigate();
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  // Role-based navigation items
  const navItemsByRole = {
    student: [
      { to: '/dashboard', label: 'Home', icon: '🏠' },
      { to: '/dashboard/attendance', label: 'Attendance', icon: '✅' },
      { to: '/dashboard/fees', label: 'Fees & Dues', icon: '💳' },
      { to: '/dashboard/doubts', label: 'Doubt Box', icon: '❓' },
    ],
    parent: [
      { to: '/dashboard', label: 'Home Overview', icon: '🏠' },
      { to: '/dashboard/attendance', label: 'Child Attendance', icon: '✅' },
      { to: '/dashboard/fees', label: 'Fee Payments', icon: '💳' },
      { to: '/dashboard/doubts', label: 'Doubt Progress', icon: '❓' },
    ],
    teacher: [
      { to: '/dashboard', label: 'Teacher Desk', icon: '🏠' },
      { to: '/dashboard/attendance', label: 'Mark Attendance', icon: '✅' },
      { to: '/dashboard/doubts', label: 'Answer Doubts', icon: '❓' },
      { to: '/dashboard/cms', label: 'Content Management', icon: '📝' },
    ],
    mentor: [
      { to: '/dashboard', label: 'Mentor Hub', icon: '🏠' },
      { to: '/dashboard/attendance', label: 'Mentee Attendance', icon: '✅' },
      { to: '/dashboard/doubts', label: 'Doubt Monitoring', icon: '❓' },
    ],
    coordinator: [
      { to: '/dashboard', label: 'Admin Dashboard', icon: '🏠' },
      { to: '/dashboard/cms', label: 'CMS Content & Images', icon: '🛠️' },
      { to: '/dashboard/attendance', label: 'Centre Attendance', icon: '✅' },
      { to: '/dashboard/fees', label: 'Fee Management', icon: '💳' },
      { to: '/dashboard/doubts', label: 'All Doubts', icon: '❓' },
    ]
  };

  const navItems = navItemsByRole[user?.role] || navItemsByRole.student;

  const handleLogout = () => {
    logout();
    navigate('/login');
  };

  return (
    <div style={{ display: 'grid', gridTemplateColumns: '260px 1fr', minHeight: '100vh', background: 'var(--bg)' }}>
      {/* Sidebar */}
      <aside style={{
        background: 'var(--surf)',
        borderRight: '1px solid var(--line)',
        padding: '24px 16px',
        display: 'flex',
        flexDirection: 'column',
        gap: 20
      }}>
        {/* Brand */}
        <Link to="/" style={{ display: 'flex', alignItems: 'center', gap: 10, textDecoration: 'none', color: 'var(--brand-d)' }}>
          <span style={{
            width: 38,
            height: 38,
            borderRadius: 10,
            background: '#fff',
            display: 'grid',
            placeItems: 'center',
            padding: 4,
            border: '1px solid var(--line)'
          }}>
            <img src="/logo.svg" alt="Bodhi" style={{ width: '100%', height: '100%', objectFit: 'contain' }} />
          </span>
          <div>
            <strong style={{ fontSize: 17, display: 'block', lineHeight: 1.2 }}>Bodhi Education</strong>
            <small style={{ fontSize: 11, color: 'var(--mute)' }}>Portal • {user?.role?.toUpperCase()}</small>
          </div>
        </Link>

        {/* Navigation list */}
        <nav style={{ display: 'flex', flexDirection: 'column', gap: 6, flex: 1 }}>
          <div style={{ fontSize: 11, fontWeight: 700, color: 'var(--mute)', textTransform: 'uppercase', letterSpacing: '0.06em', padding: '10px 8px 4px' }}>
            Main Menu
          </div>

          {navItems.map(item => (
            <NavLink
              key={item.to}
              to={item.to}
              end={item.to === '/dashboard'}
              style={({ isActive }) => ({
                display: 'flex',
                alignItems: 'center',
                gap: 12,
                padding: '10px 14px',
                borderRadius: 12,
                fontWeight: 600,
                fontSize: 14,
                textDecoration: 'none',
                color: isActive ? 'var(--brand-d)' : 'var(--mute)',
                background: isActive ? 'var(--tint)' : 'transparent',
                transition: 'all 0.15s'
              })}
            >
              <span style={{ fontSize: 18 }}>{item.icon}</span>
              {item.label}
            </NavLink>
          ))}

          {/* Quick link to CMS for coordinators */}
          {user?.role === 'coordinator' && (
            <div style={{
              background: 'linear-gradient(135deg, var(--tint), #fff)',
              border: '1px solid var(--line)',
              borderRadius: 14,
              padding: 14,
              marginTop: 'auto',
              display: 'grid',
              gap: 8,
              fontSize: 12
            }}>
              <strong style={{ color: 'var(--brand-d)' }}>⚙️ Full CMS Control</strong>
              <p style={{ color: 'var(--mute)', fontSize: 11, lineHeight: 1.4 }}>
                Edit courses, landing page text, FAQs, and upload images.
              </p>
              <Link
                to="/dashboard/cms"
                style={{
                  background: 'var(--brand)',
                  color: '#fff',
                  padding: '6px 12px',
                  borderRadius: 8,
                  textAlign: 'center',
                  fontWeight: 700,
                  textDecoration: 'none',
                  fontSize: 12
                }}
              >
                Open CMS Manager
              </Link>
            </div>
          )}
        </nav>

        {/* User badge */}
        <div style={{
          borderTop: '1px solid var(--line)',
          paddingTop: 16,
          display: 'flex',
          alignItems: 'center',
          gap: 12
        }}>
          <div style={{
            width: 38,
            height: 38,
            borderRadius: '50%',
            background: 'var(--brand)',
            color: '#fff',
            display: 'grid',
            placeItems: 'center',
            fontWeight: 700,
            fontSize: 15
          }}>
            {user?.name?.[0]?.toUpperCase() || 'U'}
          </div>
          <div style={{ flex: 1, minWidth: 0 }}>
            <strong style={{ display: 'block', fontSize: 13.5, color: 'var(--ink)', whiteSpace: 'nowrap', overflow: 'hidden', textOverflow: 'ellipsis' }}>
              {user?.name}
            </strong>
            <span style={{ fontSize: 11, color: 'var(--mute)' }}>{user?.email}</span>
          </div>
        </div>
      </aside>

      {/* Main workspace */}
      <div style={{ display: 'flex', flexDirection: 'column', height: '100vh', overflow: 'hidden' }}>
        {/* Top Header */}
        <header style={{
          background: 'var(--surf)',
          borderBottom: '1px solid var(--line)',
          padding: '12px 28px',
          display: 'flex',
          alignItems: 'center',
          gap: 16
        }}>
          <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)', flex: 1 }}>
            Bodhi Academic Workspace
          </h3>

          <Link
            to="/"
            style={{
              fontSize: 13,
              color: 'var(--brand)',
              fontWeight: 600,
              textDecoration: 'none',
              padding: '6px 12px',
              borderRadius: 8,
              background: 'var(--tint)'
            }}
          >
            🌐 View Public Website
          </Link>

          <span style={{
            background: 'rgba(26,138,85,0.15)',
            color: 'var(--ok)',
            padding: '4px 12px',
            borderRadius: 20,
            fontSize: 12,
            fontWeight: 700,
            textTransform: 'uppercase'
          }}>
            {user?.role}
          </span>

          <button
            onClick={handleLogout}
            style={{
              background: 'transparent',
              border: '1px solid var(--line)',
              borderRadius: 10,
              padding: '6px 14px',
              fontSize: 13,
              fontWeight: 600,
              color: 'var(--bad)',
              cursor: 'pointer'
            }}
          >
            Logout
          </button>
        </header>

        {/* Sub-view Content */}
        <main style={{ flex: 1, overflowY: 'auto', padding: '28px' }}>
          <Outlet />
        </main>
      </div>
    </div>
  );
}

