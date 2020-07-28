CREATE TABLE subscription (
  SubscriptionId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  UserId int(11) NOT NULL,
  Amount double(10,2) NOT NULL,
  Year int(4) NOT NULL,
  Month int(2) NOT NULL,
  PaymentDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
