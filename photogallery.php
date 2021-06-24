<?php
require 'database.php';
$photo  = mysqli_query($db, "SELECT * FROM `files`");
$title = 'Фотогалерея';
include 'menu.php';

?>
</head>
<style>
    img {
        width: 75%;
        height: auto;
        margin: 10px;
    }
</style>
<body>
    <?php
    echo 'Хотите, чтобы в фотогалерее появилась фотография, загруженная Вами?<br> <a href="photo.php" class="loadphoto">Ссылка на станицу загрузки фотографий</a>';

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