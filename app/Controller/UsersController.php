<?php

/*  
*   Developer   : Mohammad Ashfaq  
*   Project 	: Roox
*   Date    	:  
*/

#require_once("../simple_html_dom.php");
App::uses('CakePdf', 'CakePdf.Pdf');

class UsersController extends AppController {
 
    public $components = array("Email","RequestHandler");
    
    public function beforeFilter() {
        parent::beforeFilter();
        
        }
    
    /**
     * Index a view
     *
     * @param null
     * @return void
     * @throws NotFoundException When the view file could not be found
     *	or MissingViewException in debug mode.
     */
    public function index() {
	  
		$this->layout = 'admin';
		$allRec = $this->User->find('all');
		$this->set('allRec', $allRec);
		
		//debug($this->Session->read('Auth.User'));
    }
     
  
  
    public function logout() {
	
		$this->Session->delete('User.id');
		$this->Session->delete('User.role');
		$this->Session->delete('User.user');
		$this->redirect(array('controller' => 'users', 'action' => 'login'));  
		
    }


    /*  
    *   Developer  : Mohammad Ashfaq  
    *   Project : Roox
    *   Parameters: Array parameters
    *   Detail: Using this function for login user and routing by routes.php
    */	
    public function login() {
		$this->layout = 'login';
	    if(!empty($this->data)){
		    $conditions['conditions']	= array(
				    'User.email'	=> $this->data['email']//,
				   // 'User.pass'	=> md5($this->data['pass'])
				    );
			    
		    $row_user	= $this->User->find('first',$conditions);
		    
		    if(count($row_user) != 0){
			    $this->Session->write("User.id",$row_user['User']['id']);
			    $this->Session->write("User.role",$row_user['User']['role']);
			    $this->Session->write("User.user",$row_user['User']);
			    $this->redirect(array('controller' => 'rootx', 'action' => 'index'));
		    }
		    $this->Session->setFlash(__('Invalid username or password'),'error');
		    $this->redirect(array('controller' => 'rootx', 'action' => 'login'));
	    }
    }
    
	
    /*  
    *   Developer  : Mohammad Ashfaq  
    *   Project : Roox
    *   Date    :  
    *   Library: Using PDF library Pluging and Default email component
    *   Parameters: Array parameters
    *   Detail: Using this function for create user by admin and routing by routes.php but i have hide this function for admin
    */
    
    public function add() {
	
	$this->layout = 'admin';
	$this->viewName = 'Add User';
	$this->set('viewName',$this->viewName);
	
	$data = array();
        if (!empty($this->data)) {
		
			//$data = $this->data;
			debug($data);
			//$data['User']['original_pass'] = getEncrypt($this->data['original_pass']); 
			//$data['User']['password'] = md5($this->data['original_pass']);
			//debug($data); exit;
		    
			$this->User->create();
			if ($this->User->save( $this->data)) {
				$this->Session->setFlash(__('The user register successfully.'), 'success');
				return $this->redirect(array('controller' => 'users', 'action' => 'login'));
			}else
			{
			$this->Session->setFlash(__('The user could not register.'), 'error');
			$this->redirect(array('controller' => 'users', 'action' => 'add'));
			}
        }
    }
    
    public function update($uuid = null) {
        $this->layout = 'admin';
		$this->viewName = 'Update User';
		$data = array();
	
		if (!empty($this->data)) {
		
		$data = $this->data['User'];
		$pass = $data['original_pass'];
		$data['original_pass'] = getEncrypt($pass); 
		$data['password'] = md5($pass);
		
		 
            debug($data); 
            if ($this->User->save($data)) {
                $this->Session->setFlash(__('The user updated successfully.'), 'success');
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            }else
	    {
		$this->Session->setFlash(__('The user could not update.'), 'error');
		$this->redirect(array('controller' => 'users', 'action' => 'index'));
	    }
        }
	
	$this->User->id = $this->User->getIdByUuid($uuid);
	
        if (!$this->User->exists()) {
		$this->Session->setFlash(__('The user id is not valid.'), 'error');
		$this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
	
	$data =  $this->User->read(null,  $this->User->id);
	debug($data); 
	$data['User']['original_pass'] = trim(getDecrypt($data['User']['original_pass']));
	
	 $this->data = $data;
	 debug($this->data); 
	// exit;
	 
    }
    
    public function delete($uuid = null) {
	 
	$this->User->id = $this->User->getIdByUuid($uuid);
        
	$this->data =  $this->User->read(null,  $this->User->id);
	
	if($this->data['User']['email']=='ashfaqzp@gmail.com' || $this->data['User']['email']=='admin@gmail.com'){
	    $this->Session->setFlash(__('This user is root user and cannot delete'), 'error');
		$this->redirect(array('controller' => 'users', 'action' => 'index'));
	}
	
        if (!$this->User->exists()) {
           $this->Session->setFlash(__('The user id is not valid.'), 'error');
		$this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted successfully'), 'success' );
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        $this->Session->setFlash(__('User could not deleted'), 'error');
        $this->redirect(array('controller' => 'users', 'action' => 'index'));
    }
    
    #Clear App cache
    function flushcache()
    {		
 
		$retPath = $_SERVER['HTTP_REFERER'];
		Cache::delete('');
	 
		$this->Session->setFlash(__('Cache has been cleared.'), 'success');
		$this->redirect($retPath);
    }

    #Using default php functions
    function sendmailmime($data){
	
	$to		= $data['email'];
	$username	= $data['name'];

	$adminemail	= $data['adminemail'];
	$sitetitle 	= $data['sitetitle'];
	 
	$subject	= $data['emailsubject'];
	$body		= $data['emailbody'];

	//replacing veriables
	$date		= date('l, d F, Y ',strtotime($data['date']));//Monday, 8th April, 2013: 5:00 p.m	
	$time		= date('h:i a',strtotime($data['time']));	
	$subject	= str_replace('{veriable}', $veriable, $subject);
	$body		= str_replace('{date}', $date, $body);
	$body		= str_replace('{time}', $time, $body);
	$body		= str_replace('{name}', $username, $body);
    
	$headers   	= array();
	
	$file		= APP."webroot/img/admin/assets/avatars/user.jpg";
	$filename 	= 'user.jpg';
	
	/*
	//$file = $path . "/" . $filename;
	$file_size = filesize($file);
	$handle = fopen($file, "r");
	$content = fread($handle, $file_size);
	fclose($handle);
	$content = chunk_split(base64_encode($content));
	*/
	
	$content = chunk_split(base64_encode(file_get_contents($file)));
	
	// a random hash will be necessary to send mixed content
	$separator = md5(time());
    
	// carriage return type (we use a PHP end of line constant)
	$eol = PHP_EOL;
    
	// main header (multipart mandatory)
	$headers[] 	= "MIME-Version: 1.0" . $eol;
	$headers[] 	= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;
	$headers[] 	= "Content-Transfer-Encoding: 7bit" . $eol;
	$headers[] 	= "This is a MIME encoded message." . $eol . $eol;
	$headers[] 	= "From: ".$sitetitle." <".$adminemail.">";
	$headers[] 	= "Bcc: schedule <ashfaqzp@gmail.com>". $eol;
	$headers[] 	= "Reply-To: ".$sitetitle." <".$adminemail.">";
	$headers[] 	= "Subject: {$subject}";
	$headers[] 	= "X-Mailer: PHP/".phpversion();
	
	// message
	$headers[] 	= "--" . $separator . $eol;
	$headers[]	= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
	$headers[]	= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
	$headers[]	= $message . $eol . $eol;
    
	// attachment
	$headers[]	= "--" . $separator . $eol;
	$headers[]	= "Content-Type: ".mime_content_type($file)."; name=\"$filename\"\r\n" . $eol;
	$headers[]	= "Content-Transfer-Encoding: base64" . $eol;
	$headers[]	= "Content-Disposition: attachment" . $eol . $eol;
	$headers[]	= $content . $eol . $eol;
	$headers[]	= "--" . $separator . "--";
    
	//SEND Mail
	if (mail(mail($to, $subject, $body, implode("\r\n", $headers)))) {
	    echo "mail send ... OK"; // or use booleans here
	} else {
	    echo "mail send ... ERROR!";
	}
	  
    }
    
    
    function swiftmailer(){
	
	require_once 'lib/swift_required.php';
	
		// Create the message
		$message = Swift_Message::newInstance()
	    ->setSubject('Your subject')
	    ->setFrom(array('webmaster@mysite.com' => 'Web Master'))
	    ->setTo(array('receiver@example.com'))
	    ->setBody('Here is the message itself')
	    ->attach(Swift_Attachment::fromPath('myPDF.pdf'));
	
		//send the message          
		$mailer->send($message);
    }
    
    /*  
    *   Developer  : Mohammad Ashfaq  
    *   Project : RootX
    *   
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
 
 
}
