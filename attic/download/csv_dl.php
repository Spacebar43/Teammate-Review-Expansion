<html>
<title>Does anyone even look at this?</title>
<body>

    <form action = 'dl_script.php'>
        Press button get file:<br>
        <button type='submit' name='dl'>I'M A BUTTON</button>
    </form>
    <form method='post'>
        Press for other action:<br>
        <button type='submit' name='other'>Another button</button>
    </form>

<?php

    if(array_key_exists('other', $_POST)) {
        echo 'other action'.'<br>';
        ob_start();
        print "<pre>new\nlines\n</pre>";
        echo ob_get_contents();
    }

    $a = array('1','2','3');
    print_r($a);

?>

</body>
</html>
