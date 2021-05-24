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
// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href= ./page?page=1><<</a>
                               <a href= ./page?page='. ($page - 1) .'><</a> ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' <a href= ./page?page='. ($page + 1) .'>></a>
                                   <a href= ./page?page=' .$total. '>>></a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 2 > 0) $page2left = ' <a href= ./page?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href= ./page?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';
if($page + 2 <= $total) $page2right = ' | <a href= ./page?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href= ./page?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню
echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage;


