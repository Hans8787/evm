<?php 

class Event {
    public static function tambah($judul, $tanggal, $tempat, $content, $cover) {

        DB::i("INSERT INTO `event` (`judul`, `tanggal`, `tempat`, `content`, `cover`) VALUES ('$judul', '$tanggal', '$tempat', '$content', '$cover')");
    }

    public static function ubah($id, $judul, $tanggal, $tempat, $content) {

    	DB::i("UPDATE `event` SET 
    			judul = '$judul',
    			tanggal = '$tanggal',
                tempat = '$tempat',
				content = '$content'
    		  WHERE id = $id");
    }

    public static function ubahCover($id, $cover) {

        DB::i("UPDATE `event` SET 
                cover = '$cover'
              WHERE id = $id");
    }
}