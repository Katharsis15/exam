<?php
//session_start();
require 'database.php';
$title = 'Вход';
include 'menu.php';


if (isset($_POST['name'])) {
    $name = htmlspecialchars(addslashes($_POST['name']));
    if ($name == '') {
        unset($name);
    }
}
if (isset($_POST['surname'])) {
    $surname = htmlspecialchars(addslashes($_POST['surname']));
    if ($surname == '') {
        unset($surname);
    }
}

if (isset($_POST['phone'])) {
    $phone = htmlspecialchars(addslashes($_POST['phone']));
    if ($phone == '') {
        unset($phone);
    }
}

if (isset($_POST['login'])) {
    $login = htmlspecialchars(addslashes($_POST['login']));
    if ($login == '') {
        unset($login);
    }
}

if (isset($_POST['password'])) {
    $password = htmlspecialchars(addslashes($_POST['password']));
    if ($password == '') {
        unset($password);
    }
}

$status = htmlspecialchars(addslashes($_POST['status']));
//var_dump($status);

if(!empty($name) && !empty($surname) && !empty($phone) && !empty($login) && !empty($password)) {
    $result = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' AND `status` = '$status'");
    //var_dump($result);

    if (mysqli_num_rows($result) == 0) {
        //var_dump($insert);
        if(mysqli_error($db) == '') {
            $insert = mysqli_query($db, "INSERT INTO `users` (`name`, `surname`, `phone`, `login`, `password`, `status`) VALUES('$name', '$surname', '$phone', '$login', '$password', '$status')");
            echo 'Вы зарегистрированы!<br>';
            echo 'Чтобы войти на сайт, нажмите' . ' ' . '<a href="index.php">сюда</a>';
        } else {
            echo 'Ошибка<br>';
            echo 'Чтобы попробовать снова, нажмите' . ' ' . '<a href="index.php">сюда</a>';
        }
    }
    else {
        echo 'Пользователь с таким логином и статусом уже существует!<br>';
        echo 'Чтобы попробовать снова, нажмите' . ' ' . '<a href="index.php">сюда</a>';
    }
}
?>
</body>
</html>

<!--
$sel = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' AND `status` = '$status'");
$num = mysqli_num_rows($sel);

if($num == 0) {

    //добавляем в бд
    $sql = mysqli_query($db, "INSERT INTO `users` (`name`, `surname`, `phone`, `login`, `password`, `status`) VALUES('$name', '$surname', '$phone', '$login', '$password', '$status')");
    if($sql) {
        echo "Вы зарегистрированы!";
    } else {
        echo "Error";
    }

}
else { echo "Пользователь с таким логином и статусом уже существует! "; }
*/

/*
if (isset($_POST['name'])) {
            $name = htmlspecialchars(addslashes($_POST['name']));
        if ($name == '') {
                unset($name);
        }
}
if (isset($_POST['surname'])) {
    $surname = htmlspecialchars(addslashes($_POST['surname']));
    if ($surname == '') {
        unset($surname);
    }
}

if (isset($_POST['phone'])) {
    $phone = htmlspecialchars(addslashes($_POST['phone']));
    if ($phone == '') {
        unset($phone);
    }
}

if (isset($_POST['login'])) {
    $login = htmlspecialchars(addslashes($_POST['login']));
    if ($login == '') {
        unset($login);
    }
}

if (isset($_POST['password'])) {
    $password = htmlspecialchars(addslashes($_POST['password']));
    if ($password == '') {
        unset($password);
    }
}

$name = htmlspecialchars(addslashes($_POST['name']));
$surname = htmlspecialchars(addslashes($_POST['surname']));
$phone = htmlspecialchars(addslashes($_POST['phone']));
$login = htmlspecialchars(addslashes($_POST['login']));
$password = htmlspecialchars(addslashes($_POST['password']));
$status = htmlspecialchars(addslashes($_POST['status']));
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($name) or empty($surname) or empty($phone) or empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
//той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя с таким же логином
$result = mysqli_query($db, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `status` = '$status' ");
$my_row = mysqli_fetch_array($result);
if (!empty($my_row['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
// если такого нет, то сохраняем данные
$result2 = mysqli_query($db, "INSERT INTO `users` (`login`, `password`) VALUES ('$login','$password')");
// Проверяем, есть ли ошибки
if ($result2 = TRUE)
{
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}
else {
    echo "Ошибка! Вы не зарегистрированы.";
}
//header('Location: index.php'); -->