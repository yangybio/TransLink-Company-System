CREATE TABLE vehicleOwns(
    VehicleID integer PRIMARY KEY,
    BranchID integer NOT NULL,
    PurchasedDate date,
    FOREIGN KEY(BranchID) REFERENCES TranslinkCompany
        ON DELETE CASCADE
        ON UPDATE CASCADE);
 
CREATE TABLE busRoutes (
    VehicleID integer PRIMARY KEY,
    BusRoutes integer,
    FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
        ON DELETE CASCADE
        ON UPDATE CASCADE);
 
CREATE TABLE busFee (
    BusRoutes integer PRIMARY KEY,
    BusFee integer DEFAULT 1);
 
CREATE TABLE skyTrainLine (
    VehicleID integer PRIMARY KEY,
    TrainLine integer,
    FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
        ON DELETE CASCADE
        ON UPDATE CASCADE);
 
CREATE TABLE skyTrainFee (
    TrainLine integer PRIMARY KEY,
    TrainFee integer DEFAULT 3);
 
CREATE TABLE drivers (
    DriverID integer PRIMARY KEY,
    Name char(25),
    BranchID integer NOT NULL,
    Salary integer DEFAULT 2000,
    FOREIGN KEY(BranchID) REFERENCES TranslinkCompany
        ON DELETE CASCADE
        ON UPDATE CASCADE);
 
CREATE TABLE drive (
    DriverID integer,
    VehicleID integer,
    PRIMARY KEY(DriverID, VehicleID),
    FOREIGN KEY(DriverID) REFERENCES drivers
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
        ON DELETE CASCADE
        ON UPDATE CASCADE);
CREATE TABLE TranslinkCompany(
	BranchID integer PRIMARY KEY,
	Address char(30));

CREATE TABLE TicketSell(
	BranchID integer NOT NULL,
	TicketID integer PRIMARY KEY,
	TransactionID integer PRIMARY KEY,
    FOREIGN KEY(BranchID) REFERENCES TranslinkCompany
        ON DELETE CASCADE
        ON UPDATE CASCADE);

CREATE TABLE Buy(
	TicketID integer PRIMARY KEY,
	TransactionID integer PRIMARY KEY,
	Date date,
	PassengerID integer PRIMARY KEY,
    FOREIGN KEY(TicketID, TransactionID) REFERENCES TicketSell
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(PassengerID) REFERENCES Passenger
        ON DELETE CASCADE
        ON UPDATE CASCADE);

CREATE TABLE PassengerTake(
	PassengerID integer PRIMARY KEY,
	Name char(10),
	TransactionID integer,
	Payment integer,
	VehicleID integer PRIMARY KEY,
    FOREIGN KEY(VehicleID) REFERENCES Vehicles
        ON DELETE CASCADE
        ON UPDATE CASCADE);
                 
CREATE TABLE BankAccount(
	AccountNumber integer PRIMARY KEY,
	Branch integer,
	Address char(40),
	PassengerID integer,
    FOREIGN KEY(Passenger) REFERENCES Passenger
        ON DELETE CASCADE
        ON UPDATE CASCADE);

CREATE TABLE compassCardIssueAndHold (
    TransactionID integer,
    CardID integer,
    Date date,
    BranchID integer NOT NULL,
    PassengerID integer,
    PRIMARY KEY(TransactionID, CardID),
    FOREIGN KEY(BranchID) REFERENCES TranslinkCompany
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(PassengerID) REFERENCES Passenger);

CREATE TABLE normalCard (
    TransactionID integer,
    CardID integer,
    Balance integer,
    PRIMARY KEY(TransactionID, CardID),
    FOREIGN KEY(TransactionID, CardID) REFERENCES compassCardIssueAndHold (TransactionID, CardID)
        ON DELETE CASCADE
        ON UPDATE CASCADE );

CREATE TABLE seniorCard (
    TransactionID integer,
    CardID integer,
    PRIMARY KEY(TransactionID, CardID),
    FOREIGN KEY(TransactionID, CardID) REFERENCES compassCardIssueAndHold (TransactionID, CardID)
        ON DELETE CASCADE
        ON UPDATE CASCADE );

CREATE TABLE loadMoney (
    AddedAmount integer,
    NormalCardID integer,
    AccountNumber integer,
    TransactionID integer,
    PRIMARY KEY(AccountNumber, NormalCardID, TransactionID),
    FOREIGN KEY(TransactionID, NormalCardID) REFERENCES normalCard (TransactionID, CardID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(AccountNumber) REFERENCES bankAccount
        ON DELETE CASCADE
        ON UPDATE CASCADE );
