<?php
require_once 'dbconnection.php';
unset($_SESSION['username']);
header('Location: /');
