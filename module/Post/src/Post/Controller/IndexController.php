<?php
namespace Categoria\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractController
{
	public function __construct()
	{
	    $this->form = 'Post\Form\CategoryForm';
	    $this->controller = 'post';
	    $this->route = 'post/default';
	    $this->service = 'Post\Service\PostService';
	    $this->entity = 'Post\Entity\Post';
	    
	}

}