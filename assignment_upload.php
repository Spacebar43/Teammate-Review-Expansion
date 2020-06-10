<?php
session_start();
$surveyID = $_SESSION['surveyid'];
if(!isset($surveyID)){
    // No survey ID detected, put in an errorvalue.
    $_SESSION['surveyid'] = -1;
    $surveyID = $_SESSION['surveyid'];
}
// TODO: Change "Import" to actual name of button handler.
// TODO: Verify that the error should popup on admin.php.
    if(isset($_POST["Import"])){
        $filename=$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0)
        {
            $file = fopen($filename, "r");
            while(($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $sql = "INSERT into reviews (survey_id,reviewer_email,teammate_email) values
                ('".$surveyID."','".$getData[0]."','".$getData[1]."')";
                $result = mysqli_query($con, $sql);

                if(!isset($result))
                {
                    echo "<script type=\"text/javascript\">
                        alert (\"Invalid File: Please Upload CSV File.\");
                        window.location = \"admin.php\"
                        </script>";
                }
                else{
                    echo"<script type=\"text/javascript\">
                    alert (\"CSV File has been successfully Imported.\");
                    window.location = \"admin.php\"
                    </script>";
                }
            }

            fclose($file);
        }
    }

?>