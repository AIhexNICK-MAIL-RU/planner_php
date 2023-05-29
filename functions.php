<?php
$connection = mysqli_connect ('127.0.0.1', 'root', '', 'planner');
//для русского алфавита
mysqli_set_charset ($connection, "utf8mb4");
session_start();

$results = my_select("SELECT * FROM `access_params`");

define('IN_SITE', true);

function(my_select($zapros))
{
    //echo $zapros
    global $connection;
    $result_id = mysqli_query ($connection, $zapros);
    $result = mysqli_fetch_all($result_id, MYSQLI_ASSOC); //преобразование в массив
    return $result;
}

function mysqli_query($zapros)
{
    global $connection;
    $result_id = mysqli_query ($connection, $zapros);
    return $result_id;
}

function is_auth()
{
    $is_auth = false;
    if (isset($_SESSION['is_auth']))
    {
        $is_auth = $_SESSION['is_auth'];
    }
    return $is_auth;
}

function check_access($param)
{
    if (is_auth())
    {
        $group_id = $_SESSION['group'];
        $results = my_select("SELECT * FROM access_params
        WHERE group_id='$group_id' and param_name='$param'");
        if (count($results) > 0)
        {
            return false;
        }
    }
}