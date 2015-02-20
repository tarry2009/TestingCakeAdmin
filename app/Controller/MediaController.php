<?php

App::uses('AppController', 'Controller');
 
class MediaController extends AppController {
 
	public $uses = array('File','FileRelation');
	//var $components = array('Qimage'); 
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
	
	/*  
	*   Developer  : Mohammad Ashfaq  
	*   Project : Rootx
	*   $pic is a post verialbe with $pic['yourfile']
	*   Using php-image-magician library for thumbs and image manipulation
	*   For more help visit the app/Vendor folder, you can find many examples 
	*/
	function upload_file($pic){
				 
				App::import('Vendor', 'ImageMagician', array('file' => 'php-image-magician/php_image_magician.php'));
    
			    //echo WWW_ROOT; exit; 
				$reversedFileName = strrev($pic['yourfile']['name']);
				$mineType = split('[.]', $reversedFileName);
				$mineType =  $mineType[0];
				$mineType = strrev($mineType);
				$newFileName =  String::uuid().".".$mineType;
				$recivedFileName = $pic['yourfile']['name'];
				$origFile = WWW_ROOT.DS.'files'.DS.$recivedFileName;
				$destFile = WWW_ROOT.DS.'files'.DS.$newFileName;
				$thumbFile = WWW_ROOT.DS.'files'.DS.'thumbs'.DS.$newFileName;
				
				$dataB['File']['file_path'] = $destFile;
				$dataB['File']['file_name'] = $newFileName;
				$dataB['File']['original_name'] = $pic['yourfile']['name'];
				$dataB['File']['type'] = $pic['yourfile']['type'];
				
				$filename = basename($pic['yourfile']['name']);
				
				if (move_uploaded_file($pic['yourfile']['tmp_name'], $destFile)) {
					
					$this->File->create();
					$this->File->save($dataB);
					$fid = $this->File->id;
					
					$exact_type = explode('/',$pic['yourfile']['type']);
					$dataB['File']['type'] = $exact_type[0];
					$dataB['File']['uuid'] = $this->File->getUuidById($fid);

				if($this->verifyMime($newFileName)){					
					$dataB['File']['thumb'] = 'thumbs/'.$newFileName;
					$magicianObj = new imageLib($destFile);
					$magicianObj -> resizeImage(175,150);
					$watermark = WWW_ROOT.DS.'img'.DS.'watermark.png';
					#$magicianObj -> addWatermark($watermark, '10 x 10', 0, 50);
					$magicianObj -> addCaptionBox('b', 40, 0, '#000', 50);
					$magicianObj -> addText('Ashfaq', 'b', 14);
	
					$magicianObj -> saveImage($thumbFile); 
					chmod($thumbFile,0777);
					
				}else{
					$dataB['File']['thumb'] = 'thumbs/'.$newFileName;
				}
					echo json_encode($dataB['File']); exit;
					
				} else {
					$dataB['error'] = 'Failed to save' ;
				}		 
				
				return $fid;
				
			return '';
			
	}
	
	
	/** 
		 * Verifies the mime-type of a file
		 *
		 * @param string $file
		 * @return bool
		 */
		 function verifyMime($file){
			
			$filename_array = explode('.',$file);

			$extension = end($filename_array);
			
			$extension = strtolower($extension);
			
			$mimes = array('jpeg', 'jpg', 'png', 'gif','bmp');
			
			if (in_array($extension, $mimes)){
				return true;
			} else {
				return false;
			}
	 }
	 
}
