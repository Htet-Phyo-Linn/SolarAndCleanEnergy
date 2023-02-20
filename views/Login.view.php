<?php require_once "views/partials/heading.php"; ?>
    <h1>Login</h1>

    <?php
        use core\App;
        if (App::get("status")!=null) { 
    ?>
        <p> name or password wrong. </p>
    <?php
            App::bind("status", "success");
            
            if(App::get("status") == "success") {
                redirect("home");
            }
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