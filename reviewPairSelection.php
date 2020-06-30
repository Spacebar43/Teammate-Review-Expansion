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
<div>
  <form class="w3-container w3-card-4 w3-light-blue"
        method="post"
        name="adminControlPanel" id="adminControlPanel"
        enctype="multipart/form-data">
    
        <!-- Register Students -->
        <input type='button'
               onclick="window.location.href = 'adminHome.php';"
               class="w3-center w3-button w3-theme-dark"
               value="Return Home"/>

  </form>
</div>

<div id="reviewPairs" class="w3-row-padding w3-center w3-padding">
  <form  id="newSurvey" class="w3-container w3-card-4 w3-light-blue" method='post'>
    <div id="courseNumber" class="w3-section">
        <h3>Enter the Survey ID Number</h3>
      <input placeholder="1" name ='surveyIDText' id="surveyIDText" class="w3-input w3-light-grey" type="text" pattern="[0-9]*" title="Numbers only" required>
      <hr>
      <input type='submit' id="confirmID" class="w3-center w3-button w3-theme-dark" value='Confirm Survey ID'></input>
      <hr>
    </div>
  </form>
<hr>


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

<?php 
if(!empty($_POST['surveyIDText']) ) {
    $_SESSION['survey_id'] = $_POST['surveyIDText'];
    echo "You have input " . $_POST['surveyIDText'] . " as the survey ID";
}
?>

<!-- Footer -->
<footer id="footer" class="w3-container w3-theme-dark w3-padding-16">
  <h3>Acknowledgements</h3>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  <p> <a  class=" w3-theme-light" target="_blank"></a></p>
</footer>

</body>
</html>
