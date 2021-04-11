<?php

class Event
{
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function dateRange()
    {
        if (!function_exists('datetime_array')) {
            function datetime_array($v)
            {
                $date = date_create($v['datetime']);
                return date_format($date, "l dS F");
            }
        }
        $temp_dates = array_map("datetime_array", $this->data['instances']);
        $str = $temp_dates[0] . " to " . $temp_dates[count($temp_dates) - 1];
        $arr = explode(" ", $str);
        unset($arr[2]);
        return implode(" ", $arr);
    }

    public function title()
    {
        return $this->data['title'];
    }

    public function venue()
    {
        $venues = require ROOT_PATH . 'data/venues.php';
        $venues_id = array_column($venues, 'id');
        $venues_title = array_column($venues, 'title');
        $venues_id_title = array_combine($venues_id, $venues_title);
        $GLOBALS['venues_id_title'] = $venues_id_title;
        if (!function_exists('venue_array')) {
            function venue_array($v)
            {
                return $GLOBALS['venues_id_title'][$v['venue']];
            }
        }

        return array_map("venue_array", $this->data['instances'])[0];
    }

    public static function instancesGroupedByDate(): array
    {
        $events = require ROOT_PATH . 'data/events.php';
        $instance_id_by_date = [];
        $event_date = [];
        $instance_id = [];
        foreach ($events as $k => $e) {
            $event = new Event($e);
            foreach ($e['instances'] as $ki => $i) {
                $instance = new Instance([
                    'id'       => $i['id'],
                    'datetime' => $i['datetime'],
                    'venue'    => $i['venue'],
                ]);
                $instance->venue = $event->venue();
                $instance_id[] = $instance;
                foreach ($i as $kd => $d) {

                    if ($kd === 'datetime') {
                        $event_date[] = $d;
                    }
                }
            }
        }
        $instance_id_by_date = array_combine($event_date, $instance_id);
        return $instance_id_by_date;
    }
}
