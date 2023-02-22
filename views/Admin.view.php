<?php
use core\App;
session_start();
sessionCheck();

?>


    <h4>user list</h4>
    <?php foreach ($users as $user): ?>
        <li><?= $user->userName; ?></li>
    <?php endforeach; ?>

     <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
