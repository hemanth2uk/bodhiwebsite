const express = require('express');
const cors = require('cors');
const helmet = require('helmet');
const path = require('path');
require('dotenv').config();

const { sequelize } = require('./models');

const authRoutes = require('./routes/auth');
const pagesRoutes = require('./routes/pages');
const coursesRoutes = require('./routes/courses');
const servicesRoutes = require('./routes/services');
const faqsRoutes = require('./routes/faqs');
const testimonialsRoutes = require('./routes/testimonials');
const heroSlidesRoutes = require('./routes/heroSlides');
const settingsRoutes = require('./routes/settings');
const mediaRoutes = require('./routes/media');
const dashboardRoutes = require('./routes/dashboard');

const app = express();
const PORT = process.env.PORT || 5000;

// Security & CORS
app.use(helmet({
  crossOriginResourcePolicy: false // Allows loading images from frontend
}));

app.use(cors({
  origin: '*',
  methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
  allowedHeaders: ['Content-Type', 'Authorization']
}));

app.use(express.json({ limit: '10mb' }));
app.use(express.urlencoded({ extended: true, limit: '10mb' }));

// Serve static uploads
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

// Health check
app.get('/api/health', (req, res) => {
  res.json({ status: 'ok', timestamp: new Date().toISOString() });
});

// API Routes
app.use('/api/auth', authRoutes);
app.use('/api/pages', pagesRoutes);
app.use('/api/courses', coursesRoutes);
app.use('/api/services', servicesRoutes);
app.use('/api/faqs', faqsRoutes);
app.use('/api/testimonials', testimonialsRoutes);
app.use('/api/hero-slides', heroSlidesRoutes);
app.use('/api/settings', settingsRoutes);
app.use('/api/media', mediaRoutes);
app.use('/api/dashboard', dashboardRoutes);

// Error handler
app.use((err, req, res, next) => {
  console.error('Unhandled server error:', err);
  res.status(500).json({ error: err.message || 'Internal server error' });
});

// Start server
async function startServer() {
  try {
    await sequelize.authenticate();
    console.log('✅ MySQL Database connected successfully.');

    // We don't force sync so existing tables and data remain intact
    await sequelize.sync();
    console.log('✅ Models synced with MySQL.');

    app.listen(PORT, () => {
      console.log(`🚀 Bodhi API Server running on port ${PORT}`);
      console.log(`   Health check: http://localhost:${PORT}/api/health`);
    });
  } catch (err) {
    console.error('❌ Failed to start server:', err);
  }
}

startServer();

