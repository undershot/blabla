<?php
$g = $_GET;
global $DB;

if($g['id'] && isset($g['m'])) {
	$DB->query("UPDATE `users` SET `is_banned` = '{$g['m']}' WHERE `id` = {$g['id']}");

	header('Location: ' . generateUrl('admin/users'));

	exit;
}