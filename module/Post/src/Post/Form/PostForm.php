<?php
namespace Post\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Button;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Checkbox;

class PostForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new PostFilter());
        
        $titulo = new Text('titulo');
        $titulo->setLabel('Título')
             ->setAttributes(array(
                 'maxlength' => 80
             ));
        $this->add($titulo);
        
        $descricao = new Textarea('descricao');
        $descricao->setLabel('Descrição')
        ->setAttributes(array(
            'maxlength' => 150
        ));
        $this->add($descricao);
        
        $texto = new Textarea('texto');
        $texto->setLabel('Texto');
        $this->add($texto);
        
        $ativo = new Checkbox('ativo');
        $ativo->setLabel('Ativo');
        $this->add($ativo);
        
        $button = new Button('submit');
        $button->setLabel('Salvar')
               ->setAttributes(array(
                   'type' => 'submit',
                   'class' => 'btn'
               ));
         $this->add($button);
    }
}
