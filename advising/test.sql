select * from tblFourYearPlan 
join tblSemesterPlan on pmkPlanId = fnkPlanId
join tblSemesterPlanCourses on pmkPlanId = fnkPlanId and pmkYear = fnkYear and pmkTerm = fnkTerm
join tblCourses 
join 
