<?php 	

	/*function connectDB()
	{
		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myDB";
		try 
		{
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $DBH;
		} 
		catch (PDOException $e) 
		{
			echo "Connection failed: " . $e->getMessage();
		}
	}*/

	/*function closeDB($DBH)
	{
		$DBH = null;
	}

	function AddUser($name, $pass)
	{
			$STH = connectDB()->prepare("INSERT INTO users (username, password) VALUES (:name, :pass)");
			$data = ['name' => $name, 'pass' => $pass];
			$STH->execute($data);
			closeDB($DBH);
			echo 'Успех!';
	}

	function SelectUserByName($name)
	{
		$STH = connectDB()->prepare("SELECT * FROM users WHERE 'name' = :name");
		$STH->bindParam(':name', $name);
		$STH->execute();
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		while ($row = $STH->fetch()) {
		    if ($row['name'] == $name) {
		    	return $row['name'];
		    	break;
		    }
		}
	}*/
?>
 