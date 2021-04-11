<?php

use PHPUnit\Framework\TestCase;

class EventQueriesTests extends TestCase
{

    public function test_events_in_the_future_are_returned()
    {
        $expected = [
            new Event(getEventFromData('The Phantom of the Opera')),
            new Event(getEventFromData('School of Rock')),
        ];
        $this->assertEquals(
            $expected,
            Events::inFuture()
        );
    }

    public function test_events_in_the_past_are_returned()
    {
        $expected = [
            new Event(getEventFromData('Matilda')),
        ];

        $this->assertEquals(
            $expected,
            Events::inPast()
        );
    }

    public function test_events_at_given_venue_are_returned()
    {
        $venueId = '169613AMPLTTSJHPDBJLLSBRJCJPCDNRC';

        $expected = [
            new Event(getEventFromData('Matilda')),
            new Event(getEventFromData('The Phantom of the Opera')),
        ];

        $this->assertEquals(
            $expected,
            Events::atVenue($venueId)
        );
    }

    public function test_events_instances_are_returned_grouped_by_date()
    {
        /* $this->markTestIncomplete(
            'This test needs implementing, the view is expecting a method
            called instancesGroupedByDate. This is used to output the date before
            a group of instance times for that day. Sometimes a show can be on
            more than once a day.'
        );*/
        $expected = [
            '2021-09-11T19:30:00' => [new Instance([
                'id'       => '13211AVSLVNMDRHJLPVGDVNHVRDPKCVKJ',
                'datetime' => '2021-09-11T19:30:00',
                'venue'    => '169613AMPLTTSJHPDBJLLSBRJCJPCDNRC',
            ])]
        ];
        $this->assertEquals(
            $expected['2021-09-11T19:30:00'][0]->data,
            Event::instancesGroupedByDate()['2021-09-11T19:30:00']->data
        );
    }
}
