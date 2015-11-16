<?php

namespace Framework\Validation\Filter;


use Framework\Validation\iFilter;

class Length implements iFilter
{
    public $min;
    public $max;

    public function __construct($min, $max = PHP_INT_MAX)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function check($forChecking)
    {
        $length = iconv_strlen($forChecking);

        if($length < $this->min)
            return ['error' => 'length must be >'.$this->min];
        if($length > $this->max)
            return ['error' => 'length must be <'.$this->max];

        return true;

    }



} 