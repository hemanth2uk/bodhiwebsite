const express = require('express');
const router = express.Router();
const { Testimonial } = require('../models');
const { authenticate, authorize } = require('../middleware/auth');

router.get('/', async (req, res) => {
  try {
    const list = await Testimonial.findAll({ order: [['display_order', 'ASC'], ['id', 'ASC']] });
    res.json(list);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch testimonials' });
  }
});

router.post('/', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const item = await Testimonial.create(req.body);
    res.status(201).json(item);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

router.put('/:id', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const item = await Testimonial.findByPk(req.params.id);
    if (!item) return res.status(404).json({ error: 'Testimonial not found' });
    await item.update(req.body);
    res.json(item);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

router.delete('/:id', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const item = await Testimonial.findByPk(req.params.id);
    if (!item) return res.status(404).json({ error: 'Testimonial not found' });
    await item.destroy();
    res.json({ message: 'Testimonial deleted' });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

module.exports = router;

