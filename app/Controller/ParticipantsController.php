<?php

/*  
*   Developer  : Mohammad Ashfaq  
*   Project : Clip
*   Date    : 20-Nov-2013
*/
App::uses('AppController', 'Controller');
App::uses('CakePdf', 'CakePdf.Pdf');

//App::uses('CakeEmail', 'Network/Email');

class ParticipantsController extends AppController {
   
   public $components = array("Email","RequestHandler");
     
    public function beforeFilter() {
        parent::beforeFilter();
       	$this->layout = 'default';
    }

    public function index() {
	    
	$list	= $this->Formula->find('all');
	$this->set('list',$list);
	$this->set('page_title','Clip Project');
    }
 
    /*  
    *   Developer  : Mohammad Ashfaq  
    *   Project : Clip
    *   Date    : 20-Nov-2013
    *   Detail: Using this function for Admin Listing and routing by routes.php
    */
    public function xindex() {
	$this->layout = 'admin';
	$list	= $this->Participant->find('all');
	$this->set('list',$list);
	
	$formulas = $this->Formula->find('list', array(
	    'fields' => array('Formula.id', 'Formula.name'),
	    'recursive' => 0
	));
	$this->set('formulas',$formulas);
	$this->set('page_title','Clip Project');
    }
    
    /*  
    *   Developer  : Mohammad Ashfaq  
    *   Project : Clip
    *   Date    : 20-Nov-2013
    *   Detail: Using this function for User End Create Participent and routing by routes.php
    */
    public function create() {
        
        if (!empty($this->data)) {
	    //debug($this->data);exit;
	    
	    $data = array();
	    $data = $this->data;
	    $data['dob']  = date("Y-m-d",strtotime($data['dob']));
	    $this->Participant->create();
            if ($this->Participant->save($data)) {
                $this->Session->setFlash(__('Thanks for your Participations'),'success');
                return $this->redirect('/');
            }
            $this->Session->setFlash(__('Please check errors and try again.'),'error');
        } 
    }
    
    /*  
    *   Developer  : Mohammad Ashfaq  
    *   Project : Clip
    *   Date    : 22-Nov-2013
    *   Detail: Using this function for Admin to confirm Participent and routing by routes.php
    */
    public function confirm($id = null) {
        $this->layout = 'admin';

        if (!empty($this->data)) {
	    
	    $data = $xdata = array();
	    $data = $this->data;
	    $xdata = $this->Participant->read(null, $data['id']);
	    $formulaDetail = $this->Formula->read(null, $xdata['Participant']['formula_id']);
	    $this->set('formulaDetail',$formulaDetail['Formula']);
	
            if ($this->Participant->save($this->data)) {
		$xdata['formulaDetail'] = $formulaDetail['Formula'];
		
		$this->set('extraparams', $xdata);
		
		     if($this->EmailSend($xdata)){
			    $this->Session->setFlash(__('The Participent has been confirmed'), 'success');
			   return $this->redirect('/clipadmin/participants');
		    }
            }
            $this->Session->setFlash(__('The Formula could not be saved. Please, try again.'),'error');
        } else {
	    
	    $this->Participant->id = $id;
	    if (!$this->Participant->exists()) {
		throw new NotFoundException(__('Invalid Record'));
	    }
	    
            $this->data = $this->Participant->read(null, $id);
	    
	    $formulaDetail = $this->Formula->read(null, $this->data['Participant']['formula_id']);
	    $this->set('formulaDetail',$formulaDetail['Formula']);
	     
        }
    }
    
     
    /*  
    *   Developer  : Mohammad Ashfaq  
    *   Project : Clip
    *   Date    : 22-Nov-2013
    *   Library: Using PDF library Pluging and Default email component https://github.com/ceeram/CakePdf
    *   Parameters: Array parameters
    *   Detail: Using this function for SendEmail to Participent and routing by routes.php
    */
    function EmailSend($data){
	
	//test file for check attachment 
	$file_name= APP."webroot/img/admin/assets/avatars/user.jpg";
	
	$this->set('extraparams', $data);
	$this->pdfConfig = array(
	    'orientation' => 'portrait',
	    'filename' => 'Invoice_'. 3
	);
	
	$CakePdf = new CakePdf();
	$CakePdf->template('confirmpdf', 'default');
	//get the pdf string returned
	$pdf = $CakePdf->output();
	//or write it to file directly
	$pdf = $CakePdf->write(APP . 'webroot'. DS .'files' . DS . 'userdetail.pdf');
	$pdf = APP . 'webroot'. DS .'files' . DS . 'userdetail.pdf';
	
	
	$this->Session->write("extraparams",$data);
	 
	
	$this->Email->from    = 'Admin<info@clip.com>';
	$this->Email->cc    = 'Ashfaq<ashfaqzp@gmail.com>';
	$this->Email->to      = $data['Participant']['email'];
	$this->Email->subject = 'Participantion Confirmation from Clip Admin';
	$this->Email->attachments = array($pdf);
	$this->Email->template = 'confirm';
	$this->Email->sendAs = 'html';
	
	if($this->Email->send()){
	   return true;
	}else
	    return false;
	$this->set('extraparams', $data);
    
    }
 
    /*  
    *   Developer  : Mohammad Ashfaq  
    *   Project : Clip
    *   Date    : 22-Nov-2013
    *   Detail: Using this function for delete Participent and routing by routes.php
    */
    public function delete($id = null) {

        $this->Participant->id = $id;
        if (!$this->Participant->exists()) {
            throw new NotFoundException(__('Invalid Formula'));
        }
        if ($this->Participant->delete()) {
            $this->Session->setFlash(__('Formula deleted'));
            return $this->redirect('../clipadmin/participants');
        }
        $this->Session->setFlash(__('Formula was not deleted'));
        return $this->redirect('../clipadmin/participants');
    }
}