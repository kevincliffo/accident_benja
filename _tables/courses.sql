CREATE TABLE courses (
  CourseId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  CourseName varchar(50) NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
