<?php
//session_start();
include("functions.php")
$count_visits = 1;
if (isset($_SESSION["count_visits"])) 
{
    $count_visits = $_SESSION["count_visits"] + 1;
}
$_SESSION["count_visits"] = $count_visits;

?>

<h1>Главная страница<h1>
    <?php
    if (is_auth() && check_access("add_task"))
    {
        ?><a href="task_add.php">Добавить задачу</a><?php
    }
    ?>

<?php
/*
$result = my_select("SELECT * FROM `access_params`");
?><pre><?php
print_r($results);
?></pre><?php

echo $results[1]['param_name'];*/

/*
$count_visits = 1;
if (isset($_COOKIE["count_visits"]))
{
    $count_visits = $_COOKIE["count_visits"] + 1;
}
setcoockie("count_visits", $count_visits, strtotime("+30 days"));
*/

echo "Количество посещений: ".$count_visits;

include("planner_info+.php");
//include("login.php");

if (is_auth())
{
    echo 'Привет, '.$SESSION['login'];
}
else
{
    echo 'Авторизуйтесь';
}
?>

<form name='auth_form' method='post'>
    <p><input type="submit" name="exit" value="Выход"></p>
    <a href="index.php">Главная страница</a>
</p>
</form><?php