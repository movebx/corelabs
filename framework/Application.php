<?php


namespace Framework;

use Blog\Controller\TestController;
use Framework\DI\Service;
use Framework\Db\Connection;
use Framework\Exception\HttpNotFoundException;
use Framework\Exception\ServerException;
use Framework\Log\Logger;
use Framework\Request\Request;
use Framework\Router\Router;
use Htmlpurifier\HtmlPurifierBuilder;

class Application
{
    private $_config;

    public function __construct($config)
    {
        $this->_config = require_once($config);
        Service::setConfig($this->_config);

        $logger = new Logger($this->_config['log']);
        Service::set('logger', $logger->getLogger());

        $this->_initComponents();

        new Connection($this->_config['pdo']);
        Service::set('db', Connection::getDb());
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


        try
        {
            if(empty($route))
                throw new HttpNotFoundException();
            else
            {
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
        catch(\Exception $e)
        {

        }






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