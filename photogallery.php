<?php
require 'database.php';

$photo = mysqli_query($db, "SELECT * FROM `files` ");

//$result = mysqli_fetch_assoc($photo);
//print_r($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Фотогалерея</title>
</head>
<style>
    img {
        width: 75%;
        height: auto;
        align-content: center;
    }
</style>
<body>
<div class="container">
<div class="row">
    <?php
   while($result = mysqli_fetch_assoc($photo)){
       ?>
       <div class="col-md-4">
            <img src="images/<?php echo $result['path']; ?> alt="фото, загруженное нашим пользователем">
       </div>
    <?php
   }
    ?>
        </div>
    </div>
</body>
</html>