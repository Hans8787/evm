<?php 

class Info {
	public static function ubah($id, $visi, $misi, $sambutan, $sejarah, $struktur, $alamat, $kontak) {

    	DB::i("UPDATE `info` SET 
    			visi = '$visi',
    			misi = '$misi',
                sambutan = '$sambutan',
				sejarah = '$sejarah',
				struktur = '$struktur',
				alamat = '$alamat',
				kontak = '$kontak'
			  WHERE id = $id");
    }
}