<?php

require 'index.php';

Event::ubah($_POST["id"], $_POST["judul"], $_POST["tanggal"], $_POST["tempat"], $_POST["isiEvent"]);

if ( !empty($_FILES["file"]["name"]) ) {
	$cover = 'upload/' . str_replace(' ', '_', $_FILES['file']["name"]);
	$file = __DIR__ .'/upload/' . str_replace(' ', '_', $_FILES['file']["name"]);
	move_uploaded_file($_FILES['file']["tmp_name"], $file);

	Event::ubahCover($_POST["id"], $cover);
}

header('Location: daftar_event.php?act=es&id=' . $_POST["id"]);
