 
                    <div class="panel-heading">
                        <h3 class="panel-title">Fill the informations</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('users', array('id'=>'add','role'=>'form', 'action'=>'/add') ); ?>
                        <input type="hidden" id="original_pass" name="original_pass" value="original_pass">
                                
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
echo $this->Form->input('User.password',$options);

$options = array(
    'class' => 'form-control  ',
     
    'placeholder' => 'Note or Address ', 
    'label' => 'Note or Address',
    'div' => array( 'class' => 'form-group', ),
    
);
echo $this->Form->textarea('User.note',$options);
 
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
        $("#add").submit(function(){
			
			var pass = $('#UserPassword').val()
			$('#original_pass').val($('#UserPassword').val());
			//alert($('#original_pass').val());
			  
		});
});
</script>
