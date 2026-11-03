export default function FloatingButtons() {
  return (
    <>
      <a
        href="tel:+918921180598"
        aria-label="Call us"
        style={{
          position: 'fixed',
          bottom: 24,
          left: 24,
          width: 52,
          height: 52,
          borderRadius: '50%',
          background: '#f59e0b',
          color: '#fff',
          display: 'grid',
          placeItems: 'center',
          fontSize: 22,
          boxShadow: '0 8px 24px rgba(0,0,0,0.25)',
          zIndex: 99,
          textDecoration: 'none',
          transition: 'transform 0.2s'
        }}
        onMouseEnter={e => e.currentTarget.style.transform = 'scale(1.1)'}
        onMouseLeave={e => e.currentTarget.style.transform = 'scale(1)'}
      >
        📞
      </a>
      <a
        href="https://wa.me/918921180598"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat on WhatsApp"
        style={{
          position: 'fixed',
          bottom: 24,
          right: 24,
          width: 52,
          height: 52,
          borderRadius: '50%',
          background: '#22c55e',
          color: '#fff',
          display: 'grid',
          placeItems: 'center',
          fontSize: 24,
          boxShadow: '0 8px 24px rgba(0,0,0,0.25)',
          zIndex: 99,
          textDecoration: 'none',
          transition: 'transform 0.2s'
        }}
        onMouseEnter={e => e.currentTarget.style.transform = 'scale(1.1)'}
        onMouseLeave={e => e.currentTarget.style.transform = 'scale(1)'}
      >
        💬
      </a>
    </>
  );
}

