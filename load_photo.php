<?php
require 'database.php';
        if (isset($_POST['upload'])) {
        if (isset($_FILES['uploadfile'])) {
            $photo_name = time() . "_" . basename($_FILES['uploadfile']['name']);
            $error_flag = $_FILES['uploadfile']['errors'];

            if ($error_flag == 0) {
                $upfile = getcwd() . "/images/" . time() . " " . basename(iconv('utf-8', 'windows-1251', $_FILES['uploadfile']['name']));
                if ($_FILES['uploadfile']['size'] > 1024 * 1024 * 1024) {
                    echo 'Слишком большой размер файла (более 1 Гигабайта)<br>';
                    echo 'Чтобы попробовать снова, нажмите' . ' ' .'<a href="photo.php">сюда</a>';
                }
                if ($_FILES['uploadfile']['tmp_name']) {
                    $allowed = array('jpg', 'jpeg', 'png', 'gif');
                    $ext = pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION);
                        if (!in_array($ext, $allowed)) {
                            $errors[] = 'Неверный формат';
                            echo 'Неверный формат<br>';
                            echo 'Чтобы попробовать снова, нажмите' . ' ' .'<a href="photo.php">сюда</a>';
                        } else if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $upfile)) {
                          $path = '/images/' . $photo_name;
                            $insert = mysqli_query($db, "INSERT INTO `files` (`path`) VALUES '$path'");
                            echo 'Спасибо, что загрузили фото';

                        }
                } else {
                    $errors[] = 'Ошибка . <br>';
                    echo 'Чтобы попробовать снова, нажмите' . ' ' .'<a href="photo.php">сюда</a>';
                }
            }
        }
        else if ($_FILES['uploadfile']['size'] == 0) {
            $errors[] = 'Выберите изображение<br>';
            echo 'Чтобы попробовать снова, нажмите' . ' ' .'<a href="photo.php">сюда</a>';
        }
    }
//вывод фото
//