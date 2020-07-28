CREATE TABLE settings (
	  SettingId int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	  SettingKey varchar(50) NOT NULL,
	  SettingName varchar(50) NOT NULL,
	  SettingValue varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
