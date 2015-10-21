select fldBuilding, count(*) as fldNumStudents from tblSections where fldDays like ('%W%') group by fldBuilding order by count(fldNumStudents) DESC
