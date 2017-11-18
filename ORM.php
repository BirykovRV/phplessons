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

	private function valueCoun($query)
	{
		$str = '?';
		$count = str_word_count($query);

		if ($count == 1)
		{
			return $str;
		}
		else
		{
			for ($i = 0; $i < $count-1 ; $i++)
			{

				$str .= ', ?';
			}
		}
		return $str;
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

	public function Find($table, $query = NULL, $data = array())
	{
		try {
			$this->STH = $this->DBH->prepare("SELECT * FROM $table WHERE $query");
			$this->STH->execute($data);
			return $row = $this->STH->fetch();
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function FindAll($table, $query = NULL, $data = array())
	{
		try {
			$this->STH = $this->DBH->prepare("SELECT * FROM $table WHERE $query");
			$this->STH->execute($data);
			return $row = $this->STH->fetchAll();
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function Save($table, $query = NULL, $data = array())
	{
		$values = $this->valueCoun($query);

		$this->STH = $this->DBH->prepare("INSERT INTO $table ($query) VALUES ($values)");
		try
		{
			$this->STH->execute($data);
			return true;
		}
		catch (PDOException $e)
		{
			return $e;
		}
	}
}
