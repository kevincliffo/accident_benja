CREATE TABLE motorvehicles (
  Id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  AccidentUUID varchar(255) NOT NULL,
  MotorVehicleType varchar(255) NOT NULL,
  NumberPlate varchar(50) NOT NULL,
  Color varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;