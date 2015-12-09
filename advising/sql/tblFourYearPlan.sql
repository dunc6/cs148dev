DROP TABLE IF EXISTS tblFourYearPlan;
CREATE TABLE IF NOT EXISTS tblFourYearPlan (
pmkPlanId mediumint(8) unsigned NOT NULL PRIMARY KEY,
fnkStudentId mediumint(8) unsigned NOT NULL PRIMARY KEY,
fnkAdvisorId mediumint(8) unsigned NOT NULL PRIMARY KEY,
fldMajor varchar(255) DEFAULT NULL,
fldMinor varchar(255) DEFAULT NULL,
fldCatalogYear tinyint(4) DEFAULT NULL,
fldDateCreated varchar(255) DEFAULT NULL,
fldCredits tinyint(3) NOT NULL DEFAULT '3'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'tblStudents'
--

INSERT INTO tblFourYearPlan (pmkPlanId, fldStudentId, fldAdvisorId, fldMajor, fldMinor, fldCatalogYear, fldDateCreated, fldCredits) VALUES
(1, 'Cchaney', '01aseidl', 'CS', 'BIO', 1, '10/30/15', 3),
(2, 'Jemerald', '01jpresc', 'CS', 'BIO', 2, '10/30/15', 3);
