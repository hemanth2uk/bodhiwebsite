const express = require('express');
const router = express.Router();
const { Course } = require('../models');
const { authenticate, authorize } = require('../middleware/auth');

// Get all active courses
router.get('/', async (req, res) => {
  try {
    const courses = await Course.findAll({
      where: { is_active: true },
      order: [['display_order', 'ASC'], ['id', 'ASC']]
    });
    res.json(courses);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch courses' });
  }
});

// Get single course by slug or ID
router.get('/:identifier', async (req, res) => {
  try {
    const { identifier } = req.params;
    const isId = /^\d+$/.test(identifier);
    const course = isId
      ? await Course.findByPk(identifier)
      : await Course.findOne({ where: { slug: identifier } });

    if (!course) {
      return res.status(404).json({ error: 'Course not found' });
    }
    res.json(course);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch course' });
  }
});

// Create new course (coordinator only)
router.post('/', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const course = await Course.create(req.body);
    res.status(201).json(course);
  } catch (err) {
    res.status(400).json({ error: err.message || 'Failed to create course' });
  }
});

// Update course (coordinator only)
router.put('/:id', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const course = await Course.findByPk(req.params.id);
    if (!course) {
      return res.status(404).json({ error: 'Course not found' });
    }
    await course.update(req.body);
    res.json(course);
  } catch (err) {
    res.status(400).json({ error: err.message || 'Failed to update course' });
  }
});

// Delete course (coordinator only)
router.delete('/:id', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const course = await Course.findByPk(req.params.id);
    if (!course) {
      return res.status(404).json({ error: 'Course not found' });
    }
    await course.destroy();
    res.json({ message: 'Course deleted successfully' });
  } catch (err) {
    res.status(500).json({ error: 'Failed to delete course' });
  }
});

module.exports = router;

