<?php

require_once 'ORM.php';

$host = 'phplessons';

$dbType = "mysql:host=localhost;dbname=mydb";
$username = "root";
$password = "";

$db = new ORM($dbType, $username, $password);
session_start();
