-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 02:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakshak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `password`) VALUES
('admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appId` int(9) NOT NULL,
  `patientIc` int(7) NOT NULL,
  `scheduleId` int(10) NOT NULL,
  `appSymptom` varchar(100) NOT NULL,
  `appComment` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appId`, `patientIc`, `scheduleId`, `appSymptom`, `appComment`, `status`) VALUES
(136, 17, 20, 'Fever, Cold', 'High fever around 102 and weakness and coughing', 'done'),
(137, 8, 21, 'Fever', 'Headache depression', 'process'),
(138, 8, 20, 'fever', 'cold headache', 'process'),
(139, 10, 21, 'Fever', 'Fever 102', 'process');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Covid-19', 'Coronavirus disease (COVID-19) is an infectious disease caused by the SARS-CoV-2 virus.\nMost people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment. However, some will become seriously ill and require medical attention. The virus can spread from an infected person’s mouth or nose in small liquid particles when they cough, sneeze, speak, sing or breathe. These particles range from larger respiratory droplets to smaller aerosols.\nYou can be infected by breathing in the virus if you are near someone who has COVID-19, or by touching a contaminated surface and then your eyes, nose or mouth. The virus spreads more easily indoors and in crowded settings.', '2022-09-24 16:20:52'),
(2, 'Hypertension', 'A condition in which the force of the blood against the artery walls is too high. Usually hypertension is defined as blood pressure above 140/90, and is considered severe if the pressure is above 180/120.</b>\n                Until about age 64, high blood pressure is more common in men whereas in women it is after 65.Race ,family history ,obesity or being overweight even leads to high bp.', '2022-09-24 16:21:39'),
(3, 'Depression', 'A common viral infection that can be deadly, especially in high-risk groups.\r\nThe flu attacks the lungs, nose and throat. Young children, older adults, pregnant women and people with chronic disease or weak immune systems are at high risk.\r\nSymptoms include fever, chills, muscle aches, cough, congestion, runny nose, headaches and fatigue.\r\nFlu is primarily treated with rest and fluid intake to allow the body to fight the infection on its own. Paracetamol may help cure the symptoms but NSAIDs should be avoided. An annual vaccine can help prevent the flu and limit its complications.', '2022-09-27 00:53:21'),
(4, 'HIV/AIDS', 'HIV (human immunodeficiency virus) is a virus that attacks the body\'s immune system.</b>\n                Acquired immunodeficiency syndrome (AIDS) is a chronic, potentially life-threatening condition caused by the human immunodeficiency virus (HIV)\n                HIV is a sexually transmitted infection (STI). It can also be spread by contact with infected blood and from illicit injection drug use or sharing needles. It can also be spread from mother to child during pregnancy, childbirth or breastfeeding.\n                There\'s no cure for HIV/AIDS, but medications can control the infection and prevent progression of the disease. Antiviral treatments for HIV have reduced AIDS deaths around the world, and international organizations are working to increase the availability of prevention measures and treatment in resource-poor countries.', '2022-10-23 19:38:49'),
(5, 'Thyroid', 'Thyroid dysfunction is one of the most common endocrine disorders in women of childbearing age [1], second only to diabetes mellitus. Approximately 2-3% of women are diagnosed prenatally with abnormal thyroid function; however, a greater number may go undetected due to lack of consensus on testing and treatment modalities during pregnancy [2-4].The thyroid gland is a small organ that\'s located in the front of the neck, wrapped around the windpipe (trachea). It\'s shaped like a butterfly, smaller in the middle with two wide wings that extend around the side of your throat. The thyroid is a gland. You have glands throughout your body, where they create and release substances that help your body do a specific thing. Your thyroid makes hormones that help control many vital functions of your body.When your thyroid doesn\'t work properly, it can impact your entire body.', '2022-10-23 20:05:01'),
(6, 'Asthma', 'Asthma is a major noncommunicable disease, affecting both children and adults,', '2022-10-23 20:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(64, 'This maybe due to high stress level. Get it checked by a cardiologist once', 44, 826745, '2023-01-20 09:16:55'),
(65, 'Please visit a cardiologist. After few test we will be able to make out the real reason. Avoid doing strenous physical exercise till then', 45, 47690, '2023-01-20 12:58:59'),
(66, 'Visit a neurologist. Try to stay away from stressful surroundings', 45, 47690, '2023-01-20 12:59:50'),
(67, 'Stressing yourself too much can be a cause. Try to avoid using electronic gadgets before sleep. Medication needs to be changed. Consult you Doctor', 45, 6579, '2023-01-20 13:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `sno` int(8) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `agegroup` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentName`) VALUES
('Cardiologist'),
('Dermatology'),
('ENT'),
('Gynaecology'),
('Neurologist'),
('Oncology'),
('Ophthalmologist'),
('Orthopedist'),
('Pediatrics'),
('Physician'),
('Radiology'),
('Surgery');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorId` int(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hid` bigint(20) NOT NULL,
  `doctorFirstName` varchar(50) NOT NULL,
  `doctorLastName` varchar(50) NOT NULL,
  `doctorDepartment` varchar(50) NOT NULL,
  `doctorGender` varchar(10) NOT NULL,
  `doctorPhone` int(15) NOT NULL,
  `doctorEmail` varchar(50) NOT NULL,
  `doctorDOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorId`, `password`, `hid`, `doctorFirstName`, `doctorLastName`, `doctorDepartment`, `doctorGender`, `doctorPhone`, `doctorEmail`, `doctorDOB`) VALUES
(1234, '123', 67687, 'Midhat', 'Shaheen', 'Pediatrics', 'female', 516, 'shaheenmidhat@gmail.com', '2017-07-19'),
(5664, '123', 67687, 'Sam', 'Karn', 'Orthopedist', 'female', 123456789, 'sam@gmail.com', '1985-01-09'),
(6579, '123', 8052003, 'Deep', 'Sidhu', 'Neurologist', 'male', 983509257, 'deepsidhu@gmail.com', '1984-01-10'),
(45692, '123', 2225763333, 'Pooja', 'Agarwal', 'Orthopedist', 'female', 7845692, 'poojaagarwal09@gmail.com', '1995-01-06'),
(47690, '123', 764590, 'Nirmal', 'Singh', 'Cardiologist', 'male', 2147483647, 'nirmalsingh@gmail.com', '1985-08-09'),
(56468, '123', 2223667949, 'Vijay', 'Sharma', 'Dermatology', 'male', 887101626, 'vijaysharma@gmail.com', '1987-01-02'),
(826745, '123', 764590, 'Chhaya', 'Singh', 'Physician', 'female', 625789256, 'chhayaofficial@gmail.com', '1998-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `scheduleId` int(11) NOT NULL,
  `doctorId` int(9) NOT NULL,
  `scheduleDate` date NOT NULL,
  `startTime` varchar(15) NOT NULL,
  `bookAvail` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorschedule`
--

INSERT INTO `doctorschedule` (`scheduleId`, `doctorId`, `scheduleDate`, `startTime`, `bookAvail`) VALUES
(20, 47690, '2023-01-21', '10 AM - 12 PM', 'available'),
(21, 826745, '2023-01-21', '2 PM - 4 PM', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `ICU` varchar(10) NOT NULL,
  `OPD` varchar(10) NOT NULL,
  `Pharmacy` varchar(10) NOT NULL,
  `Ambulance` varchar(10) NOT NULL,
  `Blood_Bank` varchar(10) NOT NULL,
  `Laboratory` varchar(10) NOT NULL,
  `Operation_Theatre` varchar(10) NOT NULL,
  `Hospital_Reg_No` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`ICU`, `OPD`, `Pharmacy`, `Ambulance`, `Blood_Bank`, `Laboratory`, `Operation_Theatre`, `Hospital_Reg_No`) VALUES
('yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 2223667949),
('yes', 'no', 'no', 'yes', 'yes', 'no', 'yes', 2225763333),
('yes', 'yes', 'no', 'yes', 'no', 'yes', 'yes', 8052003),
('no', 'no', 'yes', 'yes', 'yes', 'no', 'yes', 67687);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Hospital_Name` varchar(50) NOT NULL,
  `Accreditation` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Reg_no` bigint(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `State` varchar(20) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Town` varchar(20) NOT NULL,
  `Pincode` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telephone_no` bigint(20) NOT NULL,
  `Mobile_No` bigint(20) NOT NULL,
  `Ambulance_no` bigint(20) NOT NULL,
  `helpline_no` bigint(20) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `speciality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Hospital_Name`, `Accreditation`, `Password`, `Reg_no`, `type`, `Address`, `State`, `District`, `Town`, `Pincode`, `Email`, `Telephone_no`, `Mobile_No`, `Ambulance_no`, `helpline_no`, `Website`, `speciality`) VALUES
('SIIMS Hospital', 'Government', 'kanchan123', 67687, 'Hospital', 'Dr. Sudesh Singhal, Sector 32, 136132, Sushant City', 'Haryana', 'Kurukshetra', 'Kurukshetra', 136131, 'Enquiry@simshospitals.com', 7419198699, 5438753877, 6763297321, 2762862392, 'www.simsshospital.com', 'Anaesthesiology,Neurology,Psychiatry,Pediatrics'),
('Patna Medical College and Hospital', 'Government', '123', 697697, 'Medical College', 'Ashok Rajpath', 'Bihar', 'Patna', 'Patna', 800031, 'info@pmch.ac.in', 1622245668, 9102978168, 8871016261, 18005657862, 'https://patnamedicalcollege.edu.in/', 'Anaesthesiology,Neurology,Psychiatry,Pediatrics'),
('Ruban Memorial Hospital', 'Private', '123456', 764590, 'Hospital', 'Patliputra Colony, Near Patliputra Golamber', 'Bihar', 'Patna', 'Patna', 800013, 'info@ruban.org.in', 6122271023, 6122271020, 6122271021, 18001202216, 'https://rubanpatliputrahospital.com', 'Anaesthesiology,Neurology,Psychiatry,Pediatrics'),
('Satya Hospital', 'Private', 'anu123', 8052003, 'Nursing Home', 'Satya Trauma & Maternity Centre HIG-1/3 Barra 6', 'Uttar Pradesh', 'Kanpur', 'Kanpur', 202301, 'contact@satyahospital.com', 2735276688, 9838951053, 9838951052, 5122282111, 'www.satyahospital.com', 'Anaesthesiology,Neurology,Psychiatry,Pediatrics'),
('Breach Candy Hospital', 'Private', '12345', 2223667949, 'Hospital', 'Breach Candy Hospital Trust 60 A Bhulabhai Road', 'Maharashtra', 'Mumbai', 'Mumbai', 400026, 'info@breachcandyhospital.org', 2269197788, 2223667949, 2223667809, 2223672888, 'www.breachcandyhospital.org', 'Anaesthesiology,Neurology,Psychiatry,Pediatrics'),
('Hiranandani Hospital', 'Private', '67890', 2225763333, '', 'Hill Side Avenue, Hiranandani Gardens, Powai', 'Maharashtra', 'Mumbai', 'Mumbai', 400076, 'wecare@hiranandanihospital.org', 7102332289, 7687969329, 7272269767, 7675677252, 'www.hiranandanihospital.org', 'Anaesthesiology,Neurology,Psychiatry,Pediatrics');

-- --------------------------------------------------------

--
-- Table structure for table `hospital2`
--

CREATE TABLE `hospital2` (
  `hospitalId` bigint(20) NOT NULL,
  `generalbed` int(4) NOT NULL DEFAULT 0,
  `Tgeneralbed` int(4) NOT NULL DEFAULT 0,
  `privatebedac` int(4) NOT NULL DEFAULT 0,
  `Tprivatebedac` int(4) NOT NULL DEFAULT 0,
  `privatebednonac` int(4) NOT NULL DEFAULT 0,
  `Tprivatebednonac` int(4) NOT NULL DEFAULT 0,
  `ventilator` int(4) NOT NULL DEFAULT 0,
  `Tventilator` int(4) NOT NULL DEFAULT 0,
  `icu` int(4) NOT NULL DEFAULT 0,
  `Ticu` int(4) NOT NULL DEFAULT 0,
  `nicu` int(4) NOT NULL DEFAULT 0,
  `Tnicu` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital2`
--

INSERT INTO `hospital2` (`hospitalId`, `generalbed`, `Tgeneralbed`, `privatebedac`, `Tprivatebedac`, `privatebednonac`, `Tprivatebednonac`, `ventilator`, `Tventilator`, `icu`, `Ticu`, `nicu`, `Tnicu`) VALUES
(67687, 80, 200, 100, 100, 100, 175, 10, 10, 50, 50, 20, 20),
(697697, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(764590, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8052003, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2223667949, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2225763333, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hospitaltestimonials`
--

CREATE TABLE `hospitaltestimonials` (
  `rid` int(9) NOT NULL,
  `review` text NOT NULL,
  `hid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitaltestimonials`
--

INSERT INTO `hospitaltestimonials` (`rid`, `review`, `hid`) VALUES
(1, 'Rakshak Portal has enabled our hospitals to reach out to more masses. They are doing a very good Job.', 2225763333),
(2, 'Rakshak has brought quality health care close to people. This initiative will really help our nation in preventing situations like covid.', 2223667949),
(3, 'This portal has linked the health care facilities of the entire nation at one place. Good Job', 67687),
(4, 'Very Nice initiative. One improvement our hospital would like to suggest is to add the feature of medicine availability too.', 8052003);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `icPatient` int(7) NOT NULL,
  `password` varchar(255) NOT NULL,
  `patientFirstName` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `patientLastName` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `patientMaritalStatus` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `patientDOB` date DEFAULT NULL,
  `patientGender` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `patientAddress` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `patientPhone` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `patientEmail` varchar(100) CHARACTER SET latin1 NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`icPatient`, `password`, `patientFirstName`, `patientLastName`, `patientMaritalStatus`, `patientDOB`, `patientGender`, `patientAddress`, `patientPhone`, `patientEmail`, `timestamp`) VALUES
(8, '$2y$10$rGUZo/Xuist2pE1O7yO6puRvegihrYzEUBkcGBHiuYGPTa7guZ6z6', 'Hrithik', 'Ranjan', 'single', '2002-08-09', 'male', 'Vivekananda hostel Hall-4\r\n', '9102978168', 'hrithik09@gmail.com', '2022-10-15 16:34:22'),
(10, '$2y$10$h1hlu3oZPLnw1YQ3DJucRuEKfCDbXduaAZSIFT.E5Xhq0tmDCYd/G', 'Ankur', 'Ranjan', 'single', '2000-04-18', 'male', 'Karn Niwas, Tarachak, Danapur, Patna', '789451230', 'ankurs18@gmail.com', '2022-10-21 22:46:55'),
(17, '$2y$10$z.KWnDiKXbohk6zxRv3jQ.IjqdywRw/8w4YUaUq5sqI8u3kFCAyJG', 'Kanchandeep', ' Kaur', 'single', '2002-12-28', 'female', 'Girls Hostel', '1234567890', 'kanchandeepkaur499@gmail.com', '2022-11-25 21:26:27'),
(20, '$2y$10$EzsHbXO8/IBui3K5dWOW8eBHslN0X0F.xCgmYqBlpsyGkGdjP0EOa', 'Harsh', ' Singh', NULL, '2000-05-03', 'male', NULL, NULL, 'harsh@gmail.com', '2023-01-20 23:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `Anaesthesiology` varchar(10) NOT NULL DEFAULT 'no',
  `Anatomy` varchar(10) NOT NULL DEFAULT 'no',
  `Dental` varchar(10) NOT NULL DEFAULT 'no',
  `Neurology` varchar(10) NOT NULL DEFAULT 'no',
  `Psychiatry` varchar(10) NOT NULL DEFAULT 'no',
  `Pediatrics` varchar(10) NOT NULL DEFAULT 'no',
  `Kidney_Transplant` varchar(10) NOT NULL DEFAULT 'no',
  `Cardiology` varchar(10) NOT NULL DEFAULT 'no',
  `Orthopedics` varchar(10) NOT NULL DEFAULT 'no',
  `Hospital_Reg_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`Anaesthesiology`, `Anatomy`, `Dental`, `Neurology`, `Psychiatry`, `Pediatrics`, `Kidney_Transplant`, `Cardiology`, `Orthopedics`, `Hospital_Reg_no`) VALUES
('yes', 'no', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'no', 2223667949),
('no', 'no', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 2225763333),
('no', 'no', 'yes', 'no', 'no', 'yes', 'yes', 'no', 'yes', 8052003),
('no', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', 'yes', 67687);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `sid` int(7) NOT NULL,
  `userid` int(7) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `planid` int(2) NOT NULL,
  `freeapt` int(11) NOT NULL,
  `ques` int(11) NOT NULL,
  `dos` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sid`, `userid`, `pid`, `planid`, `freeapt`, `ques`, `dos`) VALUES
(5, 8, '9ce5310e6c0d4a318884f71aea124be6', 1, 0, 1, '2023-01-18 16:10:11'),
(6, 17, 'f59ac0994de140809632b93bb0fa858a', 1, 0, 1, '2023-01-19 12:29:20'),
(31, 10, 'c3960915f492408eaf4d49320d43e25e', 2, 1, 5, '2023-01-20 19:06:57'),
(32, 20, 'd24889d29f5646bbb10cbdc05595576b', 2, 1, 5, '2023-01-20 23:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `departmentName` varchar(50) NOT NULL DEFAULT 'Physician',
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_user_id`, `departmentName`, `timestamp`) VALUES
(44, 'Chest Pain', 'Having problem of chest pain, Short Breaths. I have no medical history as such in the past. Also getting too less sleep.', 8, 'Cardiologist', '2023-01-20 08:48:20'),
(45, 'Migraine', 'I am a chronic migraine patient. I used to take sleeping pills but now it feels like even that is not working.', 17, 'Neurologist', '2023-01-20 09:00:01'),
(46, 'Nausea', 'Having nausea headache', 10, 'Physician', '2023-01-20 19:08:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appId`),
  ADD KEY `patientIc` (`patientIc`),
  ADD KEY `scheduleId` (`scheduleId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_by` (`comment_by`),
  ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentName`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorId`),
  ADD KEY `doctor_ibfk_1` (`doctorDepartment`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD PRIMARY KEY (`scheduleId`),
  ADD KEY `doctorId` (`doctorId`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD KEY `Hospital_Reg_No` (`Hospital_Reg_No`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Reg_no`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Telephone_no` (`Telephone_no`),
  ADD UNIQUE KEY `Mobile_No` (`Mobile_No`),
  ADD UNIQUE KEY `Ambulance_no` (`Ambulance_no`),
  ADD UNIQUE KEY `helpline_no` (`helpline_no`),
  ADD UNIQUE KEY `Website` (`Website`);
ALTER TABLE `hospital` ADD FULLTEXT KEY `Hospital_Name` (`Hospital_Name`,`Address`,`State`,`District`,`Town`);

--
-- Indexes for table `hospital2`
--
ALTER TABLE `hospital2`
  ADD PRIMARY KEY (`hospitalId`);

--
-- Indexes for table `hospitaltestimonials`
--
ALTER TABLE `hospitaltestimonials`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`icPatient`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD KEY `Hospital_Reg_no` (`Hospital_Reg_no`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `subscription_ibfk_1` (`userid`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `thread_user_id` (`thread_user_id`),
  ADD KEY `departmentName` (`departmentName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  MODIFY `scheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hospitaltestimonials`
--
ALTER TABLE `hospitaltestimonials`
  MODIFY `rid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `icPatient` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `sid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patientIc`) REFERENCES `patient` (`icPatient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_by`) REFERENCES `doctor` (`doctorId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`thread_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`doctorDepartment`) REFERENCES `departments` (`departmentName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`hid`) REFERENCES `hospital` (`Reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD CONSTRAINT `doctorschedule_ibfk_1` FOREIGN KEY (`doctorId`) REFERENCES `doctor` (`doctorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`Hospital_Reg_No`) REFERENCES `hospital` (`Reg_no`);

--
-- Constraints for table `hospital2`
--
ALTER TABLE `hospital2`
  ADD CONSTRAINT `hospital2_ibfk_1` FOREIGN KEY (`hospitalId`) REFERENCES `hospital` (`Reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospitaltestimonials`
--
ALTER TABLE `hospitaltestimonials`
  ADD CONSTRAINT `hospitaltestimonials_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hospital` (`Reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specialities`
--
ALTER TABLE `specialities`
  ADD CONSTRAINT `specialities_ibfk_1` FOREIGN KEY (`Hospital_Reg_no`) REFERENCES `hospital` (`Reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `patient` (`icPatient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`thread_user_id`) REFERENCES `patient` (`icPatient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_3` FOREIGN KEY (`departmentName`) REFERENCES `departments` (`departmentName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
