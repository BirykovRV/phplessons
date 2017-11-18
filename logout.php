<?php
require_once 'dbconnection.php';
unset($_SESSION['user']);
header('Location: /');
