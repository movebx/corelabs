<?php

$activeIfRoute = function ($item) use (&$route) {
    return $route['name'] === $item ? 'active' : '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= \Framework\DI\Service::getConfig('charset') ?>">
    <title> <?= $title ?></title>

    <link href="/css/portfolio/portfolio.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

</head>
<body class="bg-color">

    <div id="box">

        <div id="header">
            <span class="site-font author-alias">Сизоненко Марина</span>

        </div>
        <div data-sr="move 16px scale up 20%, over 2s" class="nav-bar">
            <ul>
                <li style="border-right: 1px solid black;"><a class="<?=$activeIfRoute('home')?>" href="/">Портфолио</a></li>
                <li style="border-right: 1px solid black;"><a href="#">Чёто</a></li>
                <li><a href="#">Контакты </a></li>
            </ul>
        </div>


        <div id="content">
            <?= $content ?>
        </div>

    </div>

<script type="text/javascript">

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