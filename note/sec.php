<?php
function sanitize_input($input) {
  $input = strip_tags($input);
  $input = str_replace("'", "''", $input);
  $input = htmlentities($input, ENT_QUOTES, "UTF-8");
  return $input;
}

// Example usage
$name = sanitize_input($_POST['name']);
$email = sanitize_input($_POST['email']);


// Use sanitized input to query the database
// ...
?>
<h1><?= $name; ?></h1>