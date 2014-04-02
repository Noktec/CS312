SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cs312`
--

---
--- Auto_increment, startID to avoid sql injection to check ID=1 for Admin
---

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Doctor_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Specialisation` varchar(50) NOT NULL,
  `Practice_ID` int(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Doctor_ID`),
  KEY `Practice_ID` (`Practice_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctors_has_patients`
--

CREATE TABLE `doctors_has_patients` (
  `doctors_Doctor_ID` int(10) NOT NULL,
  `patients_Patient_ID` int(7) NOT NULL,
  PRIMARY KEY (`doctors_Doctor_ID`,`patients_Patient_ID`),
  KEY `fk_doctors_has_patients_patients1_idx` (`patients_Patient_ID`),
  KEY `fk_doctors_has_patients_doctors1_idx` (`doctors_Doctor_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patient_ID` int(7) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `NINO` varchar(9) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `County` varchar(50) NOT NULL,
  `PostCode` varchar(6) NOT NULL,
  PRIMARY KEY (`Patient_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;


-- --------------------------------------------------------

--
-- Table structure for table `practices`
--

CREATE TABLE `practices` (
  `Practice_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Practicename` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Number` varchar(5) NOT NULL,
  `Postcode` varchar(8) NOT NULL,
  `City` varchar(25) NOT NULL,
  `County` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `OpeningHours` varchar(100) NOT NULL,
  PRIMARY KEY (`Practice_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`Practice_ID`) REFERENCES `practices` (`Practice_ID`);

--
-- Constraints for table `doctors_has_patients`
--
ALTER TABLE `doctors_has_patients`
  ADD CONSTRAINT `fk_doctors_has_patients_doctors1` FOREIGN KEY (`doctors_Doctor_ID`) REFERENCES `doctors` (`Doctor_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_doctors_has_patients_patients1` FOREIGN KEY (`patients_Patient_ID`) REFERENCES `patients` (`Patient_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
