<?php


namespace Framework\Security;


class Password
{
    static public function hash($password, $cost = 11)
    {
        return password_hash($password, PASSWORD_BCRYPT, ["cost" => $cost]);
    }

    static public function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }
} 