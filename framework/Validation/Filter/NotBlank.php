<?php

namespace Framework\Validation\Filter;


use Framework\Validation\iFilter;

class NotBlank implements iFilter
{
    public function check($forChecking)
    {
        return (iconv_strlen($forChecking) == 0) ? ['error' => 'must be not blank'] : true;
    }
} 