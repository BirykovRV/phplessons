<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/master.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <title>Главное меню</title>
  </head>
  <body>

		<?php if (empty($_SESSION['user'])):?>
    <a href="reg_view.php">Регистрация</a><br>
    <a href="auth_view.php">Авторизация</a><br>
		<?php else: ?>
		<p>Добро пожаловать, <?php echo $_SESSION['user']['login']; ?></p>
    <a href="add_article.php">Добавить статью</a><br>
		<a href="logout.php" >Выход</a><br>
		<?php endif ?>
		<a href="callback_view.php">Форма обратной связи</a><br>
    <a href="Ajax.html">Тесты Ajax</a>


      <?php require_once 'load_articles.php'; ?>



  </body>
</html>
