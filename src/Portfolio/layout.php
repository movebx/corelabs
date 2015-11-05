<?php

$activeIfRoute = function ($item) use (&$route) {
    return $route['name'] === $item ? 'class="active"' : '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= \Framework\DI\Service::getConfig('charset') ?>">
    <title> <?= $title ?></title>

    <link href="/css/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/css/my.css" rel="stylesheet">
    <script type="text/javascript" src="/js/animate.js" defer></script>
</head>

<body >
<div id="particles-js" class="main">
    <div id="animate-nav-bar" class="nav-bar">
        <div><a href="/">Portfolio</a></div>
        <div><a href="#">Services</a></div>
        <div><a href="#" style="border-right: none; width: 302px;">Contact</a></div>
    </div>
    <div id="animate-content" class="content">

        <?= $content ?>


    </div>



</div>


</body>
</html>