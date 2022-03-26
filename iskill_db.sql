-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 12:04 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iskill_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(255) COLLATE utf8_bin NOT NULL,
  `AdminEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `AdminPassword` varchar(255) COLLATE utf8_bin NOT NULL,
  `AdminNewPassword` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AdminId`, `AdminName`, `AdminEmail`, `AdminPassword`, `AdminNewPassword`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', ''),
(2, 'adminname', 'admin123@gmail.com', 'password', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `CourseId` int(11) NOT NULL,
  `CourseName` text COLLATE utf8_bin NOT NULL,
  `CourseDescription` text COLLATE utf8_bin NOT NULL,
  `CourseDepartment` varchar(255) COLLATE utf8_bin NOT NULL,
  `CourseAuthor` varchar(255) COLLATE utf8_bin NOT NULL,
  `CourseImage` text COLLATE utf8_bin NOT NULL,
  `CourseDuration` text COLLATE utf8_bin NOT NULL,
  `CourseOriginalPrice` int(11) NOT NULL,
  `CoursePrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`CourseId`, `CourseName`, `CourseDescription`, `CourseDepartment`, `CourseAuthor`, `CourseImage`, `CourseDuration`, `CourseOriginalPrice`, `CoursePrice`) VALUES
(8, 'PHP from scratch', 'PHP is a widely used server-side programming language that’s become increasingly fast and powerful over the years. PHP works well with HTML and databases, making it a great language for anyone interested in building dynamic web applications. Take-Away Skills. In this course, you’ll be exposed to fundamental programming concepts in PHP.', 'CE', 'Balaguruswami', '../image/courseimage/php.jpg', '10 WEEKS', 5000, 2000),
(10, 'Learn Angular ', 'The Angular Language Service provides code editors with a way to get completions, errors, hints, and navigation inside Angular templates. It works with external templates in separate HTML files, and also with in-line templates. In the introductory video, Course provides an overview of the course, key aspects of Angular, and how the course is laid out. ', 'CE', 'GK Raman', '../image/courseimage/ANGULAR.jpeg', '7 weeks', 5000, 250),
(11, 'C#', 'In the introductory course, you will learn about C# syntax, C# fundamentals, iteration in C#, and more. In the algorithms and data structures course, you will expand upon your working knowledge of C# basics. The Object-Oriented Programming course will dive into more profound concepts of C#. ', 'CE', 'Anonynomous', '../image/courseimage/Cnew.jpg', '3 weeks', 120, 0),
(13, 'Mongodb', ' Introduction to MongoDB Charts. Learn the basics of MongoDB Charts. View Course. How it works. Courses designed to equip you with the skills you need to succeed. Downloadable Video Lectures. Lectures are taught by MongoDB curriculum engineers. Each video lecture is about 5 minutes long. Hands-On Labs & Quizzes.', 'IT', 'M R parikh', '../image/courseimage/mongodb.jpg', '4 weeks', 1200, 1000),
(14, 'Autocad Course', 'AutoCAD is a commercial software application for 2D and 3D computer-aided design (CAD) and drafting. It is software which is used across a wide range of industries, by architects, project managers, engineers, designers, and other professionals. AutoCAD is a short term course of 2 months, which are sub categories into 1 modules AutoCAD.', 'EC', 'Ramakrishna Iyyer', '../image/courseimage/ECautocad.jpg', '7 weeks', 5000, 4500),
(15, 'Android development', 'ngineering Maintainable Android Apps, which is a 4 week MOOC that shows by example various methods for engineering maintainable Android apps, including test-driven development methods and how to develop/run unit tests using JUnit and Robotium (or equivalent automated testing frameworks for Android), as well as how to successfully apply common Java/Android software patterns.', 'CSE', 'R k shrivastav', '../image/courseimage/AN.jpg', '5 weeks', 2000, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourseorder`
--

CREATE TABLE `tblcourseorder` (
  `CourseOrderId` int(11) NOT NULL,
  `OrderId` varchar(255) COLLATE utf8_bin NOT NULL,
  `StudentEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `CourseId` int(11) NOT NULL,
  `Tstatus` varchar(255) COLLATE utf8_bin NOT NULL,
  `ResponseMessage` text COLLATE utf8_bin NOT NULL,
  `Amount` int(11) NOT NULL,
  `OrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tblcourseorder`
--

INSERT INTO `tblcourseorder` (`CourseOrderId`, `OrderId`, `StudentEmail`, `CourseId`, `Tstatus`, `ResponseMessage`, `Amount`, `OrderDate`) VALUES
(1, 'ORDS53288878', '19ce076@charusat.edu.in', 10, 'TXN_SUCCESS', 'Txn Success', 250, '2021-10-23'),
(2, 'ORDS53755857', '19ce076@charusat.edu.in', 13, 'TXN_SUCCESS', 'Txn Success', 1000, '2021-10-23'),
(4, 'ORDS74516755', '19ce076@charusat.edu.in', 11, 'TXN SUCCESS', 'Txn success', 0, '2021-10-23'),
(5, 'ORDS72980444', 'email@gmail.com', 14, 'TXN SUCCESS', 'Txn success', 4500, '2021-10-23'),
(6, 'ORDS96341691', 'mk@gmail.com', 13, 'TXN SUCCESS', 'Txn success', 1000, '2021-10-23'),
(7, 'ORDS23484205', '19ce076@charusat.edu.in', 8, 'TXN SUCCESS', 'Txn success', 2000, '2021-10-23'),
(8, 'ORDS93639760', 'mk@gmail.com', 15, 'TXN SUCCESS', 'Txn success', 1500, '2021-10-23'),
(9, 'ORDS50017081', '19ce076@charusat.edu.in', 14, 'TXN SUCCESS', 'Txn success', 4500, '2021-10-26'),
(11, 'ORDS71297012', '19ce076@charusat.edu.in', 8, 'TXN SUCCESS', 'Txn success', 2000, '2021-10-26'),
(12, 'ORDS65166309', 'nikitamirchandani2002@gmail.com', 8, 'TXN SUCCESS', 'Txn success', 2000, '2021-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FeedbackId` int(11) NOT NULL,
  `FeedbackContent` text COLLATE utf8_bin NOT NULL,
  `StudentId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`FeedbackId`, `FeedbackContent`, `StudentId`, `CourseId`) VALUES
(7, 'here is my 1st feedback', 1, 0),
(8, 'Hey there here im writing another comment', 20, 0),
(9, 'Feedback on Courses which i have enrolled:\r\ni like this course and thanks for giving me the course', 24, 0),
(10, 'I liked courses related to AutoCAD and it is amazing. the video lectures explains all the basics of how to use software.', 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbllesson`
--

CREATE TABLE `tbllesson` (
  `LessonId` int(11) NOT NULL,
  `LessonName` text COLLATE utf8_bin NOT NULL,
  `LessonDescription` text COLLATE utf8_bin NOT NULL,
  `LessonLink` text COLLATE utf8_bin NOT NULL,
  `CourseId` int(11) NOT NULL,
  `CourseName` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbllesson`
--

INSERT INTO `tbllesson` (`LessonId`, `LessonName`, `LessonDescription`, `LessonLink`, `CourseId`, `CourseName`) VALUES
(4, 'Introduction to PHP', 'description here', '../lessonvid/v1.mp4', 8, 'PHP from scratch'),
(5, '2nd part basics data variable', 'desc here', '../lessonvid/v2.mp4', 8, 'PHP from scratch'),
(6, 'Intro video', 'Description of lesson here ', '../lessonvid/v3.mp4', 11, 'C#'),
(7, 'Introduction video', 'Intro video of mongodb', '../lessonvid/v8.mp4', 13, 'Mongodb'),
(8, 'Introduction video', 'Intro video of Angular', '../lessonvid/v77.mp4', 10, 'Learn Angular '),
(9, 'AUTOCAD VIDEO', 'Autocad Basics video', '../lessonvid/v1.mp4', 14, 'Autocad Course'),
(10, 'Android 1st Intro video ', 'Android Intro video basics', '../lessonvid/V65.mp4', 15, 'Android development');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `StudentId` int(11) NOT NULL,
  `StudentEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `StudentName` varchar(255) COLLATE utf8_bin NOT NULL,
  `StudentOccupation` varchar(255) COLLATE utf8_bin NOT NULL,
  `StudentImage` text COLLATE utf8_bin NOT NULL,
  `StudentPassword` varchar(255) COLLATE utf8_bin NOT NULL,
  `StudentConfirmPassword` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`StudentId`, `StudentEmail`, `StudentName`, `StudentOccupation`, `StudentImage`, `StudentPassword`, `StudentConfirmPassword`) VALUES
(1, '19ce076@charusat.edu.in', 'Nikita Mirchandani', 'ce student', '../image/student/img2.jpg', '123', '123'),
(24, 'email@gmail.com', 'Sneh', 'Student', '../image/student/sneh.jpg', 'pass', 'pass'),
(27, 'nikita@gmail.com', 'nikita', 'Senior Dev', '../image/student/img1.jpg', 'ww', 'ww'),
(30, 'test@sdgf.com', 'test', '', '', 'mi', 'mi'),
(32, 'mk@gmail.com', 'NMM', 'Senior Dev', '../image/student/img1.jpg', 'koli', 'koli'),
(36, 'neha@gmail.com', 'nisha', '', '', '123', '123'),
(37, 'neha123@gmail.com', 'neha', '', '', 'newpassword', 'newpassword'),
(38, 'Shanaya123@.gmail.com', 'Shanaya', 'Student', '', 'password', 'password'),
(39, 'gaurav123@gmail.com', 'Gaurav', '', '', 'newpass', 'newpass'),
(40, 'nisshi123@gmail.com', 'Nishika', '', '', 'Password@123', 'Password@123'),
(41, 'KarishmaSonam123@gmail.com', 'Karishma', '', '', 'Karishma@123', 'Karishma@123'),
(45, 'nikitamirchandani090102@gmail.com', 'Nikita Mirchandani', '', '', 'passwrod@12', 'passwrod@12'),
(46, 'nikitamirchandani09@gmail.com', 'Nikita Mirchandani', '', '', 'Password@123', 'Password@123'),
(49, 'nikitamirchandani@gmail.com', 'Nikita Mirchandani', '', '', 'pass1@', 'pass1@'),
(50, 'mirchandanipooja46@gmail.com', 'Pooja Mirchandani', '', '', 'Pooja123', 'Pooja123'),
(51, 'bh@gmail.com', 'nk', '', '', 'MK45*', 'MK45*'),
(54, '19ce083@charusat.edu.in', 'Kushal Panchal', '', '', 'Password@123', 'Password@123'),
(59, 'nikitamirchandani2002@gmail.com', 'Nikita Mirchandani', '', '', 'nikita@12', 'nikita@12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `tblcourseorder`
--
ALTER TABLE `tblcourseorder`
  ADD PRIMARY KEY (`CourseOrderId`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FeedbackId`);

--
-- Indexes for table `tbllesson`
--
ALTER TABLE `tbllesson`
  ADD PRIMARY KEY (`LessonId`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblcourseorder`
--
ALTER TABLE `tblcourseorder`
  MODIFY `CourseOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbllesson`
--
ALTER TABLE `tbllesson`
  MODIFY `LessonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
