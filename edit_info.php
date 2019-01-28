<?php 

require 'index.php';

Info::ubah($_POST["id"], $_POST["visi"], $_POST["misi"], $_POST["sambutan"], $_POST["sejarah"], $_POST["struktur"], $_POST["alamat"], $_POST["kontak"]);
header('Location: info.php?act=es&id=' . $_POST["id"]);