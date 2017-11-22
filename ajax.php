<?php
    $login=$_POST['login'];
    $pass=$_POST['password'];
    if($login=="1111" && $pass=="2222"){
        header('Refresh: 2; url="http://'.$host.':8080/"');
        echo "Авторизация прошла успешно";
    }
    else{
        echo "Неверно введен логин или пароль";
    }
?>
