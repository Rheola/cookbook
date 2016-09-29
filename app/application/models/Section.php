<?php

class Application_Model_Section extends Zend_Db_Table_Abstract

{
    protected $_name = 'section';

    public $name;
    public $id;

    public function __construct(array $options = null)
    {

        foreach ($options as $attribute => $value) {
            $this->$attribute = $value;
        }

        parent::__construct();
    }

}

