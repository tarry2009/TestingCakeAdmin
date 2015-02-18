<div class="span7">
		 <div class="widget-main">
			<h4 class="header green lighter bigger"><i class="blue"></i> Create formula </h4>
			<div class="space-6"></div>

			 
					 <div class="widget-main">
				<?php echo $this->Form->create('formulas', array('id'=>'formula', 'action'=>'/create','enctype'=>'multipart/form-data') ); ?>
 
						<label>Formula Name
							<span class="block input-icon input-icon-right">
								<input type="text" name="name" class="span12" placeholder="Formula Name" />
							</span>
						</label>
						
						<div class="control-group">
							<label> Start date and End Date</label>
							<div class="input-prepend">
								<span class="add-on"><i class="icon-calendar"></i></span>
								<input type="text" id="id-date-range-picker-1" name="date-range-picker" placeholder="Select Date" class="span11">
							</div>
						</div>
						
						<label>Select Minimum Age</label>
						<input type="text" class="input-mini" name="min_age" id="spinner1" />
								<div class="space-6"></div>
						
						<label>Select Maximum Age</label>
						<input type="text" class="input-mini" name="max_age" id="spinner2" />
								<div class="space-6"></div>
								
						<div class="space-24"></div>
						
						<input type="hidden" name="status" value="Y" />
						
						<div class="row-fluid">
							<button type="reset" class="span6 btn btn-small"><i class="icon-refresh"></i> Reset</button>
							<button type="submit" onclick="return true;" class="span6 btn btn-small btn-success">Save <i class="icon-arrow-right icon-on-right"></i></button>
						</div>
						
					   
				</form>
			</div>
			</div>
			 
		</div>
		