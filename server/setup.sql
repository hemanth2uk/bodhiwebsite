CREATE DATABASE IF NOT EXISTS bodhi_new;
USE bodhi_new;

DROP TABLE IF EXISTS leave_requests;
DROP TABLE IF EXISTS doubts;
DROP TABLE IF EXISTS timetable;
DROP TABLE IF EXISTS fees;
DROP TABLE IF EXISTS attendance;
DROP TABLE IF EXISTS batches;
DROP TABLE IF EXISTS centres;
DROP TABLE IF EXISTS media;
DROP TABLE IF EXISTS hero_slides;
DROP TABLE IF EXISTS testimonials;
DROP TABLE IF EXISTS faqs;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS courses;
DROP TABLE IF EXISTS pages;
DROP TABLE IF EXISTS site_settings;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('student','parent','teacher','mentor','coordinator') NOT NULL DEFAULT 'student',
  phone VARCHAR(20),
  avatar_url VARCHAR(500),
  status ENUM('pending','active','blocked') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE pages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(100) UNIQUE NOT NULL,
  title VARCHAR(255) NOT NULL,
  content LONGTEXT,
  meta_description TEXT,
  updated_by INT,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (updated_by) REFERENCES users(id)
);

CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(100) UNIQUE NOT NULL,
  short_desc TEXT,
  description LONGTEXT,
  color VARCHAR(20) DEFAULT '#0b7f6e',
  icon VARCHAR(10) DEFAULT '📚',
  target_group VARCHAR(255),
  highlights JSON,
  image_url VARCHAR(500),
  display_order INT DEFAULT 0,
  is_active BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  icon VARCHAR(10),
  color VARCHAR(20) DEFAULT '#0b7f6e',
  display_order INT DEFAULT 0
);

CREATE TABLE faqs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question TEXT NOT NULL,
  answer TEXT NOT NULL,
  display_order INT DEFAULT 0
);

CREATE TABLE testimonials (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  role VARCHAR(100),
  quote TEXT NOT NULL,
  stars INT DEFAULT 5,
  avatar_url VARCHAR(500),
  display_order INT DEFAULT 0
);

CREATE TABLE hero_slides (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  subtitle VARCHAR(255),
  description TEXT,
  bg_color VARCHAR(20),
  stats JSON,
  display_order INT DEFAULT 0
);

CREATE TABLE site_settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  setting_key VARCHAR(100) UNIQUE NOT NULL,
  setting_value TEXT
);

CREATE TABLE media (
  id INT AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  original_name VARCHAR(255),
  mime_type VARCHAR(100),
  url VARCHAR(500) NOT NULL,
  uploaded_by INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (uploaded_by) REFERENCES users(id)
);

CREATE TABLE centres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  location TEXT,
  map_url VARCHAR(500)
);

CREATE TABLE batches (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  course_id INT,
  centre_id INT,
  year INT,
  section VARCHAR(10),
  FOREIGN KEY (course_id) REFERENCES courses(id),
  FOREIGN KEY (centre_id) REFERENCES centres(id)
);

CREATE TABLE attendance (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  batch_id INT,
  date DATE NOT NULL,
  status ENUM('P','A','L') NOT NULL,
  marked_by INT,
  FOREIGN KEY (student_id) REFERENCES users(id),
  FOREIGN KEY (marked_by) REFERENCES users(id)
);

CREATE TABLE fees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  description VARCHAR(255),
  amount DECIMAL(10,2) NOT NULL,
  status ENUM('due','paid','overdue') DEFAULT 'due',
  due_date DATE,
  paid_date DATE,
  FOREIGN KEY (student_id) REFERENCES users(id)
);

CREATE TABLE timetable (
  id INT AUTO_INCREMENT PRIMARY KEY,
  batch_id INT,
  day_of_week TINYINT NOT NULL,
  period TINYINT NOT NULL,
  subject VARCHAR(100),
  teacher_id INT,
  topic VARCHAR(255),
  FOREIGN KEY (batch_id) REFERENCES batches(id),
  FOREIGN KEY (teacher_id) REFERENCES users(id)
);

CREATE TABLE doubts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  question TEXT NOT NULL,
  answer TEXT,
  status ENUM('open','answered') DEFAULT 'open',
  answered_by INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (student_id) REFERENCES users(id),
  FOREIGN KEY (answered_by) REFERENCES users(id)
);

CREATE TABLE leave_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  from_date DATE NOT NULL,
  to_date DATE NOT NULL,
  reason TEXT,
  status ENUM('pending','approved','rejected') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
