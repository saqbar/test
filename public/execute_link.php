<?php
if (isset($_POST['link'])){
    $connectBD = new mysqli("localhost", "root", "", "test");
    if ($connectBD->connect_error) {
        die("Ошибка: " . $connectBD->connect_error);
    }
$login = $_COOKIE['my_login'];
$link = $_POST['link'];
    $text = strip_tags($link); //убирает html теги
    $a = stristr($text, '.', true); // вырезаем до точки
    $rand ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $b = substr(str_shuffle($rand), 0, 5);

$short_link = "saq.bar/{$a}_{$b}";



$sql = "INSERT INTO links ( login,short_link,link ) VALUES ( '$login','$short_link','$text')";
    if ($connectBD->query($sql)) {
        header("Location: ../");
    }

}
elseif (isset($_GET['delete'])){
    $del = $_GET['delete'];
    $connectBD = new mysqli("localhost", "root", "", "test");
    if ($connectBD->connect_error) {
        die("Ошибка: " . $connectBD->connect_error);
    }
    $sql = "DELETE FROM links WHERE id=$del";
    if ($connectBD->query($sql)) {
        header("Location: ../");
    }
}
