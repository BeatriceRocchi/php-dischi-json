<?php
$json_string = file_get_contents('album-list.json');
$album_list = json_decode($json_string, true);

$albumToShow = $album_list[$_GET['id']];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once __DIR__ . '/partials/head.php'
  ?>

</head>

<body>
  <h1 class="text-white"><?php echo $albumToShow['title'] ?></h1>
  <div class="btn_custom my-4"><a href="index.php">Back to HomePage</a></div>
</body>

</html>