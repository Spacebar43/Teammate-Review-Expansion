<!DOCTYPE HTML>
<html>
<title>Review Modifier</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>

<!-- Header -->
<header id="header" class="w3-container w3-theme w3-padding">
    <div id="headerContentName"><font class="w3-center w3-theme"><h1>Modify Reviewers Dashboard</h1></font></div>
</header>
<div class="w3-container w3-card-4 w3-light-blue">
  <?php
  require "lib/constants.php";
  date_default_timezone_set('America/New_York');
  error_reporting(-1); // reports all errors
  ini_set("display_errors", "1"); // shows all errors
  ini_set("log_errors", 1);
  ini_set("error_log", "~/php-error.log");
  session_start();
  require "lib/database.php";
  $con = connectToDatabase();
  //$surveyID = $_SESSION['surveyid'];
  try {
    if(!isset($surveyID)){
      // No survey ID detected, put in an errorvalue.
      $_SESSION['surveyid'] = 1;
      $surveyID = $_SESSION['surveyid'];
    }
    $sql = "SELECT survey_id, reviewer_email, teammate_email FROM reviewers";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
      echo '<div class="w3-row">';
      echo '<div class="w3-col s3 m3 l3"> Survey Id </div>';
      echo '<div class="w3-col s3 m3 l3"> Reviewer Email </div>';
      echo '<div class="w3-col s3 m3 l3"> Teammate Email </div>';
      echo '<div class="w3-col s3 m3 l3"> </div>';
      echo '</div>';
      $i = 0;
      while($row = $result->fetch_assoc()) {
        echo '<form action="modify.php" method="post">';
        echo '<div class="w3-row">';
        echo '<div class="w3-col s3 m3 l3">'.$row["survey_id"].'</div>';
        echo '<div class="w3-col s3 m3 l3">'.$row["reviewer_email"].'</div>';
        echo '<div class="w3-col s3 m3 l3">'.$row["teammate_email"].'</div>';
        echo "<input type='submit' class='w3-col s3 m3 l3' id='$i' name='re' value='Remove'>";
        echo "<input type='hidden' name='id' value='$i'/>";
        echo '</div>';
        echo '</form>';
        $i = $i + 1;
      }
    } else {
      echo "0 results";
    }

    } catch(Exception $e) {
      echo "<script type=\"text/javascript\">
      alert (\"CSV is formatted incorrectly or assigned students are not formally enrolled in database.\");
      window.location = \"adminHome.php\"
      </script>";
    }

    ?>
</div>
</br>
</br>
<div class="w3-container">
  <form action="modify.php" method="post">
    <label for="fname">Reviewer Email: </label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Teammate Email: </label>
    <input type="text" id="lname" name="lname"><br><br>
    <label for="sname">Survey ID: </label>
    <input type="text" id="sname" name="sname"><br><br>
    <input type="submit" id="p" name="add" value="Add">
  </form>

</div>
</br>
</br>
<!-- Footer -->
<footer id="footer" class="w3-container w3-theme-dark w3-padding-16">
  <h3>Acknowledgements</h3>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  <p> <a  class=" w3-theme-light" target="_blank"></a></p>
</footer>

</body>
</html>
