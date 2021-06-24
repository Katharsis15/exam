<?php
session_start();
require 'database.php';
$title = 'Проверка заказа';
include 'menu.php';

$insert = mysqli_query($db,"INSERT INTO `orders` VALUES ");

if (isset($_POST['type_id'])) {
    $type_id = htmlspecialchars(addslashes($_POST['type_id']));
    if ($type_id == '') {
        unset($type_id);
    }
}
var_dump($type_id);
if(!empty($type_id) && !empty($surname) && !empty($phone) && !empty($login) && !empty($password)) {
    $result = mysqli_query($db, "SELECT * FROM `orders` WHERE `type_id`");
}
    ?>
</body>
</html>
