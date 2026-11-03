const express = require('express');
const router = express.Router();
const { Attendance, Fee, Doubt, Timetable, LeaveRequest, User, Batch, Centre, Course } = require('../models');
const { authenticate, authorize } = require('../middleware/auth');

// Attendance for a student or my attendance
router.get('/attendance', authenticate, async (req, res) => {
  try {
    const studentId = req.query.student_id || req.user.id;
    const records = await Attendance.findAll({
      where: { student_id: studentId },
      order: [['date', 'DESC']],
      limit: 60
    });
    res.json(records);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch attendance' });
  }
});

// Mark attendance (Teacher or Coordinator)
router.post('/attendance', authenticate, authorize('teacher', 'coordinator'), async (req, res) => {
  try {
    const { student_id, batch_id, date, status } = req.body;
    let rec = await Attendance.findOne({ where: { student_id, date } });
    if (rec) {
      await rec.update({ status, marked_by: req.user.id });
    } else {
      rec = await Attendance.create({
        student_id,
        batch_id: batch_id || null,
        date,
        status,
        marked_by: req.user.id
      });
    }
    res.json(rec);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

// Fees for student / parent
router.get('/fees', authenticate, async (req, res) => {
  try {
    const studentId = req.query.student_id || req.user.id;
    const fees = await Fee.findAll({
      where: { student_id: studentId },
      order: [['due_date', 'ASC']]
    });
    res.json(fees);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch fees' });
  }
});

// Doubts list
router.get('/doubts', authenticate, async (req, res) => {
  try {
    const where = req.user.role === 'student' ? { student_id: req.user.id } : {};
    const doubts = await Doubt.findAll({
      where,
      include: [{ model: User, as: 'Student', attributes: ['id', 'name', 'email'] }],
      order: [['id', 'DESC']]
    });
    res.json(doubts);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch doubts' });
  }
});

// Post doubt
router.post('/doubts', authenticate, async (req, res) => {
  try {
    const { question } = req.body;
    if (!question) return res.status(400).json({ error: 'Question is required' });
    const doubt = await Doubt.create({
      student_id: req.user.id,
      question,
      status: 'open'
    });
    res.status(201).json(doubt);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

// Answer doubt (Teacher / Mentor)
router.put('/doubts/:id/answer', authenticate, authorize('teacher', 'mentor', 'coordinator'), async (req, res) => {
  try {
    const doubt = await Doubt.findByPk(req.params.id);
    if (!doubt) return res.status(404).json({ error: 'Doubt not found' });
    await doubt.update({
      answer: req.body.answer,
      status: 'answered',
      answered_by: req.user.id
    });
    res.json(doubt);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

// Timetable
router.get('/timetable', authenticate, async (req, res) => {
  try {
    const batchId = req.query.batch_id || 1;
    const tt = await Timetable.findAll({
      where: { batch_id: batchId },
      order: [['day_of_week', 'ASC'], ['period', 'ASC']]
    });
    res.json(tt);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch timetable' });
  }
});

// Leave requests
router.get('/leave-requests', authenticate, async (req, res) => {
  try {
    const where = req.user.role === 'coordinator' ? {} : { user_id: req.user.id };
    const leaves = await LeaveRequest.findAll({
      where,
      include: [{ model: User, attributes: ['id', 'name', 'role', 'email'] }],
      order: [['id', 'DESC']]
    });
    res.json(leaves);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch leave requests' });
  }
});

router.post('/leave-requests', authenticate, async (req, res) => {
  try {
    const { from_date, to_date, reason } = req.body;
    const leave = await LeaveRequest.create({
      user_id: req.user.id,
      from_date,
      to_date,
      reason,
      status: 'pending'
    });
    res.status(201).json(leave);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

router.put('/leave-requests/:id/status', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const leave = await LeaveRequest.findByPk(req.params.id);
    if (!leave) return res.status(404).json({ error: 'Leave request not found' });
    await leave.update({ status: req.body.status });
    res.json(leave);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

// User Registrations approval list (Coordinator only)
router.get('/registrations', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const users = await User.findAll({
      order: [['id', 'DESC']],
      attributes: ['id', 'name', 'email', 'role', 'status', 'phone', 'created_at']
    });
    res.json(users);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch users' });
  }
});

router.put('/registrations/:id/status', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const user = await User.findByPk(req.params.id);
    if (!user) return res.status(404).json({ error: 'User not found' });
    await user.update({ status: req.body.status });
    res.json({ message: 'User status updated', user });
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

module.exports = router;

