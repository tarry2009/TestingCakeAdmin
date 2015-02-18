<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package	: app.Controller
 * @link	: http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 * Developer    : Mohammad Ashfaq  
 * Project      : Rootx
 * 
 *  
 */
class AppController extends Controller {
  
    public $helpers = array('Html', 'Form', 'Js','Session');
    public $uses    = array('User');
    
     //...

    public $components = array('Session');

    var $viewName = 'Not Define';
    var $crumb = array('text'=>'','key'=>'');
    
    function beforeFilter (){
 		$this->checkUser();
		if($this->viewName==='Not Define')
			$this->set('viewName',$this->viewName);	
			$this->set('crumb',$this->crumb);	
		 
    }
    
    /*
    * @Function	: For get any record of any table
    * Developer    : Mohammad Ashfaq  
    * Project      : Rootx 
    * Date         : 
    *  
    */    
    public function get_record($modelName, $fieldName='', $selectedRecordId='',$condarray=array()) {
        $condition['conditions'] = $condarray;
		$record	= $this->$modelName->find('first',$condition);
		unset($condition);
        return $record;        
    }
  
    /*
    * @Function	    : For permissions of restricted area
    * Developer     : Mohammad Ashfaq  
    * Project       : Rootx
    * Date          : 
    *  
    */    
    public function checkUser() {
        $user = $this->Session->read('User.role');
        $action = $this->request->params['action'];
        
        //debug($action); exit;
        if(empty($user) || $user != 'admin'){
			if( $action == 'login' ||  $action == 'logout' )
				echo '';
				else
				$this->redirect(array('controller' => 'users', 'action' => 'login'));    
        }
    }
    
}
