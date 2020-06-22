<!-- Demonstrate insertion into SQL database -->
<html>
<body>
    
    <form method='post'>
        Manually input entry:<br>
        id: <input type='number' name='id'><br>
        email: <input type='text' name='email'><br>
        name: <input type='text' name='name'><br>
        <input type='submit' name='manual' value='Insert'/>
    </form>
    <form method='post'enctype='multipart/form-data'>
        Input via .csv upload:<br>
        <input type='file' name='csv' accept='.csv'>
        <button type='submit' name='import'>Import</button>
    <form>
    <br>
    --- 
    <br>
    <?php
        // show errors
        error_reporting(-1); // reports all errors
        ini_set("display_errors", "1"); // shows all errors
        ini_set("log_errors", 1);
        ini_set("error_log", "~/php-error.log");

        echo 'Backend info: '.'<br>';
    
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
            echo 'Connected to database trcerny_db.'.'<br>';
            //return $con;
        } 
        catch (Exception $e) {
            die ('Failed to connect to MySQL: ' . $e->getMessage());
        } echo '<br>';

        // insert new entry to table st_1 in database trcerny_db
        // when button is pressed
        if(array_key_exists('manual',$_POST)) {
            // get form data
            $id = $_POST['id'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            // first, prepare a statement to recieve references
            $sql_ins = $con->prepare("INSERT INTO st_1 (id, email, name) VALUES (?,?,?)");
            // bind the parameters with above references. First parameter is types
            $sql_ins->bind_param('iss', $id, $email, $name);
            // executes SQL
            $sql_ins->execute();
            echo 'inserted new entry to st_1:'.'<br>'.'id: '.$id.'<br>';
            echo 'email: '.$email.'<br>'.'name: '.$name.'<br>';
        }

        // insert entries from a .csv file
        // when button is pressed
        if(array_key_exists('import', $_POST)) {
            echo '<pre>'.file_get_contents($_FILES['csv']['tmp_name']).'</pre>'.'<br>';
            //TODO parse contents into import statement
            $csv = fopen($_FILES['csv']['tmp_name'], 'r');
            // loop through every row of file
            while ($row = fgetcsv($csv)) {
                // get each member of row
                $name = $row[0]; $email = $row[1]; $id=0; //dummy id
                // compare each incoming entry with database
                $sql_get = $con->prepare('SELECT email from st_1 WHERE email=?');
                $sql_get-> bind_param('s', $email);
                $sql_get-> execute();
                $sql_get-> bind_result($flag);// idk what $flag does
                $sql_get-> store_result();
                $sql_get-> fetch();
                if ($sql_get-> num_rows != 0) {
                    // email is already in database, don't add
                    echo $name.' is already in database.'.'<br>';
                }
                else {
                    // prepare SQL statement, bind parameters and execute
                    $sql_ins = $con->prepare("INSERT INTO st_1 (id, email, name) VALUES (?,?,?)"); 
                    $sql_ins-> bind_param('iss', $id, $email, $name);
                    $sql_ins-> execute();
                    echo $name.' was added to the system.'.'<br>';
                }
            }
            echo '<br>'.'Updates completed.';
        }
    ?>
</body>
</html>
