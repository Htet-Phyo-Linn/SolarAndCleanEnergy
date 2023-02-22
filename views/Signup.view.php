<?php require_once "views/partials/heading.php"; ?>
    <?php
        use core\App;

        if (isset($_SESSION["user_role"])) {
            if ($_SESSION["user_role"] == 1) {
                redirect("admin");
            } else {
                redirect("home");
            }
        }
        
        if (App::get("email")!=null) { 
    ?>
        <p> Email already exists. </p>
    <?php

        }
    ?>

    <script>
        var match = function() {

        if (document.getElementById('password').value == document.getElementById('confirmPassword').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = '<br>matching';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = '<br>not matching';
        }
        }
    </script>

    <h1>SignUp page</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="userName"><br>

        <label>Password:</label>
        <input type="password" name="password" id="password"><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirmPassword" id="confirmPassword" onkeyup="match();"><br>
        <span id="message"></span>

        <label>Email:</label>
        <input type="email" name="email" onkeyup="match();"><br>

        <label>Phone No:</label>
        <input type="text" name="phNo"><br>
        
        <button type="submit">Signup</button>
    </form>

<?php require_once "views/partials/footer.php"; ?>