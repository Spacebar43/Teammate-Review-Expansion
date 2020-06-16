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
               onclick="window.location.href = 'adminHome.php';"
               class="w3-center w3-button w3-theme-dark"
               value="Return Home"/></input>
  </form>
</div>
<hr>


<div id="createSurveyForm" class="w3-row-padding w3-center w3-padding">
  <form  id="newSurvey" class="w3-container w3-card-4 w3-light-blue" method='post'>
    <div id="courseNumber" class="w3-section">
        <h3>Enter the Course Number</h3>
      <input maxlength="3" placeholder="442" name ='courseNumberEntryText' id="courseNumberEntryText" class="w3-input w3-light-grey" type="text" pattern="[0-9][0-9][0-9]$" required>
      <hr>
        <h3>Enter the Start Date of Survey</h3>
      <input name ='startDateText' id="startDateText" class="w3-input w3-light-grey" type="date" required>
      <hr>
        <h3>Enter the Start Time of Survey - hh:mm:AM/PM</h3>
      <input name='startDateTimeText' id='startDateTimeTExt' class="w3-input w3-light-grey" type="time" required>
      <hr>
        <h3>Enter the Close Date of Survey</h3>
      <input name ='closeDateText' id="closeDateText" class="w3-input w3-light-grey" type="date" required>
      <hr>
        <h3>Enter the Close Time of Survey - hh:mm:AM/PM</h3>
      <input name='closeDateTimeText' id='closeDateTimeTExt' class="w3-input w3-light-grey" type="time" required>
      <input type='submit' id="createSurveyConfirmButton" class="w3-center w3-button w3-theme-dark" value='Create Survey'></input>
      <hr>
    </div>
  </form>

<hr>
<?php

  require "lib/constants.php";

  //error logging
  error_reporting(-1); // reports all errors
  ini_set("display_errors", "1"); // shows all errors
  ini_set("log_errors", 1);
  ini_set("error_log", "~/php-error.log");

  session_start();

  if(!isset($_SESSION['faculty_id'])) {
    header("Location: ".SITE_HOME."index.php");
    exit();
  }

  require "lib/database.php";
  $con = connectToDatabase();

  function addCourse ($connection, $courseNum, $courseName) {
    echo "Added to database";
    $sql = $connection->prepare( 'INSERT INTO course (code,name) values(?,?)' );
    $sql->bind_param('is', $courseNum, $courseName);
    $sql->execute();
  }
  //
  if(!empty($_POST['courseNumberEntryText']) and !empty($_POST['courseNameEntryText'])) {
    $courseNum = $_POST['courseNumberEntryText'];
    $courseName = $_POST['courseNameEntryText'];
    addCourse($con, $courseNum, $courseName);
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
