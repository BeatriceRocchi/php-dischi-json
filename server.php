<?php
$json_string = file_get_contents('album-list.json');
$album_list = json_decode($json_string);

// TODO: inserire logica domani

header('Content-Type: application/json');
echo json_encode($album_list);
