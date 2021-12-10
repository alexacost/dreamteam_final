<?php
require 'database.php';
  $sql = 'SELECT * FROM usuarios';
    foreach ($conn->query($sql) as $row) { ?>
        <h1> <?= $row['user'] ?> <h1>
<?php   } ?>
