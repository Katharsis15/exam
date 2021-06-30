<?php
require 'database.php';
$title = 'Выход';
include 'menu.php';


session_start();
$_SESSION = array();
session_destroy();
echo 'Выход успешно выполнен';
//header('Location: index.php');
?>
</body>
</html>