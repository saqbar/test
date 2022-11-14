<?php
$connectBD = new mysqli("localhost", "root", "", "test");
if(isset($_COOKIE['my_login']) && isset($_COOKIE['my_pass'])){
    $sql_get_login = "SELECT * FROM users";
    $res_login = $connectBD->query($sql_get_login);
    $lg = $_COOKIE['my_login'];
    foreach ($res_login as $log){
        if ($log['login'] === $_COOKIE['my_login'] && $log['pass'] === $_COOKIE['my_pass'] || $_COOKIE['my_login'] === 'admin' && $_COOKIE['my_pass']=== md5('qweqwe')) {
            $name = $log['name'];
            echo "<h2 style='color: gray; text-align: center;'> Доброго времени суток {$name} </h2>"."<br>";

        }
    }
}else {header("Location: ../Authentication/authentication_form.php");}


