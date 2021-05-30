<?php
require 'database.php';

$photo  = mysqli_query($db, "SELECT * FROM `files`");

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
    }
</style>
<body>
    <?php
   while($result = mysqli_fetch_assoc($photo)){
       ?>
       <div class="img">
            <img src="images/<?php echo $result['path']; ?>" alt="photo">
       </div>
    <?php
   }
    ?>

</body>
</html>