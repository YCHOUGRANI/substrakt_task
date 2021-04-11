<?php

class Instance
{
    public function __construct($data)
    {
        $this->data = $data;
        //$this->venue = $data['venue'];
        //echo "\naaaaaaaaaa";
        //print_r($data['venue']);
    }

    public function time($format = null)
    {
        if (!empty($format)) {
            $date = date_create($this->data['datetime']);
            return date_format($date, $format);
        }
        return $this->data['datetime'];
    }
}
