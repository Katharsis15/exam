<?php
session_start();
require 'database.php';
$title = 'Try';
include 'menu.php';

/* "SELECT orders.*, master_type_price.*, types.*
FROM orders
INNER JOIN master_type_price
ON . = .
INNER JOIN orders
ON . = .
ORDER BY categories.id");

$select1 = mysqli_query($db,"SELECT orders.*, master_type_price.*, types.*
FROM orders
INNER JOIN master_type_price
ON orders.master_type_price_id = master_type_price.id
INNER JOIN types
ON types.id = master_type_price.type_id
ORDER BY orders.date WHERE orders.client_id = 1");*/

$status = $_SESSION['status'];
$id = $_SESSION['id'];

if($status == 'master') {
    $select1 = mysqli_query($db,"SELECT users.name, users.surname, orders.client_id, orders.date, orders.time, master_type_price.price, types.kind, types.covering FROM users INNER JOIN orders ON users.id = orders.client_id INNER JOIN master_type_price ON orders.master_type_price_id = master_type_price.id INNER JOIN types ON master_type_price.type_id = types.id WHERE master_type_price.master_id = '$id'");
    if ($select1) {
        $rowsCount = mysqli_num_rows($select1); // количество полученных строк
        echo '<p>Всего заказов: ' .  $rowsCount . '</p>';
        echo '<table><tr><th>id клиента</th><th>Дата</th><th>Время</th><th>Цена</th><th>Тип маникюра</th><th>Покрытие</th><th>Имя клиента</th><th>Фамилия клиента</th></tr>';
        for ($i = 1; $i <= mysqli_num_rows(mysqli_query($db, "SELECT users.name, users.surname, orders.client_id, orders.date, orders.time, master_type_price.price, types.kind, types.covering FROM users INNER JOIN orders ON users.id = orders.client_id INNER JOIN master_type_price ON orders.master_type_price_id = master_type_price.id INNER JOIN types ON master_type_price.type_id = types.id WHERE master_type_price.master_id = '$id'")); $i++) {
            $assoc_select = mysqli_fetch_assoc($select1);
            var_dump($assoc_select);
            echo '<tr>';
            echo '<td>' . $assoc_select['client_id'] . '</td>';
            echo '<td>' . $assoc_select['date'] . '</td>';
            echo '<td>' . $assoc_select['time'] . '</td>';
            echo '<td>' . $assoc_select['price'] . '</td>';
            echo '<td>' . $assoc_select['kind'] . '</td>';
            echo '<td>' . $assoc_select['covering'] . '</td>';
            echo '<td>' . $assoc_select['name'] . '</td>';
            echo '<td>' . $assoc_select['surname'] . '</td>';
            echo '</tr>';
            }
            echo '</table>';
        } else {
        echo 'Ошибка ';
    }
}

//$select1 = mysqli_query($db,"SELECT orders.client_id, orders.date, orders.time, master_type_price.price, types.kind, types.covering FROM orders INNER JOIN master_type_price ON orders.master_type_price_id = master_type_price.id INNER JOIN types ON master_type_price.type_id = types.id");
    //$select2 = mysqli_query($db, "SELECT orders.client_id, orders.date, orders.time, master_type_price.price FROM orders INNER JOIN master_type_price ON orders.master_type_price_id = master_type_price.id");
    //$select2_array = mysqli_fetch_assoc($select2);
    //$select3 = mysqli_query($db, "SELECT types.kind, types.covering FROM master_type_price INNER JOIN types ON master_type_price.type_id = types.id");
    //$select3_array = mysqli_fetch_assoc($select3);
    //$all_select_array = array_merge($select2_array, $select3_array);
//$rowsCount = mysqli_num_rows($select1); // количество полученных строк
//echo '<p>Всего заказов: ' .  $rowsCount . '</p>';
/*echo '<table><tr><th>id клиента</th><th>Дата</th><th>Время</th><th>Цена</th><th>Тип маникюра</th><th>Покрытие</th><th>Имя клиента</th><th>Фамилия клиента</th></tr>';
foreach ($all_select_array as $row) {
    echo '<tr>';
    echo '<td>' . $row['client_id'] . '</td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['time'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '<td>' . $row['kind'] . '</td>';
    echo '<td>' . $row['covering'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['surname'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    /*echo '<td>' . $row[0] . '</td>';
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[2] .  '</td>';
    echo '<td>' . $row[3] .  '</td>';
    echo '<td>' . $row[4] .  '</td>';
    echo '<td>' . $row[5] .  '</td>';
    echo '<td>' . $row[6] .  '</td>';
    echo '<td>' . $row[7] .  '</td>';
    echo '</tr>';
}
echo '</table>';*/
/*$sql = mysqli_query($db, 'SELECT * FROM `orders`');
while ($result = mysqli_fetch_assoc($sql)) {
    echo "{$result['time']}: {$result['date']} рублей<br>";
}*/
?>
<!--SELECT orders.client_id, orders.date, orders.time, master_type_price.master_id, master_type_price.price, types.kind, types.covering, users.name, users.surname, users.phone FROM orders INNER JOIN master_type_price ON orders.master_type_price_id = master_type_price.id INNER JOIN types ON master_type_price.type_id = types.id INNER JOIN users ON orders.client_id = users.id AND master_type_price.master_id = users.id;-->
