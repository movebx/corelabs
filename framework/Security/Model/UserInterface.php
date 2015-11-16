<?php

namespace Framework\Security\Model;


interface UserInterface
{
    public function getRole();

    public function isAuthenticated();

    public function setUser($user);

    public function getUser();

    public function clear();
} 