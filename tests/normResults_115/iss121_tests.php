<html>
<title>Issue 121 Tests</title>
<body>


<form method='post'>
    Press button get test1.csv:<br>
    <button formaction='test1.php'>Task Test 1</button>
    <button type='submit' name='test1'>Check Results</button>
</form>
<form method='post'>
    Press button get test2.csv:<br>
    <button formaction = 'test2.php'>Task Test 2</button>
    <button type='submit' name='test2'>Check Results</button>
</form>
<form method='post'>
    Press button get test3.csv:<br>
    <button formaction = 'test3.php'>Task Test 3</button>
    <button type='submit' name='test3'>Check Results</button>
</form>
<form method='post'>
    Press button get test4.csv:<br>
    <button formaction = 'test4.php'>Task Test 4</button>
    <button type='submit' name='test4'>Check Results</button>
</form>


<?php

    require 'globals.php';
    if(array_key_exists('test1', $_POST)) {
        echo '<pre>';
        print_r($test1);
        echo '</pre>';
    }
    if(array_key_exists('test2', $_POST)) {
        echo '<pre>';
        print_r($test2);
        echo '</pre>';
    }
    if(array_key_exists('test3', $_POST)) {
        echo '<pre>';
        print_r($test3);
        echo '</pre>';
    }
    if(array_key_exists('test4', $_POST)) {
        echo '<pre>';
        print_r($test4);
        echo '</pre>';
    }

?>

</body>
</html>
