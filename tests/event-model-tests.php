<?php

use PHPUnit\Framework\TestCase;

class EventModelTests extends TestCase
{
    public function test_event_title_method_return_correct_string()
    {
        $expected = 'Matilda';
        $event = new Event(
            getEventFromData('Matilda')
        );
        $this->assertEquals(
            $expected,
            $event->title()
        );
    }

    public function test_event_venue_method_return_correct_string()
    {
        $venues = require ROOT_PATH . 'data/venues.php';
        $expected = 'Main House';
        $event = new Event(
            getEventFromData('Matilda')
        );

        $this->assertEquals(
            $expected,
            $event->venue()
        );
    }

    public function test_event_dateRange_method_return_correct_string()
    {
        $expected = 'Saturday 13th to Tuesday 16th November';
        $event = new Event(
            getEventFromData('School of Rock')
        );
        $this->assertEquals(
            $expected,
            $event->dateRange()
        );
    }
}
