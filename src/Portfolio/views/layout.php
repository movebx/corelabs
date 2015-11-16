<?php

$activeIfRoute = function ($item) use (&$route) {
    return $route['name'] === $item ? 'active' : '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?= $title ?></title>

    <meta name="description" content="Наращивание ресниц в Сумах, классика, 2D, 3D, визаж. Портфолио Сизоненко Марины">
    <meta name="keywords" content="Нарастить ресницы Сумы, наращивание ресниц в Сумах, наращивание ресниц сумы, визаж сумы, визаж сумы цена, наращивание ресниц">
    <meta name='wmail-verification' content='92ef07ff7f85457e09c13f779382e9d7' />
    <meta name="author" content="автор">
    <meta charset="<?= \Framework\DI\Service::getConfig('charset') ?>">
    <meta name="viewport" content="width=device-width">

    <link href="/images/portfolio/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <link href="/css/portfolio/portfolio.css" rel="stylesheet">
    <link href="/css/portfolio/media.css" rel="stylesheet">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="http://vk.com/js/api/share.js?93" charset="windows-1251"></script>
    <script src="/js/scrollReveal.min.js"></script>
</head>
<body class="bg-color">

    <div id="box">

        <div id="header">
            <span class="site-font author-alias">Сизоненко Марина</span>

        </div>
        <div data-sr="move 16px scale up 20%, over 2s" class="nav-bar">
                <div class="delimiter"><a class="<?=$activeIfRoute('home')?>" href="/">Портфолио</a></div>
                <div><a href="/contact">Контакты</a></div>
        </div>



        <div id="content">
            <?= $content ?>
        </div>

        <div class="foot">

            <span data-sr="enter bottom, roll 45deg, over 2s" class="vk-ref">
                <script type="text/javascript">
                    document.write(VK.Share.button(false,{type: "custom", text: "<img src=\"http://vk.com/images/share_32.png\" width=\"16\" height=\"16\" />"}));
                    </script>
            </span>
        </div>


    </div>

<script type="text/javascript">

    (function($)
    {
        'use strict';

        window.sr= new scrollReveal({
            reset: false,
            move: '50px',
            mobile: false
        });

    })();

    (function(){
        $(document).ready(function()
        {

            var jNavBar = $('.nav-bar');
            jNavBar.delegate('a', 'mouseenter', function(e){

                var target = $(e.target);

                target.css('text-shadow', '1px 1px 1px');
                target.css('opacity', '0.9');


            });

            jNavBar.delegate('a', 'mouseleave', function(e){

                var target = $(e.target);

                target.css('text-shadow', '');
                target.css('opacity', '0.6');

            });
        });
    })();




</script>
</body>
</html>
