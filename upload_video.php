<?php

require 'index.php';

$file = 'upload/' . str_replace(' ', '_', $_FILES['video']["name"]);
$video = __DIR__ .'/upload/' . str_replace(' ', '_', $_FILES['video']["name"]);
move_uploaded_file($_FILES['video']["tmp_name"], $video);
Upload::video($_POST["judul"], $file);

header('Location: upload.php?act=es');
