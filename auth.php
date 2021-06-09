<?php
session_start();
require 'database.php';

if (isset($_POST['login'])){
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

if (!empty($login) && !empty($password)) { // проверяем, что логин и пароль заполнены
    // выполняем запрос на поиск пользователя в БД
    $result = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `status` = '$status'");

    if (mysqli_num_rows($result) !== 0) { // если пользователь найден, то создаем сессию
        $user = mysqli_fetch_assoc($result); // получаем данные о пользователе из результата запроса

        $_SESSION['login'] = $login;
        $_SESSION['id'] = $user['id'];
        echo 'Вход успешно выполнен.<br>';
        echo 'Добро пожаловать, ' . $login;

    } else {
        echo "Такой пользователь не найден";
    }
}
/*$login = htmlspecialchars(addslashes($_POST['login']));
$password = htmlspecialchars(addslashes($_POST['password']));
$status = htmlspecialchars(addslashes($_POST['status']));

$result = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `status` = '$status'");
$num = mysqli_num_rows($result);

//for ($i = 0; $i < $num; $i++) {
  //  $row = mysqli_fetch_assoc($result);
  //  echo $row['login'];
  //  echo $row['password'];
//}

$user = mysqli_fetch_assoc($result);
$query = mysqli_query($db, "SELECT `login`, `password`, `status` FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `status` = '$status'");
//$query = mysqli_query($db, "SELECT `login`, `password`, `status` FROM `users` WHERE `login` =  '" . mysqli_real_escape_string($db, $_POST['login']) . "' LIMIT 1' AND `password` = '" . mysqli_real_escape_string($db,$_POST['password']) . "' LIMIT 1' AND `status` = '" . mysqli_real_escape_string($db, $_POST['status']) . "' LIMIT 1");

if($query)  {
    setcookie('user', $user['login'], time() + 3600, "/");
    echo 'Добро пожаловать, ' . $login;
} else {
    echo "Такой пользователь не найден";
}
//header('Location: index.php');
*/


?>