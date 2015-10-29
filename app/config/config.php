<?php

return [
    'name'        => 'portfolio',
    'basePath'    => realpath('../'),
    'mode'        => 'dev',
    'charset'     => 'UTF-8',
    'title'       => 'Портфолио',
    'routes'      => include('routes.php'),
    'main_layout' => __DIR__.'/../../src/Portfolio/views/layout.php',
    'error_500'   => __DIR__.'/../../src/Portfolio/views/500.html.php',
    'pdo'         =>
        [
            'dns'      => 'mysql:dbname=portfolio;host=localhost',
            'user'     => 'root',
            'password' => '33437373'
        ],
    'security'    =>
        [
            'user_class'  => 'Framework\\Security\\User',
            'login_route' => '/login'
        ],
    'log' =>
        [
            'target' => 'file',
            'logs' =>
                [
                    'address' => __DIR__.'/../logs/log.txt',
                ],
            'loggers' => 'Framework\\Log\\Loggers',

        ],
    'components' =>
        [
            'htmlpurifier' =>
                [
                    //'name' => 'htmlpurifier',
                    'namespace' => 'Htmlpurifier\\',
                    'path' => __DIR__.'/../vendor/Htmlpurifier',
                    'class' => 'HtmlPurifierBuilder',
                    //'bootstrap' => 'off'
                ]
        ]
    ];