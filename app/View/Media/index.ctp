<div class="row-fluid"> 
<?php
			
$uploadApiLink = $this->Html->url( array(  "controller" => "media", "action" => "index"));
 
$deleteLinkNew = $this->Html->url( array("controller" => "restapi", "action" => "delete"));
$otherFile = $this->base.'/img/otherfile.jpg';
	  	  
		  echo $this->Form->create('Document', array('enctype' => 'multipart/form-data') ); ?>
			   
   <?php echo $this->Form->create('media', array('id'=>'media','role'=>'form', 'action'=>'mediaup') ); ?>
<input type="hidden" name="action" value="submit">        
<?php echo $this->Session->flash(); ?>
			
			   <?php echo $this->Form->file( 'yourfile',array('class'=>' inputText', 'div' => false,'label' => false) ); ?>
			   <div id="loader" class="span4 pull-right">
			      <img src="<?php echo $this->base; ?>/app/webroot/img/loading.gif" width="50">
			   </div>
			   <?php echo $this->Form->end();?>
			       
				 <br>
				 <hr>
				 <br>
				 </div>
                            <div class="dataTable_wrapper">
                                  <div id="mainPanel" class="row">
                                             
                                         
                                         <?php
                                            if(!empty($allRec)){
                                                foreach($allRec as $k=>$v){
													  
	$deleteLink = $this->Html->url( array("controller" => "restapi", "action" => "delete", $v['File']['uuid']));
	$exact_type = explode('/',$v['File']['type']);
?>
                                           
                                        				 
      
					 
				<div class="col-lg-4 " align="top">
                   
                             <a  href="<?php echo $this->base.'/app/webroot/files/'.$v['File']['file_name']; ?>" data-lightbox="AllMedia" data-title="<?php echo $v['File']['original_name']; ?>">
								<img src="<?php echo  ($exact_type[0]=='image') ? $this->base.'/app/webroot/files/thumbs/'.$v['File']['file_name'] : $otherFile; ?>" class="img-thumbnail"    >
							</a>

                       
                            	<a  class="btn btn-default btn-circle btn-danger" href="<?php echo $deleteLink.'/File'; ?>" onclick="return confirm('Are you sure, you wish to delete this recipe?');">
								 <i class="fa fa-times"></i>
								 </a>
                             
                        <br><br>
               
		</div>
			    
			                                                            <?php
                                            } //Ending Foreach
                                            ?>
                                            
                                            </div></div>
                                            <?php 
                                        } //Ending If
                                        ?>
                             </div>
                           
                     
        <div id="allfiles" class="dataTable_wrapper hide">
					 
				<div class="col-lg-4 " align="top">
                
                            <a id="imageLink" href="" data-lightbox="AllMedia" data-title="My caption">
							<img id="imageSrc" src="" class="img-thumbnail" >
							</a>

                     
                             <a id="del" class="btn btn-default btn-circle btn-danger" href="#" onclick="return confirm('Are you sure, you wish to delete this recipe?');">
							 <i class="fa fa-times"></i>
							 </a>
                         <br><br>
                </div>
		</div>
			    
			    <!-- Validation JavaScript -->
    <script src="<?php echo $this->base; ?>/app/webroot/js/jqueryupload.js" type="text/javascript"></script>
        
<script type="text/javascript">
$(document).ready(function() {
   
   $('#loader').hide();
   var filepath = "<?php echo $this->base; ?>/app/webroot/files/";
    $('input[type=file]').change(function() {
		 
		$('#loader').show();
		$(this).upload('<?php echo $uploadApiLink; ?>', function(data) { 
			var res = $.parseJSON(data);
			
			$('#imageLink').attr('href',filepath+res.file_name);
			
			if(res.type == 'image')
			$('#imageSrc').attr('src', filepath+''+res.thumb);
			else{
				$('#imageSrc').attr('src', '<?php echo $otherFile; ?>');
				 
			}
			$('#del').attr('href', '<?php echo $deleteLinkNew; ?>/'+res.uuid+'/File');
			  
			
			$('#mainPanel').append($('#allfiles').html());
			$('#loader').hide();
		 
		});
	});
	
	
	
});
</script>
