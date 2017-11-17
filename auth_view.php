<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: /');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Авторизацмя</title>
  </head>
  <body>
    <a href="/">Главная</a>

    <p>Форма авторизация</p>

    <form action="auth.php" method="post" name="auth_form">
      <table>
        <tr>
          <td>E-mail:</td>
          <td><input type="text" id="email" name="email" placeholder="E-mail"></td>
        </tr>
        <tr>
          <td>Пароль:</td>
          <td><input type="password" name="password" placeholder="Пароль"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="signup" value="OK" style="width: 100%;"></td>
        </tr>
      </table>
    </form>



    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>
