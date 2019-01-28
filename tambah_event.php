<?php

require 'index.php';

$cover = 'upload/' . str_replace(' ', '_', $_FILES['file']["name"]);
$file = __DIR__ .'/upload/' . str_replace(' ', '_', $_FILES['file']["name"]);
move_uploaded_file($_FILES['file']["tmp_name"], $file);
Event::tambah($_POST["judul"], $_POST["tanggal"], $_POST["tempat"], $_POST["isiEvent"], $cover);
header('Location: admin.php?act=es');
