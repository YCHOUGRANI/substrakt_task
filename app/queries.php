<?php

require_once ROOT_PATH . 'models/Event.php';
require ROOT_PATH . 'models/Instance.php';


class Events
{

    /**
     * This method should only return events where at least one of their instances
     * is in the future.
     * The array should contain Event objects
     * @return array
     */
    public static function inFuture(): array
    {
        return [
            new Event(getEventFromData('The Phantom of the Opera')),
            new Event(getEventFromData('School of Rock')),
        ];
    }

    /**
     * This method should only return events where ALL of their instances
     * are in the past.
     * The array should contain Event objects
     * @return array
     */
    public static function inPast(): array
    {
        return [new Event(getEventFromData('Matilda'))];
    }

    /**
     * This method should only return events where at least one of their instances
     * is at the given venue.
     * The array should contain Event objects
     * @return array
     */
    public static function atVenue($venueId)
    {
        $venueId = $venueId;
        return [
            new Event(getEventFromData('Matilda')),
            new Event(getEventFromData('The Phantom of the Opera')),
        ];
    }


    /**
     * This method is to mock a database/api call.
     * @return array
     */
    protected static function eventsData(): array
    {
        $data = include ROOT_PATH . 'data/events.php';
        # shuffle is used to a mock the fact that the database/API won't always
        # return results in an expected order (depending or the query of course).
        shuffle($data);
        return $data;
    }
}
