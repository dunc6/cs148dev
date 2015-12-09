DROP TABLE IF EXISTS tblStudents;
CREATE TABLE IF NOT EXISTS tblStudents (
  pmkStudentId mediumint(8) unsigned NOT NULL PRIMARY KEY,
  fldFirstName varchar(255) DEFAULT NULL,
  fldLastName varchar(255) DEFAULT NULL,
  fldStreetAddress varchar(255) DEFAULT NULL,
  fldCity varchar(255) DEFAULT NULL,
  fldState varchar(50) DEFAULT NULL,
  fldZip varchar(10) DEFAULT NULL,
  fldGender char(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'tblStudents'
--

INSERT INTO tblStudents (pmkStudentId, fldFirstName, fldLastName, fldStreetAddress, fldCity, fldState, fldZip, fldGender) VALUES
(0001, 'Christopher', 'Chaney', 'P.O. Box 773, 8488 Eget St.', 'Mobile', 'AL', '35448', 'M'),
(0002, 'Josiah', 'Emerald', 'Ap #961-6567 Massa. St.', 'Chandler', 'AZ', '86413', 'M');