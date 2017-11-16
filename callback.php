<?php
//email to support
$to = "r.v.birukov@yandex.ru";
//subject
$subject = "Call Back";

if (isset($_GET['call'])) {
  //кнопка нажата
  if (!empty($_GET['name']) && !empty($_GET['number'])) {
    $name = htmlspecialchars($_GET['name']);
    $number = htmlspecialchars($_GET['number']);

    $msg = "<html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            <p>This email contains HTML Tags!</p>
            <table>
            <tr>
            <th>Name</th>
            <th>Mobile Phone</th>
            </tr>
            <tr>
            <td>$name</td>
            <td>$number</td>
            </tr>
            </table>
            </body>
            </html>
            ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    if (mail($to, $subject, $msg, $headers)) {
      header('Refresh: 3; url="callback_view.php"');
      echo "Запрос отправлен успешно!";
    }
  }
  else {
    echo "нельзя так";
  }
}
else {
  //если перешли сюда на прямую то возвращаем обратно
  header('Location:callback_view.php');
}
