<?php
session_start();
require 'database.php';
$title = 'Сделать заказ';
include 'menu.php';

if (isset($_SESSION)) { ?>
    <h3>Запись на маникюр</h3>
<form action="check_order.php" method="post">
    <p><b>Выберите тип маникюра:</b></p>
    <p><input name="type_id" type="radio" value="1"> Глянцевый шеллак</p>
    <!--или в value сделать не id, а текстовое значение-->
    <p><input name="type_id" type="radio" value="2"> Матовый шеллак</p>
    <p><input name="type_id" type="radio" value="3"> Глянцевый гель-лак</p>
    <p><input name="type_id" type="radio" value="4"> Матовый гель-лак</p>

    <p><b>Выберите, к какому мастеру Вы пойдёте:</b></p>
    <?php
    $select_id = mysqli_query($db, "SELECT `id` FROM `users` WHERE `status` = 'master'");

    $select_login = mysqli_query($db, "SELECT `login` FROM `users` WHERE `status` = 'master'");

    $select_name = mysqli_query($db, "SELECT `name` FROM `users` WHERE `status` = 'master'");
    $select_surname = mysqli_query($db, "SELECT `surname` FROM `users` WHERE `status` = 'master'");
    var_dump($select_id);
    var_dump($select_name);
    var_dump($select_surname);
    $ids_array = mysqli_fetch_assoc($select_id);
    $names_array = mysqli_fetch_assoc($select_name);
    $surnames_array = mysqli_fetch_assoc($select_surname);


    $count_ids_array = array_count_values($ids_array);
    var_dump($count_ids_array);

/*foreach ( as ) {

}*/
/*$masters_array = mysqli_fetch_assoc($result);
var_dump($masters_array);
$master_id = $masters_array['id'];
$master_name = $masters_array['name'];
$master_surname = $masters_array['surname'];
var_dump($master_id);
var_dump($master_name);
var_dump($master_surname);*/
        //$num_rows = (mysqli_num_rows($result));

/*$num_rows = mysqli_num_rows($select_id);
var_dump($num_rows);
--$num_rows;
    var_dump($num_rows);*/

            /*while ($num_rows > 0 ) {
                echo '<p><input name="master_id" type="radio" value="' .  $master_id . '">' . $master_name . ' ' . $master_surname . '</p>';
                --$num_rows;
            }*/

    ?>

    <p><input type="submit" value="Отправить"></p>
</form>
<?php } else {
    echo 'Чтобы сделать заказ, необходимо авторизоваться в разделе "Вход" на <a href="index.php">главной странице</a>';
}
?>
</body>
</html>