<?php 

class DB {

	private static $CONN;

	/**
	 * Untuk konek ke database, cara pakai DB::connect()
	 */
	public static function connect() {
		$config = require 'config.php';
		$mysqli = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

		if ($mysqli->connect_errno) {
			throw new Exception('Koneksi ke database gagal');
			return;
		}

		static::$CONN = $mysqli;
	}

	/**
	 * Untuk ambil data dari database, cara pakai DB::q("SELECT * FROM `akun`");
	 * 
	 * @param $query string
	 * @return array
	 */
	public static function q($query) {
		$rowsRaw = static::$CONN->query($query, MYSQLI_USE_RESULT);
		$rows = [];

		while ($row = $rowsRaw->fetch_assoc()) {
			$rows[] = $row;
		}

		$rowsRaw->close();
		return $rows;
	}

	/**
	 * Untuk ambil satu data dari database, cara pakai DB::q1("SELECT * FROM `akun`");
	 * 
	 * @param $query string
	 * @return array|bool
	 */
	public static function q1($query) {
		$rowsRaw = static::$CONN->query($query, MYSQLI_USE_RESULT);
		$rows = [];

		while ($row = $rowsRaw->fetch_assoc()) {
			$rows[] = $row;
		}

		$rowsRaw->close();

		if (!empty($rows[0])) {
			return $rows[0];
		}

		return false;
	}

	/**
	 * Ini untuk query insert, update, atau delete, cara pakai DB::i("INSERT INTO `akun` (`id`) VALUES (1)")
	 * 
	 * @param $query string
	 */
	public static function i($query) {
		$res = static::$CONN->query($query);
		if (false === $res) {
			throw new Exception('Query error: ' . $query);
		}
	}
}


