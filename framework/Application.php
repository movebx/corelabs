<?php


namespace Framework;

//use Blog\Controller\TestController;
//use Blog\Model\Post;
use Framework\DI\Service;
use Framework\Db\Connection;
use Framework\Exception\DatabaseException;
use Framework\Exception\HttpNotFoundException;
use Framework\Exception\ServerException;
use Framework\Images\Image;
use Framework\Log\Logger;
use Framework\Request\Request;
use Framework\Router\Router;
use Framework\Security\Password;
use Framework\Session\Session;
use Framework\Response\ResponseRedirect;
//use Htmlpurifier\HtmlPurifierBuilder;

class Application
{
    private $_config;

    public function __construct($config)
    {
        $this->_config = require_once($config);
        Service::setConfig($this->_config);
        if($this->_config['mode'] !== 'dev')
        {
            error_reporting(0);
            ini_set('display_errors', '0');
        }


        $logger = new Logger($this->_config['log']);
        Service::set('logger', $logger->getLogger());

        $this->_initComponents();

        new Connection($this->_config['pdo']);
        Service::set('db', Connection::getDb());

        Service::set('session', new Session());

        $securityConf = Service::getConfig('security');
        $securityClass = $securityConf['user_class'];
        Service::set('security', new $securityClass());

        Service::set('router', new Router($this->_config['routes']));
        Service::set('request', new Request());


        Service::set('app', $this);
    }

    public function run()
    {
        //print_r($_SERVER);
        $logger = Service::get('logger');
        $router = Service::get('router');
        $route = $router->attemptToFindRoute();

//Service::get('logger')->log($route);
        //Service::get('logger')->log(Password::hash('mirana1111'));
        //print_r($route);




        try
        {
            if(empty($route))
                throw new HttpNotFoundException();
            else
            {

               if(isset($route['security']))
               {

                   $user = Service::get('security')->getUser();

                   if(isset($route['security']['login_route']))
                       Service::get('security')->loginRoute = $route['security']['login_route'];

                   if(is_null($user))
                   {
                       $host = Request::getHost();
                       $redirect = new ResponseRedirect($host.Service::get('security')->loginRoute);
                       $redirect->send();
                   }

                   $role = $route['security']['role'];

                   if($role !== $user->role)
                   {
                       Service::get('session')->setFlushMsg('warning', 'Не достаточно прав');
                       $host = Request::getHost();
                       $redirect = new ResponseRedirect($host);
                       $redirect->send();
                   }


/*
                   $c = 0;
                   for ( ; ; )
                   {
                       if ($c > count($routeSecurity) - 1)
                       {
                           break;
                       }

                       switch($routeSecurity[$c])
                       {
                           case 'ROLE_USER':
                               $user = $security->getUser();
                               if(is_null($user))
                               {
                                   $host = Request::getHost();
                                   $redirect = new ResponseRedirect($host.$security->loginRoute);
                                   $redirect->send();
                                   break;
                               }
                               else
                               {

                                   break;
                               }
                           //continue security
                       }
                       ++$c;
                   }
*/
               }






                $controllerClass = $route['controller'];
                if(!class_exists($controllerClass))
                {
                    $logger->log('Maybe it`s problem with incorrect routes', 'FATAL');
                    throw new ServerException('CrAsHeD!!!! SERVER ERROR', 500);
                }
                $controller = new $controllerClass();

                $action = $route['action'].'Action';
                if(!method_exists($controller, $action))
                {
                    $logger->log('Maybe it`s problem with incorrect routes', 'FATAL');
                    throw new ServerException('CrAsHeD!!!! SERVER ERROR', 500);
                }

                $reflMethod = new \ReflectionMethod($controllerClass, $action);

                $response = $reflMethod->invokeArgs($controller,
                    (isset($route['variables'])) ? $route['variables'] : []);

                $response->send();
            }
        }
        catch(HttpNotFoundException $e)
        {
            $e->show404page();
        }
        catch(ServerException $e)
        {
            $e->crashed();
        }
        catch(DatabaseException $e)
        {
            die('Database error: '.$e->getMessage());
        }
        catch(\Exception $e)
        {

        }







       // print_r(Post::find('all'));



        //$request = Service::get('request');
        //echo $request->getFullUrl();




        /*
        $htmlPurifierBuilder = new HtmlPurifierBuilder();
        $purifier = $htmlPurifierBuilder->execute();
        $purifier->delInvalidTags(true);
        echo $purifier->purify('<script> awdasfasfafa</script>');
        */

        //$logger = Service::get('logger');
        //$logger->log('suck');


        //print_r($route);

       // $test = new TestController();
       // echo $test->generateRoute('add_post');

       // $response = $test->render('ok.html');
       // $response->send();
    }

    private function _initComponents()
    {
        $components = Service::getConfig('components');

        foreach($components as $component)
        {
            \Loader::addNamespacePath($component['namespace'], $component['path']);
            if(isset($component['bootstrap']) && $component['bootstrap'] === 'on')
            {
                $class = $component['class'];
                Service::set($component['name'], new $class());
            }
        }
    }

} 