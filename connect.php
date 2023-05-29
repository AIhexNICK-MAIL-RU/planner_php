<?php

$mysqli = mysqli_connect('127.0.0.1', 'root', '', 'vniigaz');
mysqli_select_db($mysqli, "vniigaz");
mysqli_set_charset($mysqli, "utf8");
$zapros = "INSERT INTO employers (id, name, age, post, dep_id) VALUES (5, 'Пушкин', 33, 2, 2)";

/*
for ($i=0; $i<=100; $i++)
{
    $id = '6'.$i;
    $name = 'Пушкин'.$i;
    $zapros = 'INSERT INTO employers (id, name, age, post, dep_id) VALUES ('$id', '$name', 33, 2, 3);
    mysqli_query($mysqli, $zapros);
} */

$request = "SELECT * FROM employers";
$result_id = mysqli_query($mysqli, $request);
$x = 0;
while ($x < mysqli_num_rows($result_id))
{
    $result[]=mysqli_fetch_array($result_id);
    $x++;
}

/*
$result = mysqli_fetch_all($result_id);
?><pre><?php
print_r($result);
*/

/*
?><pre><?php
print_r($result);
?></pre><?php
*/

/*
for($i = 0; $i<count($result); $i++)
{
    echo $result[$i]['name'];
    echo "-->";
    echo $result[$i]['age'];
    echo "<br>";
}
$result = [];
$post_e = "SELECT * FROM posts";
$post_name_post = mysqli_query($mysqli, $post_e);
$x = 0;
while ($x<mysqli_num_rows($post_name_post))
{
    $result[] = mysqli_fetch_array($post_name_post);
    $x++;
}
*/
// result = [];
for ($i = 0; $i < count($result); $i++)
{
    $id=$result[$i]['id'];
    $rname = $result[$i]['name'].'0001';
    $rname_e = "UPDATE employers SET name = '$rname' WHERE id='$id'";
    mysqli_query($mysqli, $rname_e);
    // echo $result[$i]['name_post'];
    echo "<br>";
}

$rename_p = mysqli_query($mysqli, "UPDATE posts SET name_post='менеджер' WHERE id=1");

$name_d='Пушкин%';
$rname_d = "DELETE FROM employers WHERE name LIKE 'Пушкин%'";
mysqli_query($mysqli, $rname_d);

/*
$rname_e = mysqli_query($mysqli, "UPDATE employers SET name='
for ($i=0; $i<count($result); $i++)
{
    echo $result[$i]['name'];
    echo "<br>";
}
'")
*/

var_dump($result);
?>