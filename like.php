<?php
require_once 'dbconnection.php';
$db->Connect();
/** Получаем наш ID статьи из запроса */
$id = intval($_POST['id']);
$count = 0;
$message = '';
$error = true;

/** Если нам передали ID то обновляем */
if($id){

    $db->AddLike($id);
    $count = isset($result['count_like']) ? $result['count_like']  : 0;

    $error = false;
}else{
    /** Если ID пуст - возвращаем ошибку */

    $error = true;
    $message = 'Статья не найдена';
}

/** Возвращаем ответ скрипту */

// Формируем масив данных для отправки
$out = array(
    'error' => $error,
    'message' => $message,
    'count' => $count,
);

// Устанавливаем заголовок ответа в формате json
header('Content-Type: text/json; charset=utf-8');

// Кодируем данные в формат json и отправляем
echo json_encode($out);
