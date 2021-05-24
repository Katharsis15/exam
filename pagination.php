<?php
require 'database.php';
$num = 4;
$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result = mysqli_query($db, "SELECT COUNT(*) FROM files");
$posts = mysqli_fetch_row($result);
$total = intval(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total; 
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
$result = mysqli_query($db, "SELECT * FROM files LIMIT $start, $num");
// В цикле переносим результаты запроса в массив $postrow
while ( $postrow[] = mysqli_fetch_assoc($result))
?>
