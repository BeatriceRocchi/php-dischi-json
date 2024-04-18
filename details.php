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


  <div class="details_upper d-flex align-items-end">

    <div class="details_img-box">
      <img src="<?php echo $albumToShow['cover'] ?>" alt="<?php echo $albumToShow['title'] ?>">
    </div>

    <div class="text-white ms-4">
      <h1>
        <?php echo $albumToShow['title'] ?>
      </h1>
      <h6>
        <?php echo $albumToShow['author'] ?> • <?php echo $albumToShow['year'] ?> • <?php echo $albumToShow['tracks'] ?> tracks • <?php echo $albumToShow['duration'] ?>
      </h6>
    </div>

    <div class="btn_custom my-4"><a href="index.php">Back to HomePage</a></div>

  </div>
  <div class="details_lower">
    BASSO
  </div>
</body>

</html>