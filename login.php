<?php
include("functions.php");
$is_auth=false;

//session_start();
//echo md5('321');

if (isset($_POST['save']))
{
    $login=$_POST['login'];
    $options=array("options"=>array("default"=>0));
    $login=filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING, $options);
    $password = $_POST['pass'];
    $password = md5($password."murzik");
    $logins=my_select("SELECT * FROM logins WHERE login='$login' AND password='$password'");

    if (count($logins)>0)
    {
        //$is_auth=true;
        $_SESSION["is_auth"]=true;
        $_SESSION["group"]=$logins[0]['group_id'];
        $_SESSION["login"]=$logins[0]['login'];

        echo "Вы авторизованы";
    }
    else
    {
        echo "Неверный логин и пароль!";
    }
}

if (isset($_POST['exit']))
{
    $_SESSION['is_auth']=false;
}

if (isset($_SESSION['is_auth']))
{
    $is_auth=$_SESSION['is_auth'];
}

if (!$is_auth)
{
    ?>
    <html>
        <head>
            <h1>Форма добавления логина</h1>
        </head>

        <form name='auth_form' method='post'>

        <p>
            Введите логин: <br>
            <input type="text" name "login" size="50">
        </p>
        <p>
            Введите пароль: <br>
            <input type="text" type="password" name="pass">
        </p>
        <p>
            <input type="submit" name="save" value="Авторизоваться">
        </p>
        </form>
    </html>
    <?php }
    else
    {
        ?><form name='auth_form' method = 'post'>
            <p><input type="submit" name="exit" value="Выход"></p>
            <a href="index.php">Главная страница</a>
            </p>
        </form><?php
    }