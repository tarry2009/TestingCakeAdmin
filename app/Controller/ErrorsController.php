<?php

App::uses('AppController', 'Controller');

class ErrorsController extends AppController {
	
    public $name = 'Errors';
 	 
 	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'error';
    }

    public function error404() {
        $this->layout = 'error';
    }
    
    public function index() {
        $this->layout = 'error';
    }
    
    public function missing_controller() {
        $this->layout = 'error';
    }
}
 
