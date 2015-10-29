<?php

namespace CMS;

use Framework\Controller\Controller;
use Framework\DI\Service;
use Framework\Security\Password;

class AdminAuthentication extends Controller
{
    public function loginAction()
    {
        if(Service::get('security')->isAuthenticated())
        {
            return $this->redirect($this->generateRoute('admin'));
        }

        if($this->getRequest()->isPost())
        {
            $request = $this->getRequest();
            $login = $request->post('login');
            $password = $request->post('password');
            $admin = Service::get('security')->findBy('role', 'ADMIN');

            if(Password::verify($password, $admin->password))
            {
                Service::get('security')->setUser($admin);
                return $this->redirect($this->generateRoute('admin'));
            }
            else
            {
                Service::get('session')->setFlushMsg('error', 'Incorrect login or password!');

            }

        }

        return $this->render('login',
            [
                'layout' => false,
                'title'  => 'Вход',
                'action' => $this->generateRoute('admin_login'),

            ]);
    }

    public function indexAction()
    {
        return $this->render('index',
            [
                'layout' => false,
                'title' => 'Админка',
            ]);
    }

    public function logoutAction()
    {
        Service::get('security')->clear();
        return $this->redirect($this->generateRoute('admin_login'));
    }
} 