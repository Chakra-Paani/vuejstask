-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 11:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuejstask`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `name`) VALUES
(1, 'Sport'),
(2, 'Science&Technology'),
(3, 'Arts'),
(4, 'Politics');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `cid` text NOT NULL,
  `level` int(5) NOT NULL,
  `qtitle` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `cid`, `level`, `qtitle`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, '1', 1, 'Nationality Of Sachin Tendulkar', 'Australia', 'India', 'England', 'Srilanka', 'option2'),
(2, '1', 1, 'Nationality Of Dhoni', 'Australia', 'India', 'England', 'Srilanka', 'option2'),
(3, '1', 2, 'Which only cricketer who has scored 100 centuries in ODI in the cricket world', 'Ricky Ponting', 'Kumar Sangakkara', 'Sachin Tendulkar', 'Virat Kohli', 'option3'),
(4, '1', 2, 'Who made 100 runs in 22 balls?', 'Ricky Ponting', 'Kumar Sangakkara', 'Sachin Tendulkar', 'Bradman', 'option4'),
(5, '1', 3, 'Who won the first ever Cricket World Cup in 1975?', 'Australia', 'England', 'India', 'West Indies', 'option4'),
(6, '1', 3, 'What is the largest cricket stadium in the world?', 'Eden Gardens', 'Melbourne Cricket Club', 'Lords', 'Narendra Modi Stadium', 'option4'),
(8, '1', 1, 'National Sports Day (NSD) is celebrated on which date in India?', 'August 28', 'August 29', 'August 26', 'August 27', 'option2'),
(9, '1', 1, 'Who among the following is the First Indian Women to get an Olympic Medal?', 'Anju Bobby George', 'Karnam Malleshwari', 'P T Usha', 'Nameirakpam Kunjarani', 'option2'),
(10, '1', 2, 'For which of the following games / sports the term Ring is not used for ground/ space?', 'Boxing', 'Gymnastics', 'Ice Hockey', 'Baseball', 'option4'),
(11, '1', 3, 'On which among the following courts, Chennai Open is played ?', 'Clay court', 'Grass Court', 'Hard Court', 'Carpet Court', 'option3'),
(12, '2', 1, 'What is the full form of ADFOSC?', 'Aries-Devasthal Faint Object Spectrograph & Camera', 'Aries-Devasthal Faint Object Scanning Camera', 'Aries-Devasthal Faded Object Scanning Camera', 'None of the above', 'option1'),
(13, '2', 1, 'Researchers of which Indian institution have developed touch-sensitive, tactile, haptic watch for assisting visually impaired people?', 'IIT Madras', 'IIT Kanpur', 'IIM Ahmedabad', 'JNTU', 'option2'),
(14, '2', 1, 'Which is the second largest part of the body in human beings?', 'Skin', 'Liver', 'Lungs', 'Brain', 'option2'),
(15, '2', 1, 'What is the name given to small models of human organs that contain multiple cell types that behave similarly to the human body?', 'Body models', 'Tissue Chips', 'Cell Models', 'Tissue Genes', 'option2'),
(16, '2', 2, 'Lumpy skin disease (LSD), which causes prolonged morbidity in cattle and buffaloes, is a â€¦â€¦â€¦â€¦ disease.', 'Bacterial', 'Fungal', 'Viral', 'None of the above', 'option3'),
(17, '2', 2, 'IIT Roparâ€™s new mobile cremation system works on the principle of â€¦â€¦..?', 'Induction stove', 'Wick stove', 'Electric coil stove', 'None of the above', 'option2'),
(18, '2', 2, 'ISRO has joined hands with which company to provide a national level mapping portal and geospatial services?', 'MapmyIndia', 'Propmodo', 'Here Technologies', 'Crunchbase', 'option1'),
(19, '2', 3, 'What is the secret code written in the parachute of the NASAâ€™s Perseverance rover?', 'Hello Red Planet', 'Perseverance', 'Dare Mighty Things', 'Journey to Mars', 'option3'),
(21, '2', 3, 'What is the name of Indiaâ€™s first earth observation satellite which is to be placed in a Geosynchronous Transfer Orbit?', 'RISAT 11', 'GISAT 1', 'GSAT 7', 'INSAT 11', 'option2'),
(22, '2', 3, 'What is the name of the condition in which the human body is deprived of adequate oxygen supply at the tissue level?', 'Myoxia', 'Hypoxia', 'Hyperoxia', 'Typoxia', 'option2'),
(23, '3', 1, 'Which of these is a paint made from pigments and plastic?', 'Acrylic', 'Gesso', 'Acetone', 'Tempera', 'option1'),
(24, '3', 1, 'Early photographers made their images on which of these materials?', 'Glass', 'Stone', 'Paper', 'Plastic', 'option1'),
(25, '3', 1, 'What does the Venus of Brassempouy represent?', 'a womanâ€™s head', 'an angel', 'a human figure', 'an old man', 'option1'),
(26, '3', 1, 'What animal often symbolizes peace in art?', 'Dog', 'Duck', 'Deer', 'Dove', 'option4'),
(27, '3', 2, 'What was the subject of the earliest known paintings?', 'Animals', 'Landscapes', 'Sports', 'Flowers', 'option1'),
(28, '3', 2, 'Which one of these is not a well-known Indian sculptor?', 'Ramkinkar Baij', 'Henry Moore', 'Kumaradeva', 'Krishna Reddy', 'option2'),
(29, '3', 2, 'What did I.M. Pei design outside the Louvre, in Paris?', 'Sarcophagus', 'Obelisk', 'Ziggurat', 'Pyramid', 'option4'),
(30, '3', 3, 'To which artistic movement does Paul Gauguinâ€™s The Yellow Christ belong?', 'Impressionism', 'Bauhaus', 'Cloisonnism', 'Fauvism', 'option3'),
(31, '3', 3, 'What Dutch artist is famous for his strange geometrical puzzles?', 'M.C. Escher', 'Pieter Breughel', 'Vincent Van Gogh', 'Jan Van Eyk', 'option1'),
(32, '3', 3, 'Which of these artists is famous for using human paintbrushes?', 'Paul Cezanne', 'Yves Klein', 'Giorgio Vasari', 'Jackson Pollock', 'option2'),
(33, '4', 1, 'The members of the Rajya Sabha are elected by', 'the people', 'Lok Sabha', 'elected members of the legislative assembly', 'elected members of the legislative council', 'option3'),
(34, '4', 1, 'The members of the panchayat are', 'nominated by the district officer', 'the electorates of the respective territorial constituencies', 'nominated by local self-government minister of the state', 'nominated by the block development organization', 'option2'),
(35, '4', 1, 'The power to decide an election petition is vested in the', 'Parliament', 'Supreme Court', 'High courts', 'Election Commission', 'option3'),
(36, '4', 1, 'The present Lok Sabha is the', '14th Lok Sabha', '15th Lok Sabha', '16th Lok Sabha', '17th Lok Sabha', 'option4'),
(38, '4', 2, 'The Parliament of India cannot be regarded as a sovereign body because', 'it can legislate only on subjects entrusted to the Centre by the Constitution', 'it has to operate within the limits prescribed by the Constitution', 'the Supreme Court can declare laws passed by parliament as unconstitutional if they contravene the provisions of the Constitution', 'All of the above', 'option4'),
(39, '4', 2, 'The name of the Laccadive, Minicoy and Amindivi islands was changed to Lakshadweep by an Act of Parliament in', '1970', '1971', '1972', '1973', 'option4'),
(40, '4', 2, 'The Parliament of India can make use of the residuary powers', 'at all times', 'only during national emergency', 'during national emergency as well as constitutional emergency as well in a state', 'None of the above', 'option1'),
(41, '4', 3, 'The members of Lok Sabha hold office for a term of', '4 years', '5 years', '6 years', '3 years', 'option2'),
(42, '4', 3, 'The Parliament exercises control over council of ministers, the real executive, in several ways. Which one of the following has been wrongly listed as a method of control over executive?', 'Questions', 'Supplementary questions', 'Adjournment motions', 'None of the above', 'option4'),
(43, '4', 3, 'The number of writs that can be prayed for and issued by the Supreme Court and/or a High Court is', '3', '4', '5', '6', 'option3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
