<?php

require_once(__DIR__.'/../framework/Loader.php');

Loader::addNamespacePath('Blog\\',__DIR__.'/../src/Blog');

(new \framework\Application(__DIR__.'/../app/config/config.php'))->run();

