<!DOCTYPE HTML>
<html>
<body>

    <form method='post'enctype='multipart/form-data'>
        Import via .csv upload:<br>
        <input type='file' name='csv' accept='.csv'>
        <button type='submit' name='import'>Import</button><br>
        **THIS ASSUMES CORRECTLY FORMATTED FILE**
    </form>

    <?php
        //todo create test file for ../../lib/csvParser.php

        require '../../lib/csvParser.php';
        require '../../lib/database.php';

        if(array_key_exists('import', $_POST)) {
            insert_students($_FILES['csv']['tmp_name']);
        }
    ?>

</body>
</html>
