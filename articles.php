<<?php
require_once 'dbconnection.php';
$db->Connect();
$data = $_POST;
if (isset($data['create_article'])) {
  echo "Button is pressed";
}
