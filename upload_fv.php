<?php

require 'index.php';

$file = 'upload/' . str_replace(' ', '_', $_FILES['fv']["name"]);
$fv = __DIR__ .'/upload/' . str_replace(' ', '_', $_FILES['fv']["name"]);
move_uploaded_file($_FILES['fv']["tmp_name"], $fv);
Upload::fv($_POST["capt"], $file);

header('Location: upload.php?act=es');
