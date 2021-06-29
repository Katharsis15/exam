<?php
session_start();
require 'database.php';
$title = 'Проверка заказа';
include 'menu.php';


if (isset($_POST['type_id'])) {
    $type_id = htmlspecialchars(addslashes($_POST['type_id']));
    if ($type_id == '') {
        unset($type_id);
    }
}
var_dump($type_id);
echo '<br>';

if (isset($_POST['master_id'])) {
    $master_id = htmlspecialchars(addslashes($_POST['master_id']));
    if ($master_id == '') {
        unset($master_id);
    }
}
var_dump($master_id);
echo '<br>';

$client_id = $_SESSION['id'];
var_dump($client_id);
echo '<br>';

if (isset($_POST['date'])) {
    $date = htmlspecialchars(addslashes($_POST['date']));
    if ($date == '') {
        unset($date);
    }
}
var_dump($date);
echo '<br>';

if (isset($_POST['time'])) {
    $time = htmlspecialchars(addslashes($_POST['time']));
    if ($time == '') {
        unset($time);
    }
}
$plus_time = date('H:i', strtotime('+1 hour', strtotime($time)));
var_dump($plus_time);
echo '<br>';
var_dump($time);
echo '<br>';
$new_time = $time . '-' . $plus_time;

if (!empty($type_id) && !empty($master_id) && !empty($client_id) && !empty($date) && !empty($time)) {

    $select_id = mysqli_query($db, "SELECT `id` FROM `master_type_price` WHERE `type_id` = '$type_id' && `master_id` = '$master_id'");
    $id_result1 = mysqli_fetch_assoc($select_id);
    var_dump($id_result1);
    echo '<br>';
    $master_type_price_id = $id_result1['id'];
    var_dump($master_type_price_id);
    echo '<br>';
    //для вывода цены в будущем
    $select_price = mysqli_query($db, "SELECT `price` FROM `master_type_price` WHERE `type_id` = '$type_id' && `master_id` = '$master_id'");
    $price_result = mysqli_fetch_assoc($select_price);
    $price = $price_result['price'];
    if (mysqli_num_rows($select_id) !== 0) {
    $result2 = mysqli_query($db, "SELECT * FROM `orders` WHERE `client_id` = '$client_id' AND `master_type_price_id` = '$master_type_price_id' AND `date` = '$date' AND `time` = '$new_time'");
    var_dump($result2);
    echo '<br>';

        if (mysqli_num_rows($result2) == 0) {
                if(mysqli_error($db) == '') {
                    $insert = mysqli_query($db, "INSERT INTO `orders` (`client_id`, `master_type_price_id`, `date`, `time`) VALUES('$client_id', '$master_type_price_id', '$date', '$new_time')");
                    echo 'Ваш заказ оформлен<br>';
                    echo 'Стоимость Вашего заказа составляет' . ' '. $price . ' ' . 'руб.';
                } else {
                    echo 'Ошибка<br>';
                    echo 'Чтобы попробовать снова, нажмите' . ' ' . '<a href="make_order.php">сюда</a>';
                }
        } else {
        echo 'Заказ идентичный Вашему уже оформлен другим пользователем<br>';
        echo 'Чтобы сделать другой заказ, нажмите' . ' ' . '<a href="make_order.php">сюда</a>';
    }
    } else {
        echo 'Такой вид заказа не найден<br>';
        echo 'Чтобы сделать другой заказ, нажмите' . ' ' . '<a href="make_order.php">сюда</a>';
    }
}
    ?>
</body>
</html>
