<?php


class Loader
{
    const DS = DIRECTORY_SEPARATOR;

    static public $namespacePath = [];

    private $root;

    public function __construct()
    {
        $this->root = dirname(__DIR__);

        spl_autoload_register([$this, "autoload"]);
    }

    public function autoload($className)
    {
        $path = $this->root.self::DS.lcfirst($className).'.php';
        $filePath = str_replace('\\', '/', $path);

        if(file_exists($filePath))
            include $filePath;
        else
        {
            list($alias) = explode('\\', $className);
            

        }

    }

    static public function addNamespacePath($alias, $path)
    {
        self::$namespacePath[$alias] = $path;
        print_r(self::$namespacePath);
    }


}
new Loader();