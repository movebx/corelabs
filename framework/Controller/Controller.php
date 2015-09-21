<?php

namespace Framework\Controller;

 use Framework\DI\Service;

 abstract class Controller
{
    public function getRequest()
    {
        return Service::get('request');
    }
} 