 
<div class="span7">
		 <div class="widget-main">
			<h4 class="header green lighter bigger"><i class="blue"></i>Participant Detail </h4>
			<div class="space-6"></div>
			 
			<?php echo $this->Form->create('participants', array('id'=>'formula', 'action'=>'/confirm','enctype'=>'multipart/form-data') ); ?>
 
						   
						<label>Participent Name 	 : <?php echo $this->data['Participant']['full_name']; ?> </label>
							
						<label>Participent Email	 : <?php echo $this->data['Participant']['email']; ?> </label>
						<label>Participent Date of Birth : <?php echo $this->data['Participant']['dob']; ?> </label>
						
						<h3>Formula Detail:</h3>
						<div class="green">
						<label>Participent Formula	 : <?php echo $formulaDetail['name']; ?> </label>
						<label>Formula Start Date	 : <?php echo $formulaDetail['start_date']; ?> </label>
						<label>Formula End Date	 	 : <?php echo $formulaDetail['end_date']; ?> </label>
						</div>
						 
						<div class="space-24"></div>
						
						<input type="hidden" name="status" value="Y" />
						<input type="hidden" name="id" value="<?php echo $this->data['Participant']['id']; ?>" />
						<div class="row-fluid">
							<button type="submit" onclick="return true;" class="span6 btn btn-small btn-success">Confirm<i class="icon-arrow-right icon-on-right"></i></button>
						</div>
						
					   
				</form>
		</div>
		