
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('users', array('id'=>'login','role'=>'form', 'action'=>'/login') ); ?>
                        <input type="hidden" name="action" value="submit">        
                        <?php echo $this->Session->flash(); ?>
  
                            <fieldset>
                                
                                          <?php
$options = array(
    'class' => 'form-control required email',
    'name' => 'email',
    'placeholder' => 'E-mail', 
    'label' => false,
    'div' => array( 'class' => 'form-group', ),
    
);
echo $this->Form->input('email',$options);
 
$options = array(
    'class' => 'form-control required ',
    'name' => 'pass',
    'type' => 'password',
    'placeholder' => 'Password', 
    'label' => false,
    'div' => array( 'class' => 'form-group', ),
    
);
echo $this->Form->input('pass',$options);

?>

                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                       <?php echo $this->Form->end();?>
                    </div>
                </div>
            </div>
        </div>
    </div>

 


   <!-- jQuery -->
    <script src="<?php echo $this->base; ?>/app/webroot/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/admin/dist/js/sb-admin-2.js"></script>
    
     <!-- Validation JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/js/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
        $("#login").validate();
});
</script>
