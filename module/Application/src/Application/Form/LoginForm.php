<?php
/**
 * 
 * @version 1.0
 * @copyright (c) 2016, Rioxygen.com
 */
namespace Application\Form;

use Zend\Form\Form;

/**
 * Clase para el manejo de 
 */
class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct('loginForm');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'user',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'usuario',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Usuario',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
                'placeholder' => 'Password Here...',
                'required' => 'required'
            ),
            'options' => array(
                'label' => 'Password'
            )
        ));
        $this->add(array(
            'name' => 'remember',
            'type' => 'Zend\Form\Element\MultiCheckbox',
            'attributes' => array(
                'required' => 'required',
                'value' => '0'
            ),
            'options' => array(
                'label' => 'Recordar contraseña',
                'value_options' => array(
                    '0' => 'remember'
                )
            )
        ));
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Zend\Form\Element\Csrf',
        ));
    }
}
