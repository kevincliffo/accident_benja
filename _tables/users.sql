CREATE TABLE users (
  UserId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  UserType varchar(50) NOT NULL,
  Email varchar(50) NOT NULL,
  Password varchar(256) NOT NULL,
  MobileNo varchar(50) NOT NULL,
  LastLogin datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CreatedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
