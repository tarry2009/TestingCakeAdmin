<?php

class Setting extends AppModel {

    var $name = 'Setting';
    var $useTable = 'settings';
    
    public $validate = array(
        'key' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A key name is required'
            )
        )
    );
    
	
}
