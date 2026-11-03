import { useState, useEffect } from 'react';
import api from '../../api';
import { useAuth } from '../../contexts/AuthContext';

export default function Attendance() {
  const { user } = useAuth();
  const [records, setRecords] = useState([]);

  useEffect(() => {
    api.get('/dashboard/attendance')
      .then(res => setRecords(res.data))
      .catch(() => {
        // Fallback sample data
        setRecords([
          { id: 1, date: '2026-11-01', status: 'P' },
          { id: 2, date: '2026-11-02', status: 'P' },
          { id: 3, date: '2026-11-03', status: 'P' }
        ]);
      });
  }, []);

  return (
    <div style={{ maxWidth: 860, display: 'grid', gap: 20 }}>
      <div>
        <h2 style={{ fontSize: 24, fontWeight: 700, color: 'var(--brand-d)' }}>Attendance Log</h2>
        <p style={{ color: 'var(--mute)', fontSize: 14 }}>
          Review your attendance history and monthly presence summary.
        </p>
      </div>

      <div style={{
        background: 'var(--surf)',
        border: '1px solid var(--line)',
        borderRadius: 16,
        padding: 24,
        boxShadow: 'var(--sh)'
      }}>
        <div style={{ display: 'flex', gap: 24, marginBottom: 20 }}>
          <div style={{ textAlign: 'center' }}>
            <span style={{ fontSize: 28, fontWeight: 800, color: 'var(--ok)' }}>28</span>
            <span style={{ display: 'block', fontSize: 12, color: 'var(--mute)' }}>Present (P)</span>
          </div>
          <div style={{ textAlign: 'center' }}>
            <span style={{ fontSize: 28, fontWeight: 800, color: 'var(--bad)' }}>1</span>
            <span style={{ display: 'block', fontSize: 12, color: 'var(--mute)' }}>Absent (A)</span>
          </div>
          <div style={{ textAlign: 'center' }}>
            <span style={{ fontSize: 28, fontWeight: 800, color: 'var(--warn)' }}>0</span>
            <span style={{ display: 'block', fontSize: 12, color: 'var(--mute)' }}>Late (L)</span>
          </div>
        </div>

        <table style={{ width: '100%', borderCollapse: 'collapse', fontSize: 14 }}>
          <thead>
            <tr style={{ borderBottom: '2px solid var(--line)', textAlign: 'left', color: 'var(--mute)' }}>
              <th style={{ padding: '10px 0' }}>Date</th>
              <th style={{ padding: '10px 0' }}>Status</th>
              <th style={{ padding: '10px 0' }}>Session</th>
            </tr>
          </thead>
          <tbody>
            {records.map(r => (
              <tr key={r.id || r.date} style={{ borderBottom: '1px solid var(--line)' }}>
                <td style={{ padding: '12px 0', fontWeight: 600 }}>{r.date}</td>
                <td style={{ padding: '12px 0' }}>
                  <span style={{
                    padding: '4px 10px',
                    borderRadius: 20,
                    fontWeight: 700,
                    fontSize: 12,
                    background: r.status === 'P' ? 'rgba(26,138,85,0.15)' : 'rgba(200,55,45,0.15)',
                    color: r.status === 'P' ? 'var(--ok)' : 'var(--bad)'
                  }}>
                    {r.status === 'P' ? 'Present' : r.status === 'L' ? 'Late' : 'Absent'}
                  </span>
                </td>
                <td style={{ padding: '12px 0', color: 'var(--mute)' }}>Regular Morning Batch</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}

