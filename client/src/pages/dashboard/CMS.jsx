import { useState, useEffect } from 'react';
import api from '../../api';

export default function CMS() {
  const [activeTab, setActiveTab] = useState('settings');
  const [settings, setSettings] = useState({
    site_name: '',
    tagline: '',
    phone: '',
    whatsapp: '',
    address: '',
    hours: '',
    news_ticker: ''
  });
  const [aboutPage, setAboutPage] = useState({ title: '', content: '' });
  const [courses, setCourses] = useState([]);
  const [mediaList, setMediaList] = useState([]);
  const [uploadFile, setUploadFile] = useState(null);
  const [uploading, setUploading] = useState(false);
  const [saveStatus, setSaveStatus] = useState('');

  // Course edit modal state
  const [editingCourse, setEditingCourse] = useState(null);

  // Load initial data
  useEffect(() => {
    fetchSettings();
    fetchAbout();
    fetchCourses();
    fetchMedia();
  }, []);

  const fetchSettings = () => {
    api.get('/settings').then(res => setSettings(prev => ({ ...prev, ...res.data }))).catch(() => {});
  };

  const fetchAbout = () => {
    api.get('/pages/about-us').then(res => setAboutPage(res.data)).catch(() => {});
  };

  const fetchCourses = () => {
    api.get('/courses').then(res => setCourses(res.data)).catch(() => {});
  };

  const fetchMedia = () => {
    api.get('/media').then(res => setMediaList(res.data)).catch(() => {});
  };

  // Save Settings
  const handleSaveSettings = async (e) => {
    e.preventDefault();
    setSaveStatus('Saving settings…');
    try {
      await api.post('/settings/bulk', settings);
      setSaveStatus('✅ Settings saved to MySQL database!');
      setTimeout(() => setSaveStatus(''), 3000);
    } catch (err) {
      setSaveStatus('❌ Failed to save settings');
    }
  };

  // Save About Page
  const handleSaveAbout = async (e) => {
    e.preventDefault();
    setSaveStatus('Saving About Us page…');
    try {
      await api.put('/pages/about-us', aboutPage);
      setSaveStatus('✅ About Us content saved to MySQL!');
      setTimeout(() => setSaveStatus(''), 3000);
    } catch (err) {
      setSaveStatus('❌ Failed to save page content');
    }
  };

  // Upload image
  const handleUpload = async (e) => {
    e.preventDefault();
    if (!uploadFile) return;
    setUploading(true);
    const formData = new FormData();
    formData.append('file', uploadFile);

    try {
      const res = await api.post('/media/upload', formData, {
        headers: { 'Content-Type': 'multipart/form-data' }
      });
      setMediaList([res.data.media, ...mediaList]);
      setUploadFile(null);
      setSaveStatus('✅ Image uploaded successfully!');
      setTimeout(() => setSaveStatus(''), 3000);
    } catch (err) {
      alert('Upload failed: ' + (err.response?.data?.error || err.message));
    } finally {
      setUploading(false);
    }
  };

  // Delete media
  const handleDeleteMedia = async (id) => {
    if (!window.confirm('Delete this file?')) return;
    try {
      await api.delete(`/media/${id}`);
      setMediaList(mediaList.filter(m => m.id !== id));
    } catch (err) {
      alert('Failed to delete media');
    }
  };

  // Save course
  const handleSaveCourse = async (e) => {
    e.preventDefault();
    try {
      if (editingCourse.id) {
        await api.put(`/courses/${editingCourse.id}`, editingCourse);
      } else {
        await api.post('/courses', editingCourse);
      }
      setEditingCourse(null);
      fetchCourses();
      setSaveStatus('✅ Course saved to MySQL!');
      setTimeout(() => setSaveStatus(''), 3000);
    } catch (err) {
      alert('Failed to save course');
    }
  };

  return (
    <div style={{ maxWidth: 1000, display: 'grid', gap: 20 }}>
      <div>
        <h2 style={{ fontSize: 26, fontWeight: 800, color: 'var(--brand-d)' }}>
          🛠️ Bodhi Content Management System (CMS)
        </h2>
        <p style={{ color: 'var(--mute)', fontSize: 14 }}>
          Live editing of website content, course programs, announcements, and image assets stored in MySQL.
        </p>
      </div>

      {saveStatus && (
        <div style={{
          background: 'var(--tint)',
          color: 'var(--brand-d)',
          padding: '12px 18px',
          borderRadius: 12,
          fontWeight: 700,
          fontSize: 14
        }}>
          {saveStatus}
        </div>
      )}

      {/* Tabs */}
      <div style={{ display: 'flex', gap: 8, borderBottom: '2px solid var(--line)', paddingBottom: 2 }}>
        {[
          { id: 'settings', label: 'Site Settings & News', icon: '⚙️' },
          { id: 'about', label: 'About Us Content', icon: '📝' },
          { id: 'courses', label: 'Courses Management', icon: '📚' },
          { id: 'media', label: 'Image & Media Gallery', icon: '🖼️' }
        ].map(t => (
          <button
            key={t.id}
            type="button"
            onClick={() => setActiveTab(t.id)}
            style={{
              padding: '10px 18px',
              borderRadius: '10px 10px 0 0',
              fontWeight: 700,
              fontSize: 13.5,
              cursor: 'pointer',
              border: 0,
              background: activeTab === t.id ? 'var(--brand)' : 'var(--surf)',
              color: activeTab === t.id ? '#fff' : 'var(--mute)',
              transition: 'all 0.15s'
            }}
          >
            {t.icon} {t.label}
          </button>
        ))}
      </div>

      {/* Tab 1: Settings & News */}
      {activeTab === 'settings' && (
        <form onSubmit={handleSaveSettings} style={{
          background: 'var(--surf)',
          border: '1px solid var(--line)',
          borderRadius: 16,
          padding: 24,
          display: 'grid',
          gap: 16,
          boxShadow: 'var(--sh)'
        }}>
          <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)' }}>
            Header, Contact & Live Announcements
          </h3>

          <div>
            <label style={{ display: 'block', fontSize: 13, fontWeight: 700, marginBottom: 6 }}>
              📣 Marquee News Ticker (Top Bar)
            </label>
            <input
              type="text"
              value={settings.news_ticker || ''}
              onChange={e => setSettings({ ...settings, news_ticker: e.target.value })}
              placeholder="e.g. NEET 2027 Registration Open | Karamana Centre Demo Classes"
              style={{ width: '100%', height: 42, padding: '0 12px', borderRadius: 10, border: '1px solid var(--line)' }}
            />
          </div>

          <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 14 }}>
            <div>
              <label style={{ display: 'block', fontSize: 13, fontWeight: 700, marginBottom: 6 }}>Phone Number</label>
              <input
                type="text"
                value={settings.phone || ''}
                onChange={e => setSettings({ ...settings, phone: e.target.value })}
                style={{ width: '100%', height: 42, padding: '0 12px', borderRadius: 10, border: '1px solid var(--line)' }}
              />
            </div>
            <div>
              <label style={{ display: 'block', fontSize: 13, fontWeight: 700, marginBottom: 6 }}>WhatsApp Number</label>
              <input
                type="text"
                value={settings.whatsapp || ''}
                onChange={e => setSettings({ ...settings, whatsapp: e.target.value })}
                style={{ width: '100%', height: 42, padding: '0 12px', borderRadius: 10, border: '1px solid var(--line)' }}
              />
            </div>
          </div>

          <div>
            <label style={{ display: 'block', fontSize: 13, fontWeight: 700, marginBottom: 6 }}>Office Address</label>
            <textarea
              rows={2}
              value={settings.address || ''}
              onChange={e => setSettings({ ...settings, address: e.target.value })}
              style={{ width: '100%', padding: 10, borderRadius: 10, border: '1px solid var(--line)', fontFamily: 'inherit' }}
            />
          </div>

          <div>
            <label style={{ display: 'block', fontSize: 13, fontWeight: 700, marginBottom: 6 }}>Working Hours</label>
            <input
              type="text"
              value={settings.hours || ''}
              onChange={e => setSettings({ ...settings, hours: e.target.value })}
              style={{ width: '100%', height: 42, padding: '0 12px', borderRadius: 10, border: '1px solid var(--line)' }}
            />
          </div>

          <button
            type="submit"
            style={{
              background: 'var(--brand)',
              color: '#fff',
              border: 0,
              padding: '12px 24px',
              borderRadius: 10,
              fontWeight: 700,
              fontSize: 14,
              cursor: 'pointer',
              justifySelf: 'start'
            }}
          >
            Save All Settings to DB 💾
          </button>
        </form>
      )}

      {/* Tab 2: About Page Content */}
      {activeTab === 'about' && (
        <form onSubmit={handleSaveAbout} style={{
          background: 'var(--surf)',
          border: '1px solid var(--line)',
          borderRadius: 16,
          padding: 24,
          display: 'grid',
          gap: 16,
          boxShadow: 'var(--sh)'
        }}>
          <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)' }}>
            Edit About Us Page Text
          </h3>

          <div>
            <label style={{ display: 'block', fontSize: 13, fontWeight: 700, marginBottom: 6 }}>Page Title</label>
            <input
              type="text"
              value={aboutPage.title || ''}
              onChange={e => setAboutPage({ ...aboutPage, title: e.target.value })}
              style={{ width: '100%', height: 42, padding: '0 12px', borderRadius: 10, border: '1px solid var(--line)' }}
            />
          </div>

          <div>
            <label style={{ display: 'block', fontSize: 13, fontWeight: 700, marginBottom: 6 }}>Full Article Content</label>
            <textarea
              rows={12}
              value={aboutPage.content || ''}
              onChange={e => setAboutPage({ ...aboutPage, content: e.target.value })}
              style={{ width: '100%', padding: 14, borderRadius: 10, border: '1px solid var(--line)', fontSize: 14, lineHeight: 1.6, fontFamily: 'inherit' }}
            />
          </div>

          <button
            type="submit"
            style={{
              background: 'var(--brand)',
              color: '#fff',
              border: 0,
              padding: '12px 24px',
              borderRadius: 10,
              fontWeight: 700,
              fontSize: 14,
              cursor: 'pointer',
              justifySelf: 'start'
            }}
          >
            Update About Content 💾
          </button>
        </form>
      )}

      {/* Tab 3: Courses Management */}
      {activeTab === 'courses' && (
        <div style={{
          background: 'var(--surf)',
          border: '1px solid var(--line)',
          borderRadius: 16,
          padding: 24,
          display: 'grid',
          gap: 18,
          boxShadow: 'var(--sh)'
        }}>
          <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
            <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)' }}>Courses & Curriculum</h3>
            <button
              type="button"
              onClick={() => setEditingCourse({ title: '', slug: '', short_desc: '', description: '', target_group: '', color: '#0b7f6e', icon: '📚' })}
              style={{
                background: 'var(--brand)',
                color: '#fff',
                border: 0,
                borderRadius: 8,
                padding: '8px 16px',
                fontWeight: 700,
                fontSize: 13,
                cursor: 'pointer'
              }}
            >
              + Add New Course
            </button>
          </div>

          <div style={{ display: 'grid', gap: 12 }}>
            {courses.map(c => (
              <div
                key={c.id}
                style={{
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'space-between',
                  padding: 16,
                  borderRadius: 12,
                  border: '1px solid var(--line)',
                  background: 'var(--bg)',
                  gap: 16
                }}
              >
                <div>
                  <div style={{ display: 'flex', alignItems: 'center', gap: 8 }}>
                    <span style={{ fontSize: 18 }}>{c.icon || '📚'}</span>
                    <strong style={{ fontSize: 16, color: 'var(--brand-d)' }}>{c.title}</strong>
                    <span style={{ fontSize: 11, background: 'var(--tint)', padding: '2px 8px', borderRadius: 10, fontWeight: 700 }}>
                      {c.target_group}
                    </span>
                  </div>
                  <p style={{ color: 'var(--mute)', fontSize: 13, marginTop: 4 }}>{c.short_desc}</p>
                </div>

                <div style={{ display: 'flex', gap: 8 }}>
                  <button
                    type="button"
                    onClick={() => setEditingCourse(c)}
                    style={{
                      background: 'var(--surf)',
                      border: '1px solid var(--line)',
                      padding: '6px 12px',
                      borderRadius: 8,
                      fontWeight: 600,
                      fontSize: 12,
                      cursor: 'pointer'
                    }}
                  >
                    Edit
                  </button>
                </div>
              </div>
            ))}
          </div>

          {/* Modal / Inline Course Editor */}
          {editingCourse && (
            <form onSubmit={handleSaveCourse} style={{
              background: 'var(--surf)',
              border: '2px solid var(--brand)',
              borderRadius: 14,
              padding: 20,
              display: 'grid',
              gap: 12,
              marginTop: 14
            }}>
              <h4 style={{ fontSize: 16, fontWeight: 700, color: 'var(--brand-d)' }}>
                {editingCourse.id ? 'Edit Course' : 'Create New Course'}
              </h4>

              <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 12 }}>
                <div>
                  <label style={{ display: 'block', fontSize: 12, fontWeight: 700, marginBottom: 4 }}>Course Title</label>
                  <input
                    type="text"
                    required
                    value={editingCourse.title || ''}
                    onChange={e => setEditingCourse({ ...editingCourse, title: e.target.value, slug: e.target.value.toLowerCase().replace(/[^a-z0-9]/g, '-') })}
                    style={{ width: '100%', height: 38, padding: '0 10px', borderRadius: 8, border: '1px solid var(--line)' }}
                  />
                </div>
                <div>
                  <label style={{ display: 'block', fontSize: 12, fontWeight: 700, marginBottom: 4 }}>Target Group</label>
                  <input
                    type="text"
                    value={editingCourse.target_group || ''}
                    onChange={e => setEditingCourse({ ...editingCourse, target_group: e.target.value })}
                    placeholder="e.g. Classes 8, 9, 10"
                    style={{ width: '100%', height: 38, padding: '0 10px', borderRadius: 8, border: '1px solid var(--line)' }}
                  />
                </div>
              </div>

              <div>
                <label style={{ display: 'block', fontSize: 12, fontWeight: 700, marginBottom: 4 }}>Short Summary</label>
                <input
                  type="text"
                  value={editingCourse.short_desc || ''}
                  onChange={e => setEditingCourse({ ...editingCourse, short_desc: e.target.value })}
                  style={{ width: '100%', height: 38, padding: '0 10px', borderRadius: 8, border: '1px solid var(--line)' }}
                />
              </div>

              <div>
                <label style={{ display: 'block', fontSize: 12, fontWeight: 700, marginBottom: 4 }}>Full Details</label>
                <textarea
                  rows={4}
                  value={editingCourse.description || ''}
                  onChange={e => setEditingCourse({ ...editingCourse, description: e.target.value })}
                  style={{ width: '100%', padding: 10, borderRadius: 8, border: '1px solid var(--line)', fontFamily: 'inherit' }}
                />
              </div>

              <div style={{ display: 'flex', gap: 10 }}>
                <button
                  type="submit"
                  style={{
                    background: 'var(--brand)',
                    color: '#fff',
                    border: 0,
                    padding: '8px 18px',
                    borderRadius: 8,
                    fontWeight: 700,
                    cursor: 'pointer'
                  }}
                >
                  Save Course 💾
                </button>
                <button
                  type="button"
                  onClick={() => setEditingCourse(null)}
                  style={{
                    background: 'var(--surf)',
                    border: '1px solid var(--line)',
                    padding: '8px 16px',
                    borderRadius: 8,
                    fontWeight: 600,
                    cursor: 'pointer'
                  }}
                >
                  Cancel
                </button>
              </div>
            </form>
          )}
        </div>
      )}

      {/* Tab 4: Full Image & Media Gallery */}
      {activeTab === 'media' && (
        <div style={{
          background: 'var(--surf)',
          border: '1px solid var(--line)',
          borderRadius: 16,
          padding: 24,
          display: 'grid',
          gap: 20,
          boxShadow: 'var(--sh)'
        }}>
          <div>
            <h3 style={{ fontSize: 18, fontWeight: 700, color: 'var(--brand-d)' }}>
              Full Images & Media Uploads
            </h3>
            <p style={{ color: 'var(--mute)', fontSize: 13.5, marginTop: 4 }}>
              Upload banners, logos, and course covers. They are served directly from the Node backend and stored in MySQL.
            </p>
          </div>

          {/* Upload form */}
          <form onSubmit={handleUpload} style={{
            border: '2px dashed var(--line)',
            borderRadius: 14,
            padding: 24,
            textAlign: 'center',
            background: 'var(--bg)',
            display: 'grid',
            placeItems: 'center',
            gap: 12
          }}>
            <input
              type="file"
              accept="image/*,application/pdf"
              onChange={e => setUploadFile(e.target.files[0])}
              style={{ fontSize: 14 }}
            />
            <button
              type="submit"
              disabled={!uploadFile || uploading}
              style={{
                background: 'var(--brand)',
                color: '#fff',
                border: 0,
                padding: '10px 24px',
                borderRadius: 10,
                fontWeight: 700,
                fontSize: 14,
                cursor: uploadFile ? 'pointer' : 'not-allowed',
                opacity: uploadFile ? 1 : 0.6
              }}
            >
              {uploading ? 'Uploading…' : '📤 Upload to Server'}
            </button>
          </form>

          {/* Images Grid */}
          <div style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fill, minmax(180px, 1fr))',
            gap: 16
          }}>
            {mediaList.map(m => (
              <div
                key={m.id}
                style={{
                  border: '1px solid var(--line)',
                  borderRadius: 12,
                  overflow: 'hidden',
                  background: '#fff',
                  boxShadow: 'var(--sh)',
                  display: 'flex',
                  flexDirection: 'column'
                }}
              >
                <div style={{ height: 120, background: '#f5f5f5', display: 'grid', placeItems: 'center' }}>
                  {m.mime_type?.startsWith('image/') ? (
                    <img
                      src={`http://localhost:5000${m.url}`}
                      alt={m.filename}
                      style={{ width: '100%', height: '100%', objectFit: 'cover' }}
                      onError={e => { e.currentTarget.style.display = 'none'; }}
                    />
                  ) : (
                    <span style={{ fontSize: 32 }}>📄</span>
                  )}
                </div>
                <div style={{ padding: 10, fontSize: 11, flex: 1, display: 'flex', flexDirection: 'column', gap: 6 }}>
                  <span style={{ fontWeight: 600, color: 'var(--ink)', wordBreak: 'break-all' }}>
                    {m.original_name || m.filename}
                  </span>
                  <input
                    readOnly
                    value={`http://localhost:5000${m.url}`}
                    onClick={e => { e.target.select(); navigator.clipboard.writeText(e.target.value); alert('URL copied!'); }}
                    style={{
                      width: '100%',
                      padding: 4,
                      fontSize: 10,
                      borderRadius: 4,
                      border: '1px solid var(--line)',
                      background: 'var(--bg)',
                      cursor: 'pointer'
                    }}
                    title="Click to copy URL"
                  />
                  <button
                    type="button"
                    onClick={() => handleDeleteMedia(m.id)}
                    style={{
                      color: 'var(--bad)',
                      background: 'none',
                      border: 0,
                      fontWeight: 600,
                      fontSize: 11,
                      cursor: 'pointer',
                      textAlign: 'left',
                      marginTop: 'auto'
                    }}
                  >
                    Delete 🗑️
                  </button>
                </div>
              </div>
            ))}
          </div>
        </div>
      )}
    </div>
  );
}

