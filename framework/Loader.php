<?php


class Loader
{
    const DS = DIRECTORY_SEPARATOR;

    static public $namespacePath = array();

    private $root;

    public function __construct()
    {
        $this->root = dirname(__DIR__);

        spl_autoload_register([$this, "autoload"]);
    }

    public function autoload($className)
    {
        $path = $this->root.self::DS.$className.'.php';
        $filePath = str_replace('\\', '/', $path);

        if(file_exists($filePath))
            include $filePath;

    }

    static public function addNamespacePath()
    {

    }


}
new Loader();