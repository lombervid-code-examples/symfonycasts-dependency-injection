<?php

use DiDemo\FriendHarvester;
use DiDemo\Mailer\SmtpMailer;

$container['mailer'] = fn($c) => new SmtpMailer(
    $c['smtp.server'],
    $c['smtp.user'],
    $c['smtp.password'],
    $c['smtp.port'],
);

$container['pdo'] = fn($c) => new PDO($c['database.dns']);
$container['friend_harvester'] = fn($c) => new FriendHarvester($c['pdo'], $c['mailer']);
