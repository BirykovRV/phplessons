<?php 
	require_once 'dbconnection.php';

	$db->Connect();
	//$db->SelectOne('users', 'username = ?', array('roman'));
	$data = $_POST;

	if (isset($data['signup'])) 
	{
		$errors = array();
		$name = htmlspecialchars($data['username']);
		$pass = password_hash($data['pass'], PASSWORD_DEFAULT);
		$user = $db->Insert('users', 'login, password', array($name, $pass));
		if ($user) 
		{
			// Все хорошо, пользователь найден
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