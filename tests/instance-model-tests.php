<?php

use PHPUnit\Framework\TestCase;

class InstanceModelTests extends TestCase
{
    public function test_instance_time_method_return_correct_title_string()
    {
        $expected = '20:30';

        $instance = new Instance([
            'id'       => '',
            'datetime' => '20:30',
            'venue'    => '',
        ]);
        $this->assertEquals(
            $expected,
            $instance->time()
        );
    }
}
