<?php
$db = mysqli_connect('localhost', 'exam', 'examxampp99..', 'exam');
if (mysqli_connect_errno()) {
    die('ошибка подключения к базе данных');
} else {
    mysqli_query($db, "SET NAMES 'utf8'");
}
