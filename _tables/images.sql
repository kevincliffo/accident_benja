CREATE TABLE images (
  Id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  AccidentUUID varchar(255) NOT NULL,
  Name varchar(50) NOT NULL,
  Path varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
