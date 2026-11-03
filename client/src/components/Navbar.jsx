import { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';

const links = [
  { label: 'Home', href: '#home' },
  { label: 'About us', href: '#about' },
  { label: 'Courses', href: '#courses' },
  { label: 'Services', href: '#services' },
  { label: 'Programmes', href: '#hybrid' },
  { label: 'FAQ', href: '#faq' },
  { label: 'Contact us', href: '#contact' },
];

export default function Navbar() {
  const [open, setOpen] = useState(false);
  const navigate = useNavigate();

  const handleNavClick = (href) => {
    setOpen(false);
    const el = document.querySelector(href);
    if (el) el.scrollIntoView({ behavior: 'smooth' });
  };

  return (
    <header className="w-hd">
      <nav className="w-nav">
        <Link to="/" className="w-brand">
          <img src="/logo.svg" alt="Bodhi Education" className="wlg" />
          <span>Bodhi Education</span>
        </Link>

        <div className="w-links">
          {links.map((l) => (
            <a key={l.label} href={l.href} onClick={(e) => { e.preventDefault(); handleNavClick(l.href); }}>
              {l.label}
            </a>
          ))}
        </div>

        <div className="w-act">
          <button className="w-b s" onClick={() => navigate('/login')}>Login</button>
          <button className="w-b p" onClick={() => navigate('/register')}>Register</button>
          <div className={`w-ham ${open ? 'open' : ''}`} onClick={() => setOpen(!open)}>
            <span /><span /><span />
          </div>
        </div>
      </nav>

      <div className={`w-mob ${open ? 'open' : ''}`}>
        {links.map((l) => (
          <a key={l.label} href={l.href} onClick={(e) => { e.preventDefault(); handleNavClick(l.href); }}>
            {l.label}
          </a>
        ))}
        <button className="w-b p" onClick={() => { setOpen(false); navigate('/login'); }}>Login</button>
        <button className="w-b s" onClick={() => { setOpen(false); navigate('/register'); }}>Register</button>
      </div>
    </header>
  );
}
