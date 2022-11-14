<?php
if(isset($_COOKIE['my_login']) && isset($_COOKIE['my_pass'])){
    $connectBD = new mysqli("localhost", "root", "", "test");
    $sql_get_login = "SELECT * FROM users";
    $res_login = $connectBD->query($sql_get_login);
    $lg = $_COOKIE['my_login'];
    foreach ($res_login as $log){
        if ($log['login'] === $_COOKIE['my_login'] && $log['pass'] === $_COOKIE['my_pass'] || $_COOKIE['my_login'] === 'admin' && $_COOKIE['my_pass']=== md5('qweqwe')) {
            header("Location: ../public/main.php");

        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--    Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--        End bootstrap-->
    <link rel="stylesheet" href="../css/index.css">

    <script>
function validate(){
    let a = document.forms["form_reg"]["pass"].value;
    let b = document.forms["form_reg"]["repeat_pass"].value;
if (a != b){
    alert("Пароли не совпадают");
    return false;
}
}
    </script>
</head>
<body>



<form class="form_login_admin" name="form_reg" method="post" action="execute_form_registration.php" onsubmit="return validate()" >
    <h1>Зарегистрируйтесь</h1>
    <div class="mb-3" >
        <label for="formGroupExampleInput" class="form-label">Имя:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" required minlength="3" maxlength="10" placeholder="Name" name="name">
    </div>
    <div class="mb-3" >
        <label for="formGroupExampleInput" class="form-label">Фамилия:</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" required minlength="3" maxlength="10" placeholder="Surname" name="surname">
    </div>
    <div class="mb-3" >
        <label for="formGroupExampleInput" class="form-label">логин:</label>
        <input type="text" class="form-control" id="formGroupExampleInput3" required minlength="3" maxlength="10" placeholder="login" name="login">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">пароль:</label>
        <input type="password" class="form-control" id="formGroupExampleInput4" required minlength="5" maxlength="17" placeholder="password" name="pass">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">введите пароль еще раз:</label>
        <input type="password" class="form-control" id="formGroupExampleInput4" required minlength="5" maxlength="17" placeholder="repeat password" name="repeat_pass">
    </div>

    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    <div id="link_reg"><a href="../index.php">Или войдите</a></div>
    <div id="link_reg"><a href="/">на главную</a></div>
</form>










<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>