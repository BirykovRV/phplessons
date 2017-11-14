<?php

class ORM
{    
	private $DBH;
	private $STH;
	private $dbType;
	private $username;
	private $password;
	public $sql;
	public $table;
	public $data;

	public function __construct($dbType, $username, $password)
	{
		$this->dbType = $dbType;
		$this->username = $username;
		$this->password = $password;
	}

	public function Connect()
	{
		try 
		{    		
			$this->DBH = new PDO($this->dbType, $this->username, $this->password);
			$this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);			
		} 
		catch (PDOException $e)
		{
			echo 'Connection failed: ' . $e->getMessage();;
		}
	}

	public function Close()
	{
		$this->DBH = null;
	}

	public function SelectOne($table, $sql = NULL, $data = array())
	{		 
		$this->STH = $this->DBH->prepare("SELECT * FROM $table WHERE $sql LIMIT 1");		
		$this->STH->execute($data);
		if ($row = $this->STH->fetch()) 
		{
			var_dump($row);
		}
		else 
		{
			echo '<p>В таблице не найдено ни одной записи(</p>';
		}		
	}

	public function SelectAll($table, $sql, $data)
	{		 
		$this->STH = $this->DBH->prepare("SELECT * FROM $table WHERE $sql");		
		$this->STH->execute($data);
		return $row = $this->STH->fetch();
	}

	public function Insert($table, $sql, $data)
	{
		$this->STH = $this->DBH->prepare("INSERT INTO $table ($sql) VALUES (?, ?)");
		try 
		{
			$this->STH->execute($data);
			return true;
		} 
		catch (Exception $e) 
		{
			return false;
		}
	}
}
