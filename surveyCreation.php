<!DOCTYPE HTML>
<html>
<title>Create New Survey</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>
<style>
/*
.grid-container {
  display: grid;
  grid-column-start: 1;
  grid-column-end: 3;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}*/
hr {
    clear: both;
    visibility: hidden;
}
</style>

<!-- Header -->
<header id="header" class="w3-container w3-center w3-theme w3-padding">
    <div id="headerContentName"><font color="black"><h1>Create New Survey</h1></font></div>
</header>
<div>
  <form class="w3-container w3-card-4 w3-light-blue"
        method="post"
        name="frmCSVImport" id="frmCSVImport"
        enctype="multipart/form-data">

        <input type='button'
               onclick="window.location.href = 'adminHome.php'"
               class="w3-center w3-button w3-theme-dark"
               value="Return Home"/></input>
  </form>
</div>
<hr>


<div id="createSurveyForm" class="w3-row-padding w3-center w3-padding">
  <form  id="newSurvey" class="w3-container w3-card-4 w3-light-blue" method='post'>
    <div id="courseNumber" class="w3-section">
        <h3>Enter the Course Number</h3>
      <input maxlength="3" placeholder="341" name ='courseNumberEntryText' id="courseNumberEntryText" class="w3-input w3-light-grey" type="text" pattern="[0-9][0-9][0-9]$" required>
      <hr>
      <h3>Enter the Rubric Name</h3>
      <input placeholder="testrubric" name ='rubricEntryText' id="rubricEntryText" class="w3-input w3-light-grey" type="text" required>
      <hr>
        <h3>Enter the Start Date of Survey</h3>
      <input name ='startDateText' id="startDateText" class="w3-input w3-light-grey" type="date" required>
      <hr>
        <h3>Enter the Start Time of Survey - hh:mm:AM/PM</h3>
      <input name='startDateTimeText' id='startDateTimeText' class="w3-input w3-light-grey" type="time" required>
      <hr>
        <h3>Enter the Close Date of Survey</h3>
      <input name ='closeDateText' id="closeDateText" class="w3-input w3-light-grey" type="date" required>
      <hr>
        <h3>Enter the Close Time of Survey - hh:mm:AM/PM</h3>
      <input name='closeDateTimeText' id='closeDateTimeText' class="w3-input w3-light-grey" type="time" required>
      <input type='submit' id="createSurveyConfirmButton" class="w3-center w3-button w3-theme-dark" value='Create Survey'></input>
      <hr>
    </div>
  </form>
<hr>
<?php
  require "lib/constants.php";
  date_default_timezone_set('America/New_York');

  //error logging
  error_reporting(-1); // reports all errors
  ini_set("display_errors", "1"); // shows all errors
  ini_set("log_errors", 1);
  ini_set("error_log", "~/php-error.log");

  session_start();

  /*if(!isset($_SESSION['faculty_id'])) {
    header("Location: ".SITE_HOME."index.php");
    exit();
  }*/

  require "lib/database.php";
  $con = connectToDatabase();

  function addSurvey ($connection, $course_num, $start_date, $expiration_date, $rubric_name) {
    echo "Finding rubric...";
    $rubricsql = $connection -> prepare('SELECT id FROM rubrics WHERE name=? limit 1');
    $rubricsql->bind_param('s', $rubric_name);
    $rubricsql->execute();
    $rubricsql->bind_result($rubric_id);
    $rubricsql->store_result();
    if($rubricsql->num_rows == 0){
      echo "Error: The rubric name does not exist in the database.";
      $rubricsql->close();
      exit();
    }
    echo "Rubric exists, fetching...";
    $rubricsql->fetch();
    //Rubric ID acquired

    $coursesql = $connection -> prepare('SELECT id FROM course WHERE code=? limit 1');
    $coursesql->bind_param('i', $course_num);
    $coursesql->execute();
    $coursesql->bind_result($course_id);
    $coursesql->store_result();
    if($coursesql->num_rows == 0){
      echo "Error: The course does not exist in the database.";
      $coursesql->close();
      exit();
    }
    echo "Course exists, fetching...";
    $coursesql->fetch();


    // now actual insertion

    $surveysql = $connection->prepare('INSERT INTO surveys(course_id,start_date,expiration_date,rubric_id) values (?,?,?,?)' );
    $surveysql->bind_param('issi', $course_id, $start_date, $expiration_date, $rubric_id);
    $surveysql->execute();
    echo "Successfully created survey for course " . $course_num . " to go live on " . $start_date . " and expire on " . $expiration_date;
  }
  if(!empty($_POST['courseNumberEntryText']) and !empty($_POST['startDateText']) and !empty($_POST['startDateTimeText']) and !empty($_POST['closeDateText'])and !empty($_POST['closeDateTimeText']) and !empty($_POST['rubricEntryText']) ) {
    $course_number = $_POST['courseNumberEntryText'];
    $start_date = $_POST['startDateText'];
    $start_date_time_text = $_POST['startDateTimeText'];
    $close_date = $_POST['closeDateText'];
    $close_date_time_text = $_POST['closeDateTimeText'];
    $rubric_name_input = $_POST['rubricEntryText'];
    $open_date = $start_date . " " . $start_date_time_text;
    $closed_date = $close_date . " " . $close_date_time_text;
    $open_date_object = date_create_from_format('Y-m-d H:i', $open_date);
    $closed_date_object = date_create_from_format('Y-m-d H:i', $closed_date);
    $current_time = date("Y-m-d H:i");
    $current_time_object = date_create_from_format('Y-m-d H:i', $current_time);
    // error checking for invalid times.

    if($open_date_object < $current_time_object){
      echo "Error: Survey must open on a time that hasn't happened yet.";
      //echo $open_date_object->format('Y-m-d H:i:s');
      //echo "\n";
      //echo $current_time_object->format('Y-m-d H:i');
    }
    else if($closed_date_object > $open_date_object){
      echo "Dates are valid, proceeding...";
      addSurvey($con, $course_number, $open_date, $closed_date, $rubric_name_input);
    }else{
      echo "Error: End date must occur after the survey start date";
    }
  }
?>
<hr>

<!-- Footer -->
<footer id="footer" class="w3-container w3-center w3-theme-dark w3-padding">
  <h3>Acknowledgements</h3>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  <p> <a  class=" w3-theme-light" target="_blank"></a></p>
</footer>

</body>
</html>
