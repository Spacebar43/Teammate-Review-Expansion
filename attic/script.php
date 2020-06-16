<?php

// execute code if a file is submitted
if (isset($_POST['submit'])) {
    // get file informationa and set to variables for future use
    $file = $_FILES['file_in'];
    $fileName = $_FILES['file_in']['name'];
    $fileTmpName = $_FILES['file_in']['tmp_name'];
    $fileSize = $_FILES['file_in']['size'];
    $fileError = $_FILES['file_in']['error'];
    $fileType = $_FILES['file_in']['type'];
    
    // show file info array in browser
    print_r($file);
    echo '<br>';

    // check if file uploaded succesfully
    if ($fileError === 0){
        print_r('file uploaded without error');
        echo '<br>';
    } else { 
        print_r('error while uploading file');
        echo '<br>';
    }

    // parse file name to check for file extension
    // explode() makes an array
    $fileNameArray = explode('.', $fileName);
    print_r($fileNameArray);
    echo '<br>';
    // end() gets last member in array
    $fileExt = strtolower(end($fileNameArray));
    print_r($fileExt);
    echo '<br>';
    
    // example check
    if ($fileExt != 'csv') {print_r("filetype should be .csv");echo '<br>';}

    
}
