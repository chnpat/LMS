--
-- Database: `LMS`
--
CREATE DATABASE IF NOT EXISTS `LMS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `LMS`;

-- --------------------------------------------------------


--
-- Table structure for table `M_ADMIN_CONFIG`
--

CREATE TABLE `M_ADMIN_CONFIG` (
  `config_id` int(11) NOT NULL,
  `config_title` varchar(255) NOT NULL,
  `config_detail` text,
  `config_value` varchar(255) NOT NULL,
  `config_value_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_ADMIN_CONFIG`
--

TRUNCATE TABLE `M_ADMIN_CONFIG`;
--
-- Dumping data for table `M_ADMIN_CONFIG`
--

INSERT INTO `M_ADMIN_CONFIG` (`config_id`, `config_title`, `config_detail`, `config_value`, `config_value_type`) VALUES
(1, 'ตั้งค่าหัวข้อแจ้งเตือนหลัก', 'การแจ้งเตือนหลักจะแสดงด้านบนสุดของหน้าแดชบอร์ด เมื่อผู้ใช้งานทุกคนเข้าสู่ระบบเรียบร้อยแล้ว ส่วนหัวข้อแจ้งเตือนหลักจะแสดงเป็นตัวอักษรหนาด้านบน', 'ยินดีต้อนรับเข้าสู่ ระบบจัดการเรียนการสอน', 'text'),
(2, 'ตั้งค่าเนื้อหาของแจ้งเตือนหลัก', 'รายละเอียดของการแจ้งเตือนที่จะแสดงในหน้าแดชบอร์ด', '<p>ระบบนี้จะช่วยนำเสนอบทเรียน การทำแบบฝึกหัด รวมไปถึงการจัดสอบเก็บคะแนนในแต่ละรายวิชา</p>\r\n', 'textarea');

--
-- Table structure for table `M_ATTEND_SECTION`
--

CREATE TABLE `M_ATTEND_SECTION` (
  `user_std_id` varchar(20) NOT NULL,
  `section_id` int(11) NOT NULL,
  `registered_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_ATTEND_SECTION`
--

TRUNCATE TABLE `M_ATTEND_SECTION`;

-- --------------------------------------------------------

--
-- Table structure for table `M_CHOICE_ANSWER`
--

CREATE TABLE `M_CHOICE_ANSWER` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_order` int(11) NOT NULL,
  `answer_detail` text NOT NULL,
  `answer_is_correct` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_CHOICE_ANSWER`
--

TRUNCATE TABLE `M_CHOICE_ANSWER`;
-- --------------------------------------------------------

--
-- Table structure for table `M_CONFIG`
--

CREATE TABLE `M_CONFIG` (
  `config_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `config_detail` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_CONFIG`
--

TRUNCATE TABLE `M_CONFIG`;
-- --------------------------------------------------------

--
-- Table structure for table `M_COURSE`
--

CREATE TABLE `M_COURSE` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_description` text NOT NULL,
  `course_academic_year` char(4) NOT NULL,
  `course_semester` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_COURSE`
--

TRUNCATE TABLE `M_COURSE`;
-- --------------------------------------------------------

--
-- Table structure for table `M_EXAM`
--

CREATE TABLE `M_EXAM` (
  `exam_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `exam_type` char(2) NOT NULL,
  `exam_instruction` text NOT NULL,
  `exam_time` int(11) NOT NULL,
  `exam_is_score` char(1) NOT NULL,
  `exam_percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_EXAM`
--

TRUNCATE TABLE `M_EXAM`;
-- --------------------------------------------------------

--
-- Table structure for table `M_EXAM_QUESTION_SET`
--

CREATE TABLE `M_EXAM_QUESTION_SET` (
  `exam_id` int(11) NOT NULL,
  `question_set_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_EXAM_QUESTION_SET`
--

TRUNCATE TABLE `M_EXAM_QUESTION_SET`;
-- --------------------------------------------------------

--
-- Table structure for table `M_LESSON`
--

CREATE TABLE `M_LESSON` (
  `lesson_id` int(11) NOT NULL,
  `lesson_title` varchar(255) NOT NULL,
  `lesson_detail` text NOT NULL,
  `lesson_is_exam` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_LESSON`
--

TRUNCATE TABLE `M_LESSON`;
-- --------------------------------------------------------

--
-- Table structure for table `M_NEWS`
--

CREATE TABLE `M_NEWS` (
  `news_id` int(11) NOT NULL,
  `news_owner_id` int(11) NOT NULL,
  `news_publish_date` datetime NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_detail` text NOT NULL,
  `news_course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_NEWS`
--

TRUNCATE TABLE `M_NEWS`;

-- --------------------------------------------------------

--
-- Table structure for table `M_QUESTION`
--

CREATE TABLE `M_QUESTION` (
  `question_id` int(11) NOT NULL,
  `question_detail` text NOT NULL,
  `question_score` float NOT NULL,
  `question_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_QUESTION`
--

TRUNCATE TABLE `M_QUESTION`;
-- --------------------------------------------------------

--
-- Table structure for table `M_QUESTION_IN_SET`
--

CREATE TABLE `M_QUESTION_IN_SET` (
  `question_set_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_QUESTION_IN_SET`
--

TRUNCATE TABLE `M_QUESTION_IN_SET`;
-- --------------------------------------------------------

--
-- Table structure for table `M_QUESTION_SET`
--

CREATE TABLE `M_QUESTION_SET` (
  `question_set_id` int(11) NOT NULL,
  `question_set_title` varchar(255) NOT NULL,
  `question_set_instruction` text NOT NULL,
  `question_set_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_QUESTION_SET`
--

TRUNCATE TABLE `M_QUESTION_SET`;
-- --------------------------------------------------------

--
-- Table structure for table `M_SECTION`
--

CREATE TABLE `M_SECTION` (
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `section_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_SECTION`
--

TRUNCATE TABLE `M_SECTION`;

-- --------------------------------------------------------

--
-- Table structure for table `M_SYLLABUS`
--

CREATE TABLE `M_SYLLABUS` (
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `lesson_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_SYLLABUS`
--

TRUNCATE TABLE `M_SYLLABUS`;
-- --------------------------------------------------------

--
-- Table structure for table `M_TEACHING_COURSE`
--

CREATE TABLE `M_TEACHING_COURSE` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_TEACHING_COURSE`
--

TRUNCATE TABLE `M_TEACHING_COURSE`;
-- --------------------------------------------------------

--
-- Table structure for table `M_USER`
--

CREATE TABLE `M_USER` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_std_id` varchar(20) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_gender` char(1) NOT NULL COMMENT 'M = Mr., F = Ms., O=Miss',
  `user_role` char(1) NOT NULL COMMENT 'A = Admin, T = Teacher, S = Student',
  `user_status` char(1) NOT NULL COMMENT 'A = Active, I = Inactive',
  `user_last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `M_USER`
--

TRUNCATE TABLE `M_USER`;
--
-- Dumping data for table `M_USER`
--

INSERT INTO `M_USER` (`user_id`, `user_name`, `user_password`, `user_std_id`, `user_email`, `user_first_name`, `user_last_name`, `user_gender`, `user_role`, `user_status`, `user_last_login`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, 'admin@email.com', 'admin', 'admin', 'M', 'A', 'A', '2017-10-10 12:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `T_STUDENT_ANSWER`
--

CREATE TABLE `T_STUDENT_ANSWER` (
  `user_std_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `answer_passage` text NOT NULL,
  `answer_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `T_STUDENT_ANSWER`
--

TRUNCATE TABLE `T_STUDENT_ANSWER`;
-- --------------------------------------------------------

--
-- Table structure for table `T_STUDENT_EXAM_SCORE`
--

CREATE TABLE `T_STUDENT_EXAM_SCORE` (
  `user_std_id` varchar(20) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_raw_score` float NOT NULL,
  `exam_earned_percentage` float NOT NULL,
  `exam_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `T_STUDENT_EXAM_SCORE`
--

TRUNCATE TABLE `T_STUDENT_EXAM_SCORE`;
-- --------------------------------------------------------

--
-- Table structure for table `T_STUDENT_SET_SCORE`
--

CREATE TABLE `T_STUDENT_SET_SCORE` (
  `user_std_id` varchar(20) NOT NULL,
  `question_set_id` int(11) NOT NULL,
  `question_set_total_score` float NOT NULL,
  `question_set_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `T_STUDENT_SET_SCORE`
--

TRUNCATE TABLE `T_STUDENT_SET_SCORE`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `M_ADMIN_CONFIG`
--
ALTER TABLE `M_ADMIN_CONFIG`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `M_ATTEND_SECTION`
--
ALTER TABLE `M_ATTEND_SECTION`
  ADD PRIMARY KEY (`user_std_id`,`section_id`);

--
-- Indexes for table `M_CHOICE_ANSWER`
--
ALTER TABLE `M_CHOICE_ANSWER`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `M_CONFIG`
--
ALTER TABLE `M_CONFIG`
  ADD PRIMARY KEY (`config_id`,`course_id`);

--
-- Indexes for table `M_COURSE`
--
ALTER TABLE `M_COURSE`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `M_EXAM`
--
ALTER TABLE `M_EXAM`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `M_EXAM_QUESTION_SET`
--
ALTER TABLE `M_EXAM_QUESTION_SET`
  ADD PRIMARY KEY (`exam_id`,`question_set_id`);

--
-- Indexes for table `M_NEWS`
--
ALTER TABLE `M_NEWS`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `M_QUESTION`
--
ALTER TABLE `M_QUESTION`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `M_QUESTION_IN_SET`
--
ALTER TABLE `M_QUESTION_IN_SET`
  ADD PRIMARY KEY (`question_set_id`,`question_id`);

--
-- Indexes for table `M_QUESTION_SET`
--
ALTER TABLE `M_QUESTION_SET`
  ADD PRIMARY KEY (`question_set_id`);

--
-- Indexes for table `M_SECTION`
--
ALTER TABLE `M_SECTION`
  ADD PRIMARY KEY (`section_id`,`course_id`);

--
-- Indexes for table `M_SYLLABUS`
--
ALTER TABLE `M_SYLLABUS`
  ADD PRIMARY KEY (`course_id`,`section_id`,`lesson_id`,`lesson_date`);

--
-- Indexes for table `M_TEACHING_COURSE`
--
ALTER TABLE `M_TEACHING_COURSE`
  ADD PRIMARY KEY (`user_id`,`course_id`);

--
-- Indexes for table `M_USER`
--
ALTER TABLE `M_USER`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UNIQUE` (`user_std_id`);

--
-- Indexes for table `T_STUDENT_ANSWER`
--
ALTER TABLE `T_STUDENT_ANSWER`
  ADD PRIMARY KEY (`user_std_id`,`question_id`);

--
-- Indexes for table `T_STUDENT_EXAM_SCORE`
--
ALTER TABLE `T_STUDENT_EXAM_SCORE`
  ADD PRIMARY KEY (`user_std_id`,`exam_id`);

--
-- Indexes for table `T_STUDENT_SET_SCORE`
--
ALTER TABLE `T_STUDENT_SET_SCORE`
  ADD PRIMARY KEY (`user_std_id`,`question_set_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `M_ADMIN_CONFIG`
--
ALTER TABLE `M_ADMIN_CONFIG`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `M_CHOICE_ANSWER`
--
ALTER TABLE `M_CHOICE_ANSWER`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `M_CONFIG`
--
ALTER TABLE `M_CONFIG`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `M_COURSE`
--
ALTER TABLE `M_COURSE`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `M_EXAM`
--
ALTER TABLE `M_EXAM`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `M_NEWS`
--
ALTER TABLE `M_NEWS`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `M_QUESTION`
--
ALTER TABLE `M_QUESTION`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `M_QUESTION_SET`
--
ALTER TABLE `M_QUESTION_SET`
  MODIFY `question_set_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `M_SECTION`
--
ALTER TABLE `M_SECTION`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `M_USER`
--
ALTER TABLE `M_USER`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
