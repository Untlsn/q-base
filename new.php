<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php require './partial/style.php' ?>
  <title>Nowe</title>
  <?php
    require './php/index-code.php';
    require './php/my-sql-n.php';
    $mysql = new MySqlN();
    $indexCode = new IndexCode(
      $mysql->getNewQBarQ(20)
    );
  ?>
</head>
<body>
  <?php require './template/base.php' ?>
</body>
</html>