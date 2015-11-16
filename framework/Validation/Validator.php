<?php

namespace Framework\Validation;


use Framework\DI\Service;
use Framework\Exception\ServerException;
use Framework\Model\ActiveRecord;

class Validator
{
    protected $errors = NULL;

    protected $rules;
    protected $objVars;

    public function __construct($obj)
    {
        if($obj instanceof ActiveRecord)
        {
            $this->rules = $obj->getRules();
            $this->objVars = get_object_vars($obj);
        }
        else
        {
            $logger = Service::get('logger');
            $logger->log('$obj not instance of ActiveRecord', 'WARNING');
            throw new ServerException('Validation problems');
        }
    }

    public function isValid()
    {
        foreach($this->rules as $name => $filters)
        {
            foreach($filters as $filter)
            {
                $result = $filter->check($this->objVars[$name]);
                if(is_array($result))
                {
                    $this->errors[$name] = 'Incorrect '.$name.': '.$result['error'];
                }
            }
        }


        return ($this->errors == NULL);
    }

    public function getErrors()
    {
        return $this->errors;
    }
} 