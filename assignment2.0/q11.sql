select fnkCourseId from tblSections group by fnkCourseId having count(fnkCourseId) >=  50
