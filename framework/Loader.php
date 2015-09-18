<?php


class Loader
{
    const DS = DIRECTORY_SEPARATOR;

    static public $namespacePaths = [];

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
            $aliases = explode('\\', $className);
            $namespace = array_shift($aliases).'\\';

            if(array_key_exists($namespace, self::$namespacePaths))
            {
                $residue = implode('\\', $aliases);
                $path = self::$namespacePaths[$namespace].self::DS.$residue.'.php';
                $filePath = str_replace('\\', '/', $path);
                if(file_exists($filePath))
                    include $filePath;

            }
            /*
            $aliases = explode('\\', $className);
            $class = array_pop($aliases);
            $namespace = implode('\\', $aliases);

            if(strripos('\\', $namespace) === false)
                $namespace .= '\\';

            echo $namespace;

            if(in_array($namespace, self::$namespacePaths))
            {
                $path = self::$namespacePaths[$namespace].self::DS.$class.'.php';
                $filePath = str_replace('\\', '/', $path);
                //echo $filePath;
                if(file_exists($filePath))
                    include $filePath;

            }
            */
        }

    }

    static public function addNamespacePath($alias, $path)
    {
        self::$namespacePaths[$alias] = $path;
        //print_r(self::$namespacePaths);
    }

}
new Loader();