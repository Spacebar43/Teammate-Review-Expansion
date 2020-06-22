<!-- Demonstrate insertion into SQL database -->
<html>
<body>
Test 1
    <?php
        // show errors
        error_reporting(-1); // reports all errors
        ini_set("display_errors", "1"); // shows all errors
        ini_set("log_errors", 1);
        ini_set("error_log", "~/php-error.log");
    
        // login to sql
        $DATABASE_HOST = 'tethys.cse.buffalo.edu';
        $DATABASE_USER = 'trcerny';
        $DATABASE_PASS = 'password';
        $DATABASE_NAME = 'trcerny_db';
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
            if ( mysqli_connect_errno() ) {
                 // If there is an error with the connection, stop the script and display the error.
                 die ('Failed to connect to MySQL: ' . mysqli_connect_error());
            }
            echo 'connected!';
            //return $con;
        } 
        catch (Exception $e) {
            die ('Failed to connect to MySQL: ' . $e->getMessage());
        } echo '<br>';
        
        // insert an entry to table
        // set data to variables, must be passed by reference
        $var1 = 123456789; $var2 ='test@buffalo.edu'; $var3 ='test name';
        $ins1 = "INSERT INTO st_1 (id, email, name) VALUES (?,?,?)";
        $sql_ins = $con->prepare($ins1);
        $sql_ins->bind_param('iss',$var1,$var2,$var3);
        $sql_ins->execute();
        echo 'insertion 1 completed.';
    
?>
</body>
</html>
