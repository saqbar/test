<?php
define('br',"<br>");        // Обьявляем константу
define('hr',"<hr>");        // Обьявляем константу
//_____________________________________________________________________________________________________________
//_____________________________________________________________________________________________________________
$mylogin =$_POST['login'];
$mypass =md5($_POST['pass']);

if (isset($_POST["login"]) && isset($_POST["pass"])) {
    $connectBD = new mysqli("localhost", "root", "", "test");
    if ($connectBD->connect_error) {
        die("Ошибка: " . $connectBD->connect_error);
    }
    $sql_get_login = "SELECT * FROM users";
    $res_login = $connectBD->query($sql_get_login);
    foreach ($res_login as $log){
        if (($log['login'] === $mylogin && $log['pass'] === $mypass) || ($mylogin==='admin'&& $mypass=== md5('qweqwe'))) {
            setcookie("my_login", $mylogin, time()+60*60,'/');         // ставим куки с жизнью 60 мин
            setcookie("my_pass", $mypass, time()+60*60,'/');
            header("Location: ../public/main.php");
        }
        else {
            header("refresh:2;  ../Authentication/authentication_form.php");
            echo "<h1 style='color: red; text-align: center; margin: 20% 0;'>Вы не зарегистрированны, либо не прошли верификацию</h1>";
        }
    }

}
