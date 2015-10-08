<?php

return [
    'name'        => 'Blog',
    'basePath'    => realpath('../'),
    'mode'        => 'dev',
    'charset'     => 'UTF-8',
    'routes'      => include('routes.php'),
    'main_layout' => __DIR__.'/../../src/Blog/views/layout.html.php',
    'error_500'   => __DIR__.'/../../src/Blog/views/500.html.php',
    'pdo'         =>
        [
            'dns'      => 'mysql:dbname=education;host=localhost',
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