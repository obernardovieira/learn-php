<?php

namespace HelloWorld;

class SayHello
{
    private $times;

    function __construct($times) {
        $this->times = $times;
    }

    public function world()
    {
        $result = '';
        for ($x = 0; $x < $this->times; $x++) {
            $result .= 'Hello world,'. $x;
        }
        return $result;
    }
}
