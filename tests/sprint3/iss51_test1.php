<!DOCTYPE HTML>
<html>
<title>Testing Code for Issue 51</title>
<body>

<?php
// Set the sesion data
session_start();
session_regenerate_id();
$_SESSION['loggedin'] = TRUE;
$_SESSION['email'] = 'trcerny@buffalo.edu';
$_SESSION['id'] = '17';
$_SESSION['faculty_id'] = '4';
// jump to the first page of the test
header('Location: ../../adminHome.php');
?>

<input type='submit' 
    // set message for button
    value='Issue 51 Acceptence Test' 
    // select the file to jump to
    onclick="window.location.href = '../../adminHome.php';">
</input>
</body>
</html>
