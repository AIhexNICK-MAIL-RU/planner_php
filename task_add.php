<h1>Форма добавления задачи</h1>
<a href="index.php">Главная страница</a>
<?php
include("functions.php");
?>

<?php

if(isset($_SESSION['is_auth']))
{
    $is_auth=$_SESSION['is_auth'];
}

include("planner++.php");
?>

<?php

if(is_auth())
{
    echo 'Привет, '._SESSION['login'];
}
else
{
    ?><a href=http://localhost/connect_base_plus_php/login.php>Авторизоваться</a><?php
}
?>
<form name='auth_form' method='post'>
    <p><input type="submit" name="exit" value="Выход"></p>
</p>
</form>
