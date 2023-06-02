<?php

require __DIR__ . '/vendor/autoload.php';

use DiDemo\FriendHarvester;

$dsn = 'sqlite:' . __DIR__ . '/data/database.sqlite';
$pdo = new PDO($dsn);

$friendHarvester = new FriendHarvester($pdo);
$friendHarvester->emailFriends();
