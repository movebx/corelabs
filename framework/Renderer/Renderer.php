<?php


namespace Framework\Renderer;


use Framework\DI\Service;

class Renderer
{
    protected $data = [];
    protected $_layout;
    protected $error_500;

    public function __construct($viewPath)
    {
        $this->_layout = Service::getConfig('main_layout');
        $this->error_500 = Service::getConfig('error_500');

        if(file_exists($viewPath))
        {
            ob_start();
            include($viewPath);
            $this->data['content'] = ob_get_clean();
        }
        else
        {
            //@TODO::WARNINGS be
            $message = "Server error";
            $code = 500;

            ob_start();
            include($this->error_500);
            $this->data['content'] = ob_get_clean();
        }
    }

    public function getContentBuffer()
    {
        extract($this->data);

        ob_start();
        include($this->_layout);
        $buffer = ob_get_clean();

        return $buffer;
    }
} 