import { useState, useEffect } from 'react';
import api from '../../api';

export default function Doubts() {
  const [doubts, setDoubts] = useState([
    { id: 1, question: 'Why does static friction have a limiting value?', answer: 'Static friction is self-adjusting up to a maximum value called limiting friction (flim = μs * N). Once applied force exceeds this, motion starts.', status: 'answered' },
    { id: 2, question: 'How to quickly balance redox equations in acidic medium?', answer: null, status: 'open' }
  ]);
  const [newQuestion, setNewQuestion] = useState('');
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    api.get('/dashboard/doubts')
      .then(res => {
        if (res.data && res.data.length > 0) setDoubts(res.data);
      })
      .catch(() => {});
  }, []);

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!newQuestion.trim()) return;
    setLoading(true);
    try {
      const res = await api.post('/dashboard/doubts', { question: newQuestion });
      setDoubts([res.data, ...doubts]);
      setNewQuestion('');
    } catch (err) {
      alert('Failed to submit question.');
    } finally {
      setLoading(false);
    }
  };

  return (
    <div style={{ maxWidth: 860, display: 'grid', gap: 24 }}>
      <div>
        <h2 style={{ fontSize: 24, fontWeight: 700, color: 'var(--brand-d)' }}>Doubt Box</h2>
        <p style={{ color: 'var(--mute)', fontSize: 14 }}>
          Post academic questions to your subject teachers and receive step-by-step guidance.
        </p>
      </div>

      {/* Post doubt form */}
      <form onSubmit={handleSubmit} style={{
        background: 'var(--surf)',
        border: '1px solid var(--line)',
        borderRadius: 16,
        padding: 20,
        boxShadow: 'var(--sh)',
        display: 'grid',
        gap: 12
      }}>
        <h3 style={{ fontSize: 16, fontWeight: 700, color: 'var(--brand-d)' }}>Ask a Question</h3>
        <textarea
          rows={3}
          required
          value={newQuestion}
          onChange={e => setNewQuestion(e.target.value)}
          placeholder="Type your question or formula problem here…"
          style={{
            width: '100%',
            padding: 12,
            borderRadius: 10,
            border: '1px solid var(--line)',
            fontSize: 14,
            fontFamily: 'inherit',
            resize: 'vertical'
          }}
        />
        <button
          type="submit"
          disabled={loading}
          style={{
            background: 'var(--brand)',
            color: '#fff',
            border: 0,
            borderRadius: 10,
            padding: '10px 20px',
            fontWeight: 700,
            fontSize: 14,
            cursor: 'pointer',
            justifySelf: 'start'
          }}
        >
          {loading ? 'Submitting…' : 'Submit Doubt →'}
        </button>
      </form>

      {/* Doubts list */}
      <div style={{ display: 'grid', gap: 14 }}>
        {doubts.map(d => (
          <div
            key={d.id}
            style={{
              background: 'var(--surf)',
              border: '1px solid var(--line)',
              borderRadius: 16,
              padding: 20,
              boxShadow: 'var(--sh)',
              display: 'grid',
              gap: 8
            }}
          >
            <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
              <span style={{
                fontSize: 11,
                fontWeight: 700,
                textTransform: 'uppercase',
                padding: '2px 8px',
                borderRadius: 12,
                background: d.status === 'answered' ? 'rgba(26,138,85,0.15)' : 'rgba(184,110,0,0.15)',
                color: d.status === 'answered' ? 'var(--ok)' : 'var(--warn)'
              }}>
                {d.status}
              </span>
            </div>
            <strong style={{ fontSize: 15, color: 'var(--ink)' }}>Q: {d.question}</strong>
            {d.answer ? (
              <div style={{
                background: 'var(--tint)',
                borderLeft: '4px solid var(--brand)',
                borderRadius: '0 8px 8px 0',
                padding: '10px 14px',
                fontSize: 13.5,
                color: 'var(--brand-d)',
                marginTop: 4
              }}>
                <strong>Guru Answer:</strong> {d.answer}
              </div>
            ) : (
              <div style={{ fontSize: 13, color: 'var(--mute)', fontStyle: 'italic' }}>
                Pending teacher review…
              </div>
            )}
          </div>
        ))}
      </div>
    </div>
  );
}

