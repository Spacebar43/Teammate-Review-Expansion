<!DOCTYPE HTML>
<html>
<title>Create New Course</title>
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
    <div id="headerContentName"><font color="black"><h1>Create New Course</h1></font></div>
</header>
<hr>


<div id="createCourseForm" class="w3-row-padding w3-center w3-padding">
  <form  id="newCourse" class="w3-container w3-card-4 w3-light-blue" method='post'>
    <h3>Please enter the Course Number and Name</h3>
    <div id="courseNumber" class="w3-section">
	<hr>
      <input maxlength="5" placeholder="442" name ='courseNumberEntryText' id="courseNumberEntryText" class="w3-input w3-light-grey" type="text" required>
      <hr>
      <input placeholder="Intro to Software Engineering" name ='courseNameEntryText' id="courseNameEntryText" class="w3-input w3-light-grey" type="text" required>
      <hr>
      <!--
        This form uses a temporary means of verifying faculty authorization
        TODO: Use faculty sessions to access this page

      <h4>Confirm your authorization</h4>
      <input placeholder="Password for this session" name ='facultyPasswordEntryText' id="courseNameEntryText" class="w3-input w3-light-grey" type="text" required>
      <hr>
      -->
      <input type='submit' id="createCourseConfirmButton" class="w3-center w3-button w3-theme-dark" value='Create Course'></input>
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
  $faculty_id = $_SESSION['faculty_id'];
  function addCourse ($connection, $courseNum, $courseName, $faculty_id) {
    echo "Added to database";
    $sql = $connection->prepare( 'INSERT INTO course (code,name,faculty_id) values(?,?,?)' );
    $sql->bind_param('isi', $courseNum, $courseName, $faculty_id);
    $sql->execute();
  }
  //
  if(!empty($_POST['courseNumberEntryText']) and !empty($_POST['courseNameEntryText'])) {
    $courseNum = $_POST['courseNumberEntryText'];
    $courseName = $_POST['courseNameEntryText'];
    addCourse($con, $courseNum, $courseName, $faculty_id);
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
