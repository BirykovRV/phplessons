<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: /');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Авторизация</title>
  </head>
  <body>
    <a href="/">Главная</a>

    <p>Форма авторизация</p>
    <?php if (!empty($_SESSION['err_message'])): ?>
      <p style="color: red;"><?php echo $_SESSION['err_message']; unset($_SESSION['err_message']); ?></p>
    <?php elseif(!empty($_SESSION['message'])): ?>
      <p style="color: green;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif ?>
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



  </body>
</html>
