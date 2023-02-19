<?php require_once "views/partials/heading.php"; ?>
    <h1>Index Page</h1>


    <?php foreach ($tasks as $task): ?>
        <li><?= $task->description; ?></li>
    <?php endforeach; ?>


    <form action="/names" method="POST">
        <input type="text" name="name" id="name">
        <input type="submit" value="submit">
    </form>


<?php require_once "views/partials/footer.php"; ?>