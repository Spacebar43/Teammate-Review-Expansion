<!DOCTYPE HTML>
<html>
<body>

    <form method='post'enctype='multipart/form-data'>
        Import via .csv upload:<br>
        <input type='file' name='csv' accept='.csv'>
        <button type='submit' name='import'>Import</button><br>
    </form>

    <?php
        require '../../lib/csvParser.php';

        if(array_key_exists('import', $_POST)) {
            $tmp = $_FILES['csv']['tmp_name'];
            echo 'File uploaded:'.'<br>';
            echo '<pre>'.file_get_contents($tmp).'</pre>'.'<br>';
            if (csv_check($_FILES['csv']['tmp_name'])) {
                echo 'File correctly formatted!';
            } else {
                echo 'File not correctly formatted: must be two columns in every row.';
            }
        }
    ?>

</body>
</html>
