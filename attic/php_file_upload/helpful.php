<?php

// make an array
$acceptanceSet = array('blue', 'red', 'green');
// checks if first parameter is member of array that is second parameter
if (in_array('purple', $acceptanceSet)){
    print_r('it\'s in the set!');
} else {
    print_r('it\'s not in the set :(');
}
