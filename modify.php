<?php
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "~/php-error.log");
session_start();
require "lib/database.php";
$con = connectToDatabase();
if(isset($_POST["add"])){
  $review = $_POST['fname'];
  $team = $_POST['lname'];
  $si = $_POST['sname'];
  $sql = $con->prepare('INSERT INTO reviewers(survey_id,reviewer_email,teammate_email) values (?,?,?)' );
  $sql->bind_param('iss', $si, $review, $team);
  $sql->execute();
}

if(isset($_POST["re"])) {
  $review = $_POST['fname'];
  $team = $_POST['lname'];
  $si = $_POST['sname'];
  $sql = "DELETE FROM reviewers WHERE survey_id=".$si."AND reviewer_email=".$review."AND teammate_email='".$team."''";
  if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $con->error;
  }
}


?>
