<?php
include('../if_authenticated.php');
include('menu_panel.php');
$connectBD = new mysqli("localhost", "root", "", "test");
$my_login = $_COOKIE['my_login'];
$my_pass = $_COOKIE['my_pass'];
$pass_admin = md5('qweqwe');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title></title>
</head>
<body>
<div id="container">
    <div id="aditional_menu">
        <?php menu_panel(); ?>
    </div>
</div>


<form class="form_login_admin" method="post" action="execute_link.php" >
    <h1>Сократить ссылку</h1>
    <br>
    <div class="mb-3" >
        <input type="text" class="form-control" id="formGroupExampleInput" required minlength="3" maxlength="20" placeholder="link" name="link">
    </div>
    <button type="submit" class="btn btn-primary" style="width: 170px">Сократить</button>
</form>
<hr>


<section>
    <table class="table">
        <thead>
        <tr>
            <?php if ($my_login === 'admin' && $my_pass === $pass_admin){
                echo '<th scope="col">логин</th>';
            }  ?>
            <th scope="col">короткие ссылки</th>
            <th scope="col">изначальные ссылки</th>
            <th scope="col">удалить</th>
        </tr>
        </thead>
        <tbody>

        <?php
        // если админ
        if ($my_login === 'admin' && $my_pass === $pass_admin) {
            $sql_get_links = "SELECT * FROM links";
            $res_links = $connectBD->query($sql_get_links);
            foreach ($res_links as $links){
                echo '<tr>';
                echo '<td>'.$links['login'].'</td>';
                echo '<th scope="row"><a href="' .$links['link'] .'" class="txt_dec">' .$links['short_link'].'</a></th>';
                echo '<td>'.$links['link'].'</td>';
                echo '<td><button type="submit" class="btn btn-primary" style="width: 120px" value="delete"><a href="execute_link.php?delete='.$links['id'].'" style="color: aliceblue">удалить</a></button></td>';
                echo '</tr>';
            }
        } // если не админ
        elseif ($my_login != 'admin' && $my_pass != $pass_admin) {
            $sql_get_link = "SELECT * FROM links WHERE login = '$my_login' ";
            $res_link = $connectBD->query($sql_get_link);
            foreach ($res_link as $log) {
                echo '<tr>';
                echo '<th scope="row"><a href="' . $log['link'] . '" class="txt_dec">' . $log['short_link'] . '</a></th>';
                echo '<td>' . $log['link'] . '</td>';
                echo '<td><button type="submit" class="btn btn-primary" style="width: 120px" value="delete"><a href="execute_link.php?delete=' . $log['id'] . '" style="color: aliceblue">удалить</a></button></td>';
                echo '</tr>';
            }
        }


        ?>





</section>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>
</html>




