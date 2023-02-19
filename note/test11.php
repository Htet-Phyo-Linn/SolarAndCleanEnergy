<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    // User is not logged in, redirect to login page
    header("Location: test1.php");
    exit();
}

// User is logged in, show dashboard
$user_id = $_SESSION["user_id"]; // Get user ID from session

if (isset($_POST["logout"])) {
    // User clicked logout button, destroy session and redirect to login page
    session_destroy();
    header("Location: test1.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome to the dashboard!</h1>
    <p>Your user ID is: <?php echo $user_id; ?></p>

    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>

</html>