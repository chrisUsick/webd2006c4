<?php
require_once 'connect.php';
$query = $db->prepare("SELECT * FROM tweets");
$query->execute();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sick Twitter</title>
  </head>
  <body>
    <h1>Sick Twitter</h1>
    <form action="insert.php" method="post">
      <input  type="text" name="status">
      <button type="submit" >Tweet</button>
    </form>
    <?php if ($query->rowCount() > 0): ?>
      <ul>
        <?php while ($row = $query->fetch()): ?>
          <li>
            <?= $row['status'] ?>
          </li>
        <?php endwhile ?>
      </ul>
    <?php else: ?>
      <p>
        No tweets found.
      </p>
    <?php endif; ?>
  </body>
</html>
