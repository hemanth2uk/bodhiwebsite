const express = require('express');
const router = express.Router();
const { SiteSetting } = require('../models');
const { authenticate, authorize } = require('../middleware/auth');

// Get all settings as key-value map
router.get('/', async (req, res) => {
  try {
    const list = await SiteSetting.findAll();
    const map = {};
    list.forEach(item => {
      map[item.setting_key] = item.setting_value;
    });
    res.json(map);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch settings' });
  }
});

// Update or set setting (coordinator only)
router.post('/bulk', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const entries = Object.entries(req.body);
    for (const [key, value] of entries) {
      const valStr = typeof value === 'object' ? JSON.stringify(value) : String(value);
      const existing = await SiteSetting.findOne({ where: { setting_key: key } });
      if (existing) {
        await existing.update({ setting_value: valStr });
      } else {
        await SiteSetting.create({ setting_key: key, setting_value: valStr });
      }
    }
    res.json({ message: 'Settings updated successfully' });
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

module.exports = router;

