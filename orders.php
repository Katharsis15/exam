<?php
session_start();
require 'database.php';
$title = 'Мои заказы';
include 'menu.php';

$status = $_SESSION['status'];
$id = $_SESSION['id'];

if($status == 'master') {
    $select1 = mysqli_query($db,"SELECT users.name, users.surname,users.phone, orders.client_id, orders.date, orders.time, master_type_price.price, types.kind, types.covering FROM users INNER JOIN orders ON users.id = orders.client_id INNER JOIN master_type_price ON orders.master_type_price_id = master_type_price.id INNER JOIN types ON master_type_price.type_id = types.id WHERE master_type_price.master_id = '$id' ORDER BY orders.date");
    if ($select1) {
        $rowsCount = mysqli_num_rows($select1);
        echo '<p>Всего заказов: ' .  $rowsCount . '</p>';
        echo '<table><tr><th>Дата</th><th>Время</th><th>Цена</th><th>Тип маникюра</th><th>Покрытие</th><th>id клиента</th><th>Номер телефона клиента</th><th>Имя клиента</th><th>Фамилия клиента</th></tr>';
        for ($i = 1; $i <= mysqli_num_rows(mysqli_query($db, "SELECT users.name, users.surname, orders.client_id, orders.date, orders.time, master_type_price.price, types.kind, types.covering FROM users INNER JOIN orders ON users.id = orders.client_id INNER JOIN master_type_price ON orders.master_type_price_id = master_type_price.id INNER JOIN types ON master_type_price.type_id = types.id WHERE master_type_price.master_id = '$id' ORDER BY orders.date")); $i++) {
            $assoc_select = mysqli_fetch_assoc($select1);
            echo '<tr>';
            echo '<td>' . $assoc_select['date'] . '</td>';
            echo '<td>' . $assoc_select['time'] . '</td>';
            echo '<td>' . $assoc_select['price'] . '</td>';
            echo '<td>' . $assoc_select['kind'] . '</td>';
            echo '<td>' . $assoc_select['covering'] . '</td>';
            echo '<td>' . $assoc_select['client_id'] . '</td>';
            echo '<td>' . $assoc_select['phone'] . '</td>';
            echo '<td>' . $assoc_select['name'] . '</td>';
            echo '<td>' . $assoc_select['surname'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Ошибка: ' . mysqli_error($db);
    }
}

if($status == 'client') {
    $select1 = mysqli_query($db,"SELECT users.name, users.surname, users.phone, orders.date, orders.time, master_type_price.master_id, master_type_price.price, types.kind, types.covering FROM users INNER JOIN master_type_price ON users.id = master_type_price.master_id INNER JOIN orders ON orders.master_type_price_id = master_type_price.id INNER JOIN types ON master_type_price.type_id = types.id WHERE orders.client_id = '$id' ORDER BY orders.date");
    if ($select1) {
        $rowsCount = mysqli_num_rows($select1); // количество полученных строк
        echo '<p>Всего заказов: ' .  $rowsCount . '</p>';
        echo '<table><tr><th>Дата</th><th>Время</th><th>Цена</th><th>Тип маникюра</th><th>Покрытие</th><th>id мастера</th><th>Номер телефона мастера</th><th>Имя мастера</th><th>Фамилия мастера</th></tr>';
        for ($i = 1; $i <= mysqli_num_rows(mysqli_query($db, "SELECT users.name, users.surname, users.phone, orders.date, orders.time, master_type_price.master_id, master_type_price.price, types.kind, types.covering FROM users INNER JOIN master_type_price ON users.id = master_type_price.master_id INNER JOIN orders ON orders.master_type_price_id = master_type_price.id INNER JOIN types ON master_type_price.type_id = types.id WHERE orders.client_id = '$id' ORDER BY orders.date")); $i++) {
            $assoc_select = mysqli_fetch_assoc($select1);
            echo '<tr>';
            echo '<td>' . $assoc_select['date'] . '</td>';
            echo '<td>' . $assoc_select['time'] . '</td>';
            echo '<td>' . $assoc_select['price'] . '</td>';
            echo '<td>' . $assoc_select['kind'] . '</td>';
            echo '<td>' . $assoc_select['covering'] . '</td>';
            echo '<td>' . $assoc_select['master_id'] . '</td>';
            echo '<td>' . $assoc_select['phone'] . '</td>';
            echo '<td>' . $assoc_select['name'] . '</td>';
            echo '<td>' . $assoc_select['surname'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Ошибка: ' . mysqli_error($db);
    }
}
if (!isset($_SESSION['status'])) {
    echo 'Чтобы просмотреть свои заказы, необходимо авторизоваться в разделе "Вход" на <a href="index.php">главной странице</a>';
}
?>
</body>
</html>