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
  require "lib/database.php";

  $conn = connectToDatabase();

?>

<!DOCTYPE HTML>
<html>
<title>Peer-Self Evaluation Review</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
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
    <div id="headerContentName"><font color="black"><h1>Review Evaluations</h1></font></div>
</header>

<hr>
<div id="eval_reviewing" class="w3-cell-row w3-row-padding w3-center w3-padding">

  <div id="left_padding" class="w3-container w3-cell"></div>


    <div id="eval_view_container" class="w3-container w3-light-blue w3-cell">
      <h2>Completed Evaluations</h2>
      <hr>

      <div id="evals_table" class="w3-container w3-grey">
        <hr>
        <?php
          require("downloadRawEvals.php");
          $conn = connectToDatabase();
          $sql = "SELECT survey_id, submitter_email, teammate_email, score1, score2, score3, score4, score5 FROM readable_evals ORDER BY teammate_email";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
          // output data of each row
            while($row = $result->fetch_assoc()) {

              echo "Survey id: " . $row['survey_id'] ."| Reviewer: " . $row['submitter_email'] . "| Reviewee: " . $row['teammate_email'] . "| score1: " . $row['score1']. "| score2: " . $row['score2']. "| score3: " . $row['score3']. "| score4: " . $row['score4']. "| score5: " . $row['score5'] ."<br>";
            }
          } else {
            echo "0 results";
          }
          $conn->close();

        ?>
      </div>

      <hr>
      <form method="post" action="downloadRawEvals.php">
        <input type="submit" name="get_raw_evals" class="w3-center w3-button w3-theme-dark" value="Download Evals"/>
      </form>
      <hr>
    </div>

  <div id="right_padding" class="w3-container w3-cell"></div>

</div>

<hr>

<!-- Footer -->
<footer id="footer" class="w3-container w3-theme-dark w3-padding-16">
  <h3>Acknowledgements</h3>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  <p> <a  class=" w3-theme-light" target="_blank"></a></p>
</footer>

</body>
</html>
