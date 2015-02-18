<?php

App::uses('AppController', 'Controller');

class PdfController extends AppController {
    public $name = 'Pdf';
 	 
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'ajax';
    }

    
    public function index() {
        
    }
    
}
 
