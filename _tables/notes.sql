CREATE TABLE notes (
  NoteId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name varchar(50) NOT NULL,
  UnitName varchar(50),
  CourseName varchar(50),
  CreatedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
