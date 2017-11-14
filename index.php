<?php 
require_once 'dbconnection.php';

$db->Connect();
$db->table = 'users';

$db->sql = 'login = ?';
$db->data = array('Roman');

//$row = $db->SelectRow(2);
$row = $db->SelectAll();
 echo $row['login'];

$data = $_POST;

if (isset($data['signup'])) 
{
	$name = htmlspecialchars($data['username']);
	$pass = password_hash($data['pass'], PASSWORD_DEFAULT);
	$errors = array();

	$db->sql = 'login, password';
	$db->data = array($name, $pass);

	$user = $db->Insert();
	if ($user) 
	{
			// Все хорошо,  пользователь зарегистрирован
		echo '<p style="color: green;"> Вы успешно зарегистрировались! </p>';
	}
	else
	{
		$errors[] = 'Ошибка добавления пользователя в БД!';
		echo '<p>'.array_shift($errors).'</p>';
	}		
}

?>

<dir><?php echo array_shift($errors) ?></dir>
<form action="index.php" method="post">
	<p>Name:<input type="text" name="username"></p>
	<p>Password:<input type="password" name="pass"></p>
	<p><input type="submit" name="signup" value="Add"></p>
</form>