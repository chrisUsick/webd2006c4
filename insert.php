<?php
if ($_POST) {
  $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $error = strlen($status) > 140 || strlen($status) < 1;
  if (!$error) {
    require 'connect.php';
    $query = $db->prepare("INSERT INTO tweets (status) VALUES (:status)");
    $query->execute(['status'=>$status]);
    header('Location: index.php');
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add sick tweet</title>
  </head>
  <body>
    <h1>Sick Twitter</h1>
    <?php if ($error): ?>
      <p>
        Status must be between 1 and 140 characters
      </p>
    <?php endif; ?>
  </body>
</html>
