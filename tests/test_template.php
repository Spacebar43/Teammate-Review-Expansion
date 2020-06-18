<!DOCTYPE HTML>
<html>
<title>Template for Testing Code</title>
<body>

<?php
// Set the sesion data
session_start();
session_regenerate_id();
$_SESSION['loggedin'] = TRUE;
$_SESSION['email'] = 'trcerny@buffalo.edu';
$_SESSION['id'] = '17';
$_SESSION['faculty_id'] = '4';
?>

<input type='submit' 
    // set message for button
    value='Issue X Acceptence Test Y' 
    // select the file to jump to
    onclick="window.location.href = '../index.php';">
</input>
</body>
</html>
