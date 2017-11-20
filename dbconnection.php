<?php

require_once 'ORM.php';

$host = '10.87.6.140';

$dbType = "mysql:host=$host;dbname=mydb";
$username = "root";
$password = "";

$db = new ORM($dbType, $username, $password);
session_start();
