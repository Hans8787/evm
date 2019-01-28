<?php 
session_start();

if ( !isset($_SESSION["user_login"]) ) {
	header('Location: login.php');
	exit;
}

require 'index.php';

$id = $_GET["id"];

function hapus($id) {
	DB::i("DELETE FROM event WHERE id = $id");
}

if( hapus($id) > 0 ) {
	echo "
			<script>
				alert('data gagal dihapus!');
				document.location.href = 'daftar_event.php';
			</script>
		";
} else {
	echo "	<script>
				alert('data berhasil dihapus!');
				document.location.href = 'daftar_event.php';
			</script>
		";
}
