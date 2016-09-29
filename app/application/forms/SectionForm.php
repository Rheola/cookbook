<?php

class Application_Form_SectionForm extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement(
            'text', 'name', [
                'label'      => 'Название',
                'required'   => true,
                'filters'    => ['StringTrim'],
                'validators' => [
                    ['validator' => 'StringLength', 'options' => [0, 255]]
                ]
            ]
        );

        // Add the submit button
        $this->addElement(
            'submit', 'submit', [
                'ignore' => true,
                'label'  => 'Добавить',
            ]
        );

        // And finally add some CSRF protection
        $this->addElement(
            'hash', 'csrf', [
                'ignore' => true,
            ]
        );

    }
}

