<?php require_once "views/partials/heading.php"; ?>
    <?php
        sessionCheck();
        if (isset($_SESSION["user_id"]) == 1) {
            redirect("admin");
        } else {
            redirect("home");
        }
    ?>

    <h1>SignUp page</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="userName"><br>

        <label>Password:</label>
        <input type="password" name="password"><br>

        <button type="submit">Login</button>
    </form>

<?php require_once "views/partials/footer.php"; ?>