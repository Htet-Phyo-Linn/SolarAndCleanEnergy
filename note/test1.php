<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process login form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // TODO: Validate login credentials
    $is_valid_login = true; // placeholder for validation logic

    if ($is_valid_login) {
        // Successful login, store user ID in session and redirect to dashboard
        $_SESSION["user_id"] = 123; // Replace with actual user ID
        header("Location: test11.php");
        exit();
    } else {
        // Invalid login, display error message
        $error_message = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <?php if (!empty($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>

    <form method="post">
        <label>Username:</label>
        <input type="text" name="username"><br>

        <label>Password:</label>
        <input type="password" name="password"><br>

        <button type="submit">Login</button>
    </form>
</body>

</html>