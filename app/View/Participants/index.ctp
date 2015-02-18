
	
		<div class="container-fluid" id="main-container">
			<div id="main-content">
			   <div id="cliplogo"><div id="logoimg"></div></div>
				<div class="row-fluid">
					<div class="span12">
						
<div class="login-container">

<div class="row-fluid">
	<div class="left">
		<h1><i class=""></i> <span class="red">Clip</span> <span class="black">Application</span></h1>
	
	</div>
</div>

<div class="space-6"></div>

<div class="row-fluid">

<div class="position-relative">


	<div id="login-box" class="visible widget-box no-border">

		<div class="widget-body">
		 <div class="widget-main">
			<?php echo $this->Session->flash(); ?>
			<h4 class="header green lighter bigger"><i class="icon-group blue"></i> New Participant</h4>
			<div class="space-6"></div>

			<p>
				Enter your details to begin:
			</p>
			
			<form id="formA" onsubmit="return false;">
				 <fieldset>
					<label>
						<span class="block input-icon input-icon-right">
							<input type="email" id="emailA" name="emailA"  class="span12 required email  " placeholder="Email" />
							<i class="icon-envelope"></i>
						</span>
					</label>
					<label>
						<span class="block input-icon input-icon-right">
							<input type="text" name="name" id="name" class="span12 required" placeholder="Username" />
							<i class="icon-user"></i>
						</span>
					</label>
					<label>
						<span class="block input-icon input-icon-right">
							<div class="control-group">
								<div class="row-fluid input-append date">
									<input type="text" name="dobx" data-date-format="dd-mm-yyyy" id="dobx" class="span10 date-picker dobx required">
									<span class="add-on "><i class="icon-calendar"></i></span>
								</div>
							</div>
						</span>
					</label>
					 
				  </fieldset>
				  
			</form>
		 
		 </div><!--/widget-main-->
		
		
		<div class="toolbar center">
			<div>
				<a href="#" onclick="" class="forgot-password-link"> &nbsp; </a>
			</div>
			<div>
				<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">Next <i class="icon-arrow-right"></i></a>
			</div>
		 </div>
		</div><!--/widget-body-->

	</div><!--/login-box-->
	 
	<div id="forgot-box" class="widget-box no-border">

		<div class="widget-body">
		 <div class="widget-main">
			<h4 class="header red lighter bigger"><i class="icon-key"></i> All Formula</h4>
			
			<div class="space-6"></div>
			
			<p>
				Select one formula:
			</p>
			<form>
				 <fieldset>
					
					<div id="getformul">
					  
					</div>   
	
					<div class="row-fluid">
						<button onclick="endsubmit(); return false;" class="span5 offset7 btn btn-small btn-danger"><i class="icon-lightbulb"></i> Send Me!</button>
					</div>
					
				  </fieldset>
			</form>
		 </div><!--/widget-main-->
		

		 <div class="toolbar center">
			<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">Back to main <i class="icon-arrow-right"></i></a>
		 </div>
		</div><!--/widget-body-->

	</div><!--/forgot-box-->
	
	

	
	<div id="signup-box" class="widget-box no-border">

		<div class="widget-body">
		 <div class="widget-main">
			<h4 class="header green lighter bigger"><i class="icon-group blue"></i> New Participant Confirmation</h4>
			<div class="space-6"></div>

			<p>
				Thanks for participent
			</p>
			<form>
				 <fieldset>
					<label>
						<span class="block input-icon input-icon-right">
							
						</span>
					</label>
					 
				  </fieldset>
			</form>
		</div>

		<div class="toolbar center">
			<a href="#" class="back-to-login-link"><i class="icon-arrow-left"></i> Back to Main</a>
		</div>

	 </div><!--/widget-body-->

	</div><!--/signup-box-->
	<?php echo $this->Form->create('participants', array('id'=>'create_participant', 'action'=>'/create') ); ?>
			
	 <input type="hidden" name="full_name" id="full_name" value="" />
	 <input type="hidden" name="email" id="email" value="" />
	 <input type="hidden" name="dob" id="dob" value="" />
	 <input type="hidden" name="formula_id" id="formula_id" value="" />
	 
	</form>
	
</div><!--/position-relative -->
	
</div>


</div>


					</div><!--/span-->
				</div><!--/row-->
			</div>
		</div><!--/.fluid-container-->
		
		<script type="text/javascript">
		  
		  
			$(document).ready(function() {
			
			    $( ".dobx" ).change(function() {
			
				getAjaxFormulas();
			
			    });
			
			});

			$('.dobx').datepicker();
			$("#formA").submit();
			function show_box(id) {
			
			   var result = doCheck();
			   
			   if (result) {
			      getAjaxFormulas();
			      $('.widget-box.visible').removeClass('visible');
			      $('#'+id).addClass('visible');
			      
			   }
			   
			   
			}
			
			function doCheck() {
			   $("#formA").validate({
						messages:{
						       'name':{
							   required: 'Name is required.'
						       },
						       'email':{
							   required: 'Valid Email is required.'
						       },
						       'dobx':{
							   required: 'Date of birth is required.'
						       }
						 }		       
					});
			   return $("#formA").valid();
			}
			
			function getAjaxFormulas() {
				
				var dob = $('.dobx').val();
			
				var url = base+'clipadmin/getformulas/'+dob;
				
				    $.get(url, function(data){ 
					
					$('#getformul').html(data);
					//$(data).find('#getformul .card').appendTo('#getformul');
				    }).error(function() {
					alert('There is an error...'); // or whatever
				    });
				    
			}
			function setVal() {
			   $("#email").val($("#emailA").val());
			   $("#full_name").val($("#name").val());
			   $("#dob").val($("#dobx").val());
			   $("#formula_id").val($('input[name=formulax]:checked').val());
			}
			function endsubmit(){
			   setVal();
			 
			   $("#create_participant").submit();
			}
			 
			
		</script>