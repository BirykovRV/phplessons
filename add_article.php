<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Создание статьи</title>
  </head>
  <body>

<a href="/">Главная</a>
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











    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>