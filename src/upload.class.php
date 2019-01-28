<?php 

class Upload {
    public static function fv($capt, $file) {

		$date = date('Y-m-d H:i:s');

        DB::i("INSERT INTO `galery` (`capt`, `file`, `date`) VALUES ('$capt', '$file', '$date')");
    }

    public static function video($judul, $file) {

		$date = date('Y-m-d H:i:s');

        DB::i("INSERT INTO `video` (`judul`, `video`, `date`) VALUES ('$judul', '$file', '$date')");
    }
}