<?php
require_once(__DIR__.'/../framework/Loader.php');

Loader::init();
Loader::addNamespacePath('Portfolio\\', __DIR__.'/../src/Portfolio');
Loader::addNamespacePath('CMS\\', __DIR__.'/../src/CMS');

(new \Framework\Application(__DIR__.'/../app/config/config.php'))->run();

