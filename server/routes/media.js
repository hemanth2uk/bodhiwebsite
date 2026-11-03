const express = require('express');
const router = express.Router();
const multer = require('multer');
const path = require('path');
const fs = require('fs');
const { Media } = require('../models');
const { authenticate, authorize } = require('../middleware/auth');

// Ensure uploads dir
const uploadsDir = path.join(__dirname, '..', 'uploads');
if (!fs.existsSync(uploadsDir)) {
  fs.mkdirSync(uploadsDir, { recursive: true });
}

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, uploadsDir);
  },
  filename: (req, file, cb) => {
    const ext = path.extname(file.originalname);
    const uniqueName = Date.now() + '-' + Math.round(Math.random() * 1e9) + ext;
    cb(null, uniqueName);
  }
});

const upload = multer({
  storage,
  limits: { fileSize: 10 * 1024 * 1024 }, // 10MB
  fileFilter: (req, file, cb) => {
    const allowed = /jpeg|jpg|png|gif|svg|webp|pdf/;
    const ext = path.extname(file.originalname).toLowerCase().replace('.', '');
    if (allowed.test(ext) || allowed.test(file.mimetype)) {
      cb(null, true);
    } else {
      cb(new Error('Only image and PDF files are allowed!'));
    }
  }
});

// Upload endpoint
router.post('/upload', authenticate, authorize('coordinator', 'teacher'), upload.single('file'), async (req, res) => {
  try {
    if (!req.file) {
      return res.status(400).json({ error: 'No file uploaded' });
    }

    const fileUrl = `/uploads/${req.file.filename}`;

    const media = await Media.create({
      filename: req.file.filename,
      original_name: req.file.originalname,
      mime_type: req.file.mimetype,
      url: fileUrl,
      uploaded_by: req.user ? req.user.id : null
    });

    res.status(201).json({
      message: 'Upload successful',
      url: fileUrl,
      media
    });
  } catch (err) {
    res.status(500).json({ error: err.message || 'File upload failed' });
  }
});

// List all uploaded media
router.get('/', authenticate, authorize('coordinator', 'teacher'), async (req, res) => {
  try {
    const list = await Media.findAll({ order: [['id', 'DESC']] });
    res.json(list);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch media list' });
  }
});

// Delete media
router.delete('/:id', authenticate, authorize('coordinator'), async (req, res) => {
  try {
    const media = await Media.findByPk(req.params.id);
    if (!media) return res.status(404).json({ error: 'Media not found' });

    const filePath = path.join(uploadsDir, media.filename);
    if (fs.existsSync(filePath)) {
      fs.unlinkSync(filePath);
    }

    await media.destroy();
    res.json({ message: 'Media deleted successfully' });
  } catch (err) {
    res.status(500).json({ error: 'Failed to delete media' });
  }
});

module.exports = router;

