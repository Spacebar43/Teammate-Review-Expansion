<?php

    /*  
    TODO issue #108
    this will parse a .csv, expecting correct formmatting (from code in #107)
    once parsed, will create SQL insert statements and run them to the database
    
    This is sepecifically for user story #51 to handle insertions to students table
    */

    //error logging
    error_reporting(-1); // reports all errors
    ini_set("display_errors", "1"); // shows all errors
    ini_set("log_errors", 1);
    ini_set("error_log", "~/php-error.log");
    
    // use require statament here to minimize code in registrationConfirmation.php
    require "database.php"
    $con = connectToDatabase();

    /*      
        function: csvGetCollumn
        inputs: $csv - the tmp_name of the .csv ; $collumn - int of which collumn to get (from 0)
        output: an array containing all of the values of that collumn
        This will be used to provide user feedback by getting names of all students added
    */
    function csvGetCollumn($csv, $collumn) {
        //TODO
    }

    /*
        function: insertHelper
        inputs: $email - student's email ; $name - student's name
        output: a string containing the SQL code
        This function performs the insertion and returns the statement for testing
    */
    function insertHelper($email, $name) {
        //TODO
    }

    /*
        function: insertStudents
        inputs: $csv - the tmp_name of the .csv 
        outputs: a string with the list of students added to the database
        Using a loop, inserts all students to the database.
    */
    function insertStudents($csv) {
        //TODO
    }
}
