select distinct fldFirstName, fldPhone, fldSalary from tblTeachers
where fldSalary < (select AVG(fldSalary) from tblTeachers)
