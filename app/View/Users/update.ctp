 
                    <div class="panel-heading">
                        <h3 class="panel-title">Fill the informations</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('users', array('id'=>'update','role'=>'form', 'action'=>'/update') ); ?>
                        <input type="hidden" name="action" value="submit">        
                        <?php echo $this->Session->flash(); ?>
  
                            <fieldset>
                                
                            <?php
			    
$options = array(
    'class' => 'form-control required ',
     
    'placeholder' => 'Full Name', 
    'label' => 'Full Name',
    'div' => array( 'class' => 'form-group', ),
    
);
echo $this->Form->input('User.name',$options);
	    
$options = array(
    'class' => 'form-control  ',
     
    'placeholder' => 'Phone', 
    'label' => 'Phone',
    'div' => array( 'class' => 'form-group', ),
    
);
echo $this->Form->input('User.phone',$options);
 
 
$options = array(
    'class' => 'form-control required email',
    
    'placeholder' => 'E-mail', 
    'label' => 'E-Mail',
    'div' => array( 'class' => 'form-group', ),
    
);
echo $this->Form->input('User.email',$options);
 
$options = array(
    'class' => 'form-control required ',
    
    'type' => 'password',
    'placeholder' => 'Password', 
    'label' => 'Password',
    'div' => array( 'class' => 'form-group', ),
    
);
//echo $this->Form->input('User.pass',$options);
    
$options = array(
    'class' => 'form-control  ',
    'placeholder' => 'Password', 
    'label' => 'Password',
    'div' => array( 'class' => 'form-group', ),
    
);
echo $this->Form->input('User.original_pass',$options);


echo $this->Form->input('User.id',array('type' => 'hidden',));
?>
        
                                 <!--  Change this to a button or input when using this as a form -->
                                <input type="reset" class="btn btn-primary pull-right margin4" value="Reset"> <input type="submit" class="btn btn-success pull-right margin4" value="Submit">
                         </fieldset>
                       <?php echo $this->Form->end();?>
                    </div>
                 
 
     <!-- Validation JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/js/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
        $("#add").validate();
	
	
	
});
</script>
