<?php
namespace Post\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Validator\NotEmpty;

class PostFilter extends InputFilter
{
    public function __construct()
    {
        $titulo = new Input('titulo');
        $titulo->setRequired(true)
                ->getFilterChain()
                    ->attach(new StringTrim())
                    ->attach(new StripTags());
        $titulo->getValidatorChain()->attach(new NotEmpty());
        $this->add($titulo);
        
        $descricao = new Input('descricao');
        $descricao->setRequired(false)
        ->getFilterChain()
        ->attach(new StringTrim())
        ->attach(new StripTags());
        $this->add($descricao);
        
        $texto = new Input('texto');
        $texto->setRequired(false)
        ->getFilterChain()
        ->attach(new StringTrim())
        ->attach(new StripTags());
        $this->add($texto);
    }
    
}