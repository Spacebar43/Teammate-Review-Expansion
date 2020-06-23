

<?php

// Test Create Courses Functionality Test

//Redirects to directly to createCourses.php

// Set the sesion data
session_start();
session_regenerate_id();
$_SESSION['loggedin'] = TRUE;
$_SESSION['email'] = 'slgreco@buffalo.edu';
$_SESSION['id'] = '2';
$_SESSION['faculty_id'] = '2';
header("Location: ../../createCourses.php");

?>
