<?php
//session_start();
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
            Выберите Ваш статус:<br>
            <input name="status" checked type="radio" value="master" id="status-reg-master">
            <label for="status-reg-master">Мастер</label>

            <input name="status" type="radio" value="client" id="status-reg-client">
            <label for="status-reg-client">Клиент</label>
            <!--
            <select name="status" size="1" id="status-reg">
               <option disabled>Выберите Ваш статус</option>
                <option value="client">Клиент</option>
                <option value="master">Мастер</option>
            </select>-->

            </p>
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
                <!--
                <select size="1" name="status" id="status-auth">
                    <option disabled>Выберите Ваш статус</option>
                    <option value="client">Клиент</option>
                    <option selected value="master">Мастер</option>
                </select>-->
                Выберите Ваш статус:<br>
                <input name="status" checked type="radio" value="master" id="status-auth-master">
                <label for="status-auth-master">Мастер</label>

                <input name="status" type="radio" value="client" id="status-auth-client">
                <label for="status-auth-client">Клиент</label>
                </p>
            <p><input type="submit" name="submit" value="Войти"></p>
        </form>
</div>

<?php } else { ?>
    <h1>Добро пожаловать, <?= $_SESSION['login']; ?></h1>
    <h2>Для загрузки фото нажмите <a href="photo.php">сюда</a></h2>
    <h2>Для выхода нажмите <a href="exit.php">сюда</a></h2>
<?php } ?>
</body>
</html>