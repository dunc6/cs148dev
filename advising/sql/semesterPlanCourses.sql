DROP TABLE IF EXISTS tblSemesterPlanCourses;
CREATE TABLE IF NOT EXISTS tblSemesterPlanCourses (
fnkPlanId mediumint(8) NOT NULL, 
fnkYear tinyint(4) NOT NULL,
fnkTerm tinyint(4) NOT NULL, 
fnkCourseId int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT IGNORE INTO tblSemesterPlanCourses (fnkPlanId, fnkYear, fnkTerm, fnkCourseId) VALUES 
(1234, 2013, 1, 123), 
(5678, 2014, 2, 456);