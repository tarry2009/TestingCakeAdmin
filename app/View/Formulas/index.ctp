 <script>
    function confirmAction() {
        return confirm("<?php echo __('Are you sure to delete'); ?>");
    }
</script>
   <div class="blue right"><a href="<?php echo $this->base.'/clipadmin/create-formula'; ?>">Create</a></div>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">Formulas</h3>
	<div class="table-header">
		Results for "Latest Formulas"
	</div>
	 
		<table id="table_report" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">
						<label>#</label>
					</th>
					<th>Formula Name</th>
					<th class=''>Start Date</th>
                                        <th class=''>End Date</th>
					<th class="hidden-480">Min Age</th>
                                        <th class="hidden-480">Max Age</th>
                                        <th class="hidden-480">Status</th>
					<th class="hidden-phone"><i class="icon-time hidden-phone"></i> Options</th>
					
				</tr>
			</thead>
									
			<tbody>
				<?php
                                    foreach($list as $record){
                                ?>
				<tr>
					<td class='center'>
						<label><span class="lbl"><?php echo $record['Formula']['id']; ?></span></label>
					</td>
					<td><?php echo $record['Formula']['name']; ?></td>
                                        <td class=''><?php echo $record['Formula']['start_date']; ?></td>
                                        <td class=''><?php echo $record['Formula']['end_date']; ?></td>
					<td class='hidden-480'><?php echo $record['Formula']['min_age']; ?></td>
					<td class='hidden-480'><?php echo $record['Formula']['max_age']; ?></td>
					
					<td class='hidden-480'><span class='label <?php echo (strtotime($record['Formula']['start_date']) > strtotime(date("Y-m-d"))) ? 'label-warning' : 'label-error' ?>'><?php echo (strtotime($record['Formula']['start_date']) > strtotime(date("Y-m-d"))) ? 'Expiring' : 'Expired' ?></span></td>
					<td>
						<div class='hidden-phone visible-desktop btn-group'>
							
							<a href="<?php echo $this->base.'/clipadmin/edit-formula/'.$record['Formula']['id']; ?>" ><button class='btn btn-mini btn-info'><i class='icon-edit'></i></button></a>
							<a href="<?php echo $this->base.'/clipadmin/delete-formula/'.$record['Formula']['id']; ?>" onclick="return confirmAction();" ><button class='btn btn-mini btn-danger'><i class='icon-trash'></i></button></a>
							
						</div>
						<div class='hidden-desktop visible-phone'>
							<div class="inline position-relative">
								<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"><i class="icon-caret-down icon-only"></i></button>
								<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
									<li><a href="<?php $this->base.'/edit-formula/'.$record['Formula']['id'];?>" class="tooltip-success" data-rel="tooltip" title="Edit" data-placement="left"><span class="green"><i class="icon-edit"></i></span></a></li>
									<li><a href="#" class="tooltip-warning" data-rel="tooltip" title="Flag" data-placement="left"><span class="blue"><i class="icon-flag"></i></span> </a></li>
									<li><a href="#" class="tooltip-error" data-rel="tooltip" title="Delete" data-placement="left"><span class="red"><i class="icon-trash"></i></span> </a></li>
								</ul>
							</div>
						</div>
					</td>
				</tr>
                                
                                <?php } ?>
                        </tbody>
                </table>        
		
</div>