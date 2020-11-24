<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php require './partial/style.php' ?>
  <title>O Nas</title>
  <style>
    .main {
      margin: 100px;
      display: flex;
      flex-direction: column;
    }

    .author, .code {
      background-color: #232323;
      padding: 25px;
      border-radius: 25px;
      width: 50%;
    }
    .code {
      margin-top: 15px;
      text-transform: uppercase;
      letter-spacing: 1px;
      text-align: end;
    }
  </style>
</head>
<body>
  <?php require './partial/header.php' ?>
  <main class="main">
    <div class="author">
      Twórca projektu: Filip Skoczeń
    </div>
    <a href="https://github.com/Untlsn/q-base.git" target="_blank" class="code">
      Kod źródłowy
    </a>
  </main>
<script src="https://kit.fontawesome.com/2d55a3e5cd.js" crossorigin="anonymous"></script>
</body>
</html>