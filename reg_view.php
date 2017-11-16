<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Регистрация</title>
  </head>
  <body>
    <form action="#" onsubmit="return validateForm()" method="post" name="reg_form">
        <p>Имя:</p>
        <p id="demo"></p>
        <input type="text" id="username" name="username" placeholder="Имя">
        <p>Пароль:</p>
        <input type="text" name="username" placeholder="Пароль">
        <p>E-mail:</p>
        <input type="text" name="username" placeholder="E-mail">
        <p><input type="submit" name="signup" value="OK"></p>
    </form>


    <script src="js/validator.js" charset="utf-8"></script>
    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>
