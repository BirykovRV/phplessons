<?php
require_once 'dbconnection.php';
$db->Connect();
//таблица куда записать
$table = 'users';
//часть запроса, что искать
$query = 'email = ?';
$data = $_POST;

//если нажата кнопка
if (isset($data['signup'])) {
  //если поля не пустые
  if (!empty($data['email']) && !empty($data['password'])) {
    $email = trim($_POST["email"]);
    $arr = array($email);
    //валидация поля email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    //если находим строку с такими данными
    if ($row = $db->Find($table, $query, $arr)) {
      //проверяем на совпадение паролей
      if (password_verify($data['password'], $row['password'])) {
        $_SESSION['user'] = $row;
        header('Refresh: 2; url="http://'.$host.':8080/"');
        echo "Вы успешно авторизовались!";
      }
      else {
        header('Location:http://'.$host.':8080/auth_view.php');
        $_SESSION['err_message'] = "Логин и/или пароль не верны!";
      }
    }
    else {
      header('Location:http://'.$host.':8080/auth_view.php');
      $_SESSION['err_message'] = "Такого пользователя нет!";
    }
  }
}
else {
  //иначе переправляем на главную
  header('Location:http://'.$host.':8080/');
}
