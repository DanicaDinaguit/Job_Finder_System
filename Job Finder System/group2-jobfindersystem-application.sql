-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 23, 2023 at 02:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group2-jobfindersystem-application`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(50) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_fullname`, `admin_password`, `admin_email`) VALUES
(1, 'Danica Echica Dinaguit Sulit Cantal Flores', '2021-217776dinaguit', 'dedinaguit.student@asiancollege.edu.ph'),
(2, 'Rica Kana Casipong', '2021-218152casipong', 'rkcasipong.student@asiancollege.edu.ph'),
(3, 'Desiree Mae G. David', '2021-218214david', 'dgdavid.student@asiancollege.edu.ph'),
(4, 'Ivan Jay B. Gahilomo', '2021-218181gahilomo', 'ibgahilomo.student@asiancollege.edu.ph');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminprofile`
--

CREATE TABLE `tbl_adminprofile` (
  `adminprofile_id` int(50) NOT NULL,
  `admin_id` int(50) NOT NULL,
  `adminprofile_fullname` varchar(100) NOT NULL,
  `adminprofile_email` varchar(100) NOT NULL,
  `adminprofile_contactinfo` varchar(100) NOT NULL,
  `adminprofile_bio` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_adminprofile`
--

INSERT INTO `tbl_adminprofile` (`adminprofile_id`, `admin_id`, `adminprofile_fullname`, `adminprofile_email`, `adminprofile_contactinfo`, `adminprofile_bio`) VALUES
(1, 1, 'Danica Echica Dinaguit Sulit Cantal Flores', 'dedinaguit.student@asiancollege.edu.ph', '09606748406', ''),
(2, 2, 'Rica Kana Casipong', 'rkcasipong.student@asiancollege.edu.ph', '09157361836', ''),
(3, 3, 'Desiree Mae G. David', 'dgdavid.student@asiancollege.edu.ph', '09202576735', ''),
(4, 4, 'Ivan Jay B. Gahilomo', 'ibgahilomo.student@asiancollege.edu.ph', '09159247614', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `application_id` int(50) NOT NULL,
  `job_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `application_resume` varchar(1000) NOT NULL,
  `application_letter` varchar(1000) NOT NULL,
  `application_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_password` varchar(100) NOT NULL,
  `company_location` varchar(100) NOT NULL,
  `company_website` varchar(100) NOT NULL,
  `company_contactperson` varchar(100) NOT NULL,
  `company_contactinfo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_email`, `company_password`, `company_location`, `company_website`, `company_contactperson`, `company_contactinfo`) VALUES
(1, 'Teletech Dumaguete', 'jobopportunities@ttec.com', 'ttecdumaguete', 'Dumaguete Business Park, South Road Calindagan, Dumaguete City, 6200', 'https://www.ttec.com/', '', '(035) 420 0000'),
(2, 'Qualfon Dumaguete', ' joinusdumaguete@qualfon.com', 'qualfondumaguete', 'Link Sy I.T. Park, Building 1, North Road, Barangay Bantayan, Dumaguete City, Philippines', 'https://qualfon.com/', '', '0917 310 4123'),
(3, 'SOPHI, Inc.', 'info@sophi-inc.com.ph', 'sophi', 'Ground Floor Building 2\r\nDBPI IT Plaza, Dumaguete City Negros Oriental, Philippines 6200', 'https://sophi-outsourcing.com/', '', '(035) 421 0685'),
(4, 'Visaya KPO Dumaguete', 'socialmedia@visayakpo.com', 'vkpoduma', 'Eros building, Dr V. Locsin Steet, Dumaguete City, Philippines', 'https://visayakpo.com/', '', '+63 2 7746-6938'),
(5, 'Negros Polymedic Hospital', 'hr.negrospolymedic@gmail.com', 'negpolhos', 'Purok Yakal, Tubtubon North, National Highway, Sibulan, Negros Oriental', 'https://www.facebook.com/ENHANEGROSPOLYMEDIC/', '', '(035) 419 2112'),
(6, 'PEAK Outsourcing Dumaguete', 'recruitment@peakoutsourcing.com', 'peoduma', '3F Jose Building, Dumaguete, 6200 Negros Oriental', 'https://www.peakoutsourcing.com/', '', '0917 118 8520'),
(7, 'The Henry Resort Dumaguete', 'reservations.dumaguete@thehenryhotel.com', 'thenreduma', 'Flores Avenue, Bantayan, Dumaguete City, Philippines', 'https://dumaguete.thehenryhotel.com/', '', '(035) 531 5707'),
(8, 'Bravo Hotel', 'fo@bravohotelsgroup.com', 'bravohotel', 'Negros Oriental, Sibulan, Philippines', 'https://www.facebook.com/BravoHotelph/', '', '0917 808 5131'),
(9, 'Atlantis Dive Resorts & Liveaboards', 'reservations@atlantishotel.com', 'atlanresort', '\r\nLipayo, Dauin, Negros Oriental, 6217', 'https://atlantishotel.com/dumaguete-resort/', '', '+63 (0) 9178525126');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `feedback_review` varchar(1000) NOT NULL,
  `feedback_rating` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobposting`
--

CREATE TABLE `tbl_jobposting` (
  `job_id` int(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_industry` varchar(100) NOT NULL,
  `job_description` varchar(8000) NOT NULL,
  `job_requirements` varchar(5000) NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `job_salarymin` decimal(10,2) NOT NULL,
  `job_salarymax` decimal(10,2) NOT NULL,
  `job_applicationprocess` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobposting`
--

INSERT INTO `tbl_jobposting` (`job_id`, `company_id`, `job_title`, `job_industry`, `job_description`, `job_requirements`, `job_location`, `job_salarymin`, `job_salarymax`, `job_applicationprocess`) VALUES
(1, 1, 'Customer Service Representative', 'Customer Service', 'Bringing smiles is what we do at TTEC… for you and the customer. As a site-based Customer Service Representative at Dumaguete, you’ll be a part of creating and delivering amazing technical experiences while you also #ExperienceTTEC, an award-winning employment experience and company culture.\n\nWhat You’ll be Doing\n\nDo you have a passion for helping others and giving them peace of mind? In this role, you’ll have ownership over resolving escalated or complex calls from customers. Whether it’s getting answers for customers quickly, consulting on products with compassion or resolving their issues with a smile, you’ll be the difference between their customers’ experience being just average or an exceptional one.\n\nDuring a Typical Day, You’ll\n\nAnswer incoming communications from customers\nConduct research to provide answers for customers to resolve their issues\n\nWhat You Can Expect\n\nSupportive of your career and professional development\nAn inclusive culture and community minded organization where giving back is encouraged\nA global team of curious lifelong learners guided by our company values\nAsk us about our paid time off (PTO) and wellness and healthcare benefits\nAnd yes... a great compensation package and performance bonus opportunities, benefits you\'d expect and maybe a few that would pleasantly surprise you (like tuition reimbursement)\nVisit www.mybenefits.comfor more information.\n\nA Bit More About Your Role\n\nWe’ll train you to be a subject matter expert in your field, so you can be confident in providing the highest level of service possible whether through voice, chat or email interactions. And we trust you already have the necessary ingredient that can’t be taught – a caring and supportive nature that will shine through as you help customers. You’ll also have a chance to make great new friends within the TTEC community and grow your career in a dynamic, family-friendly atmosphere.\n\nYou\'ll report to the account Team Leader. You’ll contribute to the success of the customer experience as well as the overall success of the team.\n\nAbout TTEC\n\nOur business is about making customers happy. That’s all we do. Since 1982, we’ve helped companies build engaged, pleased, profitable customer experiences powered by our combination of humanity and technology. On behalf of many of the world’s leading iconic and disruptive brands, we talk, message, text, and video chat with millions of customers every day. These exceptional customer experiences start with you.\n\nTTEC is proud to be an equal opportunity employer where all qualified applicants will receive consideration for employment without regard to race, color, religion, sex, sexual orientation, gender identity, national origin, disability, or status as a protected veteran. TTEC embraces and is committed to building a diverse and inclusive workforce that respects and empowers the culture and perspectives within our global teams. We strive to reflect the communities we serve by not only delivering amazing service and technology, but also humanity. We make it a point to make sure all our employees feel valued and comfortable being their authentic selves at work. As a global company, we know diversity is our strength. It enables us to view projects and ideas from different vantage points and allows every individual to bring value to the table in their own unique way.\n\nJob Type: Full-time\n\nSchedule:\n\nRotational shift', 'What You Bring to the Role\r\n\r\nOpen to all candidates with or without call center experience\r\nCompleted Senior High School or those with at least 2 years of bachelor’s or associate degree\r\nComfortable with decision making by assessing the situation, researching potential solutions, and making recommendations\r\nA solution-oriented mindset to ensure happy customers\r\nYou lead by example and work with your team to contribute to the overall success of your client program\r\nComputer savvy\r\n\r\nAbility to commute/relocate:\r\n\r\nDumaguete City, Negros Oriental: Reliably commute or planning to relocate before starting work (Required)\r\n\r\nEducation:\r\n\r\nBachelor\'s (Preferred)\r\n\r\nExperience:\r\n\r\nCustomer Service Representative: 1 year (Preferred)\r\n\r\nLanguage:\r\n\r\nEnglish (Preferred)', 'Dumaguete Business Park, South Rd., Calindagan, Level 1, Dumaguete City', '16000.00', '19000.00', 'Our recruitment hub is open to accept walk-in applicants from Monday to Friday, 10am- 3pm. You may visit TTEC office at Dumaguete Business Park, South Rd., Calindagan, Level 1, Dumaguete City'),
(2, 2, 'Customer Service Representatives', 'Customer Service', 'Customer Service Representatives - No experience required\r\n\r\nWe provide you:\r\n\r\n● Competitive Compensation Package with Retention Program Incentives, Performance Incentives\r\n\r\n● In-house training\r\n\r\n● Personal development programs\r\n\r\nWhat we ask of you:\r\n\r\n● Handling of customer calls\r\n\r\n- Process customer orders and purchase of products and services\r\n- Resolves product or service problems shared by customers\r\n- Troubleshoot technical issues using all available tools\r\n● Documentation of customer calls\r\n\r\n● Adherence to established guidelines\r\n\r\nProvide timely feedback on noticeable patterns of customer concerns\r\n\r\nSkills we’d like you to have:\r\n● High school graduate, vocational grade of any course or its equivalent\r\n\r\n● Good verbal and written communication skills\r\n\r\n● Basic knowledge in computer navigation\r\n\r\n● Problem solving skills\r\n\r\n* Prior work experience is not necessary - Formal orientation will be provided to perform the job satisfactorily.\r\n\r\nAbout us:\r\n\r\nQualfon is a full-service marketing solution and contact center service provider offering full customer lifecycle management: lead generation, end-to-end integrated marketing, multichannel customer engagement, and fulfillment\r\n\r\nJob Type: Full-time\r\n\r\nBenefits:\r\n\r\n● Company events\r\n● Health insurance\r\n● Opportunities for promotion\r\n● Paid training\r\nSchedule:\r\n\r\n● Shift system\r\n\r\nSupplemental pay types:\r\n\r\n● Overtime pay\r\n● Performance bonus', 'Ability to commute/relocate:\r\nDumaguete, Negros Oriental: Reliably commute or planning to relocate before starting work (Required)\r\n\r\nEducation:\r\nSenior High School (Required)\r\n\r\nLanguage:\r\nEnglish (Required)', 'LinkSY IT Park,\r\nBantayan Dumaguete City, Negros Oriental, 6200', '14000.00', '24000.00', 'Walk-in'),
(3, 3, 'Customer Service Agent', 'Customer Service', 'The customer service agent (voice) attracts potential consumers and answers product and service queries. They also feed information based on the client\'s products and services. They ensure customer satisfaction by providing quality service.\r\n\r\nResponsibilities\r\n\r\nHandle customer inquiries, provide appropriate solutions and alternatives within the given time limit, and follow up to ensure resolution.\r\nProvide first-call resolution while following strict processes that meet compliance guidelines.\r\nTake the extra mile to engage customers.\r\nPerform other tasks required by the client involving testing, monitoring, and outbound calls.\r\n\r\nJob Types: Full-time, Permanent\r\n\r\nBenefits:\r\n\r\nAdditional leave\r\nCompany Christmas gift\r\nCompany events\r\nEmployee discount\r\nFlextime\r\nFree parking\r\nGym membership\r\nHealth insurance\r\nLife insurance\r\nOn-site parking\r\nOpportunities for promotion\r\nPaid training\r\nPay raise\r\n\r\nSchedule:\r\n\r\n8 hour shift\r\nAfternoon shift\r\nDay shift\r\nEvening shift\r\nFlextime\r\nHolidays\r\nMonday to Friday\r\nNight shift\r\nOvertime\r\nRotational shift\r\nWeekends\r\n\r\nSupplemental pay types:\r\n\r\n13th month salary\r\nAnniversary bonus\r\nBonus pay\r\nOvertime pay\r\nPerformance bonus\r\nQuarterly bonus\r\nYearly bonus', 'Skills & Qualifications\r\n\r\nExcellent communication and presentation skills.\r\nAble to multitask and manage time effectively.\r\nActive listening skills.\r\nProblem-solving skills.\r\nCustomer orientation and ability to adapt/respond to different types of characters\r\nFamiliarity with CRM systems and practices.\r\n\r\nAbility to commute/relocate:\r\n\r\nDumaguete City, Negros Oriental: Reliably commute or planning to relocate before starting work (Required)\r\n\r\nEducation:\r\n\r\nJunior High School (Preferred)\r\n\r\nExperience:\r\n\r\nCustomer Service Representative: 1 year (Required)\r\n\r\nLanguage:\r\n\r\nEnglish (Required)', 'Ground Floor Building 2\r\nDBPI IT Plaza, Dumaguete City Negros Oriental, Philippines 6200', '15000.00', '20000.00', 'Walk-in\r\nApplication Deadline: 05/22/2023\r\nExpected Start Date: 05/22/2023'),
(4, 4, 'Urgent: Customer Service Representative - Healthcare account', 'Customer Service', 'We\'re hiringfor Customer Service Representative!\r\n\r\nBe a Customer Service Representative for our Healthcare Account!\r\n\r\nResponsibilities:\r\n\r\n● Perform outbound physician office/facilities scheduling to retrieve medical records for various purposes such as Medical Record Review and Medical Abstraction.\r\n● Take in calls, resolve/assist concerns; transfer calls if needed\r\n\r\nEnjoy the ff. Perks and Benefits:\r\n\r\n– 15% Night Differential\r\n\r\n– HMO Benefits after 30 days + Add Up to 2 Dependents\r\n\r\n– Retirement Benefits\r\n\r\n– 24 Leave Credits per year, Convertible to Cash\r\n\r\n– Wholistic Employee Wellness Program\r\n\r\nSend your resume to: apply@visayakpo.com\r\n\r\nFollow us on Tiktok and Instagram for recruitment and other updates!\r\n\r\nInstagram: @visaya_kpo\r\n\r\nTiktok: @visayakpo\r\n\r\n#visayakpo\r\n\r\nJob Type: Full-time\r\n\r\nSchedule:\r\n\r\n● 8 hour shift\r\n\r\nSupplemental pay types:\r\n\r\n● 13th month salary', 'Qualifications:\r\n\r\n- At least 2 Years in College\r\n- At least 6 months of experience in Inbound/Outbound/Customer Service/Back Office in a BPO setting\r\n- Above-average communication skills\r\n- Must be willing to report on site', 'EROS Building,\r\nGround Floor, Dr V. Locsin St.,\r\nDumaguete City,\r\nNegros Oriental, Philippines, 6200', '14000.00', '15000.00', 'Walk-in\r\nExpected Start Date: 06/19/2023'),
(5, 1, 'Healthcare Customer Service Representative', 'Customer Service', 'Bringing smiles is what we do at TTEC… for you and the customer. As a site-based Healthcare Customer Service Representative in Dumaguete, you’ll be a part of creating and delivering amazing customer experiences while you also #ExperienceTTEC, an award-winning employment experience and company culture.\r\n\r\nOur recruitment hub is open to accept walk-in applicants from Monday to Friday, 10am- 3pm. You may visit TTEC office at Dumaguete Business Park, South Rd., Calindagan, Level 1, Dumaguete City\r\n\r\nWhat You’ll be Doing\r\n\r\nDo you have a passion for helping others and giving them peace of mind? In this role, you’ll have ownership over resolving escalated or complex calls from customers. Whether it’s getting answers for customers quickly, consulting on products with compassion or resolving their issues with a smile, you’ll be the difference between their customers experience being just average or an exceptional one.\r\n\r\nDuring a Typical Day, You’ll\r\n\r\nAnswer incoming communications from customers\r\nConduct research to provide answers for customers to resolve their issues\r\n\r\nWhat You Can Expect\r\n\r\nSupportive of your career and professional development\r\nAn inclusive culture and community minded organization where giving back is encouraged\r\nA global team of curious lifelong learners guided by our company values\r\nAsk us about our paid time off (PTO) and wellness and healthcare benefits\r\nAnd yes... a great compensation package and performance bonus opportunities, benefits you\'d expect and maybe a few that would pleasantly surprise you (like tuition reimbursement)\r\nVisit www.mybenefits.comfor more information.\r\n\r\nA Bit More About Your Role\r\n\r\nWe’ll train you to be a subject matter expert in your field, so you can be confident in providing the highest level of service possible whether through voice, chat or email interactions. And we trust you already have the necessary ingredient that can’t be taught – a caring and supportive nature that will shine through as you help customers. You’ll also have a chance to make great new friends within the TTEC community and grow your career in a dynamic, family-friendly atmosphere.\r\n\r\nYou\'ll report to the account Team Leader. You’ll contribute to the success of the customer experience as well as the overall success of the team.\r\n\r\nAbout TTEC\r\n\r\nOur business is about making customers happy. That’s all we do. Since 1982, we’ve helped companies build engaged, pleased, profitable customer experiences powered by our combination of humanity and technology. On behalf of many of the world’s leading iconic and disruptive brands, we talk, message, text, and video chat with millions of customers every day. These exceptional customer experiences start with you.\r\n\r\nTTEC is proud to be an equal opportunity employer where all qualified applicants will receive consideration for employment without regard to race, color, religion, sex, sexual orientation, gender identity, national origin, disability, or status as a protected veteran. TTEC embraces and is committed to building a diverse and inclusive workforce that respects and empowers the culture and perspectives within our global teams. We strive to reflect the communities we serve by not only delivering amazing service and technology, but also humanity. We make it a point to make sure all our employees feel valued and comfortable being their authentic selves at work. As a global company, we know diversity is our strength. It enables us to view projects and ideas from different vantage points and allows every individual to bring value to the table in their own unique way.\r\n\r\nJob Types: Full-time, Permanent\r\n\r\nSchedule:\r\n\r\nRotational shift\r\n\r\nSupplemental pay types:\r\n\r\n13th month salary\r\nPerformance bonus\r\n\r\n', 'What You Bring to the Role\r\n\r\nTwo (2) years or more of customer service experience\r\nCompleted at least two (2) years in college\r\nComfortable with decision making by assessing the situation, researching potential solutions and making recommendations\r\nA solution-oriented mindset to ensure happy customers\r\nYou lead by example and work with your team to contribute to the overall success of your client program\r\nComputer savvy\r\n\r\nAbility to commute/relocate:\r\n\r\nDumaguete City, Negros Oriental: Reliably commute or planning to relocate before starting work (Preferred)\r\n\r\nExperience:\r\n\r\nCustomer Service: 2 years (Preferred)', 'Dumaguete Business Park, South Rd., Calindagan, Level 1, Dumaguete City', '21000.00', '24000.00', 'Our recruitment hub is open to accept walk-in applicants from Monday to Friday, 10am- 3pm. You may visit TTEC office at Dumaguete Business Park, South Rd., Calindagan, Level 1, Dumaguete City'),
(6, 5, 'Staff Nurse', 'Healthcare', 'Job description\r\n\r\nJob Responsibilities:\r\n\r\n- Assesses and plans the nursing care requirements, focuses and acts on patient’s needs;\r\n- Provides pre- and post-operation/procedure care as appropriate;\r\n- Monitors and administers medication and intravenous infusions to patients;\r\n- Coordinates with supervisor and other staff in providing excellent patient care;\r\n- Provides physical, socio-psychological and spiritual support to patients and relatives;\r\n- Reports and/or resolves patients’ needs or problems;\r\n- Prepares patients for examinations and diagnostic tests as needed;\r\n- Monitors and records patient’s condition and documents care services provided;\r\n- Assists in dealing with medical emergencies;\r\n- Communicates relevant information in a clear and effective way to patients and health providers;\r\n- Adheres with organizational policies and procedures;\r\n- Attends training and other professional development activities;\r\n- Performs other related tasks as assigned from time to time.\r\n\r\nJob Types: Full-time, Permanent\r\n\r\nSchedule:\r\n\r\nShift system', 'Qualifications:\r\n\r\n- Licensed Nurse\r\n- Critical Thinking and Problem Solving Skills\r\n- Computer Literate\r\n- Willing to start immediately\r\n- Fresh Graduates are welcome to apply\r\n\r\nEducation:\r\n\r\nBachelor\'s (Preferred)\r\n\r\nExperience:\r\n\r\nNursing: 1 year (Preferred)\r\n\r\nLanguage:\r\n\r\nEnglish (Preferred)', 'Purok Yakal, Tubtubon North, National Highway, Sibulan, Negros Oriental', '15000.00', '20000.00', 'Walk-in'),
(7, 6, 'Records Retrieval Specialist', 'Customer Service', 'Salary Package: Php 10,000 basic pay + 3,000 allowance + up to 10,000 performance incentives]\r\n\r\nWhy join Peak Outsourcing?\r\n\r\nCompetitive salary package, company bonuses, and performance incentives\r\nNight differential\r\nLoyalty, Christmas gift, Inclusion and diversity benefits\r\nPaid sick and vacation leaves\r\nExpanded maternity leave up to 105 days*\r\nMonthly engagement programs\r\nHMO coverage (medical and dental) upon regularization and Life and Accident Insurance upon day 1 of employment\r\nFlexible working arrangements for specific programs\r\nAccessible location\r\nHealthy and encouraging work environment\r\nCareer growth and promotion opportunities\r\n\r\nApply now!\r\n\r\nJob Type: Full-time\r\n\r\nBenefits:\r\n\r\nCompany Christmas gift\r\nFree parking\r\nHealth insurance\r\nOn-site parking\r\nPaid training\r\nPay raise\r\n\r\nSchedule:\r\n\r\n8 hour shift\r\nNight shift\r\n\r\nSupplemental pay types:\r\n\r\n13th month salary\r\nBonus pay\r\nOvertime pay\r\nPerformance bonus', 'Qualifications:\r\n\r\nMinimum of one year customer service experience\r\nComputer and data entry skills including Word, Excel, Internet\r\nWritten communication: proper writing and grammar skills a must and ability to type 35wpm\r\nExcellent telephone communication skills, oral and written\r\n\r\nAbility to commute/relocate:\r\n\r\nDumaguete City, Negros Oriental: Reliably commute or planning to relocate before starting work (Required)', '3F Jose Building, Dumaguete, 6200 Negros Oriental', '13000.00', '23000.00', 'Walk-in'),
(8, 7, 'Resident Manager (Dumaguete Based)', 'Manager', 'Full Job Description\r\nWelcome Home, to The Henry Resort Dumaguete!\r\n\r\nA sprawling 32-room boutique resort housed in 8 modern villas, The Henry Resort Dumaguete is a recreational lifestyle hub that is the perfect destination hotel when visiting Dumaguete.\r\n\r\nLocated along Flores Avenue, Bantayan, Dumaguete City, the hotel is 15 minutes away from Dumaguete Sibulan Airport and 10 minutes away from the port of Dumaguete.\r\n\r\nA message from Henry,\r\n\r\nHello there! I’ve been expecting you. My name is Henry and welcome home.\r\n\r\nThe Henry Resort Dumaguete is the newest lifestyle and destination haven in Negros Oriental. Here you can enjoy a brand-new leisure hub showcasing the best of Dumaguete. My home allows guests to explore and discover experiences unlike anywhere you’ve seen and is the perfect hideaway right within the city.\r\n\r\nIs this something you are interested to be part of? Apply now and be part of our growing team.\r\n\r\nJob Responsibility:\r\n\r\nProvide leadership and direction to the team\r\nManage the overall operations and finances of the hotel and its other businesses\r\nRecruit and train new hires on business practices\r\nDrive the performance development of its team members\r\nEnsure the quality of guest services is maintained at all times\r\nMaintain a good rapport and image with our guests, employees, owners, and shareholder\r\n\r\nJob Type: Full-time\r\n\r\nBenefits:\r\n\r\nOn-site parking\r\n\r\nSchedule:\r\n\r\nShift system\r\n\r\nSupplemental pay types:\r\n\r\n13th month salary', 'Job Qualifications:\r\n\r\n● Minimum of 5 years experience in the same capacity\r\n● Graduate of any relevant course\r\n● Management and customer service experience with strong administrative skills\r\n● Demonstrated ability to lead and direct a team\r\n● Comfortable working with budgets, payroll, revenue, and forecasting\r\n● Strong communication skills\r\n*This opportunity is open to local talents only.\r\n\r\nAbility to commute/relocate:\r\n\r\nDumaguete City, Negros Oriental: Reliably commute or planning to relocate before starting work (Required)', 'Flores Avenue, Bantayan, Dumaguete City, Philippines', '48000.00', '50000.00', 'Walk-in'),
(9, 6, 'Quality Assurance Analyst', 'Analyst', 'Why join Peak Outsourcing?\r\n\r\n● Competitive salary package, company bonuses, and performance incentives\r\n● Night differential\r\n● Loyalty, Christmas gift, Inclusion and diversity benefits\r\n● Paid sick and vacation leaves\r\n● Expanded maternity leave up to 105 days*\r\n● Monthly engagement programs\r\n● HMO coverage (medical and dental) upon regularization and Life and Accident Insurance upon day 1 of employment\r\n● Flexible working arrangements for specific programs\r\n● Accessible location\r\n● Healthy and encouraging work environment\r\n● Career growth and promotion opportunities\r\n*Terms and conditions apply\r\n\r\nApply now!\r\n\r\nJob Type: Full-time\r\n\r\nSchedule:\r\n\r\n8 hour shift\r\n\r\nSupplemental pay types:\r\n\r\n● 13th month salary\r\n● Bonus pay\r\n● Overtime pay\r\n● Performance bonus', 'Requirements:\r\n\r\n● At least 1-2 years experience as a Quality Assurance Analyst in a BPO setting\r\n● Has working knowledge of all matters related to Quality Assurance\r\n● QA in sales is preferred but not required\r\n● Willing to work onsite (Dumaguete) and can start ASAP\r\n\r\nAbility to commute/relocate:\r\n\r\nDumaguete City, Negros Oriental: Reliably commute or planning to relocate before starting work (Required)', '3F Jose Building, Dumaguete, 6200 Negros Oriental', '15000.00', '18000.00', 'N/A'),
(10, 8, 'Accounting Assistant', 'Accounting', 'Job Description\r\n\r\n● Prepares tax reports as required by Tax team\r\n● Request Payment Request Form (PRF) for invoices received from suppliers\r\n● Prepares Liquidation reports of revolving funds and ensures timely replenishments\r\n● Prepares weekly payroll computation\r\n● Prepares official receipts monitoring\r\n● Performs account reconciliations\r\n● Verifies cash out performed by the cashier\r\n● Attends to queries from suppliers\r\n● Assist in the preparation of monthly financial reports\r\n● Updates menu costing as needed\r\n● Does other duties as may be assigned from time to time\r\n\r\nJob Types: Full-time, Fresh graduate\r\n\r\nBenefits:\r\n\r\n● Paid training\r\n\r\nSchedule:\r\n\r\n● 8 hour shift\r\n● Day shift\r\n\r\nSupplemental pay types:\r\n\r\n● 13th month salary\r\n● Overtime pay', 'Ability to commute/relocate:\r\n\r\n● Dumaguete City: Reliably commute or planning to relocate before starting work (Required)\r\n\r\nEducation:\r\n\r\n● Bachelor\'s (Preferred)\r\n\r\nExperience:\r\n\r\n● Accounting Assistant: 1 year (Preferred)\r\n\r\nLanguage:\r\n\r\n● English (Preferred)\r\n\r\nLicense/Certification:\r\n\r\n● CPA (Preferred)', 'Negros Oriental, Sibulan, Philippines', '13000.00', '15000.00', 'N/A'),
(11, 4, 'Maintenance Staff', 'Technician', 'Responsibility:\r\n\r\n- Perform general maintenance and repairs for assigned equipment and facilities including electrical, plumbing, basic carpentry, housekeeping.\r\n\r\nEnjoy the ff. Perks and Benefits:\r\n\r\n- 15% Night Differential.\r\n\r\n- HMO Benefits after 30 days + Add Up to 2 Dependents.\r\n\r\n- Retirement Benefits.\r\n\r\n- 24 Leave Credits per year, Convertible to Cash.\r\n\r\n- Wholistic Employee Wellness Program.\r\n\r\nJob Type: Full-time\r\n\r\nBenefits:\r\n\r\nHealth insurance\r\nPaid training\r\n\r\nSchedule:\r\n\r\n8 hour shift\r\n\r\nSupplemental pay types:\r\n\r\n13th month salary', 'Qualifications:\r\n\r\n- At least Vocational Course/High School Graduate\r\n\r\n- Basic Electrical Background\r\n\r\n- Knowledgeable in Aircon (Check-up, Diagnose, Troubleshoot and Cleaning, etc.)\r\n\r\n- Needs Certificate from TESDA-REFRIGERATION AND AIR CONDITIONIING SERVICING (RAC)', 'Eros building, Dr V. Locsin Steet, Dumaguete City, Philippines', '14000.00', '15000.00', 'N/A'),
(12, 9, 'RESORT MANAGER', 'Manager', 'Company Profile\r\n\r\nAtlantis is a leader in the dive resort and liveaboard industry in Asia with an outstanding reputation (as is evident on trip advisor and other review sites). We have consistently set trends and standards for the last two decades and work tirelessly to provide the ultimate scuba diving vacations for our guests. “Arrive as a guest, leave as a friend”.\r\nThe Position\r\nThe position will be based at the Atlantis resort in Dumaguete/Puerto Galera. Overseeing the operation of all aspects of a busy dive resort and approximately 50, mostly local, staff that works there.\r\n\r\nCatering to largely international guests who visit for a week or more of scuba diving the role is \"hands-on\" and \"guest-focused\".\r\n\r\nHours are long but the rewards of guest feedback, working in a tropical climate as well as an enjoyable and challenging career make for a unique opportunity.\r\n\r\nReporting to the COO, Resort Managers also assist in formulating policy but more importantly find appropriate ways and means of making policy work.\r\n\r\nThe role is results-driven (there is a formal assessment process) and Resort Managers have to possess skill sets ranging from being able to get to the bottom of an erroneous stock report to entertaining a wide range of guests.\r\n\r\nLeadership skills, persistence, and the ability to make things work are likewise key attributes.\r\n\r\nA day at work can be as varied as dealing with complex medical evacuations, maintenance issues, staff training or even being on a diving day trip with prospective agents.\r\n\r\nBenefits\r\n\r\n● Long term career with stable market leader\r\n● Staff Incentive Scheme\r\n● Access to an extensive in-house training program\r\n● 14 days Annual Vacation Leave (following one year of service)\r\n● Convertible to Cash 5 days Sick Leave (following one year of service)\r\n● Annual Health Insurance allowance\r\n● Free meal program while at work\r\n● Access to a Staff Association that provides financial assistance to staff through loans with minimal interest\r\n● Discounts on all resort services\r\n● Diving and dive career development\r\n● Generous Tip Pool Scheme\r\n\r\nJob Types: Full-time, Permanent', 'Education\r\n\r\n● College Degree\r\n● Formal management development/training (please specify details)\r\n● Scuba diver or instructor\r\n\r\nExperience\r\n\r\n● At least 4 years management experience in hospitality or retail (clearly name companies, their websites, and your role/responsibilities/achievements)\r\n● Have travel or work experience in Asia (Philippines, Malaysia, Indonesia, Thailand, Vietnam, Cambodia)\r\n● Experience in using various hotel operations and reservations software\r\n\r\nKnowledge & Skills\r\n\r\n● Thorough understanding of hotel operations and guest service\r\n● Must possess a professional demeanor with the ability to resolve customer complaints and staff issues in a positive manner\r\n● Speak and write fluent English and additional languages (preferred)\r\n● Be highly self-motivated and be able to work alone\r\n● Exhibit leadership and people management skills\r\n● Excellent negotiating skills and creative selling abilities\r\n\r\n', '\r\nLipayo, Dauin, Negros Oriental, 6217', '30000.00', '60000.00', 'How to apply\r\n\r\nYour application must include:\r\n\r\nYour Resume\r\nRecent Photo\r\nSalary History and Expectation\r\nAt least two verifiable work reference email addresses and contact details');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_savedjob`
--

CREATE TABLE `tbl_savedjob` (
  `savedjob_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `job_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supportticket`
--

CREATE TABLE `tbl_supportticket` (
  `ticket_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `supporttickect_issuedescription` varchar(1000) NOT NULL,
  `supporttickect_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_contactnumber` varchar(100) NOT NULL,
  `user_sex` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_address`, `user_email`, `user_password`, `user_contactnumber`, `user_sex`) VALUES
(3, 'Danica Echica Dinaguit', 'Tinaogan Bindoy Neg. Or.', 'charness@gmail.com', 'asdfghjk', '09987654321', 'Male'),
(4, 'Rica Kana Casipong', 'Dumaguete City', 'casipong@gmail.com', '12345678', '09123456789', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userprofile`
--

CREATE TABLE `tbl_userprofile` (
  `userprofile_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `userprofile_bio` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userprofile`
--

INSERT INTO `tbl_userprofile` (`userprofile_id`, `user_id`, `userprofile_bio`) VALUES
(2, 3, 'I graduated senior high in DLANHS-SHS'),
(3, 4, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_adminprofile`
--
ALTER TABLE `tbl_adminprofile`
  ADD PRIMARY KEY (`adminprofile_id`);

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `tbl_savedjob`
--
ALTER TABLE `tbl_savedjob`
  ADD PRIMARY KEY (`savedjob_id`);

--
-- Indexes for table `tbl_supportticket`
--
ALTER TABLE `tbl_supportticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_userprofile`
--
ALTER TABLE `tbl_userprofile`
  ADD PRIMARY KEY (`userprofile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_adminprofile`
--
ALTER TABLE `tbl_adminprofile`
  MODIFY `adminprofile_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `application_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  MODIFY `job_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_savedjob`
--
ALTER TABLE `tbl_savedjob`
  MODIFY `savedjob_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supportticket`
--
ALTER TABLE `tbl_supportticket`
  MODIFY `ticket_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_userprofile`
--
ALTER TABLE `tbl_userprofile`
  MODIFY `userprofile_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
