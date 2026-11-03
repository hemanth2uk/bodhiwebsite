import { useState, useEffect } from 'react';
import api from '../../api';

export default function Fees() {
  const [fees, setFees] = useState([
    { id: 1, description: 'Term 2 NEET Regular Coaching', amount: '12000.00', status: 'due', due_date: '2026-11-20' },
    { id: 2, description: 'Bodhi Study Material & Modules Pack', amount: '1800.00', status: 'paid', due_date: '2026-10-15', paid_date: '2026-10-12' },
    { id: 3, description: 'Term 1 Tuition & Hybrid Sessions', amount: '12000.00', status: 'paid', due_date: '2026-08-15', paid_date: '2026-08-10' }
  ]);

  useEffect(() => {
    api.get('/dashboard/fees')
      .then(res => {
        if (res.data && res.data.length > 0) setFees(res.data);
      })
      .catch(() => {});
  }, []);

  return (
    <div style={{ maxWidth: 860, display: 'grid', gap: 20 }}>
      <div>
        <h2 style={{ fontSize: 24, fontWeight: 700, color: 'var(--brand-d)' }}>Fee & Payments</h2>
        <p style={{ color: 'var(--mute)', fontSize: 14 }}>
          Track your installment schedule, due dates, and paid invoices.
        </p>
      </div>

      <div style={{
        background: 'var(--surf)',
        border: '1px solid var(--line)',
        borderRadius: 16,
        padding: 24,
        boxShadow: 'var(--sh)',
        display: 'grid',
        gap: 14
      }}>
        {fees.map(f => (
          <div
            key={f.id}
            style={{
              display: 'flex',
              alignItems: 'center',
              justifyContent: 'space-between',
              padding: '16px 0',
              borderBottom: '1px solid var(--line)',
              gap: 16
            }}
          >
            <div>
              <strong style={{ fontSize: 15, display: 'block', color: 'var(--ink)' }}>{f.description}</strong>
              <span style={{ fontSize: 12, color: 'var(--mute)' }}>
                Due by: {f.due_date} {f.paid_date ? `• Paid on: ${f.paid_date}` : ''}
              </span>
            </div>

            <div style={{ textAlign: 'right' }}>
              <span style={{ fontSize: 17, fontWeight: 800, color: 'var(--brand-d)', display: 'block' }}>
                ₹{Number(f.amount).toLocaleString('en-IN')}
              </span>
              <span style={{
                display: 'inline-block',
                marginTop: 4,
                padding: '2px 8px',
                borderRadius: 12,
                fontSize: 11,
                fontWeight: 700,
                textTransform: 'uppercase',
                background: f.status === 'paid' ? 'rgba(26,138,85,0.15)' : 'rgba(200,55,45,0.15)',
                color: f.status === 'paid' ? 'var(--ok)' : 'var(--bad)'
              }}>
                {f.status}
              </span>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

