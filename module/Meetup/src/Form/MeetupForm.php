<?php

declare(strict_types=1);

namespace Meetup\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;
use Zend\Validator\Callback;
use \DateTime;

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
            'description' => [
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
            'date_debut' => [
                'validators' => [
                        [
                        'name' => Callback::class,
                        'options' => [
                            'callback' => function($value, $context) {
                                $debut = new DateTime($value);
                                $fin = new DateTime($context['date_fin']);
                                
                                if($debut < $fin) {
                                    return $value;
                                }
                                return false;
                                
                            },
                            'messages' => [
                               Callback::INVALID_VALUE => 'la date de début doit étre inférieur a la date de fin',
                            ]
                        ],
                    ],

                ],
            ],
        ];
    }
}
