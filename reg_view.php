<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Регистрация</title>
  </head>
  <body>
    <a href="/">Главная</a>
    <p>Форма регистрации</p>
    <?php if (!empty($_SESSION['err_message'])): ?>
      <p style="color: red;"><?php echo $_SESSION['err_message']; unset($_SESSION['err_message']); ?></p>
    <?php elseif(!empty($_SESSION['message'])): ?>
      <p style="color: green;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif ?>
    <form action="reg.php" onsubmit="return validateForm()" method="post" name="reg_form">
      <table>
        <tr>
          <td>Имя:</td>
          <td><input type="text" id="username" name="username" placeholder="Имя"></td>
        </tr>
        <tr>
          <td>Пароль:</td>
          <td><input type="password" name="password" placeholder="Пароль"></td>
        </tr>
        <tr>
          <td>Повторите пароль:</td>
          <td><input type="password" name="confirm_password" placeholder="Повторите пароль"></td>
        </tr>
        <tr>
          <td>E-mail:</td>
          <td><input type="text" name="email" placeholder="E-mail"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="signin" value="OK" style="width: 100%;"></td>
        </tr>
      </table>
    </form>


    <script src="js/validator.js" charset="utf-8"></script>
    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>
