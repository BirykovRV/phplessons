<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/maskedinput.js"></script>
    <title>Форма обратной связи</title>
  </head>
  <body>
    <script type="text/javascript">
      $(function($){
        $('#phone').mask("+7(999) 999-99-99")
      })
    </script>
    <a href="/">Главная</a>
    <?php if (!empty($_SESSION['err_message'])): ?>
      <p style="color: red;"><?php echo $_SESSION['err_message']; unset($_SESSION['err_message']); ?></p>
    <?php elseif(!empty($_SESSION['message'])): ?>
      <p style="color: green;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif ?>
    <p>Введите свои данные и вам непременно перезвонят!</p>
    <form class="" action="callback.php" method="get">
      <table>
        <tr>
          <td>ФИО:</td>
          <td><input type="text" id="email" name="name" placeholder="ФИО"></td>
        </tr>
        <tr>
          <td>Номер:</td>
          <td><input id="phone" type="text" name="number" placeholder="Введите номер"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="call" value="OK" style="width: 100%;"></td>
        </tr>
      </table>
    </form>




  </body>
</html>
