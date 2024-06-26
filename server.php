<?php
$json_string = file_get_contents('album-list.json');
$album_list = json_decode($json_string, true);

// Logic to add a new album: at least there must be a title of the new album
if (!empty($_POST['newAlbumTitle'])) {
  $newAlbumToAdd =  [
    'title' => $_POST['newAlbumTitle'],
    'author' => $_POST['newAlbumAuthor'],
    'year' => $_POST['newAlbumYear'],
    'cover' => $_POST['newAlbumCover'],
    'genre' => $_POST['newAlbumGenre'],
    'tracks' => $_POST['newAlbumTracks'],
    'tracksList' => explode(",", $_POST['newAlbumTracksList']),
    'duration' => $_POST['newAlbumDuration'],
  ];

  $album_list[] = $newAlbumToAdd;
  file_put_contents('album-list.json', json_encode($album_list));
};

// Logic to delete an album
if (isset($_POST['idAlbumToDelete'])) {
  array_splice($album_list, $_POST['idAlbumToDelete'], 1);

  file_put_contents('album-list.json', json_encode($album_list));
};

// Logic to toggle like on an album
if (isset($_POST['idAlbumToToggle'])) {
  $album_list[$_POST['idAlbumToToggle']]['like'] = !$album_list[$_POST['idAlbumToToggle']]['like'];

  file_put_contents('album-list.json', json_encode($album_list));
};

header('Content-Type: application/json');
echo json_encode($album_list);
