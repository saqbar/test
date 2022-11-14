<?php
$connectBD = new mysqli("localhost", "root", "", "test");
if(isset($_COOKIE['my_login']) && isset($_COOKIE['my_pass'])) {
    if ($_COOKIE['my_login']=== 'admin' && $_COOKIE['my_pass']=== md5('qweqwe')){
        header("Location: ../public/main.php");
    }
    else{
    $sql_get_login = "SELECT * FROM users";
    $res_login = $connectBD->query($sql_get_login);
    foreach ($res_login as $log){
        if ($log['login'] === $_COOKIE['my_login'] && $log['pass'] === $_COOKIE['my_pass']) {
            header("Location: ../public/main.php");
        }
        else {
            header("Location: ../Authentication/authentication_form.php");
        }   //если нет, редирект на авторизацию
        echo '<hr>';
    }
        }
}else{
header("Location: ../Authentication/authentication_form.php");}
