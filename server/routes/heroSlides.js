const express = require('express');
const router = express.Router();
const { HeroSlide } = require('../models');
const { authenticate, authorize } = require('../middleware/auth');

router.get('/', async (req, res) => {
  try {
    const slides = await HeroSlide.findAll({ order: [['display_order', 'ASC'], ['id', 'ASC']] });
    res.json(slides);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch hero slides' });
  }
});

router.post('/', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const slide = await HeroSlide.create(req.body);
    res.status(201).json(slide);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

router.put('/:id', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const slide = await HeroSlide.findByPk(req.params.id);
    if (!slide) return res.status(404).json({ error: 'Slide not found' });
    await slide.update(req.body);
    res.json(slide);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

router.delete('/:id', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const slide = await HeroSlide.findByPk(req.params.id);
    if (!slide) return res.status(404).json({ error: 'Slide not found' });
    await slide.destroy();
    res.json({ message: 'Slide deleted' });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

module.exports = router;

