<?php
session_start();

require_once './config/global.php';
require_once './modules/include.php';

global $DB;

$g = $_GET;

if($g['p']) $route = $g['p'];
else $route = 'main';


includePage($route);