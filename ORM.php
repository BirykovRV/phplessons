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

	private function valueCoun()
	{
		$str = '?';
		$count = str_word_count($this->sql);

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

	public function SelectRow($limit)
	{		 
		$this->STH = $this->DBH->prepare("SELECT * FROM $this->table WHERE $this->sql LIMIT $limit");		
		$this->STH->execute($this->data);
		if ($row = $this->STH->fetch()) 
		{
			return $row;
		}
		else 
		{
			echo '<p>В таблице не найдено ни одной записи(</p>';
		}		
	}

	public function SelectAll()
	{
		$this->STH = $this->DBH->prepare("SELECT * FROM $this->table WHERE $this->sql");		
		$this->STH->execute($this->data);
		return $row = $this->STH->fetch();
	}

	public function Insert()
	{	
		$values = $this->valueCoun();

		$this->STH = $this->DBH->prepare("INSERT INTO $this->table ($this->sql) VALUES ($values)");
		try 
		{
			$this->STH->execute($this->data);
			return true;
		} 
		catch (Exception $e) 
		{
			return false;
		}
	}
}
