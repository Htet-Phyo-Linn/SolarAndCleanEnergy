<?php

if (!isset($_SESSION["user_id"])) {
    // User is not logged in, redirect to login page
    header("Location: test1.php");
    exit();
}

?>