CREATE TABLE accidents (
  Id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  UUID varchar(255) NOT NULL,
  ReportedBy varchar(100),
  County varchar(50) NOT NULL,
  SubCounty varchar(50) NOT NULL,
  Location varchar(50) NOT NULL,
  AccidentType varchar(50) NOT NULL,
  AccidentDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
