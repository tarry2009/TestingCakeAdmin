<div class="span7">
		 <div class="widget-main">
			<h4 class="header green lighter bigger"><i class=" blue"></i>Edit formula</h4>
			<div class="space-6"></div>
			 
			<?php echo $this->Form->create('formulas', array('id'=>'formula', 'action'=>'/create','enctype'=>'multipart/form-data') ); ?>
 
						<label>Formula Name
							<span class="block input-icon input-icon-right">
								<input type="text" name="name" value="<?php echo $this->data['Formula']['name']; ?>" class="span12" placeholder="Formula Name" />
							</span>
						</label>
						
						<div class="control-group">
							<label>Select Start date and End Date</label>
							<div class="input-prepend">
								<span class="add-on"><i class="icon-calendar"></i></span>
								<?php
								if($this->data['Formula']['start_date']=="0000-00-00")
								    $startDate = '11/24/2013';
								 else
								    $startDate = date("m/d/Y",strtotime($this->data['Formula']['start_date']));
								    
								if($this->data['Formula']['end_date']=="0000-00-00")
								    $endDate = '11/29/2013';
								else
								    $endDate = date("m/d/Y",strtotime($this->data['Formula']['end_date']));
								?>
								<input type="text" id="id-date-range-picker-1" name="date-range-picker" value="<?php echo $startDate.' - '.$endDate ; ?>" placeholder="Select Date" class="span11">
							</div>
						</div>
						
						<label>Select Minimum Age</label>
						<input type="text" class="input-mini" name="min_age" id="spinner1" value="<?php echo $this->data['Formula']['min_age']; ?>"  />
								<div class="space-6"></div>
						
						<label>Select Maximum Age</label>
						<input type="text" class="input-mini" name="max_age" id="spinner2" value="<?php echo $this->data['Formula']['max_age']; ?>" />
								<div class="space-6"></div>
								
						<div class="space-24"></div>
						
						<input type="hidden" name="status" value="Y" />
						<input type="hidden" name="id" value="<?php echo $this->data['Formula']['id']; ?>" />
						<div class="row-fluid">
							<button type="reset" class="span6 btn btn-small"><i class="icon-refresh"></i> Reset</button>
							<button type="submit" onclick="return true;" class="span6 btn btn-small btn-success">Save <i class="icon-arrow-right icon-on-right"></i></button>
						</div>
						
					   
				</form>
		</div>
		