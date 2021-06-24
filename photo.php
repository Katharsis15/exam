<?php
require 'database.php';
$title = 'Загрузка фото в фотогалерею';
include 'menu.php';
?>
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
        <label for="file">Загрузите фотографию (допустимые расширения: ".jpg", "png", "jpeg"; максимальный размер файла 1 Гб).<br> Пожалуйста, проверьте, что Ваш файл назван по-английски.<br></label>
        <input name="uploadfile" type="file" id="file">
    </p>
    <p>
        <input name="upload" type="submit" value="Загрузить">
    </p>
</form>
</body>
</html>