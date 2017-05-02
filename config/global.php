<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

$config = [
	'dbHost' => '127.0.0.1',
	'dbName' => 'eshop',
	'dbLogin' => 'root',
	'dbPass' => '',
	'title' => 'Not Found'
];

$DB = new PDO(
	'mysql:host=' . $config['dbHost'] . ';dbname=' . $config['dbName'],
	$config['dbLogin'],
	$config['dbPass'],
	[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	]
);

function includePage($path) {
	$route = ROOT . '/pages/' . $path . '.php';

	if(!file_exists($route)) {
		$route = ROOT . '/pages/404.php';
	}

	include $route;
}

function includeTmp($name) {
	include ROOT . '/tmp/' . $name . '.php';
}

function generateUrl($p) {
	return '/?p=' . $p;
}

function generatePrice($n) {
	return '$' . round($n, 2) . '.00';
}