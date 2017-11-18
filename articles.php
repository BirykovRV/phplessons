<?php
require_once 'dbconnection.php';
$db->Connect();
$data = $_POST;
if (isset($data['create_article'])) {
  header('Refresh: 2; url="http://phplessons:8080/add_article.php"');
  echo "Статья добавлена!";
}
