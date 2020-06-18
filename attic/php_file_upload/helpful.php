<?php

// make an array
$acceptanceSet = array('blue', 'red', 'green');
// checks if first parameter is member of array that is second parameter
if (in_array('purple', $acceptanceSet)){
    print_r('it\'s in the set!');
} else {
    print_r('it\'s not in the set :(');
}

// can make a redirect add to the end of the url
if (false) {
    header("Location: index.php?message_for_user");
}

/* the following code wasn't needed for script.php
    // assign a unique id to the file and move it to the site TODO
    // this isn't working but isn't needed
    $fileNameNew = uniqid('', true).".".$fileExt;
    $fileDestination = '/web/CSE442-542/2020-Summer/cse-442a/phoenix_test/attic/php_file_upload/'.$fileNameNew;//TODO
    echo $fileNameNew.'<br>'.$fileDestination.'<br>';
    // move the file from temporary location to new location
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        echo 'file moved successfully<br>';
    } else {
        echo 'file not moved successfully<br>';
    } */

