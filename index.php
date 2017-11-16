<?php
require_once 'dbconnection.php';

$db->Connect();
$table = 'users';

$data = $_POST;

if (isset($data['signup']))
{
	$name = htmlspecialchars($data['username']);
	$pass = password_hash($data['pass'], PASSWORD_DEFAULT);
	$message = array();

	$query = 'login, password';
	$data = array($name, $pass);

	$user = $db->Save($table, $query, $data);
	if ($user)
	{
			// Все хорошо,  пользователь зарегистрирован
		$message[] = 'Вы успешно зарегистрировались!';
	}
	else
	{
		$message[] = 'Ошибка добавления пользователя в БД!';
	}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>Главное меню</title>
  </head>
  <body>
    <a href="reg_view.php">Регистрация</a><br>
    <a href="auth_view.php">Авторизация</a>


    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
  </body>
</html>
