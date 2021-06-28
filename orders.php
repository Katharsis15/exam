<?php
session_start();
require 'database.php';
$title = 'Мои заказы';
include 'menu.php';
/*$orders = mysqli_query($db, "SELECT `master_type_price`.`type`,`price`, ``.`login` FROM `comments` INNER JOIN `users` ON t1.user_id = t2.id");
for ($i = 0; $i <= mysqli_num_rows($orders); $i++) {
    $result = mysqli_fetch_assoc($orders);

    echo 'Комментарий: ' . $result['comment'] . '; Пользователь: ' . $result['login']; // выводим комментарий и его автора
}*/
if($_SESSION['status'] = 'master') {
    if ($result = mysqli_query($db, "SELECT * FROM `orders`")) {

        $rowsCount = mysqli_num_rows($result); // количество полученных строк
        echo '<p>Всего заказов: ' .  $rowsCount . '</p>';
        echo '<table border="1 px"><tr><th>Имя клиента</th><th>Фамилия клиента</th><th>Тип маникюра</th><th>Покрытие</th><th>Цена</th><th>Дата</th><th>Время</th></tr>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['client_id'] . '</td>';
            echo '<td>' . $row['client_id'] . '</td>';
            echo '<td>' . $row['kind'] . '</td>';
            echo '<td>' . $row['covering'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['time'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        var_dump($_SESSION['status']);
    }
}

if ($_SESSION['status'] = 'client') {
    if ($result = mysqli_query($db, "SELECT * FROM `orders`")) {

        $rowsCount = mysqli_num_rows($result); // количество полученных строк
        echo '<p>Всего заказов: ' .  $rowsCount . '</p>';
        echo '<table border="1 px"><tr><th>Имя мастера</th><th>Фамилия мастера</th><th>Тип маникюра</th><th>Покрытие</th><th>Цена</th><th>Дата</th><th>Время</th></tr>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['client_id'] . '</td>';
            echo '<td>' . $row['client_id'] . '</td>';
            echo '<td>' . $row['kind'] . '</td>';
            echo '<td>' . $row['covering'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['time'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        var_dump($_SESSION['status']);
    }
}
if (!isset($_SESSION['status'])) {
    echo 'Чтобы сделать заказ, необходимо авторизоваться в разделе "Вход" на <a href="index.php">главной странице</a>';
}
/*    } else {
        echo 'Ошибка: ' . mysqli_error($db);
    }*/
?>
</body>
</html>