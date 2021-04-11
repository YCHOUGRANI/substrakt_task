<?php

define('ROOT_PATH', dirname(__DIR__) . '/');

function getEventFromData($value, $key = 'title'): array
{
    $events = require ROOT_PATH . 'data/events.php';

    foreach ($events as  $event) {

        if ($event[$key] === $value) {
            return $event;
        }
    }

    return [];
};

require_once ROOT_PATH . 'vendor/autoload.php';
require_once ROOT_PATH . 'app/queries.php';
require_once ROOT_PATH . 'models/Event.php';
require_once ROOT_PATH . 'models/Instance.php';
