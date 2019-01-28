<?php 

class Akun {

	const STATUS_BLOCKED = 1;
	const STATUS_ACTIVED = 2;

	const ROLE_ADMIN = 1;
	const ROLE_USER = 2;

	public static function register($username, $password) {

		$username = strtolower($username);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$date = date('Y-m-d H:i:s');

		$role = self::ROLE_USER;
		$status = self::STATUS_ACTIVED;
		
		DB::i("INSERT INTO `akun` (`username`, `password`, `role`, `status`, `created`) VALUES ('$username', '$password', $role, $status, '$date')");
	}

	public static function login($username, $password)
	{
		$user = DB::q1("SELECT * FROM akun WHERE username = '$username'");
		if ($user === false) {
			return false;
		}
		
		if (password_verify($password, $user["password"])) {
			return $user;
		} 
		
		return false;
	}

}