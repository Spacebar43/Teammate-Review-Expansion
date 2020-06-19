<?php


  session_start();
  require "lib/constants.php";

  // if an id is not set for this session return to homepage
  if(!isset($_SESSION['faculty_id'])) {
    header("Location: ".SITE_HOME."index.php");
    exit();
  }

  error_reporting(-1); // reports all errors
  ini_set("display_errors", "1"); // shows all errors
  ini_set("log_errors", 1);

// When "Download Evals" Button is pressed, download the results
  if(isset($_POST['get_raw_evals'])){
    $table_header = array('Course ID','Survey ID','Submitter','Reviewee','Score1','Score2','Score3','Score4','Score5');

    require "lib/database.php";

    $conn = connectToDatabase();
    $sql = "SELECT * FROM readable_evals ORDER BY teammate_email";
    $result = $conn->query($sql);

    header('Content-Type: text/csv; charset=utf-8');
    header("Content-Disposition: attachment; filename=rawevals.csv");
    $output = fopen("php://output", "w");
    fputcsv($output, $table_header);

    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

        fputcsv($output, $row);
      }
    }
    fclose($output);
    $conn->close();
  }
?>
