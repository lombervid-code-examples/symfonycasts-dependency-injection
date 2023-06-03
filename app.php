<?php

use Pimple\Container;

require __DIR__ . '/vendor/autoload.php';

/* START CONTAINER BUILDING */

$container = new Container();

require __DIR__ . '/app/config.php';
require __DIR__ . '/app/services.php';

/* END CONTAINER BUILDING */

/** @var \DiDemo\FriendHarvester $friendHarvester */
$friendHarvester = $container['friend_harvester'];
$friendHarvester->emailFriends();
