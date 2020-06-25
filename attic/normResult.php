<?php
// When we eventually switch to a normalized tables of scores, this would be the code to update the results
// Code from peerEvalForm.php helpful to obtain normalised scores for #115

	$question_count = 0;
	foreach($res as $score){
  	if(empty($student_scores)){
    	$stmt = $con->prepare('INSERT INTO scores2 (score, eval_id, question_number) VALUES(?,?,?)');
    	$stmt->bind_param('iii',$score,$eval_ID,$question_count);
    	$stmt->execute();
  	} else {
			$stmt = $con->prepare('UPDATE scores2 set score=? WHERE eval_id=? AND question_number=?');
			$stmt->bind_param('iii',$score, $eval_ID, $question_count);
			$stmt->execute();
  	}
		$question_count +=1;
	} 

	//move to next student in group
	if ($_SESSION['group_member_number'] < ($num_of_group_members - 1)) {
		$_SESSION['group_member_number'] +=1;
	  header("Location: peerEvalForm.php"); //refresh page with next group member
		exit();
	} else{
    //evaluated all students
		$_SESSION = array();
		header("Location: evalConfirm.php");
		exit();
	}
  ?>
