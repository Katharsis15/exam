<?php
require 'database.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
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
<form action="loadavatar.php" method="post" enctype="multipart/form-data">
    <p>
        <label for="file">Загрузите Ваш аватар (допустимые расширения: ".jpg", ".png", ".gif"; максимальный размер файла )<br></label>
        <input name="file" type="file" id="file">
    </p>
    <p>
        <input name="submit" type="submit">
    </p>
</form>
</body>
</html>