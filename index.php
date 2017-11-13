<?php 
	require_once 'dbconnection.php';

	$db->Connect();
	//$db->SelectOne('users', 'username = ?', array('roman'));
	$db->SelectAll('users', 'username = ?', array('roman'));

 ?>


 <form action="#" method="post">
 	<p>Name:<input type="text" name="username"></p>
 	<p>Password:<input type="password" name="pass"></p>
 	<p><input type="submit" value="Add"></p>
 </form>