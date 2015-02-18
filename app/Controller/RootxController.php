<?php

App::uses('AppController', 'Controller');

class RootxController extends AppController {

	public $uses = array();
	public $helpers = array('Html', 'Form');
	
	/**
	 * Index a view
	 *
	 * @param null
	 * @return void
	 * @throws NotFoundException When the view file could not be found
	 *	or MissingViewException in debug mode.
	 */
	
 	public function index() {
		$this->redirect(array('controller' => 'users', 'action' => 'index'));
 	}
	
	/*  
	*   Developer  : Mohammad Ashfaq  
	*   Project : Rootx
	*   
	*    
	*/
	public function login() {
		$user = $this->Session->read('User.id');
		if(!empty($user)){
		    $this->redirect(array('controller' => 'rootx', 'action' => 'index'));    
		}
		$this->layout = 'login';
		$this->redirect(array('controller' => 'users', 'action' => 'index'));
	}
	
	 
	 
}
