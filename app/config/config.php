<?php

return [
    'name'        => 'portfolio',
    'basePath'    => realpath('../'),
    'mode'        => 'prod',
    'charset'     => 'UTF-8',
    'title'       => 'Наращивание ресниц в Сумах, классика, 2D 3D наращивание, визаж',
    'routes'      => include('routes.php'),
    'main_layout' => __DIR__.'/../../src/Portfolio/views/layout.php',
    'error_500'   => __DIR__.'/../../src/Portfolio/views/500.html.php',
    'pdo'         =>
        [
            'dns'      => 'mysql:dbname=u151405890_port;host=localhost',
            'user'     => 'u151405890_root',
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
