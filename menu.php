<?php
require 'database.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <style>
        * {
            font-family: sans-serif;
        }
        ul {
            list-style: none;
            margin: 0;
            padding-left: 0;
            margin-top:25px;
            background:#BEF574;
            height: 50px;
        }
        a.menu {
            text-decoration: none;
            background:#BEF574;
            color:#556832;
            padding:0px 15px;
            line-height:50px;
            display: block;
            border-right: 1px solid #556832;
            -moz-transition: all 0.3s 0.01s ease;
            -o-transition: all 0.3s 0.01s ease;
            -webkit-transition: all 0.3s 0.01s ease;
        }
        a:hover {
            background: #8DB600;
        }
        li {
            float:left;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <?php

            echo '<li><a href="index.php" class="menu">' . 'Главная' . '</a></li>';
            echo '<li><a href="orders.php" class="menu">' . 'Мои заказы' . '</a></li>';
            echo '<li><a href="make_order.php" class="menu">' . 'Сделать заказ' . '</a></li>';
            echo '<li><a href="photogallery.php" class="menu">' . 'Фотогалерея' . '</a></li>';
            echo '<li><a href="exit.php" class="menu">' . 'Выйти' . '</a></li>';
            ?>
        </ul>
    </nav>