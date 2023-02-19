<?php require_once "views/partials/heading.php"; ?>
    <h1>About page</h1>
    <?php foreach ($tasks as $task): ?>
        <li><?= $task->description; ?></li>
    <?php endforeach; ?>


<?php require_once "views/partials/footer.php"; ?>