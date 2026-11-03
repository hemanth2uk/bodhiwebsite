const { DataTypes } = require('sequelize');
const sequelize = require('../config/database');

// User model
const User = sequelize.define('User', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  name: { type: DataTypes.STRING, allowNull: false },
  email: { type: DataTypes.STRING, allowNull: false, unique: true },
  password_hash: { type: DataTypes.STRING, allowNull: false },
  role: { 
    type: DataTypes.ENUM('student', 'parent', 'teacher', 'mentor', 'coordinator'),
    defaultValue: 'student'
  },
  phone: { type: DataTypes.STRING },
  avatar_url: { type: DataTypes.STRING },
  status: { 
    type: DataTypes.ENUM('pending', 'active', 'blocked'),
    defaultValue: 'active'
  }
}, { tableName: 'users' });

// Page model
const Page = sequelize.define('Page', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  slug: { type: DataTypes.STRING, allowNull: false, unique: true },
  title: { type: DataTypes.STRING, allowNull: false },
  content: { type: DataTypes.TEXT('long') },
  meta_description: { type: DataTypes.TEXT },
  updated_by: { type: DataTypes.INTEGER }
}, { tableName: 'pages' });

// Course model
const Course = sequelize.define('Course', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  title: { type: DataTypes.STRING, allowNull: false },
  slug: { type: DataTypes.STRING, allowNull: false, unique: true },
  short_desc: { type: DataTypes.TEXT },
  description: { type: DataTypes.TEXT('long') },
  color: { type: DataTypes.STRING, defaultValue: '#0b7f6e' },
  icon: { type: DataTypes.STRING, defaultValue: '📚' },
  target_group: { type: DataTypes.STRING },
  highlights: { type: DataTypes.JSON },
  image_url: { type: DataTypes.STRING },
  display_order: { type: DataTypes.INTEGER, defaultValue: 0 },
  is_active: { type: DataTypes.BOOLEAN, defaultValue: true }
}, { tableName: 'courses' });

// Service model
const Service = sequelize.define('Service', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  title: { type: DataTypes.STRING, allowNull: false },
  description: { type: DataTypes.TEXT },
  icon: { type: DataTypes.STRING },
  color: { type: DataTypes.STRING, defaultValue: '#0b7f6e' },
  display_order: { type: DataTypes.INTEGER, defaultValue: 0 }
}, { tableName: 'services', timestamps: false });

// FAQ model
const FAQ = sequelize.define('FAQ', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  question: { type: DataTypes.TEXT, allowNull: false },
  answer: { type: DataTypes.TEXT, allowNull: false },
  display_order: { type: DataTypes.INTEGER, defaultValue: 0 }
}, { tableName: 'faqs', timestamps: false });

// Testimonial model
const Testimonial = sequelize.define('Testimonial', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  name: { type: DataTypes.STRING, allowNull: false },
  role: { type: DataTypes.STRING },
  quote: { type: DataTypes.TEXT, allowNull: false },
  stars: { type: DataTypes.INTEGER, defaultValue: 5 },
  avatar_url: { type: DataTypes.STRING },
  display_order: { type: DataTypes.INTEGER, defaultValue: 0 }
}, { tableName: 'testimonials', timestamps: false });

// HeroSlide model
const HeroSlide = sequelize.define('HeroSlide', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  title: { type: DataTypes.STRING, allowNull: false },
  subtitle: { type: DataTypes.STRING },
  description: { type: DataTypes.TEXT },
  bg_color: { type: DataTypes.STRING },
  stats: { type: DataTypes.JSON },
  display_order: { type: DataTypes.INTEGER, defaultValue: 0 }
}, { tableName: 'hero_slides', timestamps: false });

// SiteSetting model
const SiteSetting = sequelize.define('SiteSetting', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  setting_key: { type: DataTypes.STRING, allowNull: false, unique: true },
  setting_value: { type: DataTypes.TEXT }
}, { tableName: 'site_settings', timestamps: false });

// Media model
const Media = sequelize.define('Media', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  filename: { type: DataTypes.STRING, allowNull: false },
  original_name: { type: DataTypes.STRING },
  mime_type: { type: DataTypes.STRING },
  url: { type: DataTypes.STRING, allowNull: false },
  uploaded_by: { type: DataTypes.INTEGER }
}, { tableName: 'media', updatedAt: false });

// Centre model
const Centre = sequelize.define('Centre', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  name: { type: DataTypes.STRING, allowNull: false },
  location: { type: DataTypes.TEXT },
  map_url: { type: DataTypes.STRING }
}, { tableName: 'centres', timestamps: false });

// Batch model
const Batch = sequelize.define('Batch', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  name: { type: DataTypes.STRING, allowNull: false },
  course_id: { type: DataTypes.INTEGER },
  centre_id: { type: DataTypes.INTEGER },
  year: { type: DataTypes.INTEGER },
  section: { type: DataTypes.STRING }
}, { tableName: 'batches', timestamps: false });

// Attendance model
const Attendance = sequelize.define('Attendance', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  student_id: { type: DataTypes.INTEGER, allowNull: false },
  batch_id: { type: DataTypes.INTEGER },
  date: { type: DataTypes.DATEONLY, allowNull: false },
  status: { type: DataTypes.ENUM('P', 'A', 'L'), allowNull: false },
  marked_by: { type: DataTypes.INTEGER }
}, { tableName: 'attendance', timestamps: false });

// Fee model
const Fee = sequelize.define('Fee', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  student_id: { type: DataTypes.INTEGER, allowNull: false },
  description: { type: DataTypes.STRING },
  amount: { type: DataTypes.DECIMAL(10, 2), allowNull: false },
  status: { type: DataTypes.ENUM('due', 'paid', 'overdue'), defaultValue: 'due' },
  due_date: { type: DataTypes.DATEONLY },
  paid_date: { type: DataTypes.DATEONLY }
}, { tableName: 'fees', timestamps: false });

// Timetable model
const Timetable = sequelize.define('Timetable', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  batch_id: { type: DataTypes.INTEGER },
  day_of_week: { type: DataTypes.TINYINT, allowNull: false },
  period: { type: DataTypes.TINYINT, allowNull: false },
  subject: { type: DataTypes.STRING },
  teacher_id: { type: DataTypes.INTEGER },
  topic: { type: DataTypes.STRING }
}, { tableName: 'timetable', timestamps: false });

// Doubt model
const Doubt = sequelize.define('Doubt', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  student_id: { type: DataTypes.INTEGER, allowNull: false },
  question: { type: DataTypes.TEXT, allowNull: false },
  answer: { type: DataTypes.TEXT },
  status: { type: DataTypes.ENUM('open', 'answered'), defaultValue: 'open' },
  answered_by: { type: DataTypes.INTEGER }
}, { tableName: 'doubts', updatedAt: false });

// LeaveRequest model
const LeaveRequest = sequelize.define('LeaveRequest', {
  id: { type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true },
  user_id: { type: DataTypes.INTEGER, allowNull: false },
  from_date: { type: DataTypes.DATEONLY, allowNull: false },
  to_date: { type: DataTypes.DATEONLY, allowNull: false },
  reason: { type: DataTypes.TEXT },
  status: { type: DataTypes.ENUM('pending', 'approved', 'rejected'), defaultValue: 'pending' }
}, { tableName: 'leave_requests', updatedAt: false });

// Associations
User.hasMany(Page, { foreignKey: 'updated_by' });
Page.belongsTo(User, { foreignKey: 'updated_by' });

User.hasMany(Media, { foreignKey: 'uploaded_by' });
Media.belongsTo(User, { foreignKey: 'uploaded_by' });

Course.hasMany(Batch, { foreignKey: 'course_id' });
Batch.belongsTo(Course, { foreignKey: 'course_id' });

Centre.hasMany(Batch, { foreignKey: 'centre_id' });
Batch.belongsTo(Centre, { foreignKey: 'centre_id' });

User.hasMany(Attendance, { foreignKey: 'student_id' });
Attendance.belongsTo(User, { as: 'Student', foreignKey: 'student_id' });

User.hasMany(Fee, { foreignKey: 'student_id' });
Fee.belongsTo(User, { foreignKey: 'student_id' });

Batch.hasMany(Timetable, { foreignKey: 'batch_id' });
Timetable.belongsTo(Batch, { foreignKey: 'batch_id' });

User.hasMany(Doubt, { foreignKey: 'student_id' });
Doubt.belongsTo(User, { as: 'Student', foreignKey: 'student_id' });

User.hasMany(LeaveRequest, { foreignKey: 'user_id' });
LeaveRequest.belongsTo(User, { foreignKey: 'user_id' });

module.exports = {
  sequelize,
  User,
  Page,
  Course,
  Service,
  FAQ,
  Testimonial,
  HeroSlide,
  SiteSetting,
  Media,
  Centre,
  Batch,
  Attendance,
  Fee,
  Timetable,
  Doubt,
  LeaveRequest
};

