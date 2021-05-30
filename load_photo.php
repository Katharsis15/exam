<?php
require 'database.php';

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
                echo 'Спасибо, что загрузили фото';
            } else {
                echo 'Ошибка';
            }
        } else {
            echo 'Расширение файла не соответствует разрешённым расширениям: "jpg", "jpeg", "png"<br>';
            echo 'Чтобы попробовать снова, нажмите' . ' ' . '<a href="photo.php">сюда</a>';
        }
    } else {
        echo 'Размер файла превышает 1 ГБ <br>';
        echo 'Чтобы попробовать снова, нажмите' . ' ' . '<a href="photo.php">сюда</a>';
    }
}
/*************************************************
    /*$file = $_FILES['uploadfile'];//array(5) { ["name"]=> string(18) "rabbits.jpg" ["type"]=> string(10) "image/jpeg" ["tmp_name"]=> string(23) "C:\xampp\tmp\phpD09.tmp" ["error"]=> int(0) ["size"]=> int(679187) }
    $up = $_POST['upload'];//string(18) "Загрузить"
    $upl = $_FILES['uploadfile'];//array(5) { ["name"]=> string(18) "rabbits.jpg" ["type"]=> string(10) "image/jpeg" ["tmp_name"]=> string(24) "C:\xampp\tmp\php3F9C.tmp" ["error"]=> int(0) ["size"]=> int(679187) }
    $photo_name = time() . "_" . basename($_FILES['uploadfile']['name']);//string(29) "1621964827_rabbits.jpg"
    $error_flag = $_FILES['uploadfile']['error'];//int(0)
    //зачем-то время ещё раз
    $upfile = getcwd() . "/images/" . time() . "_" . basename(iconv('utf-8', 'windows-1251', $_FILES['uploadfile']['name']));//string(57) "C:\xampp\htdocs\exam-master/images/1621965243 �������.jpg"
    $size = $_FILES['uploadfile']['size'];//int(679187)
    $tmp_name = $_FILES['uploadfile']['tmp_name'];//string(24) "C:\xampp\tmp\php1C28.tmp
    $allowed = array('jpg', 'jpeg', 'png', 'gif');//array(4) { [0]=> string(3) "jpg" [1]=> string(4) "jpeg" [2]=> string(3) "png" [3]=> string(3) "gif" }
$path_parts = pathinfo($upfile);//array(4) { ["dirname"]=> string(34) "C:\xampp\htdocs\exam-master/images" ["basename"]=> string(22) "1621967125_�������.jpg" ["extension"]=> string(3) "jpg" ["filename"]=> string(18) "1621967125_�������" }
/*echo $path_parts['dirname'], "\n";
echo $path_parts['basename'], "\n";
echo $path_parts['extension'], "\n";
echo $path_parts['filename'], "\n";

var_dump ($path_parts);*/
///////////////////
        /*if (isset($_POST['upload'])) {
        if (isset($_FILES['uploadfile'])) {
            $name = time() . "_" . $_FILES['uploadfile']['name'];
            $tmp_name = $_FILES['uploadfile']['tmp_name'];
            $error_flag = $_FILES['uploadfile']['error'];

            if ($error_flag == 0) {
                if ($_FILES['uploadfile']['size'] > 1024 * 1024 * 1024) {
                    echo 'Слишком большой размер файла (более 1 Гигабайта)<br>';
                    echo 'Чтобы попробовать снова, нажмите' . ' ' .'<a href="photo.php">сюда</a>';
                }
                if ($_FILES['uploadfile']['tmp_name']) {
                    //$allowed = array('jpg', 'jpeg', 'png', 'gif');
                    move_uploaded_file($tmp_name, "images/" . $name);
                    //pathinfo($_FILES['uploadfile'])['extension'];
                    $path_info = pathinfo($_FILES['uploadfile']['name']);
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                        if ($ext != 'jpg') {
                            $errors[] = 'Неверный формат';
                            echo 'Расширение файла не "jpg"<br>';
                            echo 'Чтобы попробовать снова, нажмите' . ' ' .'<a href="photo.php">сюда</a>';
                        } else if (move_uploaded_file($tmp_name, "images/" . $name)) {
                          $path = 'images/' . $name;
                            $insert = mysqli_query($db, "INSERT INTO `files` (`path`) VALUES ('$name')");
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
    }*/




/*$pa = pathinfo($file)['extension'];
$exten = pathinfo($file)['dirname'];
//if (isset($_POST['upload'])) {
    //if (isset($_FILES['uploadfile'])) {
if (is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
    if (checkSize($file['size']) && $pa = $file_ext('jpg')) {
        //$path = pathinfo($file);
        //$file_ext[] = $['dirname'];;
        $new_path = '/images/' . time() . " " . basename($path);
        move_uploaded_file($file['tmp_name'], $path);
        $insert = mysqli_query($db, "INSERT INTO `files` (`path`) VALUES '$new_path'");
        echo 'Спасибо, что загрузили фото';
        // сохраняем файл в папку images
            } else {
        echo 'Слишком большой размер файла (более 2 Гигабайт)<br>';
        echo 'Чтобы попробовать снова, нажмите' . ' ' .'<a href="photo.php">сюда</a>';
    }
}
    //}
//}

function checkSize(float $size): bool
{
    return $size <= 2* 1024 * 1024 * 1024; // возвращаем true, если размер файла меньше 2 Гб
}

//function checkExtension(string $uploadfile): bool
//{


   // pathinfo($file)['extension'] = $file_ext['jpg'];

   // $file_ext1[] = pathinfo($file);
    //$file_ext2[] = $file_ext1['extension'];
    //$separated = implode( $file_ext2);

   // return !(array_search( '.jpg', $file_ext2) && !(array_search( 'jpeg', $file_ext2)) && !(array_search( 'png', $file_ext2)) && !(array_search( 'gif', $file_ext2)) === false); // возвращаем true, если расширение файла было найдено в массиве разрешенных расширений
//}*/

//////////////////////////////////
/*$file = $_FILES['uploadfile'];
$name = time() . "_" . $_FILES['uploadfile']['name'];
$tmp_name = $_FILES['uploadfile']['tmp_name'];

move_uploaded_file($tmp_name, "images/" . $name);
$insert = mysqli_query($db, "INSERT INTO `files` (`path`) VALUES ('$name')");*/
//var_dump($name);