<?php

App::uses('AppController', 'Controller');
 
class MediaController extends AppController {

	 
	 
	public $uses = array('File','FileRelation');
	 
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'admin';
	}
	/**
	 * Index a view
	 *
	 * @param null
	 * @return void
	 */
	
 	public function index() {
		 
		
		$ID = rand(1,100);
		$table = 'File';
		
		if(!empty($this->data['media']['yourfile'])) {
			//debug($this->data); exit;
			$fileID = $this->upload_file($this->data['media']);
		} 
		
		$this->layout = 'admin';
		$allRec = $this->File->find('all');
		$this->set('allRec', $allRec);
		
 	}
	
	/*  
	*   Developer  : Mohammad Ashfaq  
	*   Project : Rootx
	*   
	*    
	*/
	public function mediaup() {
		
	}
	
	
	function upload_file($pic){
	   
				//debug($this->data); exit; 
			    //echo WWW_ROOT; exit; 
				$reversedFileName = strrev($pic['yourfile']['name']);
				$mineType = split('[.]', $reversedFileName);
				$mineType =  $mineType[0];
				$mineType = strrev($mineType);
				$newFileName =  String::uuid().".".$mineType;
				$recivedFileName = $pic['yourfile']['name'];
				$origFull = 'files'.DS.$recivedFileName;
				$destFull = 'files'.DS.$newFileName;
				$dataB['File']['file_path'] = $destFull;
				$dataB['File']['file_name'] = $newFileName;
				$dataB['File']['original_name'] = $pic['yourfile']['name'];
				$dataB['File']['type'] = $pic['yourfile']['type'];
				
				$filename = basename($pic['yourfile']['name']);
				
				if (move_uploaded_file($pic['yourfile']['tmp_name'], $destFull)) {
					 
					$this->File->create();
					$this->File->save($dataB);
					$fid = $this->File->id;
					
					$exact_type = explode('/',$pic['yourfile']['type']);
					$dataB['File']['type'] = $exact_type[0];
					$dataB['File']['uuid'] = $this->File->getUuidById($fid);
					echo json_encode($dataB['File']); exit;
					
				} else {
					$dataB['error'] = 'Failed to save' ;
				}		 
				
				return $fid;
				
			return '';
			
	}
	
	
	 
	 
}
