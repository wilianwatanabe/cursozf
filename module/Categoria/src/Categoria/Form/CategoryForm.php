<?php
namespace Categoria\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Button;

class CategoryForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new CategoryFilter());
        
        $nome = new Text('nome');
        $nome->setLabel('Nome')
             ->setAttributes(array(
                 'maxlength' => 50
             ));
        $this->add($nome);
        
        $button = new Button('submit');
        $button->setLabel('Salvar')
               ->setAttributes(array(
                   'type' => 'submit',
                   'class' => 'btn'
               ));
         $this->add($button);
    }
}
