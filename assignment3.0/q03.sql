select distinct fldCourseName, fldDays, fldStart, fldStop from tblCourses 
join tblSections on pmkCourseId = fnkCourseId join tblTeachers on pmkNetId = fnkTeacherNetId 
where fldFirstName = 'Jackie Lynn' and fldLastName = 'Horton' order by fldStart
