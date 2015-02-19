   
             
                    <div class="panel-heading">
                        <h3 class="panel-title">Fill the informations</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('settings', array('id'=>$action,'role'=>'form', 'action'=>'/'.$action) ); ?>
                        <input type="hidden" name="action" value="submit">        
                        <?php echo $this->Session->flash(); ?>
  
                            <fieldset>
                                
                            <?php
			    
$options = array(
    'class' => 'form-control required ',
     
    'placeholder' => 'Key Name', 
    'label' => 'Key Name',
    'div' => array( 'class' => 'form-group', ),
    
);
echo $this->Form->input('Setting.key',$options);
	    
$optionsx = array(
    'class' => 'form-control  ',
     
    'placeholder' => 'Value', 
    'label' => 'Value',
    'div' => array( 'class' => 'form-group tinymce', ),
    
);
//echo $this->Form->textarea('Setting.value',$options);
?>
 
<div class="form-group required">
	<label for="SettingKey">Key Value</label>
	<input type="text" required="required" id="SettingValue" value="<?php echo (isset($this->data['Setting'])) ? $this->data['Setting']['value'] : ''; ?>" maxlength="254" placeholder="Key Value" class="form-control required tinymce " name="data[Setting][value]" >
</div>

<?php
echo $this->Form->input('Setting.id',array('type' => 'hidden',));
  
?>

                                 <br clear=all>
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
 
<!-- Load TinyMCE -->
<script type="text/javascript" src="<?php echo $this->webroot; ?>admin/tinymce/jquery.tinymce.js"></script>
<script type="text/javascript">
  $(function() {

	$('.tinymce').tinymce({
	  // Location of TinyMCE script
	  script_url : '<?php echo $this->webroot; ?>admin/tinymce/tiny_mce.js',

	  // General options
	  theme : "advanced",
	  skin : "o2k7",
	  skin_variant : "silver",
	  //plugins : "jqueryspellchecker",

	  // Theme options
	  theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,jqueryspellchecker",
	  theme_advanced_buttons2 : "",
	  theme_advanced_buttons3 : "",
	  theme_advanced_toolbar_location : "top",
	  theme_advanced_toolbar_align : "left",
	  theme_advanced_statusbar_location : "bottom",
	  theme_advanced_resizing : true,

	});
  });
</script>
