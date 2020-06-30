<?php



error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "~/php-error.log");
session_start();
require "lib/database.php";
$con = connectToDatabase();


if(!isset($_SESSION['survey_id'])){
    // No survey ID detected.
    echo "<script type=\"text/javascript\">
    alert (\"You did not input a survey ID\");
    window.location = \"adminHome.php\"
    </script>";
}
try{
// TODO: Change "Import" to actual name of button handler.
    if(isset($_POST["Import"])){
        $filename=$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 2)
        {
            $file = fopen($filename, "r");
            while(($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                //TODO: Add error checking for invalid information in the csv. Generate a search query in parent tables student/id
                $sql = $con->prepare('INSERT INTO reviewers(survey_id,reviewer_email,teammate_email) values (?,?,?)' );
                $sql->bind_param('iss', $surveyID, $getData[0], $getData[1]);
                $sql->execute();
            }

            fclose($file);

            echo "<script type=\"text/javascript\">
            alert (\"CSV File Successfully Uploaded.\");
            window.location = \"adminHome.php\"
            </script>";

        } else{
            echo "<script type=\"text/javascript\">
                    alert (\"Invalid File: Please Upload Non-empty CSV File.\");
                    window.location = \"adminHome.php\"
                    </script>";
        }
    }
}catch(Exception $e){
    echo "<script type=\"text/javascript\">
    alert (\"CSV is formatted incorrectly or assigned students are not formally enrolled in database.\");
    window.location = \"adminHome.php\"
    </script>";
}

?>
