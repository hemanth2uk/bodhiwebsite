const express = require('express');
const router = express.Router();
const { Page } = require('../models');
const { authenticate, authorize } = require('../middleware/auth');

// Get all pages
router.get('/', async (req, res) => {
  try {
    const pages = await Page.findAll();
    res.json(pages);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch pages' });
  }
});

// Get page by slug
router.get('/:slug', async (req, res) => {
  try {
    const page = await Page.findOne({ where: { slug: req.params.slug } });
    if (!page) {
      return res.status(404).json({ error: 'Page not found' });
    }
    res.json(page);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch page' });
  }
});

// Update or Create page (coordinator only)
router.put('/:slug', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const { slug } = req.params;
    const { title, content, meta_description } = req.body;

    let page = await Page.findOne({ where: { slug } });
    if (page) {
      await page.update({
        title: title || page.title,
        content: content !== undefined ? content : page.content,
        meta_description: meta_description !== undefined ? meta_description : page.meta_description,
        updated_by: req.user.id
      });
    } else {
      page = await Page.create({
        slug,
        title: title || slug,
        content: content || '',
        meta_description: meta_description || '',
        updated_by: req.user.id
      });
    }

    res.json(page);
  } catch (err) {
    res.status(400).json({ error: err.message || 'Failed to update page' });
  }
});

module.exports = router;

