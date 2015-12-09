DROP TABLE IF EXISTS tblSemesterPlanCourses;
CREATE TABLE IF NOT EXISTS tblSemesterPlanCourses (
pmkPlanId mediumint(8) NOT NULL,
fnkYear tinyint(4) NOT NULL, 
fnkTerm tinyint(4) NOT NULL, 
fnkCourseId int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT IGNORE INTO tblSemesterPlanCourses (pmkPlanId, , fnkSemesterId, fnkDepartment, fnkCourseNumber, fnkCourseId) VALUES 
(1234, 56, CS, 1, 123), 
(5678, 78, BIO, 2, 456);