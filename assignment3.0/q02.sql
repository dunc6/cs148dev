select distinct fldDays, fldStart, fldStop from tblSections join tblTeachers on pmkNetId = fnkTeacherNetId 
where fldFirstName = 'Robert Raymond' and fldLastName = 'Snapp' order by fldStart
