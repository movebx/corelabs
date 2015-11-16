<?php

return array(
    'home' =>
        [
            'pattern'    => '/',
            'controller' => 'Portfolio\\Controller\\PortfolioController',
            'action'     => 'index',
        ],
    'admin_login' =>
        [
            'pattern'    => '/admin/login',
            'controller' => 'CMS\\Controller\\AdminController',
            'action'     => 'login'
        ],
    'logout' =>
        [
            'pattern'    => '/logout',
            'controller' => 'CMS\\Controller\\AdminController',
            'action'     => 'logout',
        ],
    'admin_add_image' =>
        [
            'pattern'    => '/image/add',
            'controller' => 'CMS\\Controller\\AdminController',
            'action'     => 'image',
            '_requirements' =>
            [
                '_method' => 'POST'
            ]
        ],
    'admin' =>
        [
            'pattern'    => '/admin',
            'controller' => 'CMS\\Controller\\AdminController',
            'action'     => 'index',
            'security'   =>
                [
                    'role' => 'ADMIN',
                    'login_route' => '/admin/login'
                ],
        ],
    'delete_image' =>
        [
            'pattern'    => '/delete/{id}',
            'controller' => 'CMS\\Controller\\AdminController',
            'action'     => 'delete',
        ],
    'contact' =>
        [
            'pattern'    => '/contact',
            'controller' => 'Portfolio\\Controller\\PortfolioController',
            'action'     => 'contact',
        ]


    /*
    'testredirect'   => array(
        'pattern'    => '/test_redirect',
        'controller' => 'Blog\\Controller\\TestController',
        'action'     => 'redirect',
    ),
    'test_json' => array(
        'pattern'    => '/test_json',
        'controller' => 'Blog\\Controller\\TestController',
        'action'     => 'getJson',
    ),
    'signin'         => array(
        'pattern'    => '/signin',
        'controller' => 'Blog\\Controller\\SecurityController',
        'action'     => 'signin'
    ),
    'login'          => array(
        'pattern'    => '/login',
        'controller' => 'Blog\\Controller\\SecurityController',
        'action'     => 'login'
    ),
    'logout'         => array(
        'pattern'    => '/logout',
        'controller' => 'Blog\\Controller\\SecurityController',
        'action'     => 'logout'
    ),
    'update_profile' => array(
        'pattern'       => '/profile',
        'controller'    => 'CMS\\Controller\\ProfileController',
        'action'        => 'update',
        '_requirements' => array(
            '_method' => 'POST'
        )
    ),
    'profile'        => array(
        'pattern'    => '/profile',
        'controller' => 'CMS\\Controller\\ProfileController',
        'action'     => 'get'
    ),
    'add_post'       => array(
        'pattern'    => '/posts/add',
        'controller' => 'Blog\\Controller\\PostController',
        'action'     => 'add',
        'security'   => array('ROLE_USER'),
    ),
    'show_post'      => array(
        'pattern'       => '/posts/{id}',
        'controller'    => 'Blog\\Controller\\PostController',
        'action'        => 'show',
        '_requirements' => array(
            'id' => '\d+'
        )
    ),
    'edit_post'      => array(
        'pattern'       => '/posts/{id}/edit',
        'controller'    => 'CMS\\Controller\\BlogController',
        'action'        => 'edit',
        '_requirements' => array(
            'id'      => '\d+',
            '_method' => 'POST'
        )

    )
    */
);