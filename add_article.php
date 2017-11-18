<?php
require_once 'dbconnection.php';
$db->Connect();
if(empty($_SESSION['user']))
{
  //если не зареган и перешел напрямую
  header('Location: /');
}
$userid = $_SESSION['user']['userid'];
$articles = $db->FindAll('articles', 'userid = ?', array($userid));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Создание статьи</title>
  </head>
  <body>

<a href="/">Главная</a>
<?php if (!empty($_SESSION['err_message'])): ?>
  <p style="color: red;"><?php echo $_SESSION['err_message']; unset($_SESSION['err_message']); ?></p>
<?php elseif(!empty($_SESSION['message'])): ?>
  <p style="color: green;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
<?php endif ?>
<form action="articles.php" method="post">
  <table>
    <tr>
      <td>Название:</td>
      <td><input type="text" name="title" value=""></td>
    </tr>
    <tr>
      <td>Статья:</td>
      <td><textarea style="resize: none;" name="article" rows="20" cols="50"></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" name="create_article" value="Создать"></td>
    </tr>
  </table>
</form>

<?php
foreach ($articles as $key => $value) {
  if ($value['userid'] == $userid) {
    echo $value['article'] . "<br>";
  }
}
?>

    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>
