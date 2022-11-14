<?php
if ($_COOKIE){
    setcookie('my_pass','',time()-10,'/');
    setcookie('my_login','',time()-10,'/');
    header("Location: /");
}