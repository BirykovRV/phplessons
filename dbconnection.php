<?php

require_once 'ORM.php';

$dbType = "mysql:host=10.87.6.140;dbname=mydb";
$username = "root";
$password = "";

$db = new ORM($dbType, $username, $password);
session_start();
