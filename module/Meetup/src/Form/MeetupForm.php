<?php

declare(strict_types=1);

namespace Meetup\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;
use Zend\Validator\Callback;

class MeetupForm extends Form implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('meetup');

        $this->add([
            'type' => Element\Text::class,
            'name' => 'title',
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'type' => Element\Text::class,
            'name' => 'description',
            'options' => [
                'label' => 'description',
            ],
        ]);

        $this->add([
            'type' => Element\Date::class,
            'name' => 'date_debut',
            'options' => [
                'label' => 'date_debut',
            ],
        ]);

        $this->add([
            'type' => Element\Date::class,
            'name' => 'date_fin',
            'options' => [
                'label' => 'date_fin',
                'class' => 'test'
            ],
        ]);

        $this->add([
            'type' => Element\Submit::class,
            'name' => 'submit',
            'attributes' => [
                'value' => 'Submit',
            ],
        ]);

    }


    public function callback() {
        //return true;
    }
    public function getInputFilterSpecification()
    {
        return [
            'title' => [
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 2,
                            'max' => 15,
                        ],
                    ],
                ],
            ],
        ];
    }
}
