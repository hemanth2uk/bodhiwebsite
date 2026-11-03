-- MySQL dump 10.13  Distrib 9.1.0, for Win64 (x86_64)
--
-- Host: localhost    Database: bodhi_new
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `batch_id` int DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('P','A','L') NOT NULL,
  `marked_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `marked_by` (`marked_by`),
  CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`marked_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `course_id` int DEFAULT NULL,
  `centre_id` int DEFAULT NULL,
  `year` int DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `centre_id` (`centre_id`),
  CONSTRAINT `batches_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `batches_ibfk_2` FOREIGN KEY (`centre_id`) REFERENCES `centres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centres`
--

DROP TABLE IF EXISTS `centres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `centres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` text,
  `map_url` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centres`
--

LOCK TABLES `centres` WRITE;
/*!40000 ALTER TABLE `centres` DISABLE KEYS */;
INSERT INTO `centres` VALUES (1,'Karamana Centre','Karamana, Thiruvananthapuram, Kerala',NULL),(2,'Neyyattinkara Centre','Neyyattinkara, Thiruvananthapuram, Kerala',NULL),(3,'Bodhi Online','Global Virtual Campus',NULL);
/*!40000 ALTER TABLE `centres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `short_desc` text,
  `description` longtext,
  `color` varchar(20) DEFAULT '#0b7f6e',
  `icon` varchar(10) DEFAULT '??',
  `target_group` varchar(255) DEFAULT NULL,
  `highlights` json DEFAULT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `display_order` int DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Pre-Foundation','pre-foundation','Igniting the Spark of Science & Math discovery for young minds.','Target Group: Classes 5, 6, and 7. Instead of rote memorization, we turn natural curiosity into a love for Science and Mathematics through fearless learning, mindful play, and nurturing mentorship.','#0b7f6e','ðŸŒ±','Classes 5, 6, 7','[\"Discovery-based learning\", \"Olympiad & Talent exams\", \"Nurturing mentorship\", \"Mindful breathing\"]',NULL,1,1,'2026-11-03 07:44:55','2026-11-03 07:44:55'),(2,'Foundation','foundation','Building the Roots of Excellence for NEET, JEE & National Entrances.','Target Group: Classes 8, 9, and 10. Bridges the gap between school textbooks and advanced entrance logic at a comfortable pace with smart analytics and conceptual clarity.','#1a8a55','ðŸ›ï¸','Classes 8, 9, 10','[\"30-40% entrance syllabus covered early\", \"Stress-free 3-year preparation\", \"Logical clarity\", \"Smart analytics\"]',NULL,2,1,'2026-11-03 07:44:55','2026-11-03 07:44:55'),(3,'Long-term (+1 & +2)','long-term','Excellence Your Way â€” Integrated school, weekend, or tuition hybrid batches.','Target Group: Classes 11 and 12 (+1 & +2). A 2-year marathon covering NEET, JEE, and KEAM with high consistency, mental resilience, and continuous personalized calibration.','#0d7f93','ðŸŽ¯','Classes 11 & 12','[\"Integrated School Program\", \"Weekend Batches\", \"Tuition + Entrance hybrid\", \"2-year consistent mentoring\"]',NULL,3,1,'2026-11-03 07:44:55','2026-11-03 07:44:55'),(4,'Crash Course','crash-course','Your Final Step to Entrance Ranker â€” Speed, accuracy & mental endurance.','Target Group: Post Class 12. Strategic direction and intensive practice directly after board exams to turn subject knowledge into top entrance ranks with zero panic.','#d6453d','âš¡','Post Class 12','[\"Time management shortcuts\", \"Stress recovery & peak mental clarity\", \"Daily mock drills\", \"Doubt clearance\"]',NULL,4,1,'2026-11-03 07:44:55','2026-11-03 07:44:55'),(5,'Repeaters (Droppers)','repeaters','Refine. Rebuild. Reclaim. Transforming lost marks into earned ranks.','Target Group: Class 12 Pass-outs dedicating a year exclusively to NEET, JEE, or KEAM. Analytical diagnostics of past attempts, daily mindfulness, and advanced problem-solving.','#b86e00','ðŸ”¥','Class 12 Pass-outs','[\"100% focused gap-year investment\", \"Diagnostic error analysis\", \"Zen-like resilience\", \"Specialist dropper mentors\"]',NULL,5,1,'2026-11-03 07:44:55','2026-11-03 07:44:55'),(6,'Academic Tuition','academic-tuition','Mastering the Foundation â€” Conceptual clarity & Board Exam excellence.','Focus exclusively on the Class 11 & 12 Board Exam curriculum. Total subject mastery without entrance pressure so students enjoy science and score 95%+ in boards.','#5a35a0','ðŸ“–','Classes 11 & 12','[\"Concept-first mentorship\", \"Calm classroom environment\", \"Board exam pattern diagnostics\", \"Solid academic marks\"]',NULL,6,1,'2026-11-03 07:44:55','2026-11-03 07:44:55'),(7,'Bridge Course','bridge-course','Transition with Confidence â€” From 10th-grade to 11th-grade Science.','Conducted during Summer Holidays for students moving from Class 10 to Class 11. Introduces complex topics like Calculus and Organic Chemistry gently with a solid head start.','#e8781e','ðŸŒ‰','Class 10 to 11 moving','[\"Summer break head start\", \"Smoothing the steep science curve\", \"Aptitude readiness analysis\", \"Fun & creative learning\"]',NULL,7,1,'2026-11-03 07:44:55','2026-11-03 07:44:55');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doubts`
--

DROP TABLE IF EXISTS `doubts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doubts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `question` text NOT NULL,
  `answer` text,
  `status` enum('open','answered') DEFAULT 'open',
  `answered_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `answered_by` (`answered_by`),
  CONSTRAINT `doubts_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  CONSTRAINT `doubts_ibfk_2` FOREIGN KEY (`answered_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doubts`
--

LOCK TABLES `doubts` WRITE;
/*!40000 ALTER TABLE `doubts` DISABLE KEYS */;
/*!40000 ALTER TABLE `doubts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `display_order` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'What programs are available at Bodhi Education?','We offer Pre-Foundation (Classes 5-7), Foundation (Classes 8-10), Long-term (+1, +2), Crash courses, Repeater programs, Academic Tuition, and Summer Bridge courses for NEET, JEE, and KEAM.',1),(2,'Where are the Bodhi learning centres located?','We have physical offline centres at Karamana and Neyyattinkara in Thiruvananthapuram, as well as a full Bodhi Online platform accessible anywhere.',2),(3,'How does the Hybrid Learning model work?','Students learn before class through short preview videos, attend interactive in-person lectures, and reinforce knowledge with post-class workouts and doubt sessions.',3),(4,'Can parents track their childâ€™s attendance and progress?','Yes! The Bodhi Portal provides a dedicated Parent login where you can see daily attendance, test marks, fee receipts, and connect directly with your childâ€™s mentor.',4),(5,'What is the role of the Mentor at Bodhi?','Mentors are experienced guides who address stress, exam anxiety, time management, and motivation, ensuring students maintain high morale and well-being.',5),(6,'How can I enroll in a course?','You can register directly on our website, call us at +91 89211 80598, or visit our Karamana or Neyyattinkara centres for a free counseling session.',6);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('due','paid','overdue') DEFAULT 'due',
  `due_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hero_slides`
--

DROP TABLE IF EXISTS `hero_slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hero_slides` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text,
  `bg_color` varchar(20) DEFAULT NULL,
  `stats` json DEFAULT NULL,
  `display_order` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hero_slides`
--

LOCK TABLES `hero_slides` WRITE;
/*!40000 ALTER TABLE `hero_slides` DISABLE KEYS */;
INSERT INTO `hero_slides` VALUES (1,'Awaken the Genius Within','ðŸƒ Knowledge is Power','World-class coaching for NEET, JEE, KEAM, and Foundation in a serene, high-performance environment.','#075c50','{\"gurus\": \"120+\", \"success\": \"98%\", \"students\": \"5,000+\"}',1),(2,'Hybrid Learning That Works','ðŸš€ Learn â€¢ Practice â€¢ Master','Combine the best of offline classroom teaching with 24/7 web & mobile app access.','#0b7f6e','{\"centres\": \"2 + Online\", \"success\": \"98%\", \"students\": \"5,000+\"}',2);
/*!40000 ALTER TABLE `hero_slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_requests`
--

DROP TABLE IF EXISTS `leave_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leave_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `reason` text,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_requests`
--

LOCK TABLES `leave_requests` WRITE;
/*!40000 ALTER TABLE `leave_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `leave_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `original_name` varchar(255) DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `url` varchar(500) NOT NULL,
  `uploaded_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `uploaded_by` (`uploaded_by`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext,
  `meta_description` text,
  `updated_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'about-us','Welcome to Bodhi Education','Bodhi Education is Keralaâ€™s pioneering educational research and development platform, dedicated to empowering students by enhancing their skills and unlocking their true potential. We support the students to attain their goals. Comprising a dynamic team of academic experts, researchers, and technocrats, we collaborate to design innovative strategies and cutting-edge technologies that revolutionize Indiaâ€™s education sector.\n\nBodhi believes that, \"every child has his/her own uniqueness\". Find and shape them as future talents are the real task. Bodhi Education envisions itself as a unique and dynamic human resource development initiative dedicated to empowering students through a highly sophisticated coaching and support ecosystem. We aim to identify, strengthen, and refine the innate abilities of every learner, enabling them to dream confidently and achieve excellence in their chosen professional careers.\n\nThrough integrated academic excellence, mentorship-driven guidance, technology-enabled learning, and value-based education, Bodhi Education seeks to create competent, confident, and socially responsible professionals who contribute meaningfully to society.','About Bodhi Education, leading entrance coaching and educational research platform in Kerala.',NULL,'2026-11-03 07:44:55','2026-11-03 07:44:55');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `icon` varchar(10) DEFAULT NULL,
  `color` varchar(20) DEFAULT '#0b7f6e',
  `display_order` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Live & Recorded Classes','Stream interactive live sessions with Gurus or watch high-definition recordings anytime 24/7.','ðŸŽ¥','#0b7f6e',1),(2,'Smart Timetable & Reminders','Daily personalized schedules with notifications the day before so students arrive prepared.','ðŸ—“ï¸','#075c50',2),(3,'Post-Class Workouts & Mocks','Practice immediate workouts after every class with instant marks, hints, and video solutions.','ðŸ‹ï¸','#1a8a55',3),(4,'Doubt Clearance Box','Post doubts directly to subject specialists with step-by-step verified explanations within hours.','â“','#d6453d',4),(5,'Personal Mentor Connect','One-on-one psychological and academic guidance to overcome anxiety and build confidence.','ðŸ‘©â€ðŸ«','#8a63d6',5),(6,'Attendance & Performance Tracking','Live punch-in monitoring, percentage calendars, and detailed report cards accessible by parents.','ðŸ“Š','#b86e00',6);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'site_name','Bodhi Education'),(2,'tagline','Awaken the Genius Within'),(3,'logo_url','/logo.png'),(4,'phone','+91 89211 80598'),(5,'whatsapp','918921180598'),(6,'email','info@bodhieducation.com'),(7,'address','TC No. 73/1970-2 (MSS Arcade), Manacaud, Thiruvananthapuram, Kerala, India, 695009'),(8,'hours','Mon â€“ Fri 8:00 AM â€“ 8:00 PM'),(9,'news_ticker','ðŸŽ¯ NEET & JEE 2027 admissions open | Bodhi Science Centres at Karamana & Neyyattinkara | Free demo classes available');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `quote` text NOT NULL,
  `stars` int DEFAULT '5',
  `avatar_url` varchar(500) DEFAULT NULL,
  `display_order` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Dr. Rajesh Kumar (Parent)','Father of Ananya (NEET AIR 412)','The calm, focused Bodhi approach changed Ananyaâ€™s preparation completely. She cracked NEET without feeling burned out.',5,NULL,1),(2,'Adithya S. (Student)','JEE Advanced Ranker','The teachers at Karamana centre make Physics so intuitive. The post-class workouts and doubt clearance box were game changers.',5,NULL,2),(3,'Meera Nair (Student)','Class 12 Board 98.4%','Tuition plus entrance hybrid batch gave me the exact balance I needed between school examinations and competitive entrance prep.',5,NULL,3);
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `batch_id` int DEFAULT NULL,
  `day_of_week` tinyint NOT NULL,
  `period` tinyint NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `teacher_id` int DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `batch_id` (`batch_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`),
  CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetable`
--

LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;
/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('student','parent','teacher','mentor','coordinator') NOT NULL DEFAULT 'student',
  `phone` varchar(20) DEFAULT NULL,
  `avatar_url` varchar(500) DEFAULT NULL,
  `status` enum('pending','active','blocked') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Demo Student','student@gmail.com','$2a$10$mMCkZhGLLEC5HFrUR/Zab.ZX0su8B84951gC0MPrTvLYqJDi3FAHy','student','+91 98765 43210',NULL,'active','2026-11-03 07:44:42','2026-11-03 07:44:42'),(2,'Demo Parent','parent@gmail.com','$2a$10$mMCkZhGLLEC5HFrUR/Zab.ZX0su8B84951gC0MPrTvLYqJDi3FAHy','parent','+91 98765 43211',NULL,'active','2026-11-03 07:44:42','2026-11-03 07:44:42'),(3,'Demo Teacher','teacher@gmail.com','$2a$10$mMCkZhGLLEC5HFrUR/Zab.ZX0su8B84951gC0MPrTvLYqJDi3FAHy','teacher','+91 98765 43212',NULL,'active','2026-11-03 07:44:42','2026-11-03 07:44:42'),(4,'Demo Mentor','mentor@gmail.com','$2a$10$mMCkZhGLLEC5HFrUR/Zab.ZX0su8B84951gC0MPrTvLYqJDi3FAHy','mentor','+91 98765 43213',NULL,'active','2026-11-03 07:44:42','2026-11-03 07:44:42'),(5,'Demo Coordinator','coordinator@gmail.com','$2a$10$mMCkZhGLLEC5HFrUR/Zab.ZX0su8B84951gC0MPrTvLYqJDi3FAHy','coordinator','+91 98765 43214',NULL,'active','2026-11-03 07:44:42','2026-11-03 07:44:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-03 15:18:40
