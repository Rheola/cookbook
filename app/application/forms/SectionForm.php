<?php

class Application_Form_SectionForm extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'name', [
            'label' => 'Название рубрики',
            'required' => true,
            'filters' => ['StringTrim'],

            'validators' => [
                ['validator' => 'StringLength', 'options' => [0, 255]]
            ]
        ]);

    }
}

