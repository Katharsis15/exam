<?php
session_start();
require 'database.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация и авторизация</title>
    <style>
div {
    float: left;
    width: 50%;
}
h2 {
    text-align: left;
}
    </style>
</head>
<body>

<?php
if (!isset($_SESSION['login'])) {
?>
<div>
<h2>Регистрация</h2>
    <form action="check.php" method="post">
        <p>
            <label for="name">Ваше имя:<br></label>
            <input name="name" type="text" id="name">
        </p>
        <p>
            <label for="surname">Ваша фамилия:<br></label>
            <input name="surname" type="text" id="surname">
        </p>
        <p>
            <label for="phone">Ваш номер телефона:<br></label>
            <input name="phone" type="tel" id="phone">
        </p>
        <p>
            <label for="login-reg">Ваш логин:<br></label>
            <input name="login" type="text" id="login-reg">
        </p>
        <p>
            <label for="password-reg">Ваш пароль:<br></label>
            <input name="password" type="password" id="password-reg">
        </p>
        <p>
            <label for="status-reg">Ваш статус:<br></label>
            <select size="1" name="status" id="status-reg">
                <option disabled>Выберите Ваш статус</option>
                <option value="client">Клиент</option>
                <option selected value="master">Мастер</option>
            </select></p>
        <p><input type="submit" name="submit" value="Зарегистрироваться">
        </p></form>
</div>

<div>
    <h2>Вход</h2>
        <form action="auth.php" method="post">
            <p>
                <label for="login-auth">Ваш логин:<br></label>
                <input name="login" type="text" id="login-auth">
            </p>
            <p>
                <label for="password-auth">Ваш пароль:<br></label>
                <input name="password" type="password" id="password-auth">
            </p>
            <p>
                <label for="status-auth">Ваш статус:<br></label>
                <select size="1" name="status" id="status-auth">
                    <option disabled>Выберите Ваш статус</option>
                    <option value="client">Клиент</option>
                    <option selected value="master">Мастер</option>
                </select></p>
            <p><input type="submit" name="submit" value="Войти"></p>
        </form>
</div>

<?php } else { ?>
    <h1>Добро пожаловать, <?= $_SESSION['login']; ?></h1>
    <h2>Для загрузки аватара нажмите <a href="photo.php">сюда</a></h2>
    <h2>Для выхода нажмите <a href="exit.php">сюда</a></h2>
<?php } ?>

<div class="gallery">

    <ul>
        <li>

        </li>
    </ul>
</div>
</body>
</html>