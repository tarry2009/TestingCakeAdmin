<?php

/*  
*   Developer  : Mohammad Ashfaq  
*   Project : Rootx
*    
*/

class SettingsController extends AppController {

	public $uses = array('Setting');
    public function beforeFilter() {
		parent::beforeFilter();
		parent::checkUser();
		$this->layout = 'admin';
       
    }

    public function index() {
        $crumb = array('text'=>'New ','key'=>'/settings/add');
        $this->set('crumb',$crumb); 
        $this->viewName = 'Website Settings';
		$this->set('viewName',$this->viewName);
		
		$list	= $this->Setting->find('all'); 
		$this->set('list',$list); 
    }
 
 
	public function acl() {
		
		$list = array();
		$list = $this->getCtrActions();
		
		unset($list['ErrorsController']);
		$this->set('allRec',$list);
		#debug($list); exit;
		
		$this->viewName = 'Access Control List';
		$this->set('viewName',$this->viewName);
         $crumb = array('text'=>'New ','key'=>'/settings/add');
         $this->set('crumb',$crumb);
	 }
	 
    /*  
	*   Developer  : Mohammad Ashfaq  
	*   Project : Rootx
	*    
	*   Parameters: no
	*   Detail: Using this function for create Setting by admin and routing by routes.php
	*/
    public function add() {
        $this->set('action','update');
        if (!empty($this->data)) {
	    
	    $data = array();
	    
	    $data = $this->data;
	    
	    $this->Setting->create();
            if ($this->Setting->save($data)) {
                $this->Session->setFlash(__('The Setting has been saved'),'success');
                return  $this->redirect(array('controller' => 'settings', 'action' => 'index'));
            }
            $this->Session->setFlash(__('The Setting could not be saved. Please, try again.'),'error');
            $this->set('action','add');
        } 
    }
        /*  
	*   Developer  : Mohammad Ashfaq  
	*   Project : Rootx
	*   Date    : 22-Nov-2013
	*   Parameters: no
	*   Detail: Using this function for edit Setting by admin and routing by routes.php
	*/

    public function update($uuid = null) {
		$this->set('action','update');
         
        if (!empty($this->data)) {
	    
	    $data = array();
	    $data = $this->data;
	    
            if ($this->Setting->save($this->data)) {
		
                $this->Session->setFlash(__('The Setting has been saved'),'success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The Setting could not be saved. Please, try again.'),'error');
        } else {
			
			$this->Setting->id = $this->Setting->getIdByUuid($uuid);
         
			if (!$this->Setting->exists()) {
			   $this->Session->setFlash(__('The Setting could not found.'), 'error');
				$this->redirect(array('controller' => 'settings', 'action' => 'index'));
			}
        
            $this->data = $this->Setting->read(null, $this->Setting->id);
			$this->render('add');
        }
    }
     
	  public function getCtrActions() {
 
        $aCtrlClasses = App::objects('controller');
        foreach ($aCtrlClasses as $controller) {
            if ($controller != 'AppController') {
                App::import('Controller', str_replace('Controller', '', $controller));
                $aMethods = get_class_methods($controller);
                foreach ($aMethods as $idx => $method) {
                    if ($method{0} == '_') {
                        unset($aMethods[$idx]);
                    }
                }
                App::import('Controller', 'AppController');
                $parentActions = get_class_methods('AppController');
                $controllers[$controller] = array_diff($aMethods, $parentActions);
            }
        }
 
        return $controllers;
    }

 
}
