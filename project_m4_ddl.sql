DROP TABLE drive;
DROP TABLE busFee;
DROP TABLE skyTrainFee;
DROP TABLE ticketSellBuy;
DROP TABLE branchAddress;
DROP TABLE busRoutes;
DROP TABLE skyTrainLine;
DROP TABLE drivers;
DROP TABLE loadMoney;
DROP TABLE seniorCard;
DROP TABLE normalCard;
DROP TABLE compassCardIssueAndHold;
DROP TABLE passengerAccount;
DROP TABLE passengerTake;
DROP TABLE vehicleOwns;
DROP TABLE translinkCompany; 

CREATE TABLE translinkCompany(
	BranchID int PRIMARY KEY, 
	name char(30));

CREATE TABLE vehicleOwns(
	VehicleID integer PRIMARY KEY, 
	PurchasedDate date,
	BranchID integer NOT NULL,
	FOREIGN KEY (BranchID) REFERENCES translinkCompany ON DELETE CASCADE);

CREATE TABLE busRoutes(
	VehicleID integer PRIMARY KEY, 
	BusRoutes int,
	FOREIGN KEY (VehicleID) REFERENCES vehicleOwns ON DELETE CASCADE);

CREATE TABLE busFee(
	BusRoutes int PRIMARY KEY, 
	BusFee int DEFAULT 1);

CREATE TABLE skyTrainLine (
	VehicleID integer PRIMARY KEY,
	TrainLine integer,
	FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
	ON DELETE CASCADE);

CREATE TABLE skyTrainFee (
	TrainLine integer PRIMARY KEY,
	TrainFee integer DEFAULT 3);

CREATE TABLE drivers (
	DriverID integer PRIMARY KEY,
	Name char(25),
	BranchID integer NOT NULL,
	Salary integer DEFAULT 2000,
	FOREIGN KEY(BranchID) REFERENCES translinkCompany
	ON DELETE CASCADE);

CREATE TABLE drive(
	DriverID integer,
	VehicleID integer,
	PRIMARY KEY(DriverID, VehicleID),
	FOREIGN KEY(DriverID) REFERENCES drivers
	ON DELETE CASCADE,
	FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
	ON DELETE CASCADE);

CREATE TABLE passengerTake(
	PassengerID integer PRIMARY KEY,
	Name char(10),
	TransactionID integer,
	Payment integer,
	VehicleID integer,
	FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
	ON DELETE CASCADE);

CREATE TABLE ticketSellBuy(
	BranchID integer NOT NULL,
	TicketID integer,
	TransactionID integer,
	PassengerID integer NOT NULL,
	PRIMARY KEY(TicketID, TransactionID),
	FOREIGN KEY(BranchID) REFERENCES translinkCompany
	ON DELETE CASCADE,
	FOREIGN KEY(PassengerID) REFERENCES passengerTake
	ON DELETE CASCADE);

CREATE TABLE passengerAccount (
	AccountNumber integer PRIMARY KEY,
	Branch integer,
	PassengerID integer NOT NULL,
	FOREIGN KEY(PassengerID) REFERENCES passengerTake
	ON DELETE CASCADE);

CREATE TABLE branchAddress (
	Branch integer PRIMARY KEY,
	Address char(40));

CREATE TABLE compassCardIssueAndHold (TransactionID integer, CardID integer, IssueDate date,
	BranchID integer NOT NULL, PassengerID integer NOT NULL,
	PRIMARY KEY(TransactionID, CardID),
	FOREIGN KEY (BranchID) REFERENCES translinkCompany ON DELETE CASCADE,
	FOREIGN KEY (PassengerID) REFERENCES passengerTake ON DELETE CASCADE);
	
CREATE TABLE normalCard (TransactionID integer, CardID integer, 
	Balance integer,
	PRIMARY KEY(TransactionID, CardID),
	FOREIGN KEY (TransactionID, CardID) REFERENCES compassCardIssueAndHold (TransactionID, CardID) ON DELETE CASCADE);

CREATE TABLE seniorCard (TransactionID integer, CardID integer,
	PRIMARY KEY(TransactionID, CardID),
	FOREIGN KEY (TransactionID, CardID) REFERENCES compassCardIssueAndHold (TransactionID, CardID) ON DELETE CASCADE);

CREATE TABLE loadMoney (AddedAmount integer, NormalCardID integer, 
	AccountNumber integer,
	TransactionID integer,
	PRIMARY KEY(AccountNumber, AddedAmount, NormalCardID),
	FOREIGN KEY (NormalCardID, TransactionID) REFERENCES normalCard (CardID, TransactionID) ON DELETE CASCADE,
	FOREIGN KEY (AccountNumber) REFERENCES passengerAccount ON DELETE CASCADE); 

INSERT INTO translinkCompany VALUES (10,'StandardBranch');
INSERT INTO translinkCompany VALUES (13,'StandardBranch');
INSERT INTO translinkCompany VALUES (14,'StandardBranch');
INSERT INTO translinkCompany VALUES (15,'StandardBranch');
INSERT INTO translinkCompany VALUES (16,'StandardBranch');
INSERT INTO translinkCompany VALUES (7,'MiniBranch');
INSERT INTO translinkCompany VALUES (25,'MiniBranch');
INSERT INTO translinkCompany VALUES (30,'MiniBranch');
INSERT INTO vehicleOwns VALUES (11001, '01-OCT-13', 10);
INSERT INTO vehicleOwns VALUES (11002, '09-JAN-14', 10);
INSERT INTO vehicleOwns VALUES (11003, '10-MAY-15', 10);
INSERT INTO vehicleOwns VALUES (11004, '18-JUN-16', 10);
INSERT INTO vehicleOwns VALUES (11005, '09-FEB-17', 10);
INSERT INTO vehicleOwns VALUES (11006, '10-FEB-17', 10);
INSERT INTO vehicleOwns VALUES (11007, '11-FEB-17', 10);
INSERT INTO vehicleOwns VALUES (11008, '12-FEB-17', 10);
INSERT INTO busRoutes VALUES (11001, 99);
INSERT INTO busRoutes VALUES (11002, 14);
INSERT INTO busRoutes VALUES (11003, 4);
INSERT INTO busRoutes VALUES (11004, 49);
INSERT INTO skyTrainLine VALUES (11007, 1);
INSERT INTO skyTrainLine VALUES (11008, 2);
INSERT INTO busFee VALUES (99, 3);
INSERT INTO busFee VALUES (14, 2);
INSERT INTO busFee VALUES (4, 2);
INSERT INTO busFee VALUES (49, 2);
INSERT INTO busFee VALUES (33, 2);
INSERT INTO busFee VALUES (43, 3);
INSERT INTO skyTrainFee VALUES (1, 3);
INSERT INTO skyTrainFee VALUES (2, 3);
INSERT INTO drivers VALUES (101, 'Charlie', 10, 2000);
INSERT INTO drivers VALUES (102, 'Branson', 10, 2000);
INSERT INTO drivers VALUES (103, 'Albus', 13, 2000);
INSERT INTO drivers VALUES (104, 'Ruby', 15, 2000);
INSERT INTO drive VALUES (101, 11001);
INSERT INTO drive VALUES (101, 11002);
INSERT INTO drive VALUES (101, 11003);
INSERT INTO drive VALUES (101, 11004);
INSERT INTO drive VALUES (102, 11001);
INSERT INTO drive VALUES (102, 11002);
INSERT INTO drive VALUES (102, 11003);
INSERT INTO drive VALUES (102, 11004);
INSERT INTO drive VALUES (103, 11002);
INSERT INTO drive VALUES (104, 11002);
INSERT INTO drive VALUES (104, 11004);
INSERT INTO passengerTake VALUES (1, 'Alex', 1000, 3, 11001);
INSERT INTO passengerTake VALUES (2, 'Ben', 1001, 2, 11002);
INSERT INTO passengerTake VALUES (3, 'Chris', 1002, 2, 11003);
INSERT INTO ticketSellBuy VALUES (10, 1000, 1000,1);
INSERT INTO ticketSellBuy VALUES (13, 1001, 1001,2);
INSERT INTO ticketSellBuy VALUES (10, 1002, 1002,3);
INSERT INTO ticketSellBuy VALUES (13, 1003, 1003,3);
INSERT INTO ticketSellBuy VALUES (10, 1004, 1004,3);
INSERT INTO ticketSellBuy VALUES (7, 1005, 1005,3);
INSERT INTO ticketSellBuy VALUES (25, 1006, 1006,3);
INSERT INTO passengerAccount VALUES (1, 10, 1);
INSERT INTO passengerAccount VALUES (2, 11, 2);
INSERT INTO passengerAccount VALUES (3, 12, 3);
INSERT INTO branchAddress VALUES (1, '1000 A Blvd');
INSERT INTO branchAddress VALUES (2, '2000 B Blvd');
INSERT INTO branchAddress VALUES (3, '3000 C Blvd');
INSERT INTO compassCardIssueAndHold VALUES (3124, 4325, '21-OCT-21', 10, 1);
INSERT INTO compassCardIssueAndHold VALUES (3125, 4236, '21-OCT-26', 10, 1);
INSERT INTO compassCardIssueAndHold VALUES (3126, 4147, '21-OCT-31', 10, 1);
INSERT INTO compassCardIssueAndHold VALUES (3127, 4058, '21-NOV-05', 13, 2);
INSERT INTO compassCardIssueAndHold VALUES (3128, 3969, '21-NOV-10', 13, 2);
INSERT INTO compassCardIssueAndHold VALUES (3129, 3880, '21-NOV-15', 13, 2);
INSERT INTO compassCardIssueAndHold VALUES (3130, 3791, '21-NOV-20', 7, 2);
INSERT INTO compassCardIssueAndHold VALUES (3131, 3702, '21-NOV-25', 7, 2);
INSERT INTO compassCardIssueAndHold VALUES (3132, 3613, '21-NOV-30', 25, 3);
INSERT INTO compassCardIssueAndHold VALUES (3133, 3524, '21-DEC-05', 25, 3);
INSERT INTO normalCard VALUES (3124, 4325, 50);
INSERT INTO normalCard VALUES (3125, 4236, 45);
INSERT INTO normalCard VALUES (3126, 4147, 25);
INSERT INTO normalCard VALUES (3127, 4058, 105);
INSERT INTO normalCard VALUES (3128, 3969, 85);
INSERT INTO seniorCard VALUES (3129, 3880);
INSERT INTO seniorCard VALUES (3130, 3791);
INSERT INTO seniorCard VALUES (3131, 3702);
INSERT INTO seniorCard VALUES (3132, 3613);
INSERT INTO seniorCard VALUES (3133, 3524);
INSERT INTO loadMoney VALUES (50, 4325, 1, 3124);
INSERT INTO loadMoney VALUES (15, 4236, 1, 3125);
INSERT INTO loadMoney VALUES (25, 4147, 2, 3126);
INSERT INTO loadMoney VALUES (15, 4058, 2, 3127);
INSERT INTO loadMoney VALUES (15, 3969, 3, 3128);
