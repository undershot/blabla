<?php
global $DB, $config;

$u = new User();

$config['title'] = 'Admin panel';


if(!$u->isLogged()) {
	header('Location: ' . generateUrl('login'));
	exit;
}

$user_data = $u->getData();

if($user_data['role'] !== 'admin') {
	header('Location: /');
	exit;
}

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $config['title'] ?></title>

	<link rel="stylesheet" href="./css/main.css?<?= time() ?>">
	<link rel="stylesheet" href="./FontAwesome/font-awesome.min.css">

	<script src="./Js/jquery.js" defer></script>
	<script src="./Js/prefix-free.js" defer></script>

	<meta name="viewport" content="width=device-width,initial-scale=1"/>
</head>
<body>