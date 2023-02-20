<?php require_once "views/partials/heading.php"; ?>
    <h1>Login</h1>

    <?php
        use core\App;

        if (isset($_SESSION["user_id"])) {
            if (isset($_SESSION["user_id"]) == 1) {
                redirect("admin");
            } else {
                redirect("home");
            }
        }

        if (App::get("status")!=null) { 
    ?>
        <p> name or password wrong. </p>
    <?php

        }
    ?>

    <form method="POST">
        <label>Username:</label>
        <input type="text" name="userName"><br>

        <label>Password:</label>
        <input type="password" name="password"><br>

        <button type="submit">Login</button>
    </form>

<?php require_once "views/partials/footer.php"; ?>