select fldBuilding, count(*) as fldNumStudents from tblSections where fldDays like ('%F%') group by fldBuilding order by count(fldNumStudents) DESC;
