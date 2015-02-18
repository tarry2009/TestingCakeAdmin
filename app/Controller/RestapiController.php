<?php

/*  
*   Developer  : Mohammad Ashfaq  
*   Project : Roox
*   Date    :  
*/

class RestapiController extends AppController {
 
    public function beforeFilter() {
        parent::beforeFilter();
	$this->layout = 'ajax';
    }
    
    public function setstatus($uuid = null, $table = null) {
       
       $this->layout = 'admin';
	   $returnPath = $_SERVER['HTTP_REFERER'];
        
       //Getting list of all models
       $allModelNames = App::objects('model');
	
       #veryfing if table is available in the list.
       if(in_array($table,$allModelNames)){
			$this->loadModel($table); 
			$this->$table->id = $this->$table->getIdByUuid($uuid);
        
		    if(!$this->$table->exists()) {
				$this->Session->setFlash(__('The record id is not valid.'), 'error');
			    $this->redirect($returnPath);
			}
			
        }else{ 
			
			$this->Session->setFlash(__('Something is wrong.'), 'error');
		 	$this->redirect($returnPath);
		}
 
       $controllerName = strtolower($table.'s');
		$data =  $this->$table->read(null,  $this->$table->id);

       if($table == 'User'){
	   
	   if($data['User']['email']=='ashfaqzp@gmail.com' || $data['User']['email']=='admin@gmail.com'){
	       $this->Session->setFlash(__('This user is root user and you cannot update status'), 'error');
		   $this->redirect($returnPath);
	   }
       }
       
	if($data[$table]['status']=='1')
    	  $data[$table]['status'] = 0;
	else
	  $data[$table]['status'] = 1;

    //debug($data); exit;
    
       if ($this->$table->save($data)) {
	   $this->Session->setFlash(__('Status updated successfully'), 'success' );
	   
			$this->redirect($returnPath);
       }
       
       $this->Session->setFlash(__('Status could not update'), 'error');
       $this->redirect($returnPath);
    }
    /**
     * Del a Record
     *
     * @param null
     * @return void
     * @throws NotFoundException When the view file could not be found
     *	or MissingViewException in debug mode.
     */
    
    public function delete($uuid = null, $table = null) {
		
		$this->layout = 'admin';
		$returnPath = $_SERVER['HTTP_REFERER'];
		  
		//Getting list of all models
		$allModelNames = App::objects('model');
		
		#veryfing if table is available in the list.
		if(in_array($table,$allModelNames)){
			$this->loadModel($table); 
			$this->$table->id = $this->$table->getIdByUuid($uuid);
 			
			if(!$this->$table->exists()) {
				$this->Session->setFlash(__('The record id is not valid.'), 'error');
				$this->redirect($retPath);
			}
		}else{
			$this->Session->setFlash(__('Something is wrong.'), 'error');
			$this->redirect($retPath);
		}

		if($table == 'User'){
			$this->data =  $this->User->read(null,  $this->User->id);
			if($this->data['User']['email']=='ashfaqzp@gmail.com' || $this->data['User']['email']=='admin@gmail.com'){
				$this->Session->setFlash(__('This user is root user and cannot delete'), 'error');
				$this->redirect($returnPath);
			}
		}
		
		
		
        if($table=='File'){
			$this->data =  $this->$table->read(null,  $this->$table->id);
			unlink($this->data['File']['file_path']);
		}	
		
        if ($this->$table->delete()) {
			
            $this->Session->setFlash(__('Record deleted successfully'), 'success' );
            $this->redirect($returnPath);
        }
	
        $this->Session->setFlash(__('Record could not deleted'), 'error');
        $this->redirect($returnPath);
    }
    
 
}
