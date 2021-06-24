<?php
require 'database.php';
include 'menu.php';

if(isset($_FILES['uploadfile'])) {
    $file = $_FILES['uploadfile'];
    $errors = $_FILES['uploadfile']['error'];
    $file_name = time() . "_" . $_FILES['uploadfile']['name'];
    $file_size = $_FILES['uploadfile']['size'];
    $file_tmp = $_FILES['uploadfile']['tmp_name'];
    $file_type = $_FILES['uploadfile']['type'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);


    if ($file_size <= 1073741824) {
        if ($file_ext = 'jpg' or $file_ext = 'png' or $file_ext = 'jpeg') {
            if ($errors == 0) {
                move_uploaded_file($file_tmp, "images/" . $file_name);
                $insert = mysqli_query($db, "INSERT INTO `files` (`path`) VALUES ('$file_name')");
                echo 'Спасибо, что загрузили фото<br> Теперь оно появилось в <a href="photogallery.php">фотогалерее</a>';
            } else {
                echo 'Ошибка! <br> Чтобы попробовать снова, нажмите' . ' ' . '<a href="photo.php">сюда</a>';
            }
        } else {
            echo 'Расширение файла не соответствует разрешённым расширениям: "jpg", "jpeg", "png"<br>';
            echo 'Чтобы попробовать снова, нажмите' . ' ' . '<a href="photo.php">сюда</a>';
        }
    } else {
        echo 'Размер файла превышает 1 ГБ <br>';
        echo 'Чтобы попробовать снова, нажмите' . ' ' . '<a href="photo.php">сюда</a>';
    }
} ?>
</body>
</html>