<?php
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "~/php-error.log");
session_start();
require "lib/database.php";
$con = connectToDatabase();
if(!isset($surveyID)){
    // No survey ID detected, put in an errorvalue.
    $_SESSION['surveyid'] = 1;
    $surveyID = $_SESSION['surveyid'];
}


if(isset($_POST["add"])){
  $review = $_POST['fname'];
  $team = $_POST['lname'];
  $si = $_POST['sname'];
  $sq = "SELECT id FROM course where code=?";
  $st = $con->prepare($sq);
  $st->bind_param('i', $si);
  $st->execute();
  $st->bind_result($resu);
  $st->store_result();
  $st->fetch();
  $st->close();

  $s = "SELECT id FROM surveys where course_id=?";
  $sta = $con->prepare($s);
  $sta->bind_param('i', $resu);
  $sta->execute();
  $sta->bind_result($surv);
  $sta->store_result();
  $sta->fetch();
  $sta->close();

  try {
    $sql = $con->prepare('INSERT INTO reviewers (survey_id,reviewer_email,teammate_email) values (?,?,?)');
    $sql->bind_param('iss', $surv, $review, $team);
    $sql->execute();
    echo "<script type=\"text/javascript\">
            window.location = \"review_modifier.php\"
            </script>";
  } catch (Exception $e){
    echo $e;
  }
}

if(isset($_POST["re"])) {
  $o = $_POST['id'];
  $sql = "delete from reviewers where id = (select id from (select id from reviewers order by id limit $o,1) as t)";
  if ($con->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">
            window.location = \"review_modifier.php\"
            </script>";
  } else {
    echo "<script type=\"text/javascript\">
            alert (\"Error deleting record\");
            window.location = \"review_modifier.php\"
            </script>";
  }
  //delete from prototype_1 where id = (select id from (select id from prototype_1 order by id limit 1,1) as t)
  //  echo "Record deleted successfully";
  //} else {
  //  echo "Error deleting record: " . $con->error;
  //}
}


?>
