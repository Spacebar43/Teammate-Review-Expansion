<?php
  error_reporting(-1); // reports all errors
  ini_set("display_errors", "1"); // shows all errors
  ini_set("log_errors", 1);

  session_start();
  require "lib/constants.php";

  // if an id is not set for this session return to homepage
  if(!isset($_SESSION['faculty_id'])) {
    header("Location: ".SITE_HOME."index.php");
    exit();
  }
?>


<!DOCTYPE HTML>
<html>
<title>UB CSE Survey Admin Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<body>

<style>
hr {
    clear: both;
    visibility: hidden;
}
</style>


<!-- Header -->
<header id="header" class="w3-container w3-theme w3-padding">
    <div id="headerContentName"><font class="w3-center w3-theme"><h1>Faculty Control Panel</h1></font></div>
</header>
<!-- Control Panel Directory -->
<div>
  <form class="w3-container w3-card-4 w3-light-blue"
        method="post"
        name="adminControlPanel" id="adminControlPanel"
        enctype="multipart/form-data">
    
        <!-- Register Students -->
        <input type='button'
               onclick="window.location.href = 'createCourses.php';"
               class="w3-center w3-button w3-theme-dark"
               value="Create Courses"/>

        <!--- Create Surveys --->
        <input type='button'
               onclick="window.location.href = 'surveyCreation.php';"
               class="w3-center w3-button w3-theme-dark"
               value="Create Survey"/>
    
       <!-- Review Evaluations -->
       <input type='button'
              onclick="window.location.href = 'getEvals.php';"
              class="w3-center w3-button w3-theme-dark"
              value="Review Evals"/>

        <!-- Register Students -->
        <input type='button'
               onclick="window.location.href = 'studentRegistration.php';"
               class="w3-center w3-button w3-theme-dark"
               value="Register Students"/>


  </form>
</div>

<!-- Upload CSV -->
<div class="w3-row-padding w3-center w3-padding">
  <form class="w3-container w3-card-4 w3-light-blue"
        action="assignment_upload.php"
        method="post"
        name="frmCSVImport" id="frmCSVImport"
        enctype="multipart/form-data">

    <div class="w3-section">
         <label class="col-md-4 control-label">Choose CSV File</label>
         <hr>
         <input type="file"
                name="file" id="file"
                accept=".csv">
         <button type="submit"
                 name="Import" id="submit"
                 class="btn-submit">Import</button>
    </div>
  </form>
</div>
<!-- Footer -->
<footer id="footer" class="w3-container w3-theme-dark w3-padding-16">
  <h3>Acknowledgements</h3>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  <p> <a  class=" w3-theme-light" target="_blank"></a></p>
</footer>


<!-- Footer -->
<footer id="footer" class="w3-container w3-theme-dark w3-padding-16">
  <h3>Acknowledgements</h3>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  <p> <a  class=" w3-theme-light" target="_blank"></a></p>
</footer>

</body>
</html>
