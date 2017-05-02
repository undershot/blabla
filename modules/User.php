<?php

/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 01.05.2017
 * Time: 16:01
 */
class User
{
	public $user = false;

	function __construct()
	{
		global $DB;

		$s = $_SESSION['user'];

		if ($s) {
			$a = $DB->query("SELECT * FROM `users` WHERE `login` = '{$s['login']}'")->fetch();

			$this->user = $a;
		}
	}

	public function login($login, $password)
	{
		global $DB;

		$p = md5($password);

		$u = $DB->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$p'");

		$f = $u->fetch();

		if (!$f) return false;

		if ($f['is_banned'] !== '1') {
			$_SESSION['user'] = $f;
		}

		$this->user = $f;

		return true;
	}

	public function reg($login, $password) {
		global $DB;

		if($login === 'admin') return false;

		$p = md5($password);

		return $DB->query("INSERT INTO `users` (`id`, `login`, `password`, `role`, `is_banned`, `wishlist`) VALUES (NULL, '$login', '$p', 'user', '0', '');");
	}

	public function isLogged() {
		global $DB;

		return !!$this->user;
	}

	public function logout() {
		unset($_SESSION['user']);

		return true;
	}

	public function getData() {
		return $this->user;
	}

	public function isBanned () {
		return $this->user['is_banned'] === '1';
	}

	public function isAdmin() {
		return $this->isLogged() && $this->user['role'] === 'admin';
	}

	public function onlyAdmin() {
		if( !$this->isAdmin() ) {
			header('Location: ' . generateUrl('login'));
			exit;
		}

	}
}