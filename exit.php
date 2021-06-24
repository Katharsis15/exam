<?php
require 'database.php';
$title = 'Выход';
include 'menu.php';


session_start();
$_SESSION = array();
session_destroy();
//header('Location: index.php');
?>
</body>
</html>