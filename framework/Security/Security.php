<?php

namespace Framework\Security;


use Framework\DI\Service;

class Security
{
    public function isAuthenticated()
    {
        $session = Service::get('session');

        if ($session->get('authenticated'))
        {
            return $session->get('authenticated');
        }
        else
            return false;
    }
} 