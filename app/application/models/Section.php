<?php

class Application_Model_Section extends Zend_Db_Table_Abstract

{
    protected $_name = 'section';

    public $name;
    public $id;

    /*   public function __construct(array $options = null)
       {
           if (is_array($options)) {
               $this->setOptions($options);
           }
       }*/


    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

}

