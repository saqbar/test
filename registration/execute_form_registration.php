<?php
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["login"]) && isset($_POST["pass"])) {
    $connectBD = new mysqli("localhost", "root", "", "test");
    if ($connectBD->connect_error) {
        die("Ошибка: " . $connectBD->connect_error);
    }
    $name = $connectBD->real_escape_string($_POST["name"]);
    $surname = $connectBD->real_escape_string($_POST["surname"]);
    $login = $connectBD->real_escape_string($_POST["login"]);
    $pas = $connectBD->real_escape_string($_POST["pass"]);
    $pass= md5($pas);

    $sql_get = "SELECT login FROM users";
    $result = $connectBD->query($sql_get);
    $res = $result->fetch_assoc();

    if ($login !== $res['login'] && $res['login'] != null) {
        $sql = "INSERT INTO users ( name,surname,login,pass ) VALUES ( '$name','$surname','$login', '$pass')";
        if ($connectBD->query($sql)) {
            echo "<h1 id='message_about_reg' style='color: red; text-align: center; margin: 20% 0;'>
                    Вы успешно зарегистрировались, поздравляем
              </h1>";
            header("refresh:2;url=../");  // Перенаправляет через 2 секунды на главную страницу
            setcookie("my_login", $login, time()+60*60,'/');         // ставим куки с жизнью 60 мин
            setcookie("my_pass", $pass, time()+60*60,'/');
            die();

        } else echo "Ошибка: " . $connectBD->error;

        $connectBD->close();
    }else{
        echo "<h1 id='message_about_reg' style='color: red; text-align: center; margin: 20% 0;'>
                    Такой логин уже занят
              </h1>";
        header("refresh:2;url=../registration/registration_form.php");  // Перенаправляет через 3 секунды на главную страницу
        die();
    }
}

