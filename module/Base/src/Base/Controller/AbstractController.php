<?php
namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Zend\Paginator;
use Zend\Paginator\Adapter\Zend\Paginator\Adapter;
use Zend\View\Helper\Zend\View\Helper;
use Zend\View\Helper\Zend\View\Helper;

abstract class AbstractController extends AbstractActionController
{
    protected $em;
    protected $entity;
    protected $controller;
    protected $route;
    protected $service;
    protected $form;
    
    abstract function __construct();
    
    /**
     * Lista Resultados
     * @return array/void
     */
    public function indexAction()
    {
        $list = $this->getEm()->getRepository($this->entity)->findAll();
        
        $page = $this->params()->fromRoute('page');
        
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
                  ->setDefaultItemCountPerPage(10);
        
        return new ViewModel(array('data' => $paginator,
                                   'page' => $page
        ));
    }
    
    /**
     * Insere um registro
     */
    public function inserirAction()
    {
        if (is_string($this->form))
        {
            $form = new $this->form;
        }
        else
        {
            $form = $this->form;
        }
        
        $request = $this->getRequest();
        
        if ($request->isPost())
        {
            $form->setData($request->getPost());
            
            if ($form->isValid())
            {
                $service = $this->getServiceLocator()->get($this->service);
                
                if ($service->save($request->getPost()->toArray()))
                {
                    $this->flashMessenger()->addSuccessMessage('Cadastrado com Sucesso');
                }else{
                    $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar! Tente mais tarde.');
                }
                
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        
        if ($this->flashMessenger()->hasSuccessMessages())
        {
            return new ViewModel(array('form' => $form,
                                       'success' => $this->flashMessenger()->getSuccessMessages()
            ));
        }
        
        if ($this->flashMessenger()->hasErrorMessages())
        {
            return new ViewModel(array('form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages()
            ));
        }
        
        return new ViewModel(array('form' => $form));
    }
    
    /**
     * Edita um registro
     */
    public function editarAction()
    {
        
    }
    
    /**
     * Exclui um registro
     */
    public function excluirAction()
    {
        
    }
    
    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEm()
    {
        if ($this->em == null)
        {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        
        return $this->em;
    }
}