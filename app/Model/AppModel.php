<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */



/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
 
App::uses('Model', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class AppModel extends Model {
	
    function beforeSave( $options = array() )
	{
		
		if (isset($this->data[$this->alias]['password'])) {
			  
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
			$this->data[$this->alias]['original_pass'] = getEncrypt($this->data[$this->alias]['original_pass']) ;
		}
		/**/
		
		$id = $this->id;
 
		if(CakeSession::read('User.id'))
		{
			if(!empty($id))
			{
                $this->data[$this->name]['created_user_id'] = CakeSession::read('User.id');
			} else {
				
				$this->data[$this->name]['created_user_id'] = CakeSession::read('User.id');
				$this->data[$this->name]['updated_user_id'] = CakeSession::read('User.id');
 	
			}
			
			$this->data[$this->name]['created'] = date('Y-m-d H:i:s', time());
			$this->data[$this->name]['updated'] = date('Y-m-d H:i:s', time());
		}
		
		if(empty($id) && isset($this->_schema['uuid'])){
            $this->data[$this->name]['uuid'] = String::uuid(); // generates UUID (Universally Unique IDentifier)
		}
        		
		return true;
	}


	function getIdByUuid($uuid = null){
		if(empty($uuid)){
			return false;
		}

		return $this->field('id', array('uuid' => $uuid));
	}

	function getUuidById($id = null){
		if(empty($id)){
			return false;
		}
		return $this->field('uuid', array('id' => $id));
	}
}
