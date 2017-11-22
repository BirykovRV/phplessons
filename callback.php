<?php
//email to support
require_once 'dbconnection.php';
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
      $_SESSION['message'] = "Запрос отправлен успешно!";
      header('Location:http://'.$host.':8080/callback_view.php');
    }
  }
  else {
    $_SESSION['err_message'] = "Не заполенны все поля!";
    header('Location:http://'.$host.':8080/callback_view.php');
  }
}
else {
  //если перешли сюда на прямую то возвращаем обратно
  header('Location:http://'.$host.':8080/callback_view.php');
}
