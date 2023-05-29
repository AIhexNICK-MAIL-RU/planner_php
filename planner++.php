<html>
    <head>
        <title>Занесение задачи в систему</title>
    </head>
    <body>

    <?php
    //include("functions.php");
    if (!defined('IN_SITE'))
    {
        die("ACCESS DENIED");
    }

    $edit = false;
    $project_description = '';
    $header = '';
    $comment = '';
    $language = '';
    $category_problem = '';
    $category = 0;
    $client = '';

    if (isset($_GET['edit']))
    {
        $edit = true;
        $request_id = $_GET['id'];

        $request_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $sql = "SELECT * FROM tasks WHERE id = '$request_id'";
        $result_id = mysqli_query($connection, $sql);
        $result = mysqli_fetch_all($result_id, MYSQLI_ASSOC);
        print_r($result);
        $project_description = $result[0]['Description'];
        $header = $result[0]['Header'];
        $comment = $result[0]['Comment'];
        $language = $result[0]['Language'];
        $category = $result[0]['Category'];
        $client = $result[0]['Client'];
    }

    if ($edit)
    {
        echo "Режим редактирования";
    } 
    else
    {
        echo "Режим добавления";
    }

    print_r($_POST); //
    if (isset($_POST['save']))
    {
        $Header = $_POST['project_name'];
        $Description = $_POST['project_description'];
        $Client = $_POST['users'];
        $Period = $_POST['project_date'];
        $Category = $_POST['category_problem'];
        $Comment = $_POST['comment'];
        $Language = $_POST['language'];
        $Start_task = $_POST['Start_task'];

        if (isset($_POST['id']))
        {
            $Header = "UPDATE tasks SET name='$project_name',
            Description = '$description',
            Client = '$users',
            Period = '$project_date',
            Category = '$category_problem',
            Comment = '$comment',
            Language = '$language',
            Start_task = '$Start_task'";
        }
        else
        {
            $zapros3 = "INSERT INTO tasks ('$project_name', '$project_description', '$users', '$project_date', 
            '$category_problem', '$comment', '$language', '$Start_task')";
        };

        print $query = "INSERT INTO tasks (Header, Description, Client, Period, Category, Comment, Language, 
        Start_task) VALUES ('$Header', '$Description', '$Client', '$Period', '$Category', '$Comment',
        '$Language', '$Start_task')";
        mysqli_query($connection, $query);
    }
    if (isset($_POST['del']))
    {
        $save_id = $_POST['id'];
        $zapros3 = "DELETE FROM tasks WHERE id='$save_id'";
        mysqli_query($connection, $zapros3);
        ?><p style="color:orange">Удаляем запись!<?php
    }
    else
    {
        ?><p style="color:red">Данные не сохранены!</p><?php
    }
    ?>
    <table border="1">
        <thead>
        </thead>
        <tbody>


            </tr>
        </tbody>
    </table>

    <form method="post" name="form">
        <p>
            Введите наименование задачи (Header)<br>
            <input type="text" name="project_name" size="50" value="<?=$header?>">
            <?php
            //$v = array('name' => $name, 'text' => $text);

            ?>
        </p>
        <p>
            Введите описание задачи (Description) <br>
            <textarea name="project_description"><?=$project_description?></textarea>
        </p>
        <p>
            Введите имя заказчика (Client)<br>
            <select name="users">
                <option value="0">--</option>
                <?php
                $request = "SELECT * FROM users";
                $result_id = mysqli_query($connection, $request);
                $result = mysqli_fetch_all($result_id, MYSQLI_ASSOC);
                foreach($result as $v)
                {
                    if ($v['id_client'] == $client)
                    {
                        $selected = 'selected';
                    }
                    else
                    {
                        $selected = '';
                    }

                    ?>
                    <option value="<?=$v['id_user']?>"><?=$v['username']?></option>

                    <?php
                }

                ?>
                </select>

            </p>

            <p>
                Выберите дату (Period)<br>
                <input type="date" name="project_date" size="50">
            </p>

            <p>
                Выберите категорию (Category)<br>
                <select name="category_problem">
                    <option value="0">--</option>
                    <?php
                    $request = "SELECT * FROM category_problem";
                    $result_id = mysqli_query($connection, $request);
                    $result = mysqli_fetch_all($result_id, MYSQLI_ASSOC);
                    foreach ($result as $v)
                    {
                        if ($v['id_category'] == $category)
                        {
                            $selected = 'selected';
                        }
                        else
                        {
                            $selected = '';
                        }
                    }
                    ?>
                    <option value="<?=$v['id_category']?>"
                    <?=$selected?>><?=$v['name_category']?></option>
                    <?php } ?>
                </select>

                </p>

                <p>
                    Комментарии (Comment)<br>
                    <input type="text" name="comment" size="60" value="<?=$comment?>"> <!--исправить код ИСПРАВЛЕНО -->
                </p>

                <p>
                    Выберите язык (Language)<br>
                    <input type="text" name="language" size="20" value="<?=$language?>">
                </p>

                <p>
                    Выберите дату старта проекта (Start_task)<br>
                    <input type="date" name="Start_task" size="20">
                </p>

                <p>
                    <?php if ($edit) { ?>
                        <input type="submit" name="save" value="Сохранить изменения">
                        <input type="submit" name="del" value="Удалить задачу">
                        <input type="submit" name="id" value="<?=$request_id?>">
                        <?php } else {
                            ?> <input type="submit" name="save" value="Сохранить">
                        <?php } ?>
                </p>

                </html>
 