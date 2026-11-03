export default function Footer() {
  return (
    <footer className="w-ft">
      <div className="mx">
        <div>
          <div style={{ display: 'flex', alignItems: 'center', gap: 10, marginBottom: 12 }}>
            <img src="/logo.svg" alt="Bodhi Education" style={{ width: 36, height: 36, borderRadius: 8, background: '#fff', padding: 2 }} />
            <h4 style={{ margin: 0, fontSize: 18 }}>Bodhi Education</h4>
          </div>
          <p>Empowering learners with hybrid education that combines traditional wisdom with modern technology. Join thousands of students on their journey to excellence.</p>
          <div className="nl">
            <input type="email" placeholder="Your email" />
            <button>Subscribe</button>
          </div>
        </div>

        <div>
          <h4>Courses</h4>
          <ul>
            <li><a href="#courses">IIT-JEE Prep</a></li>
            <li><a href="#courses">NEET Biology</a></li>
            <li><a href="#courses">Foundation 8-10</a></li>
            <li><a href="#courses">Board Exams</a></li>
            <li><a href="#courses">Olympiad Training</a></li>
          </ul>
        </div>

        <div>
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#about">About Us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="/login">Student Login</a></li>
          </ul>
        </div>

        <div>
          <h4>Contact</h4>
          <p>📍 123 Knowledge Lane, Education City, IN 400001</p>
          <p>📞 1800-123-BODHI</p>
          <p>✉️ hello@bodhi.edu</p>
          <p>🕐 Mon–Sat, 8am–8pm</p>
        </div>
      </div>
      <div className="w-cp">© {new Date().getFullYear()} Bodhi Education Portal. All rights reserved.</div>
    </footer>
  );
}
