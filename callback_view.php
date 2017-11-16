<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Форма обратной связи</title>
  </head>
  <body>
    <a href="/">Главная</a>
    <p>Введите свои данные и вам непременно перезвонят!</p>
    <form class="" action="callback.php" method="get">
      <table>
        <tr>
          <td>ФИО:</td>
          <td><input type="text" id="email" name="name" placeholder="ФИО"></td>
        </tr>
        <tr>
          <td>Номер:</td>
          <td><input type="text" name="number" placeholder="+7(9XX)XXX-XX-XX"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="call" value="OK" style="width: 100%;"></td>
        </tr>
      </table>
    </form>




    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>
