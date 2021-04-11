<?php

/**
 * This is a small bootstrap file.
 * If you visit this file in a browser you will see a HTML (unstyled) view.
 * Once all the tests pass the view will be populated with data.
 */

define('ROOT_PATH', __DIR__ . '/');

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
require_once ROOT_PATH . 'views/index.php';
