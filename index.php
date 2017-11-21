<?php
require_once 'dbconnection.php';
$db->Connect();
// нашли все статьи по id
$articles = $db->FindAllBy('articles', '*');
arsort($articles);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/master.css">
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


      <!-- проходим по массиву и выводим статьи -->
      <?php foreach ($articles as $key => $value): ?>
        <!-- находим пользователя по id -->
        <?php $user = $db->GetUserById(array($value['userid'])); ?>
        <div class="articles">
          <h1><?php echo $value['title']; ?></h1>
          <p><?php echo $value['article']; ?></p>
          <div class="">
            <h5>Создан: <?php echo $value['created'] . " / Автор: " . $user['login']; ?></h5>
          </div>
        </div>
      <?php endforeach; ?>



    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
  <?php $db->Close(); ?>
</html>
