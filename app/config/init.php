<?php

ob_start();
session_start();

require_once(__DIR__ . '/../classes/Db.php');
require_once(__DIR__ . '/../classes/User.php');
require_once(__DIR__ . '/../classes/Worker.php');

$dbClass = new Db();
$db = $dbClass->getDb();

$userClass = new User($db);
$workerClass = new Worker($db);