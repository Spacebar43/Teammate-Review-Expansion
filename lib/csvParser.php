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
    
    /*
        function: csv_check
        inputs: $csv - the tmp_name of the .csv
        output: a string containing a success/error message
        This function checks if the csv is formatted to have 2 columns in every row.
        Otherwise, provides errorrasdaasdsad
    */
    function csv_check($csv) {
        //TODO
    }

    /*
        function: insert_students
        inputs: $csv - the tmp_name of the .csv 
        outputs: a string with messages with information of which students were added or not
        Using a loop, inserts all students to the database.
    */
    function insert_students($csv) {
        //TODO
    }
}
