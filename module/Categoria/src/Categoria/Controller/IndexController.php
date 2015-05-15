<?php
namespace Categoria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\Zend\View\Model;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		return new ViewModel();
	}
}