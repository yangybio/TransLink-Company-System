
<html>
    <head>
        <title>Kelvin Li cs 304</title>
    </head>

    <body>
        <h2>CPSC 304 Project Experimental Demo Page (K.L.)</h2>

        <hr />

        <p>     Insertion Operation: Add a bus route & fee into the busFee database. (done: Nov 16)</p>
        <p>     Selection Operation: Select from the busFee or the vehicleOwns database. (done: Nov 18, bug removed)</p>
        <p>     Join Operation: Find the [vehicleID, BusRoutes, BusFee] information according to clauses you like (done: Nov 16)</p>
        <p>     Division Operation: Find drivers who have drive every vehicle (done: Nov 20)</p>

        <hr />

        <h3>Reset </h3>
        <p>If you wish to reset the table press on the reset button. If this is the first time you're running this page, you MUST use reset</p>
        <p>Reset button now configured to automatically build demoTable2, busRoutes, vehicleOwns and BusFee database with a few default tuples</p>

        <form method="POST" action="project-test-1.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>

        <hr />


        <h3>Insert Operation</h3>
        <p>You are allowed to insert a BusRoutes & Fee combination to busFee database </p>
        <form method="POST" action="project-test-1.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest2" name="insertQueryRequest2">
            Bus#: <input type="text" name="bus"> <br /><br />
            Fee: <input type="text" name="fee"> <br /><br />

            <input type="submit" value="Insert" name="insertSubmit2"></p>
        </form>

        <hr />

        <h3>Selection Operation</h3>
        <p>You are allowed to select from the following tables: </p>
        <p> - vehicleOwns(VehicleID, PurchasedDate, BranchID) </p>
        <p> - busFee(BusRoutes, BusFee) database</p>

        <form method="POST" action="project-test-1.php"> <!--refresh page when submitted-->
            <input type="hidden" id="selectQueryRequest" name="selectQueryRequest">
            [FROM] Table: <input type="text" name="table"> <br /><br />
            [SELECT] Column(s): <input type="text" name="column"> <br /><br />
            [WHERE] Condition 1: (if no condtion needed, you have to type "/"): <input type="text" name="where"> <br /><br />
            [WHERE] Condition 2: (if no condtion needed, you have to type "/"): <input type="text" name="where2"> <br /><br />

            <input type="submit" value="Execute Selection" name="selectSubmit"></p>
        </form>

        <hr />

        <h3>Join Operation</h3>
        <p>A JOIN operation is demonstrated below, you are allowed to enter your own [WHERE] clause(s)</p>
        <p> - busRoutes(vehicleID, BusRoutes) is joined with busFee(BusRoutes, BusFee)</p>
        <p> - you may find the [vehicleID, BusRoutes, BusFee] information according to clauses you like</p>
        <p> - e.g. Condition: VehicleID<>11003 </p>
        <p> - e.g. Condition: busFee=2 </p>


        <form method="POST" action="project-test-1.php"> <!--refresh page when submitted-->
            <input type="hidden" id="joinQueryRequest" name="joinQueryRequest">
            [WHERE] Condition 1: (if no condtion needed, you have to type "/"): <input type="text" name="where"> <br /><br />
            [WHERE] Condition 2: (if no condtion needed, you have to type "/"): <input type="text" name="where2"> <br /><br />
            <input type="submit" value="Execute" name="joinSubmit"></p>
        </form>

        <hr />

        <h3>Division</h3>
        <p>Find drivers who have drive every vehicle</p>


        <form method="POST" action="project-test-1.php"> <!--refresh page when submitted-->
            <input type="hidden" id="divQueryRequest" name="divQueryRequest">
            <input type="submit" value="Execute" name="divSubmit"></p>
        </form>

        <hr />
        <hr />



        <h3>Quick Display Section</h3>
        <h4>Display all current tupples in DemoTable2</h4>
        <form method="GET" action="project-test-1.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequest" name="displayTupleRequest">
            <input type="submit" value="Display" name="displayTuples"></p>
        </form>
        
        <h4>Display all current tupples in busRoutes</h4>
        <form method="GET" action="project-test-1.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequest2" name="displayTupleRequest2">
            <input type="submit" value="Display" name="displayTuples2"></p>
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
            echo "<br>Retrieved data from table demoTable2:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]" 
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

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
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

        function handleResetRequest() { // db: demoTable2,vehicleOwns,busFee 
            global $db_conn;

            // Drop old table
            executePlainSQL("DROP TABLE busRoutes");
            executePlainSQL("DROP TABLE vehicleOwns");
            executePlainSQL("DROP TABLE demoTable2"); // could be sbsititute for TranslinkCompany
            executePlainSQL("DROP TABLE busFee");
            executePlainSQL("DROP TABLE drive");

            // Create new tables
            executePlainSQL("CREATE TABLE demoTable2 (id int PRIMARY KEY, name char(30))");
            executePlainSQL(
                "CREATE TABLE vehicleOwns (VehicleID integer PRIMARY KEY, PurchasedDate date,
                BranchID integer NOT NULL,
                FOREIGN KEY (BranchID) REFERENCES demoTable2 ON DELETE CASCADE)");
            executePlainSQL("CREATE TABLE busRoutes (VehicleID integer PRIMARY KEY, BusRoutes int,
                FOREIGN KEY (VehicleID) REFERENCES vehicleOwns ON DELETE CASCADE)");
            executePlainSQL("CREATE TABLE busFee (BusRoutes int PRIMARY KEY, BusFee int DEFAULT 1)");
            executePlainSQL("CREATE TABLE drive (DriverID int, VehicleID int, PRIMARY KEY (DriverID, VehicleID))");


            // Echo all created & loaded tables in Oracle
            $result = executePlainSQL("SELECT table_name from user_tables"); 
            echo "<br> Showing all created tables in Oracle <br>";
            echo "<table>";
            echo "<tr><th>Table Name </th></tr>";
            plainEcho($result); //row-by-row echo

            //Insert demo tuples
            executePlainSQL("INSERT INTO demoTable2 VALUES (10,'BranchA')");
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
            executePlainSQL("INSERT INTO busFee VALUES (99, 3)");
            executePlainSQL("INSERT INTO busFee VALUES (14, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (4, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (49, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (33, 2)");
            executePlainSQL("INSERT INTO busFee VALUES (43, 3)");
            executePlainSQL("INSERT INTO drive VALUES (101, 201)");
            executePlainSQL("INSERT INTO drive VALUES (101, 202)");
            executePlainSQL("INSERT INTO drive VALUES (101, 203)");
            executePlainSQL("INSERT INTO drive VALUES (101, 204)");
            executePlainSQL("INSERT INTO drive VALUES (102, 201)");
            executePlainSQL("INSERT INTO drive VALUES (102, 202)");
            executePlainSQL("INSERT INTO drive VALUES (102, 203)");
            executePlainSQL("INSERT INTO drive VALUES (102, 204)");
            executePlainSQL("INSERT INTO drive VALUES (103, 202)");
            executePlainSQL("INSERT INTO drive VALUES (104, 202)");
            executePlainSQL("INSERT INTO drive VALUES (104, 204)");
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

        function handleDisplayRequest() { // Display demoTable2
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM demoTable2");

            printResult($result);
        }

        function handleDisplayRequest2() { // Display busRoutes
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM busRoutes");
            echo "<table>";
            echo "<tr><th>VehicleID </th><th>BusRoutes </th></tr>";
            $c = plainEcho($result);
            echo "<br>" . $c . " tuples in busRoutes database <br>";
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
        } else if (isset($_POST['insertSubmit2'])) {
            handlePOSTRequest();
        } else if (isset($_POST['selectSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['joinSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_POST['divSubmit'])) {
            handlePOSTRequest();
        }

        
        
		?>
	</body>
</html>

