<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file_in'];
    print_r($file);
}
