<?php
require_once 'dbconnection.php';
$db->Connect();
$table = 'articles';
$userid = $_SESSION['user']['userid'];
$data = $_POST;
if (isset($data['create_article'])) {
  //если нажата кнопка и поля не пусты
  if (!empty($data['title']) && !empty($data['article'])) {

    $title = htmlspecialchars($data['title']);
    $article = htmlspecialchars($data['article']);
    $date = date("Y-m-d H:i:s");
    $query = 'title, article, created, userid';

    $data = array($title, $article, $date, $userid);

    $user_article = $db->Save($table, $query, $data);

    if ($user_article) {
      $_SESSION['message'] = 'Статья успешно добавлена!';
      header('Location: http://'.$host.':8080/add_article.php');
    }
    else {
      header('Location: http://'.$host.':8080/add_article.php');
      $_SESSION['err_message'] = 'Ошибка добавления статьи в БД!';
    }
  }
  else {
    $_SESSION['err_message'] = "Вы не заполнили все поля!";
    header('Location:http://'.$host.':8080/add_article.php');
  }
}
else {
  // если перешел сюда напрямую
  header('Location: /');
}
