<?php
require_once 'dbconnection.php';

$db->Connect();
$table = 'users';
$query = 'login = ?';
$data = array('Roman');
//
//$row = $db->SelectRow(2);
$row = $db->Find($table, $query, $data);
echo "Привет, " . $row['login'];


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

<dir><?php echo array_shift($message) ?></dir>
<form action="index.php" method="post">
	<p>Name:<input type="text" name="username"></p>
	<p>Password:<input type="password" name="pass"></p>
	<p><input type="submit" name="signup" value="Add"></p>
</form>
