<!-- Modiified from the demo project provided by instructor -->

<html>
    <head>
        <title>Kelvin Li, Jin Niu, Mina Yang cs 304</title>
    </head>

    <body>
        <h2>CPSC 304 Project Demo Page (K.L., J.N., M.Y.)</h2>

        <!-- <hr />

        <p>     Insertion Operation: Add a bus route & fee into the busFee database. (done: Nov 16)</p>
        <p>     Selection Operation: Select from the busFee or the vehicleOwns database. (done: Nov 18, bug removed)</p>
        <p>     Join Operation: Find the [vehicleID, BusRoutes, BusFee] information according to clauses you like (done: Nov 16)</p>
        <p>     Division Operation: Find drivers who have drive every vehicle (done: Nov 20)</p>

        <hr />
        <p>     Aggregation with Group by Operation: Find the TL company with min ID group by name. (done: Nov 22)</p>
        <p>     Delete Operation: Delete from vehicleOwns (done: Nov 23)</p>
        <p>     Projection Operation: project attributes from passengerTake (done: Nov 23)</p>
        <hr />
        <p>     Update Operation: (specific query to be decided) </p>
        <p>     Aggregation with Having: (specific query to be decided) </p>
        <p>     Nested Aggregation with Group By: (specific query to be decided)</p>
        <hr /> -->

        <h3>Reset </h3>
        <p>If you wish to reset the table press on the reset button. If this is the first time you're running this page, you MUST use reset</p>
        <!-- <p>Reset button now configured to automatically build translinkCompany, busRoutes, vehicleOwns, BusFee,
            ticketSellBuy, passengerTake database with a few default tuples</p> -->

        <form method="POST" action="project-test-3.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>

        
        <hr />
        <h3>By Kelvin:</h3>
        <hr />
        <h3>1. Insert Operation</h3>
        <p>You are allowed to insert a BusRoutes & Fee combination to the busFee table </p>
        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest2" name="insertQueryRequest2">
            Bus#: <input type="text" name="bus"> <br /><br />
            Fee: <input type="text" name="fee"> <br /><br />

            <input type="submit" value="Insert" name="insertSubmit2"></p>
        </form>

        <!-- <hr /> -->

        <h3>2. Selection Operation</h3>
        <p>You are allowed to select from the following tables: </p>
        <p> - vehicleOwns(VehicleID, PurchasedDate, BranchID) </p>
        <p> - busFee(BusRoutes, BusFee) database</p>

        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="selectQueryRequest" name="selectQueryRequest">
            [FROM] Table: <input type="text" name="table"> <br /><br />
            [SELECT] Column(s): <input type="text" name="column"> <br /><br />
            [WHERE] Condition 1: (if no condtion needed, you have to type "/"): <input type="text" name="where"> <br /><br />
            [WHERE] Condition 2: (if no condtion needed, you have to type "/"): <input type="text" name="where2"> <br /><br />

            <input type="submit" value="Execute Selection" name="selectSubmit"></p>
        </form>

        <!-- <hr /> -->

        <h3>3. Join Operation</h3>
        <p>A JOIN operation is demonstrated below, you are allowed to enter your own [WHERE] clause(s)</p>
        <p> - busRoutes(vehicleID, BusRoutes) is joined with busFee(BusRoutes, BusFee)</p>
        <p> - you may find the [vehicleID, BusRoutes, BusFee] information according to clauses you like</p>
        <p> - e.g. Condition: VehicleID<>11003 </p>
        <p> - e.g. Condition: busFee=2 </p>


        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="joinQueryRequest" name="joinQueryRequest">
            [WHERE] Condition 1: (if no condtion needed, you have to type "/"): <input type="text" name="where"> <br /><br />
            [WHERE] Condition 2: (if no condtion needed, you have to type "/"): <input type="text" name="where2"> <br /><br />
            <input type="submit" value="Execute" name="joinSubmit"></p>
        </form>

        <!-- <hr /> -->

        <h3>4. Division</h3>
        <p>Find drivers who have drive every vehicle (from the table drive)</p>


        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="divQueryRequest" name="divQueryRequest">
            <input type="submit" value="Execute" name="divSubmit"></p>
        </form>

        
        <hr />
        <h3>By Jin:</h3>
        <hr />

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>5. Deletion</h3>
        <p>You are allowed to delete a vehicle from the vehicleOwns(VehicleID, PurchasedDate, BranchID) database, use the VehicleID</p>
        <p>e.g. vehicle = 11001, 11002, 11003, 11004, 11005, 11006, 11007, 11008</p>
        <p>The ON-DELETE-CASCADE will affect the busRoutes table and many others</p>

        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="delQueryRequest" name="delQueryRequest">
            VehicleID: <input type="text" name="VehicleID"> <br /><br />

            <input type="submit" value="Delete" name="delSubmit"></p>
        </form>

        <!-- <hr /> -->

        <h3>6. Projection Operation</h3>
        <p>chose some of the attributes from passengerTake(PassengerID, Name, TransactionID, Payment, VehicleID) table</p>
        <p>please input any attribute names into the boxes form 1 to 4 and leave the rest empty if not wanted</p>

        

        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="proQueryRequest" name="proQueryRequest">
            attribute1: <input type="text" name="attribute1"> <br /><br />
            attribute2: <input type="text" name="attribute2"> <br /><br />
            attribute3: <input type="text" name="attribute3"> <br /><br />
            attribute4: <input type="text" name="attribute4"> <br /><br />

            <input type="submit" value="Projection" name="proSubmit"></p>
        </form>

        <!-- <hr /> -->

        <h3>7. Aggregation with Group By</h3>
        <p>Find the smallest BranchID from translinkCompany(BranchID, Name), while grouping by their Name</p>

        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="aggQueryRequest" name="aggQueryRequest">
            <input type="submit" value="Execute" name="aggSubmit"></p>
        </form>

        
        <hr />
        <h3>By Mina:</h3>
        <hr />
        <!-- // Mina ------------------------------------------------->
        <h3>8. Update Operation</h3>
        <p>You are allowed to update the Balance according to a combination of TransactionID and CardID in the NormalCard database </p>

        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            TransactionID: <input type="text" name="transactionid"> <br /><br />
            CardID: <input type="text" name="cardid"> <br /><br />
            Balance: <input type="text" name="balance"> <br /><br />
            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <!-- <hr /> -->

        <h3>9. Aggregation with Having</h3>
        <p>Display the passengerID & BranchID from the compassCardIssueAndHold(TransactionID, CardID, IssueDate, BranchID, PassengerID) table;</p>
        <p> while grouping by BranchID & PassengerID and having BranchID greater than 10</p>

        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="havingQueryRequest" name="havingQueryRequest">
            <input type="submit" value="Execute" name="havingSubmit"></p>
        </form>

        <!-- <hr /> -->

        <h3>10. Nested Aggregation with Grouping By</h3>
        <p>Find the accountNumber which has the smallest normalCardID per addedAmount from the LoadMoney(AddedAmount, NormalCardID, AccountNumber, TransactionID) table</p>
        
        <form method="POST" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="nestedGroupQueryRequest" name="nestedGroupQueryRequest">
            <input type="submit" value="Execute" name="nestedGroupSubmit"></p>
        </form>

        <hr />
        <hr />
        <!-- <hr /> -->



        <h3>Quick Display Section</h3>
        <h5>Display all current tupples in translinkCompany</h4>
        <form method="GET" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequest" name="displayTupleRequest">
            <input type="submit" value="Display" name="displayTuples"></p>
        </form>

        <h5>Display all current tupples in busRoutes</h4>
        <form method="GET" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequest2" name="displayTupleRequest2">
            <input type="submit" value="Display" name="displayTuples2"></p>
        </form>

        <h5>Display all current tupples in busFee</h4>
        <form method="GET" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequest3" name="displayTupleRequest3">
            <input type="submit" value="Display" name="displayTuples3"></p>
        </form>

        <h5>Display all current tupples in ticketSellBuy</h4>
        <form method="GET" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequestTTicket" name="displayTupleRequestTTicket">
            <input type="submit" value="Display" name="displayTuplesTicket"></p>
        </form>

        <h5>Display all current tupples in compassCardIssueAndHold</h4>
        <form method="GET" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequestM1" name="displayTupleRequestM1">
            <input type="submit" value="Display" name="displayTuplesM1"></p>
        </form>
        
        <h5>Display all current tupples in normalCard</h4>
        <form method="GET" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequestM2" name="displayTupleRequestM2">
            <input type="submit" value="Display" name="displayTuplesM2"></p>
        </form>

        <h5>Display all current tupples in loadMoney</h4>
        <form method="GET" action="project-test-3.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequestM3" name="displayTupleRequestM3">
            <input type="submit" value="Display" name="displayTuplesM3"></p>
        </form>

        <hr />
        <hr />
        <h3>Display Area</h3>




<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->









        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        // COMMON FUNCTIONS STARTS --------------------


        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table translinkCompany:<br>";
            echo "<table>";
            echo "<tr><th>BranchID </th><th>Name </th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["BranchID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

        function plainEcho($result) { // plain row-by-row echo
            $c = 0;
            // echo "<table>";
            while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) { // option: OCI_ASSOC, OCI_NUM, OCI_BOTH
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" ;
                    echo $value;
                    echo "</td>" ;
                }
                echo "</tr>";
                $c = ++$c;
            }
            echo "</table>";
            return $c;
        }

        function connectToDB() {
            global $db_conn;

            //$db_conn = OCILogon("ora_niujin19", "a73491458", "dbhost.students.cs.ubc.ca:1522/stu");
            $db_conn = OCILogon("ora_keweili9", "a82433020", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        // COMMON FUNCTIONS ENDS --------------------

        function handleResetRequest() { // db: translinkCompany,vehicleOwns,busFee
            global $db_conn;

            // Drop old table
            executePlainSQL("DROP TABLE drive");
            executePlainSQL("DROP TABLE busFee");
            executePlainSQL("DROP TABLE skyTrainFee");
            executePlainSQL("DROP TABLE ticketSellBuy");
            
            executePlainSQL("DROP TABLE branchAddress");
            
            executePlainSQL("DROP TABLE busRoutes");
            executePlainSQL("DROP TABLE skyTrainLine");
            
            executePlainSQL("DROP TABLE drivers");
            

            executePlainSQL("DROP TABLE loadMoney");
            executePlainSQL("DROP TABLE seniorCard");
            executePlainSQL("DROP TABLE normalCard");
            executePlainSQL("DROP TABLE compassCardIssueAndHold");
            executePlainSQL("DROP TABLE passengerAccount");
            executePlainSQL("DROP TABLE passengerTake");
            executePlainSQL("DROP TABLE vehicleOwns");
            executePlainSQL("DROP TABLE translinkCompany"); 

            // Create new tables
            executePlainSQL("CREATE TABLE translinkCompany(
                BranchID int PRIMARY KEY, 
                name char(30))");

            executePlainSQL("CREATE TABLE vehicleOwns(
                VehicleID integer PRIMARY KEY, 
                PurchasedDate date,
                BranchID integer NOT NULL,
                FOREIGN KEY (BranchID) REFERENCES translinkCompany ON DELETE CASCADE)");

            executePlainSQL("CREATE TABLE busRoutes(
                VehicleID integer PRIMARY KEY, 
                BusRoutes int,
                FOREIGN KEY (VehicleID) REFERENCES vehicleOwns ON DELETE CASCADE)");

            executePlainSQL("CREATE TABLE busFee(
                BusRoutes int PRIMARY KEY, 
                BusFee int DEFAULT 1)");

            executePlainSQL("CREATE TABLE skyTrainLine (
                VehicleID integer PRIMARY KEY,
                TrainLine integer,
                FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
                ON DELETE CASCADE)");

            executePlainSQL("CREATE TABLE skyTrainFee (
                TrainLine integer PRIMARY KEY,
                TrainFee integer DEFAULT 3)");

            executePlainSQL("CREATE TABLE drivers (
                DriverID integer PRIMARY KEY,
                Name char(25),
                BranchID integer NOT NULL,
                Salary integer DEFAULT 2000,
                FOREIGN KEY(BranchID) REFERENCES translinkCompany
                ON DELETE CASCADE)");
            
            executePlainSQL("CREATE TABLE drive(
                DriverID integer,
                VehicleID integer,
                PRIMARY KEY(DriverID, VehicleID),
                FOREIGN KEY(DriverID) REFERENCES drivers
                ON DELETE CASCADE,
                FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
                ON DELETE CASCADE)");
            
            // ---------

            executePlainSQL("CREATE TABLE passengerTake(
                PassengerID integer PRIMARY KEY,
                Name char(10),
                TransactionID integer,
                Payment integer,
                VehicleID integer,
                FOREIGN KEY(VehicleID) REFERENCES vehicleOwns
                ON DELETE CASCADE)");

            executePlainSQL("CREATE TABLE ticketSellBuy(
                BranchID integer NOT NULL,
                TicketID integer,
                TransactionID integer,
                PassengerID integer NOT NULL,
                PRIMARY KEY(TicketID, TransactionID),
                FOREIGN KEY(BranchID) REFERENCES translinkCompany
                ON DELETE CASCADE,
                FOREIGN KEY(PassengerID) REFERENCES passengerTake
                ON DELETE CASCADE)");

            executePlainSQL("CREATE TABLE passengerAccount (
                AccountNumber integer PRIMARY KEY,
                Branch integer,
                PassengerID integer NOT NULL,
                FOREIGN KEY(PassengerID) REFERENCES passengerTake
                ON DELETE CASCADE)");

            executePlainSQL("CREATE TABLE branchAddress (
                Branch integer PRIMARY KEY,
                Address char(40))");
            // ---------- mina

            executePlainSQL(
                "CREATE TABLE compassCardIssueAndHold (TransactionID integer, CardID integer, IssueDate date,
                BranchID integer NOT NULL, PassengerID integer NOT NULL,
                PRIMARY KEY(TransactionID, CardID),
                FOREIGN KEY (BranchID) REFERENCES translinkCompany ON DELETE CASCADE,
                FOREIGN KEY (PassengerID) REFERENCES passengerTake ON DELETE CASCADE)");
                
            executePlainSQL(
                "CREATE TABLE normalCard (TransactionID integer, CardID integer, 
                Balance integer,
                PRIMARY KEY(TransactionID, CardID),
                FOREIGN KEY (TransactionID, CardID) REFERENCES compassCardIssueAndHold (TransactionID, CardID) ON DELETE CASCADE)");

            executePlainSQL(
                "CREATE TABLE seniorCard (TransactionID integer, CardID integer,
                PRIMARY KEY(TransactionID, CardID),
                FOREIGN KEY (TransactionID, CardID) REFERENCES compassCardIssueAndHold (TransactionID, CardID) ON DELETE CASCADE)");

            executePlainSQL(
                "CREATE TABLE loadMoney (AddedAmount integer, NormalCardID integer, 
                AccountNumber integer,
                TransactionID integer,
                PRIMARY KEY(AccountNumber, AddedAmount, NormalCardID),
                FOREIGN KEY (NormalCardID, TransactionID) REFERENCES normalCard (CardID, TransactionID) ON DELETE CASCADE,
                FOREIGN KEY (AccountNumber) REFERENCES passengerAccount ON DELETE CASCADE)"); 
            // Created new tables



            // Echo all created & loaded tables in Oracle
            $result = executePlainSQL("SELECT table_name from user_tables"); 
            echo "<br> Showing all created tables in Oracle <br>";
            echo "<table>";
            echo "<tr><th>Table Name </th></tr>";
            $c = plainEcho($result); //row-by-row echo
            echo "<br>" . $c . " tables now exist in Oracle <br>";

            //Insert demo tuples
            executePlainSQL("INSERT INTO translinkCompany VALUES (10,'StandardBranch')");
            executePlainSQL("INSERT INTO translinkCompany VALUES (13,'StandardBranch')");
            executePlainSQL("INSERT INTO translinkCompany VALUES (14,'StandardBranch')");
            executePlainSQL("INSERT INTO translinkCompany VALUES (15,'StandardBranch')");
            executePlainSQL("INSERT INTO translinkCompany VALUES (16,'StandardBranch')");
            executePlainSQL("INSERT INTO translinkCompany VALUES (7,'MiniBranch')");
            executePlainSQL("INSERT INTO translinkCompany VALUES (25,'MiniBranch')");
            executePlainSQL("INSERT INTO translinkCompany VALUES (30,'MiniBranch')");
            executePlainSQL("INSERT INTO vehicleOwns VALUES (11001, '01-OCT-13', 10)");
            executePlainSQL("INSERT INTO vehicleOwns VALUES (11002, '09-JAN-14', 10)");
            executePlainSQL("INSERT INTO vehicleOwns VALUES (11003, '10-MAY-15', 10)");
            executePlainSQL("INSERT INTO vehicleOwns VALUES (11004, '18-JUN-16', 10)");
            executePlainSQL("INSERT INTO vehicleOwns VALUES (11005, '09-FEB-17', 10)");
            executePlainSQL("INSERT INTO vehicleOwns VALUES (11006, '10-FEB-17', 10)");
            executePlainSQL("INSERT INTO vehicleOwns VALUES (11007, '11-FEB-17', 10)");
            executePlainSQL("INSERT INTO vehicleOwns VALUES (11008, '12-FEB-17', 10)");
            executePlainSQL("INSERT INTO busRoutes VALUES (11001, 99)");
            executePlainSQL("INSERT INTO busRoutes VALUES (11002, 14)");
            executePlainSQL("INSERT INTO busRoutes VALUES (11003, 4)");
            executePlainSQL("INSERT INTO busRoutes VALUES (11004, 49)");
            executePlainSQL("INSERT INTO skyTrainLine VALUES (11007, 1)");
            executePlainSQL("INSERT INTO skyTrainLine VALUES (11008, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (99, 3)");
            executePlainSQL("INSERT INTO busFee VALUES (14, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (4, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (49, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (33, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (43, 3)");
            executePlainSQL("INSERT INTO skyTrainFee VALUES (1, 3)");
            executePlainSQL("INSERT INTO skyTrainFee VALUES (2, 3)");
            executePlainSQL("INSERT INTO drivers VALUES (101, 'Charlie', 10, 2000)");
            executePlainSQL("INSERT INTO drivers VALUES (102, 'Branson', 10, 2000)");
            executePlainSQL("INSERT INTO drivers VALUES (103, 'Albus', 13, 2000)");
            executePlainSQL("INSERT INTO drivers VALUES (104, 'Ruby', 15, 2000)");
            executePlainSQL("INSERT INTO drive VALUES (101, 11001)");
            executePlainSQL("INSERT INTO drive VALUES (101, 11002)");
            executePlainSQL("INSERT INTO drive VALUES (101, 11003)");
            executePlainSQL("INSERT INTO drive VALUES (101, 11004)");
            executePlainSQL("INSERT INTO drive VALUES (102, 11001)");
            executePlainSQL("INSERT INTO drive VALUES (102, 11002)");
            executePlainSQL("INSERT INTO drive VALUES (102, 11003)");
            executePlainSQL("INSERT INTO drive VALUES (102, 11004)");
            executePlainSQL("INSERT INTO drive VALUES (103, 11002)");
            executePlainSQL("INSERT INTO drive VALUES (104, 11002)");
            executePlainSQL("INSERT INTO drive VALUES (104, 11004)");

            executePlainSQL("INSERT INTO passengerTake VALUES (1, 'Alex', 1000, 3, 11001)");
            executePlainSQL("INSERT INTO passengerTake VALUES (2, 'Ben', 1001, 2, 11002)");
            executePlainSQL("INSERT INTO passengerTake VALUES (3, 'Chris', 1002, 2, 11003)");
            executePlainSQL("INSERT INTO ticketSellBuy VALUES (10, 1000, 1000,1)");
            executePlainSQL("INSERT INTO ticketSellBuy VALUES (13, 1001, 1001,2)");
            executePlainSQL("INSERT INTO ticketSellBuy VALUES (10, 1002, 1002,3)");
            executePlainSQL("INSERT INTO ticketSellBuy VALUES (13, 1003, 1003,3)");
            executePlainSQL("INSERT INTO ticketSellBuy VALUES (10, 1004, 1004,3)");
            executePlainSQL("INSERT INTO ticketSellBuy VALUES (7, 1005, 1005,3)");
            executePlainSQL("INSERT INTO ticketSellBuy VALUES (25, 1006, 1006,3)");
            executePlainSQL("INSERT INTO passengerAccount VALUES (1, 10, 1)");
            executePlainSQL("INSERT INTO passengerAccount VALUES (2, 11, 2)");
            executePlainSQL("INSERT INTO passengerAccount VALUES (3, 12, 3)");
            executePlainSQL("INSERT INTO branchAddress VALUES (1, '1000 A Blvd')");
            executePlainSQL("INSERT INTO branchAddress VALUES (2, '2000 B Blvd')");
            executePlainSQL("INSERT INTO branchAddress VALUES (3, '3000 C Blvd')");

            //Mina
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3124, 4325, '21-OCT-21', 10, 1)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3125, 4236, '21-OCT-26', 10, 1)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3126, 4147, '21-OCT-31', 10, 1)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3127, 4058, '21-NOV-05', 13, 2)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3128, 3969, '21-NOV-10', 13, 2)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3129, 3880, '21-NOV-15', 13, 2)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3130, 3791, '21-NOV-20', 7, 2)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3131, 3702, '21-NOV-25', 7, 2)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3132, 3613, '21-NOV-30', 25, 3)");
            executePlainSQL("INSERT INTO compassCardIssueAndHold VALUES (3133, 3524, '21-DEC-05', 25, 3)");
            executePlainSQL("INSERT INTO normalCard VALUES (3124, 4325, 50)");
            executePlainSQL("INSERT INTO normalCard VALUES (3125, 4236, 45)");
            executePlainSQL("INSERT INTO normalCard VALUES (3126, 4147, 25)");
            executePlainSQL("INSERT INTO normalCard VALUES (3127, 4058, 105)");
            executePlainSQL("INSERT INTO normalCard VALUES (3128, 3969, 85)");
            executePlainSQL("INSERT INTO seniorCard VALUES (3129, 3880)");
            executePlainSQL("INSERT INTO seniorCard VALUES (3130, 3791)");
            executePlainSQL("INSERT INTO seniorCard VALUES (3131, 3702)");
            executePlainSQL("INSERT INTO seniorCard VALUES (3132, 3613)");
            executePlainSQL("INSERT INTO seniorCard VALUES (3133, 3524)");
            executePlainSQL("INSERT INTO loadMoney VALUES (50, 4325, 1, 3124)");
            executePlainSQL("INSERT INTO loadMoney VALUES (15, 4236, 1, 3125)");
            executePlainSQL("INSERT INTO loadMoney VALUES (25, 4147, 2, 3126)");
            executePlainSQL("INSERT INTO loadMoney VALUES (15, 4058, 2, 3127)");
            executePlainSQL("INSERT INTO loadMoney VALUES (15, 3969, 3, 3128)");
            OCICommit($db_conn);
        }

        function handleInsertRequest2() { // bus & fee into busFee
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['bus'],
                ":bind2" => $_POST['fee']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into busFee values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        function handleSelectRequest() { // handle select
            global $db_conn;

            $table = $_POST['table'];
            $column = $_POST['column'];
            $where = $_POST['where'];
            $where2 = $_POST['where2'];

            if ($where == "/") { // where1=null, then no condition at all
                $result = executePlainSQL("SELECT $column FROM $table");
              } elseif ($where2 == "/"){ // where1 != null, where2 = null, only condition1
                $result = executePlainSQL("SELECT $column FROM $table WHERE $where");
              } else { // both are not null, both conditions exec
                $result = executePlainSQL("SELECT $column FROM $table WHERE $where AND $where2");
              }


            if ($table == "vehicleOwns") {
                $temp = '';
                if (stripos($column, "VehicleID")!==false){
                    $temp .= "<th>VehicleID </th>";
                }
                if (stripos($column, "PurchasedDate")!==false){
                    $temp .= "<th>PurchasedDate </th>";
                }
                if (stripos($column, "BranchID")!==false){
                    $temp .= "<th>BranchID </th>";
                }
                if (stripos($column, "*")!==false){
                    $temp .= "<th>VehicleID </th><th>PurchasedDate </th><th>BranchID </th>";
                }
                echo "<table>";
                echo "<tr>" . $temp . "</tr>";
              } elseif ($table == "busFee") {
                $temp = '';
                if (stripos($column, "BusRoutes")!==false){
                    $temp .= "<th>BusRoutes </th>";
                }
                if (stripos($column, "BusFee")!==false){
                    $temp .= "<th>BusFee </th>";
                }
                if (stripos($column, "*")!==false){
                    $temp .= "<th>BusRoutes </th><th>BusFee </th>";
                }
                echo "<table>";
                echo "<tr>" . $temp . "</tr>";
              } else {
                echo "This table may not supported, echo may not perfect";
                echo "<table>";
              }
            $c = plainEcho($result);
            echo "<br>" . $c . " tuples selected from table: " . $table . "<br>";
            OCICommit($db_conn);
        }

        function handleJoinRequest() { // handle select
            global $db_conn;

            $where = $_POST['where'];
            $where2 = $_POST['where2'];

            if ($where == "/") { // where1=null, then no condition at all
                $result = executePlainSQL("SELECT * FROM busRoutes, busFee WHERE busRoutes.BusRoutes=busFee.BusRoutes");
              } elseif ($where2 == "/"){ // where1 != null, where2 = null, only condition1
                $result = executePlainSQL("SELECT * FROM busRoutes, busFee WHERE busRoutes.BusRoutes=busFee.BusRoutes AND $where");
              } else { // both are not null, both conditions exec
                $result = executePlainSQL("SELECT * FROM busRoutes, busFee WHERE busRoutes.BusRoutes=busFee.BusRoutes AND $where AND $where2");
              }


            echo "<table>";
            echo "<tr><th>VehicleID </th><th>BusRoutes </th><th>BusFee </th></tr>";

            $c = plainEcho($result);
            echo "<br>" . $c . " tuples selected from table: busRoutes & busFee<br>";
            OCICommit($db_conn);
        }

        function handleDivRequest() { // handle select
            global $db_conn;

            $result = executePlainSQL("SELECT DISTINCT d1.DriverID FROM drive d1 WHERE NOT EXISTS(
                (SELECT VehicleID FROM drive) 
                MINUS 
                (SELECT d2.VehicleID FROM drive d2 WHERE d1.DriverID=d2.DriverID))");

            echo "<table>";
            echo "<tr><th>DriverID </th></tr>";

            $c = plainEcho($result);
            echo "<br>" . $c . " tuples selected from table: drive<br>";
            OCICommit($db_conn);
        }
// -----------------------------------------------------------------------------------------------------------------------------------------
        function handleAggRequest() { // handle Aggregation with Group By ( find the min)
            global $db_conn;

            $result = executePlainSQL("SELECT MIN (BranchID), name FROM translinkCompany GROUP BY name");

            echo "<table>";
            echo "<tr><th>BranchID </th><th>BranchName </th></tr>";

            $c = plainEcho($result);
            echo "<br>" . $c . " tuples selected from table: translinkcompany<br>";
            OCICommit($db_conn);
        }

        function handleDelRequest() { // delete from vehicleOwns
            global $db_conn;

            //Getting the values from user and insert data into the table
            $name = $_POST['VehicleID'];

            executePlainSQL("delete from vehicleOwns WHERE VehicleID = $name");
            $result = executePlainSQL("SELECT * From vehicleOwns");
            echo "<table>";
            echo "<tr><th>VehicleID </th><th>PurchasedDate </th><th>BranchID </th></tr>";

            plainEcho($result);

            OCICommit($db_conn);
        }

        function handleProRequest() { // Projection on passengerTake
            global $db_conn;

            //Getting the values from user and insert data into the table
            $a1 = $_POST['attribute1'];
            $a2 = $_POST['attribute2'];
            $a3 = $_POST['attribute3'];
            $a4 = $_POST['attribute4'];

            echo "<table>";
            if ($a2 == ""){
                $result = executePlainSQL("SELECT $a1 from passengerTake");
                echo "<tr><th>$a1 </th></tr>";
            } elseif ($a3 == "") {
                $result = executePlainSQL("SELECT $a1,$a2 from passengerTake");
                echo "<tr><th>$a1 </th><th>$a2 </th></tr>";
            } elseif ($a4 == "") {
                $result = executePlainSQL("SELECT $a1, $a2, $a3 from passengerTake");
                echo "<tr><th>$a1 </th><th>$a2 </th><th>$a3 </th></tr>";
            } else {
                $result = executePlainSQL("SELECT $a1, $a2, $a3, $a4 from passengerTake");
                echo "<tr><th>$a1 </th><th>$a2 </th><th>$a3 </th><th>$a4 </th></tr>";

            }
            plainEcho($result);


            OCICommit($db_conn);
        }
        // -------------------------------------------------------------------------------------------
        // Mina
        function handleUpdateRequest() { // handle update
            global $db_conn;

            //Getting the values from user and update data in the table

            $tID= $_POST['transactionid'];
            $cID= $_POST['cardid'];
            $balance= $_POST['balance'];

            executePlainSQL("UPDATE normalCard SET balance = $balance WHERE transactionID = $tID AND cardID = $cID");
            $result = executePlainSQL("SELECT * From normalCard WHERE transactionID = $tID AND cardID = $cID");
            echo "<table>";
            echo "<tr><th>TransactionID</th><th>CardID</th><th>Balance</th></tr>";

            $c = plainEcho($result);
            echo "<br>" . $c . " tuples selected from table: normalCard<br>";
            OCICommit($db_conn);
        }

        function handleHavingRequest() { // handle aggregation with having
            global $db_conn;
             
            // Find the passenger ID group by BranchID having Branch ID bigger than 10
            $result = executePlainSQL("SELECT branchID, passengerID FROM compassCardIssueAndHold GROUP BY branchID, passengerID HAVING branchID>10");

            echo "<table>";
            echo "<tr><th>BranchID </th><th>PassengerID </th></tr>";

            $c = plainEcho($result);
            echo "<br>" . $c . " tuples selected from table: compassCardIssueAndHold<br>";
            OCICommit($db_conn);
        }

        function handleNestedGroupRequest() { // handle nested aggregation with group by
            global $db_conn;

            // Find the accountNumber which have the samllest normal card ID per addedAmount
            $result = executePlainSQL("SELECT accountNumber, addedAmount FROM LoadMoney WHERE normalCardID in ( SELECT MIN(normalCardID) FROM LoadMoney GROUP BY addedAmount)");

            echo "<table>";
            echo "<tr><th>AccountNumber </th><th>AddedAmount</th></tr>";

            $c = plainEcho($result);
            echo "<br>" . $c . " tuples selected from table: LoadMoney<br>";
            OCICommit($db_conn);
        }





        function handleDisplayRequest() { // Display translinkCompany
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM translinkCompany");

            echo "<table>";
            echo "<tr><th>BranchID </th><th>Name </th></tr>";
            $c = plainEcho($result);
        }

        function handleDisplayRequest2() { // Display busRoutes
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM busRoutes");
            echo "<table>";
            echo "<tr><th>VehicleID </th><th>BusRoutes </th></tr>";
            $c = plainEcho($result);
            echo "<br>" . $c . " tuples in busRoutes database <br>";
        }

        function handleDisplayRequest3() { // Display busFee
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM busFee");
            echo "<table>";
            echo "<tr><th>BusRoutes </th><th>BusFee </th></tr>";
            $c = plainEcho($result);
            echo "<br>" . $c . " tuples in BusFee database <br>";
        }

        function handleDisplayRequestT() { // Display tickets
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM ticketSellBuy");
            echo "<table>";
            echo "<tr><th>BranchID </th><th>ticketID </th><th>transactionID </th><th>passengerID </th></tr>";
            $c = plainEcho($result);
            echo "<br>" . $c . " tuples in ticketSellBuy database <br>";
        }

        function handleDisplayRequestM1() { // Display compassCardIssueAndHold
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM compassCardIssueAndHold");
            echo "<table>";
            echo "<tr><th>TransactionID </th><th>CardID </th><th>IssueDate </th><th>BranchID </th><th>PassengerID </th></tr>";
            $c = plainEcho($result);
            echo "<br>" . $c . " tuples in compassCardIssueAndHold database <br>";
        }

        function handleDisplayRequestM2() { // Display normalCard
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM normalCard");
            echo "<table>";
            echo "<tr><th>TransactionID </th><th>CardID </th><th>Balance</th></tr>";
            $c = plainEcho($result);
            echo "<br>" . $c . " tuples in normalCard database <br>";
        }

        function handleDisplayRequestM3() { // Display loadMoney
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM loadMoney");
            echo "<table>";
            echo "<tr><th>AddedAmount</th><th>NormalCardID </th><th>AccountNumber</th><th>TransactionID </th></tr>";
            $c = plainEcho($result);
            echo "<br>" . $c . " tuples in loadMoney database <br>";
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('insertQueryRequest2', $_POST)) {
                    handleInsertRequest2();
                } else if (array_key_exists('selectQueryRequest', $_POST)) {
                    handleSelectRequest();
                } else if (array_key_exists('joinQueryRequest', $_POST)) {
                    handleJoinRequest();
                } else if (array_key_exists('divQueryRequest', $_POST)) {
                    handleDivRequest();
                } else if (array_key_exists('aggQueryRequest', $_POST)){
                    handleAggRequest();
                } else if (array_key_exists('delQueryRequest', $_POST)){
                    handleDelRequest();
                } else if (array_key_exists('proQueryRequest', $_POST)){
                    handleProRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {  // Mina
                    handleUpdateRequest();
                } else if (array_key_exists('havingQueryRequest', $_POST)) {
                    handleHavingRequest();
                } else if (array_key_exists('nestedGroupQueryRequest', $_POST)) {
                    handleNestedGroupRequest();
                }


                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('displayTuples', $_GET)) {
                    handleDisplayRequest();
                } else if (array_key_exists('displayTuples2', $_GET)) {
                    handleDisplayRequest2();
                } else if (array_key_exists('displayTuples3', $_GET)) {
                    handleDisplayRequest3();
                } else if (array_key_exists('displayTuplesTicket', $_GET)) {
                    handleDisplayRequestT();
                } else if (array_key_exists('displayTuplesM1', $_GET)) {
                    handleDisplayRequestM1();
                } else if (array_key_exists('displayTuplesM2', $_GET)) {
                    handleDisplayRequestM2();
                } else if (array_key_exists('displayTuplesM3', $_GET)) {
                    handleDisplayRequestM3();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['displayTupleRequest'])) {
            handleGETRequest();
        } else if (isset($_GET['displayTupleRequest2'])) {
            handleGETRequest();
        } else if (isset($_GET['displayTupleRequest3'])) {
            handleGETRequest();
        } else if (isset($_GET['displayTupleRequestM1'])) {
            handleGETRequest();
        } else if (isset($_GET['displayTupleRequestM2'])) {
            handleGETRequest();
        } else if (isset($_GET['displayTupleRequestM3'])) {
            handleGETRequest();
        } else if (isset($_GET['displayTupleRequestTTicket'])) {
            handleGETRequest();
        } else if (isset($_POST['insertSubmit2'])) {
            handlePOSTRequest();
        } else if (isset($_POST['selectSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['joinSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['divSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['aggSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['delSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['proSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['updateSubmit'])) {  // Mina
            handlePOSTRequest();
        } else if (isset($_POST['havingSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['nestedGroupSubmit'])) {
            handlePOSTRequest();
        }



        ?>
	</body>
</html>

