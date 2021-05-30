<?php
require 'database.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Загрузка фото</title>
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
<form action="load_photo.php" method="post" enctype="multipart/form-data">
    <p>
        <label for="file">Загрузите фотографию (допустимое расширение ".jpg"; максимальный размер файла 1 Гб). Пожалуйста, проверьте, что Ваш файл назван по-английски.<br></label>
        <input name="uploadfile" type="file" id="file">
    </p>
    <p>
        <input name="upload" type="submit" value="Загрузить">
    </p>
</form>
</body>
</html>