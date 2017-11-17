<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>Главное меню</title>
  </head>
  <body>

		<?php if (empty($_SESSION['username'])):?>
    <a href="reg_view.php">Регистрация</a><br>
    <a href="auth_view.php">Авторизация</a><br>
		<?php else: ?>
		<p><?php echo "Добро пожаловать, " . $_SESSION['username'] . "."; ?></p>
		<a href="logout.php" >Выход</a><br>
		<?php endif ?>
		<a href="callback_view.php">Форма обратной связи</a>

    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>
