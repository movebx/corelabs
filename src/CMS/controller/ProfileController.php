<?php

namespace CMS\Controller;


use CMS\Model\Profile;
use Framework\Controller\Controller;
use Framework\DI\Service;
use Framework\Response\Response;
use Framework\Validation\Validator;

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
            $ip = Service::get('security')->getUserIp();


            return $this->render('profile', ['action' => $this->generateRoute('update_profile'), 'id' => $id,
                'name' => $name, 'email' => $email, 'password' => $password , 'ip' => $ip]);
        }
        else
            return $this->redirect($this->generateRoute('login'));
    }

    public function updateAction()
    {

            $request = $this->getRequest();
            $profile = new Profile();

            $profile->id = $request->post('id');
            $profile->name = $request->post('name');
            $profile->email = $request->post('email');
            $profile->password = $request->post('password');

            $validator = new Validator($profile);

            if ($validator->isValid())
            {
                $profile->update();
                return $this->redirect($this->generateRoute('home'));
            }
            else
                $errors = $validator->getErrors();


        return $this->render('profile', ['action' => $this->generateRoute('update_profile'), 'errors' => $errors,
        'id' => $profile->id, 'name' => $profile->name, 'email' => $profile->email, 'password' => $profile->password,
        'ip' => Service::get('security')->getUserIp()]);
    }
} 