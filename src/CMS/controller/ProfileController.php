<?php

namespace CMS\Controller;


use Framework\Controller\Controller;
use Framework\DI\Service;
use Framework\Response\Response;

class ProfileController extends Controller
{
    public function getAction()
    {
        if(Service::get('security')->isAuthenticated())
        {
            $user = Service::get('security')->getUser();

            $id = $user->id;
            $name =$user->name;
            $email = $user->email;
            $password = $user->password;

            return $this->render('profile', ['action' => $this->generateRoute('update_profile'), 'id' => $id,
                'name' => $name, 'email' => $email, 'password' => $password]);
        }
        else
            return $this->redirect($this->generateRoute('login'));
    }

    public function updateAction()
    {
        return new Response('OK!!');
    }
} 