<?php
    $password = "hello world";
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
    echo preg_match($password_regex, 'secret'); // returns 0
    echo preg_match($password_regex, '-Secr3t.');    
?>