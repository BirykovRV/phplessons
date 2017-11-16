<?php
require_once 'dbconnection.php';
// коннектимся к базе
$db->Connect();
//таблица куда записывать
$table = 'users';

$data = $_POST;
// если нажата кнопка
if (isset($data['signin']) && !empty($data['password']) && !empty($data['confirm_password']))
{
  //если пароли не совпадают, то записываем эшибку и перенаправляем
  if ($data['password'] != $data['confirm_password']) {
    $_SESSION['err_message'] = 'Пароли не совпадают!';
    header('Location:http://phplessons:8080/reg_view.php');
    exit;
  }
  $email = trim($_POST["email"]);
  //валидация email, если не проходит то выходим
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['err_message'] = "Не верный формат e-mail!";
    header('Location:http://phplessons:8080/reg_view.php');
    exit;
  }
	$name = htmlspecialchars($data['username']);
  //хэшируем пароль
	$pass = password_hash($data['password'], PASSWORD_DEFAULT);
	$message = array();
  //переменна для колонок куда записать данные
	$query = 'login, password, email';
  //массив что записать в колонки
	$data = array($name, $pass, $email);
  //ищем такого пользователя по email
  $find = $db->Find($table, 'email = ?', array($email));
  //если такой есть, то сообщаем это
  if ($find['email'] == $email) {
      header('Location:http://phplessons:8080/reg_view.php');
      $_SESSION['err_message'] = 'Пользователь с таким e-mail существует!';
  }
  else {
    // иначе сохраняем в БД
    $user = $db->Save($table, $query, $data);
    if ($user)
    {
      // Все хорошо,  пользователь зарегистрирован
      // Переписать
      $_SESSION['message'] = 'Вы успешно зарегистрировались!';
      header('Location: http://phplessons:8080/reg_view.php');
    }
    else {
      header('Refresh: 4; url="http://phplessons:8080/"');
      $_SESSION['err_message'] = 'Ошибка добавления пользователя в БД!';
    }
  }
}
else {
  $_SESSION['err_message'] = 'Все поля должны быть заполнены!';
  header('Location: http://phplessons:8080/reg_view.php');
}
