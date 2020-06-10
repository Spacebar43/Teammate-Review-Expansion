<!DOCTYPE HTML>
<html>
<title>Course Administration</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>
<style>
.grid-container {
  display: grid;
  grid-column-start: 1;
  grid-column-end: 3;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}
hr {
    clear: both;
    visibility: hidden;
}
</style>



<!-- Header -->
<header id="header" class="w3-container w3-center w3-theme w3-padding">
    <div id="headerContentName"><font color="black"><h1>Course Administration</h1></font></div>
</header>
<hr>



<div id="createCourseForm" class="w3-row-padding w3-center w3-padding">
  <form  id="newCourse" class="w3-container w3-card-4 w3-light-blue" method='post'>
    <h3>Please enter the Course Number and Name</h3>
    <div id="courseNumber" class="w3-section">
	<hr>
      <input maxlength="3" placeholder="442" name ='courseNumberEntryText' id="courseNumberEntryText" class="w3-input w3-light-grey" type="text" pattern="[0-9][0-9][0-9]$" required>
      <hr>
      <input placeholder="Intro to Software Engineering" name ='courseNameEntryText' id="courseNameEntryText" class="w3-input w3-light-grey" type="text" required>
      <hr>
      <!--
        This form uses a temporary means of verifying faculty authorization
        TODO: Use faculty sessions to access this page
      -->
      <h4>Confirm your authorization</h4>
      <input placeholder="ubit@buffalo.edu" name ='facultyPasswordEntryText' id="courseNameEntryText" class="w3-input w3-light-grey" type="email" pattern="^[a-zA-Z0-9]+@buffalo.edu$" required>
      <hr>
      <input placeholder="Password for this session" name ='facultyPasswordEntryText' id="courseNameEntryText" class="w3-input w3-light-grey" type="text" required>
      <hr>
      <input type='submit' id="createCourseConfirmButton" class="w3-center w3-button w3-theme-dark" value='Create Course'></input>
      <hr>
    </div>
  </form>

<?php
//error logging
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "~/php-error.log");


require "lib/random.php";
require "lib/database.php";
require "lib/constants.php";
$con = connectToDatabase();


<div></div>
<hr>

<!-- Footer -->
<footer id="footer" class="w3-container w3-center w3-theme-dark w3-padding">
  <h3>Acknowledgements</h3>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  <p> <a  class=" w3-theme-light" target="_blank"></a></p>
</footer>

</body>
</html>
