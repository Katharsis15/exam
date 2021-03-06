<?php
session_start();
require 'database.php';
$title = 'Сделать заказ';
include 'menu.php';

if (isset($_SESSION['id'])) {
    if ($_SESSION['status'] == 'client') {?>
    <h3>Запись на маникюр</h3>
<form action="check_order.php" method="post">
    <p><b>Выберите тип маникюра:</b></p>
    <p><input name="type_id" type="radio" value="1"> Глянцевый шеллак</p>
    <p><input name="type_id" type="radio" value="2"> Матовый шеллак</p>
    <p><input name="type_id" type="radio" value="3"> Глянцевый гель-лак</p>
    <p><input name="type_id" type="radio" value="4"> Матовый гель-лак</p>

    <p><b>Выберите, к какому мастеру Вы пойдёте:</b></p>
    <?php
    //$select_login = mysqli_query($db, "SELECT `login` FROM `users` WHERE `status` = 'master'");
    /*var_dump($select_id);
    var_dump($select_name);
    var_dump($select_surname);
    $ids_array = mysqli_fetch_assoc($select_id);
    $names_array = mysqli_fetch_assoc($select_name);
    $surnames_array = mysqli_fetch_assoc($select_surname);*/

     /*for ($i = 1; $i <= mysqli_num_rows(mysqli_query($db, "SELECT * FROM `users` WHERE `status` = 'master'")); $i++) {

        $select_id = mysqli_query($db, "SELECT `id` FROM `users` WHERE `status` = 'master'");
        $ids_array = mysqli_fetch_assoc($select_id);
        $select_name = mysqli_query($db, "SELECT `name` FROM `users` WHERE `status` = 'master'");
        $names_array = mysqli_fetch_assoc($select_name);
        $select_surname = mysqli_query($db, "SELECT `surname` FROM `users` WHERE `status` = 'master'");
        $surnames_array = mysqli_fetch_assoc($select_surname);

        echo '<p><input name="master_id" type="radio" value="' .  $ids_array['id'] . '">' . $names_array['name'] . ' ' . $surnames_array['surname'] . '</p>';
    }*/


    if($result = mysqli_query($db, "SELECT * FROM `users` WHERE `status` = 'master'")){
        foreach($result as $row){

            $user_id = $row['id'];
            $user_name = $row['name'];
            $user_surname = $row['surname'];
            echo '<p><input name="master_id" type="radio" value="' .  $user_id . '">' . $user_name . ' ' . $user_surname . '</p>';
        }
    }

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
   //в каком формате отправляется формой дата и время
    date_default_timezone_set('Europe/Moscow');
    //echo date(" Y-m-d") . '<br>';
    //echo date("H:i") . ':00';
    echo '<p><b>Бронирование времени делается на 1 час, отсчитывая от выбранного Вами.</b></p>';
    echo '<p><b>Запись возможна только на время вида XX:00! (запись невозможна на какое-либо количество минут после ":" кроме "00")</b></p>';
    /*$today = date();
    $now = date();
    var_dump($today);
    echo '<br>';
    var_dump($now);
    echo '<br>';*/

    echo            '<p>
                <label for="date"><b>Дата: </b></label>
                <input type="date" id="date" name="date"/>
            </p>';

   /* if($result_time = mysqli_query($db, "SELECT * FROM `time` WHERE `master_id` = '$master_id'")){
        foreach($result_time as $row_time){

            $user_id = $row['id'];
            $user_name = $row['name'];
            $user_surname = $row['surname'];
            echo '<p><input name="master_id" type="radio" value="' .  $user_id . '">' . $user_name . ' ' . $user_surname . '</p>';
        }
    }*/
   echo '            <p>
                <label for="time"><b>Время: </b></label>
                <input type="time" id="time" name="time"/>
            </p>';
    ?>

    <p><b>После того, как Вы нажмёте "Отправить", Вы узнаете, свободна ли запись на выбранную дату и время к выбранному мастеру, и оформлен ли заказ</b></p>

    <p><input type="submit" value="Отправить"></p>
</form>
<?php } else {
        echo 'Чтобы сделать заказ, необходимо авторизоваться со статусом <b>клиента</b> в разделе "Вход" на <a href="index.php">главной странице</a>';
    }
    } else {
    echo 'Чтобы сделать заказ, необходимо авторизоваться со статусом клиента в разделе "Вход" на <a href="index.php">главной странице</a>';
}
?>
</body>
</html>