<?php
$json_string = file_get_contents('album-list.json');
$album_list = json_decode($json_string, true);

// Logic to add a new album: at least there must be a title of the new album
if (isset($_POST['newAlbumTitle'])) {
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

header('Content-Type: application/json');
echo json_encode($album_list);
