<?php
    $password = "hello world";
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
    echo preg_match($password_regex, 'secret'); // returns 0
    echo preg_match($password_regex, '-Secr3t.');    

$myArray = array('apple', 'banana', 'orange', 'grape');

$numElements = count($myArray);

echo "There are " . $numElements . " elements in the array.";

?>