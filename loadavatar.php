<?php
        if (isset($_POST['submit'])) {
        if (isset($_FILES['file'])) {
            $photo = time() . "_" . basename($_FILES['file']['name']);
            $error_flag = $_FILES['file']['errors'];

            if ($error_flag == 0) {
                $upfile = getcwd() . "images/" . time() . basename(iconv('utf-8', 'windows-1251', $_FILES['file']['name']));
                if ($_FILES['file']['tmp_name']) {
                    $allowed = array('jpg', 'jpeg', 'png');
                    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        if (!in_array($ext, $allowed)) {
                            $errors[] = 'Неверный формат';
                        } else if (!move_uploaded_file($_FILES['file']['tmp_name'], $upfile)) {
                            $errors[] = 'Ошибка';
                        }
                } else {
                    $errors[] = 'Ошибка';
                }
            }
        }
        else if ($_FILES['file']['size'] == 0) {
                            $errors[] = 'Выберите изображение';
        }
    }