<?php
$g = $_GET;
global $DB;

if($g['m'] && $g['id']) {
	$DB->query("DELETE FROM `{$g['m']}` WHERE `id` = {$g['id']}");

	header('Location: ' . generateUrl('admin/' . $g['m']));

	exit;
}