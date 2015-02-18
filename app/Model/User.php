<?php
// app/Model/User.php
App::uses('AppModel', 'Model');

class User extends AppModel {
	
    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty','email'),
                'message' => 'An username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ) 
    );
    
    // ...

	// ...
}

