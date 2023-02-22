<?php require_once "views/partials/heading.php"; ?>

<?php
session_start();
sessionCheck();

?>

<h1>home page</h1>

     <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
<?php require_once "views/partials/footer.php"; ?>